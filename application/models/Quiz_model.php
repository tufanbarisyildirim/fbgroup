<?php
    class Quiz_model extends MY_Model
    {
        public function __construct($result = null)
        {
            parent::__construct($result);
        }

        public function getAll($user_id = null)
        {
            $quizzes = array();

            $results = $this->db
            ->order_by('quiz_date','DESC')
            ->get_where('quizzes',$user_id == null ? null : " NOT EXISTS(SELECT 1 FROM quiz_scores WHERE quiz_scores.user_id = ".$user_id." AND quiz_scores.quiz_id = quizzes.quiz_id)")
            ->result();

            foreach($results as $quiz)
                $quizzes[] = new Quiz_model( $quiz );

            return $quizzes;               
        }
         
        public function add($quiz_name,$date,$track_id)
        {
            $this->db->insert('quizzes',array(
                'quiz_name' => $quiz_name,
                'quiz_date' => $date,
                'track_id' => $track_id
                ),true);

            return $this->db->inser_id();  
        }                                     
}