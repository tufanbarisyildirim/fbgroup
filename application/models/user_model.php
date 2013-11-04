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
            return $query->result();
        }


        function by_id($user_id)
        {          
            $q = $this->db->get('users');
            $user = $q->result() ;
              
            if($user)
                return new User_model( $user[0] );

            return null;
        }
        
        
        public function login_with_facebook($fb_data)
        {
            $user_id = $fb_data['id'];
            $user =  $this->by_id($user_id);
             
            if($user)
                return $user;
            else 
            {
                $data = array(
                    'id' => $fb_data['id'], 
                    'name' => trim($fb_data['first_name'].' '  . $fb_data['middle_name']), 
                    'surname' => $fb_data['last_name'], 
                    'fb_username' => $fb_data['username'], 
                    'locale' => $fb_data['locale'], 
                    'gender' => $fb_data['gender']
                );
                      
                $this->db->insert("users",$data,true);
                return  $this->by_id($user_id);
            }

        }

}