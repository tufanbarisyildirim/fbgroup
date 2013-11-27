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
            $_posts = $this->db->order_by('post_date','DESC')->get_where('blogs',array('post_type' => 'post'))->result();
            foreach($_posts as $post)
                $posts[] = new Blog_model( $post );

            return $posts;
        }

        public function get_by_user_id($user_id)
        {
            $posts = array();
            $_posts = $this->db->order_by('post_date','DESC')->get_where('blogs',array('user_id' => $user_id,'post_type' => 'post'))->result();
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

            $inserted_id =  $this->db->insert_id();

            // add a first revision

            $this->add_revision($user_id,$title,$content,$inserted_id,'original');

            return $inserted_id;
        }

        public function add_revision($user_id,$title,$content,$parent_id,$post_type = 'revision')
        {
            $this->db->insert(
                'blogs',array(
                    'user_id' => $user_id,
                    'post_title' =>$title,
                    'post_content' =>$content,
                    'post_type' => $post_type,
                    'parent_id' =>  $parent_id
                ),true);

            $revision_id = $this->db->insert_id();

            // update the first blogpost.
            $this->update(array(
                'post_title' =>$title,
                'post_content' =>$content,
                ),$parent_id);

            return $revision_id;
        }

        public function get_revisions($post_id = null)
        {
            if($post_id == null)
                $post_id = $this->post_id;

            $revisions = array();
            $_revisions = $this->db
            ->where_in('post_type',array('original','revision'))
            ->order_by('FIELD(post_type,\'original\',\'revision\')')
            ->get_where('blogs',array('parent_id' => $post_id))
            ->result();

            foreach($_revisions as $revision)
                $revisions[] = new Blog_model(  $revision );

            return $revisions;
        }


        public function update($data,$post_id = null)
        {
            if($post_id == null)
                $post_id = $this->post_id;

            return $this->db->update('blogs',$data,array('post_id' => $post_id));
        }
        
         public function mark_as_the_best($revision_id = null)
        {
            if($revision_id == null)
                $revision_id = $this->post_id;
                
                $revision = $this->get_by_id($revision_id);
                
                $this->db->update('blogs',array('the_best' => 0),array('parent_id' => $revision->parent_id));
                return $this->db->update('blogs',array('the_best' => 1),array('post_id' => $revision_id));
        }      
        
        public function delete($post_id)
        {
            $this->db->delete('blogs',array('post_id' => $post_id));
            $this->db->delete('blogs',array('parent_id' => $post_id));
            
            return true;
        }
        
        public function get_lines()
        {
            return explode("\n",$this->post_content);
        }
        
        public function get_lines_with_title()
        {
            return array_merge(array($this->post_title),$this->get_lines());
        }

    }
