<?php
	class Account extends MY_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->force_to_login();
		}

		public function index()
		{
			//show account/me  as default.
			$this->me();
		}  

		public function me($tab = null,$quiz_id = null)
		{
			$data = array();
			$data['tab'] = $tab;

			$data['user'] = &$this->current_user;

			if(isset($_POST['save_result']))
			{
				$this->quiz_model->save_mark($this->current_user->user_id,$_POST['quiz_id'],$_POST['exam_result']);
				if(strpos($_SERVER['HTTP_REFERER'],"/marks"))
					redirect($_SERVER['HTTP_REFERER']);
				else
					redirect($_SERVER['HTTP_REFERER'],"/marks");                                           

			}

			$panels = array(); //horrays  
			$quizzes = $this->db->query("SELECT qs.*,u.*,q.* FROM quiz_scores qs JOIN quizzes q ON q.quiz_id = qs.quiz_id JOIN users u ON u.user_id = qs.user_id AND u.user_id = " . $data['user']->user_id  . " ORDER BY q.quiz_date DESC")->result_array();

			foreach($quizzes as $quiz)
			{
				if(!isset($panels[$quiz['track_id']]))
					$panels[$quiz['track_id']] = array(); 

				$panels[$quiz['track_id']][] = $quiz;   
			}               
			$data['panels'] = $panels;   


			$non_markeds = $this->quiz_model->get_non_markeds($this->current_user->user_id,$quiz_id ? array($quiz_id) : null);
			$data['tracks'] = array();

			foreach($non_markeds as $q)
			{
				if(!isset($data['tracks'][$q->track_id]))
					$data['tracks'][$q->track_id] = array();

				$data['tracks'][$q->track_id][] = $q;     
			}

			$this->load->view('account/profile',$this->common_data( $data));
		}

		public function about_me()
		{
			$data = array();
			$data['user'] = &$this->current_user;

			if($_POST)
			{
				$this->current_user->update(array('user_about' => $_POST['about_me']));
				redirect( site_url( 'account/about_me' ) );
				die();
			}

			$this->load->view('account/about_me',$this->common_data( $data));
		}
}