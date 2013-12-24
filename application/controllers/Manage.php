<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Manage extends MY_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->check_moderator();

			$this->load->model('quiz_model');
		}

		public function index()
		{
			// honk?
		}

		public function delete_quiz($quiz_id)
		{
			$this->check_admin();

			$this->quiz_model->delete($quiz_id);
			redirect($_SERVER['HTTP_REFERER']);
		}

		public function delete_lesson($lesson_id)
		{
			$this->check_admin();

			$this->lesson_model->delete($lesson_id);
			redirect($_SERVER['HTTP_REFERER']);
		}

		public function quizzes($quiz_id = null)
		{

			$this->check_admin();

			if($_POST) // TODO : use ->input->post
				$this->quiz_model->add($this->input->post('quiz_name'),$this->input->post('quiz_date'),$this->input->post('track_id'),$this->input->post('quiz_weight'),$this->input->post('lesson_id'));

				//catch the different amk : D
			$data['quizzes'] = $this->quiz_model->getAll();
			$data['lessons'] = $this->lesson_model->get_all();

			$this->load->view('manage/quizzes',$data);
		}

		public function lessons($quiz_id = null)
		{

			$this->check_admin();

			if($this->input->post('lesson_name'))
				$this->lesson_model->add($this->input->post('lesson_name'));

			$data['lessons'] = $this->lesson_model->get_all();
			$this->load->view('manage/lessons',$data);
		}

		public function badges()
		{
			$this->check_admin();

			$this->load->model('badge_model');

			if($_POST)
			{
				$this->badge_model->add($this->input->post('badge_name'),$this->input->post('badge_class'),$this->input->post('badge_type'));
				redirect(site_url('manage/badges'));
			}

			$data = array();
			$data['badges'] = $this->badge_model->get_all();
			$this->load->view('manage/badges',$this->common_data($data));
		}


		public function absentings()
		{
			//hey moderators! 

			$this->load->view('manage/absentings');
		}
}