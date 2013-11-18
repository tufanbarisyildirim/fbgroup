<?php                             
    class Documents extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            $this->force_to_login();
            
        }

        public function all(){ $this->index(); }
        
        public function index()
        {   
            
            $cache_key = 'fb_files_' . $this->config->item('group_id');
            if ( ! $files = $this->cache->get($cache_key))
            {
                 $files_data = $this->facebook->api('/' . $this->config->item('group_id').'/files'); 
                 $files = $files_data['data'];
                 $this->cache->save($cache_key, $files, 60 * 60 * 5);
            }
             
            $this->load->view('documents/all',array('files' => $files));
        }                                     



        public function projects()
        {
            $this->load->view('documents/projects');
        }

        public function homeworks()
        {
            $this->load->view('documents/homeworks');
        }
}