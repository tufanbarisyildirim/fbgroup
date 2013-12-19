<?php
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

					$this->vocabulary_model->update($_POST['word'],$_POST['word_form'],$_POST['word_definition'],$word_id);
				}
				else
				{
					$new_word_id = $this->vocabulary_model->add($_POST['word'],$_POST['word_form'],$_POST['word_definition'],$this->current_user->user_id);


					$a = $this->facebook->api('/'.$this->config->item('group_id').'/feed','POST',array(    
						'message' => 'I have just added a new ' . $_POST['word_form'] . ' to our common knowledge. Check it and write your examples :)',
						'name' => $_POST['word'],
						'caption' => $_POST['word_form'],
						'description' => $_POST['word_definition'],
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

			if($_POST)
			{
				$sentence_id =  $this->sentence_model->add($word_id,$this->current_user->user_id,$_POST['example_sentence']);

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
