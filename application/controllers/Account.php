<?php
    class Account extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
        }


        public function index()
        {
            //show account/me  as default.
            $this->me();
        }  

        public function me()
        {
            /*
            * set edit permission to here. 
            */
            $this->profile($this->current_user->id);
        }

        public function profile($user_id)
        {
            $data = array();
            $data['editable'] = false;

            if($user_id == $this->current_user->id)
            {
                $data['editable'] = true;
                $data['user'] = $this->current_user;  
            }
            else
            {
                $data['user'] = $this->user_model->by_id($user_id);
            }
            
            $this->load->view('account/profile',$data);

        }

    }
