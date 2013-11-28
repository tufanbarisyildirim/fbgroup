<?php
    class Lessoday_model extends MY_Model
    {
        public function __construct($result = null)
        {
            parent::__construct($result);
        }

        public function insert($date,$hours = null)
        {
            $date = Datetime::createFromFormat('Y-m-d',$date);

            if($hours == null)
            {
                $day_num =  $date->format('N');

                $default_hours = array(
                    '1' =>6,
                    '2' =>6,
                    '3' =>4,
                    '4' =>4,
                    '5' =>4,
                    '6' =>0,
                    '7' =>0,
                );


                $hours = $default_hours[$day_num];
            }


            $this->db->insert('lesson_days',array(
                'date' => $date->format('Y-m-d'),
                'hours' => (int)$hours
                ),true);

            return $this->db->insert_id();

        }

        public function get_total($start_date = null,$end_date = null)
        {
            $query = $this->db->select_sum('hours','total_hours');

            if($start_date != null)
                $query->where('date >= ',$start_date);

            if($end_date != null)
                $query->where('date <=',$end_date);

            return   $query->get('lesson_days')->result()->total_hours;
        }
        
        public function get($start_date = null,$end_date = null)
        {
            $query = $this->db->select();

            if($start_date != null)
                $query->where('date >= ',$start_date);

            if($end_date != null)
                $query->where('date <=',$end_date);

             $query->get('lesson_days')->result();
        }

    }
