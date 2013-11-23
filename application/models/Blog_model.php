<?php
    class Blog_model extends MY_Model
    {
        public function __construct($result = null)
        {
            parent::__construct($result);
        }


        public function get_all()
        {
            $posts = array();
            $_posts = $this->db->order_by('post_date','DESC')->get('blogs')->result();
            foreach($_posts as $post)
                $posts[] = new Blog_model( $post );

            return $posts;
        }

        public function get_by_user_id($user_id)
        {
            $posts = array();
            $_posts = $this->db->order_by('post_date','DESC')->get_where('blogs',array('user_id' => $user_id))->result();
            foreach($_posts as $post)
                $posts[] = new Blog_model( $post );

            return $posts;
        }

        public function get_by_id($post_id)
        {

            $_posts = $this->db->order_by('post_date','DESC')->get_where('blogs',array('post_id' => $post_id))->result();
            return new Blog_model( $_posts[0] );

        }

        public function set_fb_id($fb_id,$post_id = null)
        {
            if($post_id == null)
                $post_id = $this->post_id;

            $this->update(array('post_fb_id' => $fb_id),$post_id);
        }

        public function add($user_id,$title,$content)
        {
            $this->db->insert('blogs',array(
                'user_id' => $user_id,
                'post_title' =>$title,
                'post_content' =>$content,
                ),true);

            return $this->db->insert_id();
        }


        public function update($data,$post_id = null)
        {
            if($post_id == null)
                $post_id = $this->post_id;

            return $this->db->update('blogs',$data,array('post_id' => $post_id));
        }

    }
