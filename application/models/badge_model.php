<?php
    class Badge_model extends MY_Model
    {
        public function __contruct($result = null)
        {
            parent::__construct($result);
        }


        public function add($badge_name,$badge_class)
        {
            $this->db->insert('badges',array(
                'name' => $badge_name,
                'class' => $badge_class
                ),true);

            return $this->db->insert_id();
        }

        public function get_all()
        {
            $badges = array();

            $badges_ = $this->db->get('badges')->result();
            foreach($badges_ as $badge)
            {
                $badges[] = new Badge_model($badge);
            }

            return $badges;
        }
}