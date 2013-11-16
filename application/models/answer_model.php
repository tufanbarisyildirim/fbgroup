<?php

    /**
    * @method Answer_model   by_id(int $answer_id)
    */
    class Answer_model extends MY_Model 
    {     
        
        function __construct($result = null) 
        {
            parent::__construct($result);
        }
        
        public function add($question_id,$user_id,$content)
        {
           $this->db->insert('answers',array(
           'question_id' => $question_id ,
           'user_id'   =>   $user_id ,
           'content'  => $content
           ),true); 
        }

        public static function get_all()
        {
            $query = get_instance()->db->get('answers');

            $answers = array();

            foreach($query->result() as $answer)
                $answers[] = new Answer_model( $answer );

            return $answers;
        }
        
        public static function get_by_question_id($question_id)
        {
              $query = get_instance()->db->get_where('answers',array('question_id' => $question_id));

            $answers = array();

            foreach($query->result() as $answer)
                $answers[] = new Answer_model( $answer );

            return $answers;
        }


        public static function by_id($answers_id)
        {          
            $q = get_instance()->db->get_where('answers',array('id' => $answers_id));
            $answers = $q->result() ;

            if($answers)
                return new Answer_model( $answers[0] );

            return null;
        }
            

}