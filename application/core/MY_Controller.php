<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
    /**
    * 
    * @property $config MY_Config
    * @property $load CI_Loader
    * @property $session CI_Session
    * @property $current_user User_model
    * @property $user_model User_model
    * @property $facebook Facebook
    */
    class MY_Controller extends CI_Controller
    {
        public $current_user;

        public function __construct()
        {
            parent::__construct();                                 

            //Use autoload for these.
            $this->load->database();
            $this->load->library('facebook',$this->config->facebook);
            $this->load->driver('session');
            $this->load->library('session');
            $this->load->model('user_model');
            $this->load->helper('url');



            if($this->is_logged_in())
            {             
                $this->current_user =  $this->user_model->by_id($this->session->userdata('user_id'));
                if(!$this->current_user)
                {
                    //visitor has a session user_id but we dont have it in db.
                    $this->session->set_userdata("user_id",null);

                    if(get_class($this) != "Home" )
                        redirect(site_url('home'));
                }
            }
            else
            {
                if(get_class($this) != "Home" )
                    redirect(site_url('home'));
            }
        }

        public function is_logged_in()
        {  
            return ($this->session->userdata('user_id') !== null);
        }
}