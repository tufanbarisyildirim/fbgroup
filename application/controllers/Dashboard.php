<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Dashboard extends MY_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->force_to_login();
        }

        public function Index()
        {
            $data = array();
            
                $data['quiz_scores'] = $this->db->query("SELECT 
                q.quiz_name, 
                AVG( qs.score ) average, 
                MAX( qs.score ) as max_score, 
                MIN( qs.score ) as min_score 
                    FROM  `quiz_scores` qs
                    JOIN quizzes q ON q.quiz_id = qs.quiz_id
                    GROUP BY q.quiz_name
                    LIMIT 0 , 30")->result();
            
            $this->load->view('dashboard',$data);
        }
}