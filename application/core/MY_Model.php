<?php
    /**
    * @property $db CI_DB_query_builder
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

}