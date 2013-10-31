<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    /**
    * 
    * @property $config MY_Config
    */
    class MY_Controller extends CI_Controller
    {
        public function __construct()
        {
            parent::__construct();                                 

            $this->load->library('facebook',$this->config->facebook);
        }
}