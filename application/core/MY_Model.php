<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	/**
	* @property $db CI_DB_query_builder
	* @property $user User_model
	*/
	class MY_Model extends CI_Model
	{
		public function __construct($result = null)
		{
			if(is_object($result))
				$result = get_object_vars( $result); 

			if(is_array($result))
				foreach($result as $key => $val)
					$this->{$key} = $val;  
		}

		public function __get($key)
		{
			if($key == 'user' && isset($this->user_id))
				return $this->user = User_model::by_id($this->user_id);

			return parent::__get($key);
		}


}