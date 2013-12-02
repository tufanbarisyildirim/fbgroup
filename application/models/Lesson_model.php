<?php
    class Lesson_model extends MY_Model
    {
        public function __construct($result = null)
        {
            parent::__construct($result);
        }

        public function get_all()
        {
            $lessons = array();
            foreach($this->db->get('lessons')->result() as $lesson)
                $lessons[] = new Lesson_model($lesson);
               

            return $lessons;
        }

        public function add($lesson_name)
        {
            $this->db->insert('lessons',array('lesson_name' => $lesson_name));

            return $this->db->insert_id();
        }

        public function delete($lesson_id)
        {
            $this->db->delete('lessons',array('lesson_id' => $lesson_id));
            return true;
        }

    }
