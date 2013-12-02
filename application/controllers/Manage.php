<?php
    class Manage extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->check_moderator();

            $this->load->model('quiz_model');
        }

        public function index()
        {
            // honk?
        }

        public function delete_quiz($quiz_id)
        {
            $this->check_admin();

            $this->quiz_model->delete($quiz_id);
            redirect($_SERVER['HTTP_REFERER']);
        }
        
         public function delete_lesson($lesson_id)
        {
            $this->check_admin();

            $this->lesson_model->delete($lesson_id);
            redirect($_SERVER['HTTP_REFERER']);
        }

        public function quizzes($quiz_id = null)
        {

            $this->check_admin();

            if($_POST)
                $this->quiz_model->add($_POST['quiz_name'],$_POST['quiz_date'],$_POST['track_id'],$_POST['quiz_weight'],$_POST['lesson_id']);

            $data['quizzes'] = $this->quiz_model->getAll();
            $data['lessons'] = $this->lesson_model->get_all();
            
            $this->load->view('manage/quizzes',$data);
        }
        
        public function lessons($quiz_id = null)
        {

            $this->check_admin();

            if($_POST)
                $this->lesson_model->add($_POST['lesson_name']);

            $data['lessons'] = $this->lesson_model->get_all();
            $this->load->view('manage/lessons',$data);
        }

        public function badges()
        {
            $this->check_admin();

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


        public function absentings()
        {
            //hey moderators! 

            $this->load->view('manage/absentings');
        }
}