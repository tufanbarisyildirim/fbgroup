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

        public function add()
        {

            $data = array();

            if($_POST)
            {
                $new_word_id = $this->vocabulary_model->add($_POST['word'],$_POST['word_form'],$_POST['word_definition'],$this->current_user->user_id);
                redirect(site_url('vocabulary/view/' . $new_word_id));
                die();
            }

            $this->load->view('vocabulary/add', $this->common_data( $data ));
        }

        public function view($word_id)
        {
            $data = array();
            $data['word'] = $this->vocabulary_model->get_by_id($word_id);
            
            if($_POST)
            {
                $this->sentence_model->add($word_id,$this->current_user->user_id,$_POST['example_sentence']);
                redirect(site_url('vocabulary/view/' . $word_id));
                die();
            }

            
            $data['word_examples'] = $this->sentence_model->get_by_word_id($word_id);
            $this->load->view('vocabulary/view',  $data );
        }

    }
