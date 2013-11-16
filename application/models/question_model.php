<?php

    class Question_model extends MY_Model 
    {

        function __construct($result = null) 
        {
            parent::__construct($result);
        }

        function get_all()
        {
            $query = $this->db->get('questions');
            $questions = array();
            
            foreach($query->result() as $question)
                $questions[] = new Question_model($question);
            
            return $questions;
        }

        function by_id($question_id)
        {          
            $q = $this->db->get_where('questions',array('question_id' => $question_id));
            $question = $q->result();
            
            if($question)
                return new Question_model( $question[0] ); 
                
            return null; 
        }   
}