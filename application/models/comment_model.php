<?php
    class Comment_model extends MY_Model 
    {

        function __construct() 
        {
            parent::__construct();
        }

        function get_by_to_id($user_id)
        {
            return $this->db->get_where('profile_comments','to_id = ' . $user_id);
        }

        function add($from,$to,$text)
        {
            $this->db->insert('profile_comments',array(
                'from_id' => $from,
                'to_id' => $to,
                'text' => $text
                ),true);  
        }

}