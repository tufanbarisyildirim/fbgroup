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

        public function quizzes($quiz_id = null)
        {

            if($_POST)
            {
                $this->quiz_model->add($_POST['quiz_name'],$_POST['quiz_date'],$_POST['track_id']);
            }

            $data['quizzes'] = $this->quiz_model->getAll();
            $this->load->view('manage/quizzes',$this->common_data($data));
        }
}