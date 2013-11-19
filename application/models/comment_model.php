<?php
    class Comment_model extends MY_Model 
    {

        function __construct() 
        {
            parent::__construct();
        }

        function get_by_to_id($user_id)
        {
            return $this->db->get_where('profile_comments','comment_to_id = ' . $user_id);
        }

        function add($from,$to,$text)
        {
            $this->db->insert('profile_comments',array(
                'comment_from_id' => $from,
                'comment_to_id' => $to,
                'comment_text' => $text
                ),true);  
        }

}