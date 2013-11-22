<?php

    /**
    * @method Answer_model   by_id(int $answer_id)
    * 
    * @property $question_id int
    * @property $user_id int
    * @property $user User_model
    * @property $content  string
    * @property $answer_date string
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
                'answer_content'  => $content
                ),true); 

            return $this->db->insert_id();
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

        public function set_fb_id($answer_id,$fb_id)
        {
            $this->db->update('answers',array('answer_fb_id' => $fb_id),array('answer_id' => $answer_id));
        }

        public function __get($prop)
        {
            if($prop == 'user')
                return $this->user = User_model::by_id($this->user_id);
            else
                return parent::__get($prop);
        } 

        public static function by_id($answers_id)
        {          
            $q = get_instance()->db->get_where('answers',array('answer_id' => $answers_id));
            $answers = $q->result() ;

            if($answers)
                return new Answer_model( $answers[0] );

            return null;
        }


}