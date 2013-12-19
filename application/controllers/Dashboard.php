<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Dashboard extends MY_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->force_to_login();
		}

		public function Index()
		{
			$data = array();

			$data['track_id'] = $track_id = $this->config->item('active_track');

			$data['quiz_scores'] = get_instance()->db->query("
				SELECT ss.lesson_id,ss.lesson_name,AVG(user_avg) class_avg,ss.quiz_weight FROM (
				SELECT qs.user_id,l.lesson_name, q.lesson_id,q.quiz_weight, AVG( qs.score ) as user_avg
				FROM quiz_scores qs
				JOIN quizzes q ON q.quiz_id = qs.quiz_id
				JOIN lessons l ON l.lesson_id = q.lesson_id
				AND q.track_id = {$track_id}
				AND qs.user_id = {$this->current_user->user_id}
				GROUP BY q.lesson_id , qs.user_id) ss
				GROUP BY ss.lesson_id
				")->result();


			$this->load->view('dashboard',$data);
		}
}