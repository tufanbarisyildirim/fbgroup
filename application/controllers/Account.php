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
            
            $this->load->view('account/profile',$this->common_data( $data));
        }


}