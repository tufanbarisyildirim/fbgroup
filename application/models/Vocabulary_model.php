<?php
/**
* @method Vocabulary_model get_by_id(int $id)
*/
    class Vocabulary_model extends MY_Model
    {
        public function __construct($result = null)
        {
            parent::__construct($result);
        }

        public function get_random()
        {
            $vocabs = $this->db->order_by('RAND()','',false)->get('vocabulary')->result();
            return new Vocabulary_model($vocabs[0]);
        }

        /**
        * @todo: Pagination!
        */
        public function get_all()
        {
            $words = array();
            $vocabs = $this->db->order_by('id','DESC',false)->get('vocabulary')->result();
            foreach($vocabs as $vocab)
            {
                $words[] = new Vocabulary_model( $vocab );
            }

            return $words;
        }

        public function add($word,$form,$definition,$user_id)
        {
            $this->db->insert('vocabulary',array(
                'word' => $word,
                'form' => $word,
                'definition' => $definition,
                'user_id' => $user_id
                ),true);

            return $this->db->insert_id();   
        }
        
        public function get_by_id($id)
        {
            $words = $this->db->get_where("vocabulary",array('id' => $id),1)->result();
            return new Vocabulary_model($words[0]);
        }

        public function get_relateds()
        {
            
        }
    }
