<?php
  class Qa extends MY_Controller
  {
      public function __construct()
      {
          parent::__construct();
      }
      
      public function index()
      {
          $this->all();
      }
      
      public function all()
      {     
          $data['questions'] = $this->question_model->get_all();
          $this->load->view('qa/list',$data);
      }
      
      public function important()
      {
          $data['questions'] = $this->question_model->get_important();
          $this->load->view('qa/list',$data);
      }
  }
