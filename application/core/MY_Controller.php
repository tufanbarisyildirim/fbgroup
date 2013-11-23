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
    * @property $cache CI_Cache
    * @property $comment_model Comment_model
    * @property $question_model Question_model
    * @property $answer_model Answer_model
    * @property $quiz_model Quiz_model
    * @property $badge_model Badge_model
    * @property $vocabulary_model Vocabulary_model
    * @property $sentence_model Sentence_model
    * @property $badge_model Badge_model
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
            $this->load->driver('cache',array('adapter' => 'apc' , 'backup' => 'file'));

            $this->load->model('user_model');
            $this->load->model('vocabulary_model');
            $this->load->model('sentence_model');
            $this->load->model('badge_model');

            $this->load->helper('url');

            if($this->is_logged_in())
                $this->current_user =  $this->user_model->by_id($this->session->userdata('user_id'));

        }

        public function is_logged_in()
        {  
            return ($this->session->userdata('user_id') !== null);
        }

        public function force_to_login()
        {
            if($this->is_logged_in())
            {             
                if(!$this->current_user)
                {
                    //visitor has a session user_id but we dont have it in db.
                    $this->session->set_userdata("user_id",null);

                    redirect(site_url('home'));
                    die();    
                }
            }
            else
            {       
                redirect(site_url('home'));
                die();

            }
        }

        public function check_admin()
        {
            if($this->current_user->user_id != '680557739')
            {      
                redirect(site_url('home'));
                die();
            }
        }


        public function header()
        {
            return $this->load->view('common/header',$this->common_data(),true);
        }

        public function footer()
        {
            return $this->load->view('common/footer',$this->common_data(),true);
        }

        public function sidebar()
        {
            return $this->load->view('common/sidebar',$this->common_data(),true);
        }

        public function common_data($controller_data = array())
        {
            $data = array();
            $data['current_user'] = &$this->current_user;
            $data['controller'] = &$this;
            $data['random_word'] = $this->vocabulary_model->get_random();



            return array_merge($data,$controller_data);
        }

        /* fuck you codeigniter!
        public function __get($property_name)
        {
        if(strpos($property_name,'_model') > 0)
        {
        $this->load->model($property_name);
        return $this->{$property_name};
        }
        else
        return get_instance()->$property_name;   
        }*/
}