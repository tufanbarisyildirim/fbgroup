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

        public function add($quiz_name,$date,$track_id,$quiz_weight,$lesson_id)
        {
            $this->db->insert('quizzes',array(
                'quiz_name' => $quiz_name,
                'quiz_date' => $date,
                'track_id' => $track_id,
                'quiz_weight' => $quiz_weight,
                'lesson_id' => $lesson_id
                ),true);

            return $this->db->insert_id();  
        }


        public function get_non_markeds($user_id)
        {
            $non_markeds = $this->db->query("SELECT q.*  FROM quizzes q WHERE NOT EXISTS ( SELECT 1 FROM quiz_scores qs WHERE qs.quiz_id = q.quiz_id AND  qs.user_id = ". $user_id." )")->result();
            $quizzes = array();

            foreach($non_markeds as $quiz)
                $quizzes[] = new Quiz_model( $quiz );

            return $quizzes;    
        }


        public function delete($quiz_id)
        {
            return $this->db->query("DELETE FROM quizzes WHERE quiz_id = {$quiz_id} AND NOT EXISTS (SELECT 1 FROM quiz_scores WHERE quizzes.quiz_id = quiz_scores.quiz_id)");                        
        }

        public function save_mark($user_id,$quiz_id,$score)
        {
            return $this->db->insert('quiz_scores',array(
                'user_id' => $user_id,
                'quiz_id' => $quiz_id,
                'score' => $score
                ),true);
        } 


        public function __get($var)
        {
            if($var == 'lesson')
                return $this->lesson = Lesson_model::by_id($this->lesson_id);

            return parent::__get($var);
        }                                    
}