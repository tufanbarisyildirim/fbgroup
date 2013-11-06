<?php                             
    class Documents extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
            
        }

        public function all(){ $this->index(); }
        
        public function index()
        {   
            
            if ( ! $files = $this->cache->get('fb_files'))
            {
                 $files_data = $this->facebook->api('/' . $this->config->item('group_id').'/files'); 
                 $files = $files_data['data'];
                 $this->cache->save('fb_files', $files, 60 * 60 * 5);
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