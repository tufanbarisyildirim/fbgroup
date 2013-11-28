<?php
    class Absenting_model extends MY_Model
    {
        public function __construct($result = null)
        {
            parent::__construct($result);
        }

        public function add($user_id,$date,$hours)
        {
            $this->db->insert('absentings',array(
                'date' => $date,
                'absent_hours' => (int)$hours,
                'user_id' => $user_id
                ),true); 

            return $this->db->insert_id();
        }

        public function get_total($user_id,$start_date = null,$end_date = null)
        {
            $query = $this->db->select_sum('absent_hours','absent_hours');

            if($start_date != null)
                $query->where('date >= ',$start_date);

            if($end_date != null)
                $query->where('date <=',$end_date);

            return  $query->get_where('absentings',array('user_id' => $user_id))->result()->absent_hours;
        } 
        
        public function get_days($user_id,$start_date = null,$end_date = null)  
        {
             $query = $this->db->select();

            if($start_date != null)
                $query->where('date >= ',$start_date);

            if($end_date != null)
                $query->where('date <=',$end_date);

            return  $query->get_where('absentings',array('user_id' => $user_id))->result();
        } 
}