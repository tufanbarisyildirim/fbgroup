<?php
    class Manage extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('quiz_model');
        }

        public function index()
        {
            // honk?
        }

        public function quizzes()
        {
            $data['quizzes'] = $this->quiz_model->getAll();
            $this->load->view('manage/quizzes',$this->common_data($data));
        }
    }