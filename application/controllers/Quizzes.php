<?php
    class Quizzes extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function index()
        {
            $this->all();
        }

        public function all()
        {
            $this->load->view('quizzes/all');
        }

    }
