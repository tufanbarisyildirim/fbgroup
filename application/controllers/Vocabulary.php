<?php
    class Vocabulary extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->force_to_login();
        }
        
        public function index()
        {
          $this->load->view('vocabulary/vocablist');  
        }
        
    }
