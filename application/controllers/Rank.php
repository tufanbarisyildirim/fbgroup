<?php
    class Rank extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function top5s()
        {                                           
            //load all tracks including all quizzes!
            $data['panels'] = array(); //horrays

            $this->load->view('rank/top5s',$this->common_data($data));
        }
    }
