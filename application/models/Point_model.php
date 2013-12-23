<?php
	class Point_model extends MY_Model
	{
		public function __construct($result = null)
		{
			parent::__construct($result);
		}

		public function get_by_user_id($user_id)
		{
			$_points = $this->db->where('user_id',$user_id)
			->order_by('point_date','desc')
			->get('points')
			->result();

			$points = array();
			foreach($_points as $point)
				$points[] = new Point_model($point);

			return $points;
		}

		public function add($user_id,$key,$text,$total,$url = null,$date = null)
		{
			$this->db->insert('points',array(
				'user_id' => $user_id,
				'ref_key' => $key,
				'url' => $url,
				'text' => $text,
				'total' => $total,
				'point_date' => $date == null ? date('Y-m-d H:i:s') : $date
				),true);
				
				$this->db->query('UPDATE users SET point = point ' . ( $total > 0 ?  ('+' . $total)  :  $total  )  .' WHERE user_id = ' . $user_id);
		}

	}
