<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->force_to_login();
    }
    
	public function Index()
	{
       $this->load->view('dashboard');
	}
}