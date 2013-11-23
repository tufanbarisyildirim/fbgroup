<?php
    class MY_Loader extends CI_Loader
    {
        public function __construct()
        {
            parent::__construct();
        }
        
        public function view($view, $vars = array(), $return = FALSE)
        {
            return parent::view($view, get_instance()->common_data( $vars ), $return );
        }
    }
