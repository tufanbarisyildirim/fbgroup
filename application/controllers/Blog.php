<?php
    class Blog extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
        }

        public function index()
        {
            $this->all();   
        }

        public function all()
        {
            $data = array();
            $data['posts'] = $this->blog_model->get_all();
            $this->load->view("blog/all",$data);
        }

        public function write($parent_id = null)
        {
            $data = array();

            if(isset($_POST['save_post']))
            {
                if($parent_id == null)
                {
                    $post_id = $this->blog_model->add($this->current_user->user_id,$_POST['post_title'],$_POST['post_content']);

                    $a = $this->facebook->api('/'.$this->config->item('group_id').'/feed','POST',array(    
                        'message' => 'Hello fridends! I have just posts a writing. Do you want to read it and write some comments?',
                        'name' => $_POST['post_title'],
                        'caption' =>$_POST['post_title'],
                        'description' => $_POST['post_content'],
                        'link' =>   site_url('blog/view/' . $post_id)
                    ));

                    $this->blog_model->set_fb_id($a['id'],$post_id);

                    redirect(site_url('blog/view/' . $post_id));
                    die();
                }
                else{
                    $this->blog_model->add_revision($this->current_user->user_id,$_POST['post_title'],$_POST['post_content'],$parent_id);
                    redirect(site_url('blog/view/' . $parent_id));
                }

            }

            if($parent_id != null)
                $data['post'] = $this->blog_model->get_by_id($parent_id);

            $this->load->view("blog/write",$data);
        }

        public function view_diff($revision_id)
        {
            $data['revision'] = $revision = $this->blog_model->get_by_id($revision_id);
            $posts = $this->db->query("SELECT * FROM blogs WHERE post_type IN ('original','revision') AND parent_id = " . $revision->parent_id." AND post_id < " . $revision_id ." ORDER BY post_id DESC LIMIT 1")->result();
            $data['last_revision'] = $last_revision = new Blog_model($posts[0]);


            /*  $this->load->library('Diff',array($last_revision->get_lines_with_title(),$revision->get_lines_with_title(),array()),'diff');
            // Generate a side by side diff
            require_once APPPATH . '/libraries/Diff/Renderer/Html/SideBySide.php';
            require_once APPPATH . '/libraries/Diff/Renderer/Html/Inline.php';
            $renderer = new Diff_Renderer_Html_SideBySide($last_revision->user->profile_link_with_avatar() .' <small>('.$last_revision->post_date.')</small>',$revision->user->profile_link_with_avatar().' <small>('.$revision->post_date.')</small>');

            $data['diffs'][] =  $this->diff->Render($renderer);    */

            /*
            $this->load->library('FineDiff',array($last_revision->post_content,$revision->post_content,null),'finediff');
            $data['diff']  = $this->finediff->renderDiffToHTML();     */

            $this->load->helper('string');

            $html = '<table>';
            $html .='<thead>';
            $html .='<tr>';
            $html .='<th>'.$last_revision->user->profile_link_with_avatar() .' <small>('.$last_revision->post_date.')</small>' .'</th>';
            $html .='<th>'.$revision->user->profile_link_with_avatar().' <small>('.$revision->post_date.')</small>' .'</th>';
            $html .='</tr>';
            $html .='</thead>';
            $html .='<tbody>';
            $html .='<tr>';
            $html .='<td> '.$last_revision->post_content.'</td>';
            $html .='<td>' .  htmlDiff($last_revision->post_content,$revision->post_content) . '</td>';
            $html .='</tr>';   
            $html .='</tbody>';        
            $html .='</table>';

            $data['diffs'][] = $html;  

            $this->load->view('blog/view_diff',$data);

        }

        public function view_history($post_id)
        {
            $data = array();
            $data['diffs'] = array();

            $revisions =  $this->blog_model->get_revisions($post_id);

            $this->load->library('Diff',array($revisions[0]->get_lines_with_title(),$revisions[1]->get_lines_with_title(),array()),'diff');
            require_once APPPATH . '/libraries/Diff/Renderer/Html/SideBySide.php';
            $renderer = new Diff_Renderer_Html_SideBySide($revisions[0]->user->profile_link_with_avatar() .' <small>('.$revisions[0]->post_date.')</small>',$revisions[1]->user->profile_link_with_avatar().' <small>('.$revisions[1]->post_date.')</small>');

            $data['diffs'][] = $this->diff->Render($renderer); 


            for($i = 2; $i < count($revisions); $i++)
            {
                $diff = new Diff(array($revisions[$i-1]->get_lines_with_title(),$revisions[$i]->get_lines_with_title(),array()));
                $renderer = new Diff_Renderer_Html_SideBySide($revisions[$i-1]->user->profile_link_with_avatar() .' <small>('.$revisions[$i-1]->post_date.')</small>',$revisions[$i]->user->profile_link_with_avatar().' <small>('.$revisions[$i]->post_date.')</small>');

                $data['diffs'][] =   $diff->Render($renderer);
            }

            $this->load->view('blog/view_diff',$data);
        }

        public function myblog()
        {
            $data = array();
            $data['posts'] = $this->blog_model->get_by_user_id($this->current_user->user_id);
            $this->load->view("blog/myblog",$data);
        }

        public function delete($post_id)
        {
            if($this->current_user->is_admin())
            {
                $this->blog_model->delete($post_id);
            }

            redirect(site_url('blog'));
        }

        public function view($post_id)
        {
            $data['post'] = $post = $this->blog_model->get_by_id($post_id);

            if($post->post_type == 'post')
            {
                $data['revisions'] = $this->blog_model->get_revisions($post_id); 
            }
            else if($post->post_type == 'revision')
            {
                // find the first revision and compare them yeah!
            }

            $this->load->view('blog/view',$data);
        }

        public function mark_as_best($revision_id)
        {
            if($this->current_user->is_admin || $this->current_user->is_teacher())
            {
                $this->blog_model->mark_as_the_best($revision_id);
            }

            redirect($_SERVER['HTTP_REFERER']);
            die();
        }
    }
