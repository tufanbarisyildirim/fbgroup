<?php
    class Sentence_model extends MY_Model
    {
        public function __construct($result = null)
        {
            parent::__construct($result);
        }


        public function get_by_word_id($word_id)
        {
            $sentences = array();
            $examples = $this->db->get_where('sentences',array('word_id' => $word_id))->result();

            foreach($examples as $sentence)
                $sentences[] = new Sentence_model($sentence);

            return $sentences;
        }

        public function add($word_id,$user_id,$sentence)
        {
            $this->db->insert('sentences',array(
                'word_id' => $word_id,
                'user_id' => $user_id,
                'sentence' => $sentence
                ),true);
                
            return  $this->db->insert_id();
        }


        public function __get($var)
        {
            if($var == 'user')
            {
                $this->user = User_model::by_id($this->user_id);
                return $this->user;
            }
            else 
                return parent::__get($var);
        }
    }
