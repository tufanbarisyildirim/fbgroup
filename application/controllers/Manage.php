<?php
    class Manage extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->check_admin();

            $this->load->model('quiz_model');
        }

        public function index()
        {
            // honk?
        }

        public function delete_quiz($quiz_id)
        {
            $this->quiz_model->delete($quiz_id);
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        public function quizzes($quiz_id = null)
        {

            if($_POST)
                $this->quiz_model->add($_POST['quiz_name'],$_POST['quiz_date'],$_POST['track_id']);
         
            $data['quizzes'] = $this->quiz_model->getAll();
            $this->load->view('manage/quizzes',$this->common_data($data));
        }
        
        public function badges()
        {
            $this->load->model('badge_model');
            
            if($_POST)
            {
                $this->badge_model->add($_POST['badge_name'],$_POST['badge_class'],$_POST['badge_type']);
                redirect(site_url('manage/badges'));
            }
            
            $data = array();
            $data['badges'] = $this->badge_model->get_all();
            $this->load->view('manage/badges',$this->common_data($data));
        }
}