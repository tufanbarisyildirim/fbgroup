<?php
    class Blog extends MY_Controller
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
            $data = array();
            $data['posts'] = $this->blog_model->get_all();
            $this->load->view("blog/all",$data);
        }
        
        public function write()
        {
            $data = array();
            
            if(isset($_POST['save_post']))
            {
                $post_id = $this->blog_model->add($this->current_user->user_id,$_POST['post_title'],$_POST['post_content']);
                
                 $a = $this->facebook->api('/'.$this->config->item('group_id').'/feed','POST',array(    
                    'message' => 'Hello fridends! I have just wrote a blogpost. Do you want to read it and write some comments?',
                    'name' => $_POST['post_title'],
                    'caption' =>$_POST['post_title'],
                    'description' => $_POST['post_content'],
                    'link' =>   site_url('blog/view/' . $post_id)
                ));

                $this->blog_model->set_fb_id($a['id'],$post_id);
                
                redirect(site_url('blog/view/' . $post_id));
                die();
                
            }
            
            $this->load->view("blog/write",$data);
        }
        
        public function write_correction()
        {
            
        }
        
         public function myblog()
        {
            $data = array();
            $data['posts'] = $this->blog_model->get_by_user_id($this->current_user->user_id);
            $this->load->view("blog/myblog",$data);
        }
        
        
        public function view($post_id)
        {
            $data['post'] = $post = $this->blog_model->get_by_id($post_id);
            
            $this->load->view('blog/view',$data);
        }
    }
