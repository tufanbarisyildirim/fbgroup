<?php
    class Account extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->force_to_login();
        }

        public function index()
        {
            //show account/me  as default.
            $this->me();
        }  

        public function me()
        {
            $data = array();
            $data['user'] = &$this->current_user;
            
            $this->load->view('account/profile',$this->common_data( $data));
        }


}