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
                'badge_name' => $badge_name,
                'badge_class' => $badge_class
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
        
        public static function get_user_badges($badge_type,$user_id)
        {
            $badges = array();

            $badges_ = 
            get_instance()
            ->db
            ->join('user_badges','user_badges.badge_id = badges.badge_id')
            ->get_where('badges',array('badge_type'=>$badge_type,'user_badges.user_id' => $user_id))->result();
            
            foreach($badges_ as $badge)
            {
                $badges[] = new Badge_model($badge);
            }

            return $badges;
        }
        
}