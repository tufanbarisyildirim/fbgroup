<?php
    class Manage extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function index()
        {
            // honk?
        }

        public function quizzes()
        {
            $this->load->view('manage/quizzes');
        }

    }
