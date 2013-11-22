<?php 
    /**
    * @method User_model   by_id(int $user_id)
    */
    class User_model extends MY_Model 
    {
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
            $badges =  Badge_model::get_user_badges('role',$this->user_id);
            $print = '';
            foreach($badges as $badge)
            {
               $print .='<span class="badge badge-'.$badge->badge_class.'">'.$badge->badge_name.'</span>';
            }
            
            return $print;
        }


        public static function by_id($user_id)
        {          
            $q = get_instance()->db->get_where('users',array('user_id' => $user_id));
            $user = $q->result() ;

            if($user)
                return new User_model( $user[0] );

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
                return $user;
            }
            else 
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

                $this->db->insert("users",$data,true);
                return  $this->by_id($user_id);
            }

        }


        public function update($data,$user_id = null)
        {
            return $this->db->update('users',$data,array('user_id' => $user_id == null ? $this->id : $user_id));
        } 
        
        public function is_admin()
        {
            return $this->user_id == '680557739';
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
            else
            {
                return parent::__get($var);
            }

        }

}