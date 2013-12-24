<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	class Listening extends MY_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->force_to_login();
		}

		public function index()
		{
			$listening_path = APPPATH . '../assets' . DIRECTORY_SEPARATOR . '/listening';
			$data = array();

			$ritit = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($listening_path), RecursiveIteratorIterator::CHILD_FIRST); 
			$r = array(); 
			foreach ($ritit as $splFileInfo) 
			{ 
				if($splFileInfo->getFileName() =='.' || $splFileInfo->getFileName() =='..')
					continue;

				$path = $splFileInfo->isDir() 
				? array($splFileInfo->getFilename() => array()) 
				: array($splFileInfo->getFilename()); 

				for ($depth = $ritit->getDepth() - 1; $depth >= 0; $depth--) { 
					$fileName = $ritit->getSubIterator($depth)->current()->getFilename();
					$path = array($fileName => $path); 
				} 
				$r = array_merge_recursive($r, $path); 
			} 
			$data['levels'] = $r; 
			$this->load->view('listening/index',$data);
		}
}