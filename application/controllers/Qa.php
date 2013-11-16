<?php

    class Qa extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('question_model');
        }

        public function ask()
        {
            if(isset($_POST) && $_POST)
            {

                $question_id = $this->question_model->ask($this->current_user->id,$_POST['question_title'],$_POST['question_detail']);
                
                $a = $this->facebook->api('/'.$this->config->item('group_id').'/feed','POST',array(    
                    'message' => 'I have just asked a question on English Preparation application. Could you please help me?',
                    'name' => $_POST['question_title'],
                    'caption' => $_POST['question_title'],
                    'description' => $_POST['question_detail'],
                    'link' =>   site_url('qa/view/' . $question_id)
                ));
                
                $this->question_model->set_fb_id($question_id,$a['id']);
              
                redirect(site_url('qa/view/' . $question_id));
            }

            $this->load->view('qa/ask');
        }

        public function index()
        {
            $this->all();
        }

        public function all()
        {     
            $data['questions'] = $this->question_model->get_all();
            $data['questions_type'] ='All';
            $this->load->view('qa/list',$data);
        }

        public function important()
        {
            $data['questions'] = $this->question_model->get_important();
            $data['questions_type'] ='Important';
            $this->load->view('qa/list',$data);
        }

        public function view($question_id)
        {
            $data['question'] = $this->question_model->by_id($question_id);
            $this->load->view('qa/view',$this->common_data($data));
        }
    }
