<?php 
    /**
    * @method Question_model by_id(int $question_id)
    * @property $user User_model
    */
    class Question_model extends MY_Model 
    {

        function __construct($result = null) 
        {
            parent::__construct($result);
        }

        public function ask($user_id,$title,$content)
        {
            $this->db->insert('questions',array(
                'user_id'  => $user_id,
                'title' => $title,
                'content' =>  $content
                ),true);  

            return $this->db->insert_id();
        }

        public function set_as_important( $comment_id = null)
        {
            $this->db->update('questions',array('important'=> 1),array('id' => $comment_id == null ? $this->id : $comment_id));  
        }

        function get_all()
        {
            $query = $this->db->order_by('id','DESC')->get('questions');
            $questions = array();

            foreach($query->result() as $question)
                $questions[] = new Question_model($question);

            return $questions;
        }

        function get_important()
        {
            $query = $this->db->order_by('id','DESC')->get_where('questions',array('important' => 1));
            $questions = array();

            foreach($query->result() as $question)
                $questions[] = new Question_model($question);

            return $questions;
        }

        function by_id($question_id)
        {          
            $q = $this->db->get_where('questions',array('id' => $question_id));
            $question = $q->result();

            if($question)
                return new Question_model( $question[0] ); 

            return null; 
        } 
        
        public function get_answers($question_id = null)
        {
            return Answer_model::get_by_question_id($question_id == null ? $this->id : $question_id);
        }
        
        public function __get($prop)
        {
            if($prop == 'user')
                return $this->user = User_model::by_id($this->user_id);
            else
                return parent::__get($prop);
        } 

        public static function set_fb_id ($question_id,$fb_id)
        {       
            get_instance()->db->update('questions',array('fb_id' => $fb_id),array('id' => $question_id));
        }
}