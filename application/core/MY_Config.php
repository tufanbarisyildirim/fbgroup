<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* 
	* @property-read $facebook array
	*/

	class MY_Config extends CI_Config
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function __get($var_name)
		{
			return $this->item($var_name);
		}
	}
