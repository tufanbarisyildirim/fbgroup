<?php
    class User extends MY_Controller
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
            $this->load->model('badge_model');
            $data['users'] = $this->user_model->get_all();
            $this->load->view("user/all",$data);
        }

        public function profile($user_id)
        {
            $this->load->model('comment_model');
            $this->load->helper('date');
            
            if(isset($_POST['add_comment']))
            {
                $this->comment_model->add($this->current_user->id,$user_id,$_POST['comment_text']);
                redirect('user/profile/' . $user_id);
                die();
            }
            
            
            $data['user'] = $this->user_model->by_id($user_id);
            $data['comments'] = $this->comment_model->get_by_to_id($user_id)->result();
            
            $this->load->view('user/profile',$data);
        }
}   