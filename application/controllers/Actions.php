<?php                             
    class Actions extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function logout()
        {
            $this->session->sess_destroy();
            redirect(site_url());
        }
        
        public function not_found()
        {
            $this->load->view('errors/error_404');
        }
}