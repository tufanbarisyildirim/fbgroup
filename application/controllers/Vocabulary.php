<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Vocabulary extends MY_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->force_to_login();
		}

		public function index()
		{
			$data = array();
			$data['words'] = $this->vocabulary_model->get_all();

			$this->load->view('vocabulary/vocablist', $this->common_data( $data ));  
		}

		public function add($word_id = null)
		{

			$data = array();
			$data['word']  = '';
			$data['word_form']  = '';
			$data['word_definition']  = '';

			if($word_id) 
			{
				$current_word = $this->vocabulary_model->get_by_id($word_id);
				$data['word'] =   $current_word->word;
				$data['word_form'] =   $current_word->form;
				$data['word_definition'] =   $current_word->definition;
				$new_word_id = $word_id;
			}


			if($_POST)
			{
				if($word_id)
				{

					$this->vocabulary_model->update(
						$this->input->post('word'),
						$this->input->post('word_form'),
						$this->input->post('word_definition'),$word_id);
				}
				else
				{
					$new_word_id = $this->vocabulary_model->add(
						$this->input->post('word'),
						$this->input->post('word_form'),
						$this->input->post('word_definition'),
						$this->current_user->user_id);

					$this->point_model->add($this->current_user->user_id,'word_'  . $new_word_id,"You have added a new word. +5",5,'vocabulary/view/' . $new_word_id);

					$a = $this->facebook->api('/'.$this->config->item('group_id').'/feed','POST',array(    
						'message' => 'I have just added a new ' . $_POST['word_form'] . ' to our common knowledge. Check it and write your examples :)',
						'name' =>$this->input->post('word'),
						'caption' => $this->input->post('word_form'),
						'description' => $this->input->post('word_definition'),
						'link' =>   site_url('vocabulary/view/' . $new_word_id)
					));

					$this->vocabulary_model->set_fb_id($new_word_id,$a['id']);

				}

				redirect(site_url('vocabulary/view/' . $new_word_id));
				die();
			}

			$this->load->view('vocabulary/add', $this->common_data( $data ));
		}

		public function view($word_id)
		{
			$data = array();
			$data['word'] = $word = $this->vocabulary_model->get_by_id($word_id);

			if($this->input->post('example_sentence'))
			{
				$sentence_id =  $this->sentence_model->add(
					$word_id,
					$this->current_user->user_id,
					$this->input->post('example_sentence'));

					$this->point_model->add($this->current_user->user_id,'sentence_'  . $sentence_id,"You have added a new example for {$word->word} +7",7,'vocabulary/view/' . $word_id);
					
				if($word->word_fb_id)
				{
					$a = $this->facebook->api('/'.$word->word_fb_id.'/comments','POST',array(    
						'message' => $_POST['example_sentence'],
					));

					$this->sentence_model->set_fb_id($a['id'],$sentence_id);
				}

				redirect(site_url('vocabulary/view/' . $word_id));
				die();
			}


			$data['word_examples'] = $this->sentence_model->get_by_word_id($word_id);
			$this->load->view('vocabulary/view',  $data );
		}

	}
