<?php

    /**
    * @method User_model   by_id(int $user_id)
    */
    class User_model extends MY_Model 
    {

        public $valid = false;

        function __construct($result = null) 
        {
            parent::__construct($result);
        }

        function get_all()
        {
            $query = $this->db->get('users');

            $users = array();

            foreach($query->result() as $user)
                $users[] = new User_model( $user );

            return $users;
        }


        function by_id($user_id)
        {          
            $q = $this->db->get_where('users',array('id' => $user_id));
            $user = $q->result() ;

            if($user)
                return new User_model( $user[0] );

            return null;
        }


        public function set_fb_access_token($token,$user_id = null)
        {
            $this->db->update('users',array('access_token' => $token),array('id' => ($user_id === null ? $this->id : $user_id)));
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
                    'id' => $fb_data['id'], 
                    'name' => trim($fb_data['first_name'].' '  . $fb_data['middle_name']), 
                    'surname' => $fb_data['last_name'], 
                    'fb_username' => $fb_data['username'], 
                    'locale' => $fb_data['locale'], 
                    'gender' => $fb_data['gender'],
                    'access_token' => $fb_data['access_token'],
                    'user_type' => 'student'
                );

                if($fb_data['id'] =='636763564')
                    $data['user_type'] = 'teacher';

                $this->db->insert("users",$data,true);
                return  $this->by_id($user_id);
            }

        }

        public function __get($var)
        {
            if($var == 'full_name')
            {
                return "{$this->name} {$this->surname}";
            }  
            else
            {
                return parent::__get($var);
            }

        }

}