<?php 
    /**
    * @method User_model   by_id(int $user_id)
    */
    class User_model extends MY_Model 
    {
        public static $userCache = array();

        function __construct($result = null) 
        {
            parent::__construct($result);
        }

        function get_all()
        {
            $query = $this->db->order_by('user_name','ASC')->get('users');

            $users = array();

            foreach($query->result() as $user)
                $users[] = new User_model( $user );

            return $users;
        }

        function get_where($where)
        {
            $query = $this->db->get_where('users',$where);

            $users = array();

            foreach($query->result() as $user)
                $users[] = new User_model( $user );

            return $users;
        }

        public function print_badges()
        {
            $badges =  Badge_model::get_user_badges($this->user_id,'role');
            $print = '';
            foreach($badges as $badge)
            {
                $print .='<span class="badge badge-'.$badge->badge_class.'">'.$badge->badge_name.'</span>&nbsp;';
            }

            return $print;
        }

        public function print_all_bages()
        {
            $badges =  Badge_model::get_user_badges($this->user_id);
            $print = '';
            foreach($badges as $badge)
            {
                $print .='<span class="badge badge-'.$badge->badge_class.'">'.$badge->badge_name.'</span>&nbsp;';
            }

            return $print;
        }

        public function print_all_badges()
        {
            $badges =  Badge_model::get_user_badges($this->user_id);
            $print = '';
            foreach($badges as $badge)
            {
                $print .='<span class="badge badge-'.$badge->badge_class.'">'.$badge->badge_name.'</span>&nbsp;';
            }

            return $print;
        }


        public static function by_id($user_id)
        {     
            if(isset(self::$userCache[$user_id]))
                return self::$userCache[$user_id];


            $q = get_instance()->db->get_where('users',array('user_id' => $user_id));
            $user = $q->result() ;

            if($user)
            {

                $user = new User_model( $user[0] );
                self::$userCache[$user->user_id] = $user;

                return $user;
            }

            return null;
        }


        public function set_fb_access_token($token,$user_id = null)
        {
            $this->db->update('users',array('access_token' => $token),array('user_id' => ($user_id === null ? $this->user_id : $user_id)));
        }

        public function login_with_facebook($fb_data)
        {

            $user_id = $fb_data['id'];
            $user =  $this->by_id($user_id);

            if($user)
            {
                //renew the access token
                $user->set_fb_access_token($fb_data['access_token']);
                $user->renew_cover();
                return $user;
            }
            else 
            {
                $info = $this->facebook->api( '/'.$this->current_user->fb_username.'/groups', 'GET');
                foreach($info['data'] as $group)
                {
                    if($group['id'] == $this->config->item('group_id'))
                    {
                        $data = array(
                            'user_id' => $fb_data['id'], 
                            'user_name' => trim($fb_data['first_name'].' '  . $fb_data['middle_name']), 
                            'user_surname' => $fb_data['last_name'], 
                            'fb_username' => $fb_data['username'], 
                            'user_locale' => $fb_data['locale'], 
                            'user_gender' => $fb_data['gender'],
                            'access_token' => $fb_data['access_token']
                        );

                        $this->session->set_userdata('is_group_member',true);

                        $this->db->insert("users",$data,true);
                        return  $this->by_id($user_id);


                    }

                }


            }

        }


        public function delete($user_id = null)
        {
            if($user_id == null)
                $user_id = $this->user_id;

            $this->db->delete('users',array('user_id',$user_id));

            //TODO : delete other reletad data like comments / blogposts etc.

        }

        public function renew_cover($user_id = null)
        {
            if($user_id == null)
                $user_id = $this->user_id;

            $result =  $this->facebook->api(
                array(
                    'method' => 'fql.query',
                    'access_token' => $this->facebook->getAccessToken(),
                    'query' => "SELECT pic_cover  FROM user WHERE uid = {$user_id}"
                )

            );

            $this->update(array(
                'user_cover_photo' => $result[0]['pic_cover']['source'],
                'cover_offset_y' => $result[0]['pic_cover']['offset_y'],
                'cover_offset_x' => $result[0]['pic_cover']['offset_x'],

                ),$user_id);
        }

        public function update($data,$user_id = null)
        {
            return $this->db->update('users',$data,array('user_id' => $user_id == null ? $this->user_id : $user_id));
        } 

        public function is_admin()
        {
            return $this->user_id == '680557739';
        }

        public function is_student()
        {
            $badges = Badge_model::get_user_badges($this->user_id,'role');
            foreach($badges as $badge)
                if($badge->badge_name =='Student')
                    return true;

                return false;
        }    

        public function is_teacher()
        {
            if($this->is_admin())
                return true;

            $badges = Badge_model::get_user_badges($this->user_id,'role');
            foreach($badges as $badge)
                if($badge->badge_name =='Teacher')
                    return true;

                return false;
        }   

        public function is_guest()
        {
            $badges = Badge_model::get_user_badges($this->user_id,'role');
            foreach($badges as $badge)
                if($badge->badge_name =='Guest')
                    return true;

                return false;
        }  

        public function __get($var)
        {
            if($var == 'full_name')
            {
                return "{$this->user_name} {$this->user_surname}";
            }
            else if($var == 'role')
            {
                $roles = array(
                    'student' => 'Student',
                    'teacher' => 'Teacher',
                    'guest' => 'Guest',
                    'administrator' => 'Administrator'
                );

                return $roles[$this->user_type];

            } 
            else if($var =='herhim')
            {
                return $this->user_gender == 'male' ? 'him' : 'her';
            }
            else if($var =='herhis')
            {
                return $this->user_gender == 'male' ? 'his' : 'her';
            }
            else if(method_exists($this,$var))
            {
                return $this->{$var} = $this->{$var}();
            }

            else
            {
                return parent::__get($var);
            }

        }

        public function profile_link_with_avatar()
        {
            return '<img src="' . fb_profile_pic_url($this->user_id) .'" class="circle-img" width="30" />&nbsp;<a href="'. site_url('user/profile/' . $this->user_id ).'">' . $this->full_name . '</a>';
        }

}