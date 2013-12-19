<?php
	class Rank extends MY_Controller
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function top5s()
		{                                           
			//load all tracks including all quizzes!
			$panels = array(); //horrays   

			$quizzes = $this->db->query("SELECT * FROM quizzes")->result_array();

			foreach($quizzes as $quiz)
			{
				if(!isset($panels[$quiz['track_id']]))
					$panels[$quiz['track_id']] = array();

				$quiz['top5'] = array();
				$quiz['top5']  =   $this->db->query("SELECT qs.*,u.* FROM quiz_scores qs JOIN users u ON u.user_id = qs.user_id AND qs.quiz_id =  " . $quiz['quiz_id']." ORDER BY qs.score DESC, u.user_name ASC,u.user_surname ASC LIMIT 5")->result_array();

				$panels[$quiz['track_id']][] = $quiz;
			}    

			$data['panels'] = $panels;
			$this->load->view('rank/top5s',$this->common_data($data));
		}
	}
