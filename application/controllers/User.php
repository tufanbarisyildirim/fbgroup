<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class User extends MY_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->force_to_login();
		}


		public function index()
		{
			$this->all();
		}

		public function all()
		{
			$this->load->model('badge_model');
			$data['users'] = $this->user_model->get_all();
			$this->load->view("user/all",$data);
		}

		public function profile($user_id)
		{
			$this->load->model('comment_model');
			$this->load->helper('date');

			if($this->input->post('add_comment'))
			{
				$this->comment_model->add($this->current_user->user_id,$user_id,$this->input->post('comment_text'));
				redirect('user/profile/' . $user_id);
				die();
			}

			$data['user'] = $user =  $this->user_model->by_id($user_id);

			$panels = array(); //horrays   

			$quizzes = $this->db->query("SELECT qs.*,u.*,q.* FROM quiz_scores qs JOIN quizzes q ON q.quiz_id = qs.quiz_id JOIN users u ON u.user_id = qs.user_id AND u.user_id = " . $data['user']->user_id  . " ORDER BY q.quiz_date DESC")->result_array();

			foreach($quizzes as $quiz)
			{
				if(!isset($panels[$quiz['track_id']]))
					$panels[$quiz['track_id']] = array(); 

				$panels[$quiz['track_id']][] = $quiz;   

			}    

			$data['panels'] = $panels;   
			$data['comments'] = $this->comment_model->get_by_to_id($user_id)->result();


			if(isset($_POST['add_badge']))
			{
				$this->badge_model->add_user_badge($_POST['badge_id'],$user_id);
				redirect($_SERVER['HTTP_REFERER']);
			}

			$data['badges'] = $this->badge_model->get_user_badges($user->user_id);
			$data['all_badges'] = $this->badge_model->get_all();
			$this->load->view('user/profile',$data );
		}

		public function delete_badge($user_badge_id)
		{
			$this->check_admin();
			$this->badge_model->delete_user_badge($user_badge_id);
			redirect($_SERVER['HTTP_REFERER']);
			die();
		}

		public function delete($user_id)
		{
			if($this->current_user->is_admin())
			{
				$this->user_model->delete($user_id);
			}

			redirect(site_url('user'));
			die();
		}
}   