<?php
	class Blog extends MY_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->force_to_login();
		}

		public function index()
		{
			$this->all();   
		}

		public function all()
		{
			$data = array();
			$data['posts'] = $this->blog_model->get_by_permitted_user($this->current_user->user_id);
			$this->load->view("blog/all",$data);
		}

		public function write($parent_id = null)
		{
			$data = array();
			$data['parent_id'] = $parent_id;

			if($this->input->post('save_post'))
			{
				if($parent_id == null )
				{
					$post_id = $this->blog_model->add($this->current_user->user_id,$_POST['post_title'],$_POST['post_content'],isset($_POST['permitted_users']) && $_POST['permitted_users']);

					if(!$this->input->post('permitted_users'))
					{
						$this->point_model->add($this->current_user->user_id,'writing_' . $post_id,'You have posted a public writing. That\'s  great! You have gained 10 points! ',10,'blog/view/' . $post_id,null);

						$a = $this->facebook->api('/'.$this->config->item('group_id').'/feed','POST',array(    
							'message' => 'Hello friends! I have just posted a writing and gained 10 points. Do you want to read it and write some comments?',
							'name' => $this->input->post('post_title'),
							'caption' =>$this->input->post('post_title'),
							'description' => $this->input->post('post_content'),
							'link' =>   site_url('blog/view/' . $post_id)
						));

						$this->blog_model->set_fb_id($a['id'],$post_id);
					}
					else
					{
						foreach($_POST['permitted_users'] as $permitted_user_id)
						{
							$this->db->query("INSERT INTO blog_privacy (post_id,user_id) VALUES ({$post_id},{$permitted_user_id})");
						} 
					}

					redirect(site_url('blog/view/' . $post_id));
					die();
				}
				else{
					$rev_id = $this->blog_model->add_revision($this->current_user->user_id,$_POST['post_title'],$_POST['post_content'],$parent_id,'revision',false,$_POST['revision_notes']);

					$this->point_model->add($this->current_user->user_id,'writing_' . $rev_id,'You have done a review for a writing post. That\'s  great! You have gained 20 points! ',20,'blog/view_diff/' . $rev_id,null);

					redirect(site_url('blog/view/' . $parent_id));
					die();
				}  
			}

			if($parent_id != null)
				$data['post'] = $this->blog_model->get_by_id($parent_id);
			else
			{
				$data['allusers'] =  $allusers = $this->user_model->get_all();
			}

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
			$html .='<td style="padding:30px"> '.$last_revision->post_content.'</td>';
			$html .='<td style="padding:30px">' .  htmlDiff($last_revision->post_content,$revision->post_content) . '</td>';
			$html .='</tr>';  

			if($revision->revision_notes)
				$html .="<tr><td colspan=\"2\"><div class=\"alert alert-info\"><b>".$revision->user->profile_link_with_avatar()."</b><p>" . nl2br($revision->revision_notes) . "</p></div></td></tr>";

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
			//change permissions

			$data['post'] = $post = $this->blog_model->get_by_id($post_id);

			if($this->input->post('save_permissions') && $post->user_id == $this->current_user->user_id)
			{
				//yes, this user can change permissions of the post.
			}



			if($post->post_type == 'post')
			{
				$data['revisions'] = $this->blog_model->get_revisions($post_id); 
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
