<?php
    class Badge_model extends MY_Model
    {
        public function __contruct($result = null)
        {
            parent::__construct($result);
        }

        public function add($badge_name,$badge_class,$badge_type = 'badge')
        {
            $this->db->insert('badges',array(
                'badge_name' => $badge_name,
                'badge_class' => $badge_class,
                'badge_type' => $badge_type
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

        public static function get_user_badges($user_id,$badge_type = null)
        {
            $badges = array();

            $where = array('user_badges.user_id' => $user_id);
            if($badge_type != null)
                $where['badge_type'] = $badge_type;

            $badges_ = 
            get_instance()
            ->db
            ->join('user_badges','user_badges.badge_id = badges.badge_id')
            ->get_where('badges',$where)->result();

            foreach($badges_ as $badge)
            {
                $badges[] = new Badge_model($badge);
            }

            return $badges;
        }

        public function delete_user_badge($user_badge_id)
        {
            return $this->db->delete('user_badges',array('user_badge_id' => $user_badge_id),1);
        }

        public function add_user_badge($badge_id,$user_id)
        {
            $this->db->insert('user_badges',array(
                'badge_id' => $badge_id,
                'user_id' => $user_id
            ));
            
            return  $this->db->insert_id();
        }

        public function __toString()
        {
            return '<span class="badge badge-'.$this->badge_class.'">'.$this->badge_name.'</span>';
        }

}