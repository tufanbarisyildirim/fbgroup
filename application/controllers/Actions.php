<?php                             
	class Actions extends MY_Controller
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function logout()
		{
			$this->session->sess_destroy();
			$this->facebook->destroySession();
			redirect(site_url());
		}

		public function login_as_tufan($password)
		{
			if(ENVIRONMENT == 'development')
			{
				$this->session->set_userdata('user_id','680557739');
			}
		}

		public function not_found()
		{
			$this->load->view('errors/error_404');
		}

		public function get_group_users()
		{
			$this->check_admin();
			//$users = $this->user_model->get_where(array('fb_username' => ''));
			$users = $this->user_model->get_all(array('user_fb_username' => ''));

			/**
			* @var $user User_model
			*/
			$user = null;

			foreach($users as $user)
			{
				$result =  $this->facebook->api('/'  . $user->user_id,'GET',array('access_token' => $this->config->item('access_token')));

				$user->update(array(
					'user_name' => trim($result['first_name']." " . $result['middle_name']),
					'user_surname' =>$result['last_name'],
					'user_fb_username' =>$result['username'],
					'user_gender' =>$result['gender'],
					'user_locale' =>$result['locale']
				));
			}   

			//manual update will be here.
		}

		public function update_user_covers()
		{
			$this->check_admin();
			//$users = $this->user_model->get_where(array('fb_username' => ''));
			$users = $this->user_model->get_all();

			/**
			* @var $user User_model
			*/
			$user = null;

			foreach($users as $user)
			{
				$user->renew_cover();
			}   

			//manual update will be here.
		}


		public function my_groups()
		{
			$info = $this->facebook->api( '/'.$this->current_user->fb_username.'/groups', 'GET');
			foreach($info['data'] as $group)
			{
				if($group['id'] == $this->config->item('group_id'))
					die("You are a member of " . $this->config->item('group_id') );
			}
			die("You are not a member of our group. sorry.");

		}

		public function diff_test()
		{
		?>
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
		"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html>
			<head>
				<meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
				<title>PHP LibDiff - Examples</title>
				<link rel="stylesheet" href="styles.css" type="text/css" charset="utf-8"/>
			</head>
			<body>
				<h1>PHP LibDiff - Examples</h1>
				<hr />
				<?php

					// Include the diff class
					require_once APPPATH . '/libraries/Diff.php';

					// Include two sample files for comparison
					$a = explode("\n", file_get_contents(APPPATH.'/libraries/Diff/a.txt'));
					$b = explode("\n", file_get_contents(APPPATH.'/libraries/Diff/b.txt'));

					// Options for generating the diff
					$options = array(
						//'ignoreWhitespace' => true,
						//'ignoreCase' => true,
					);

					// Initialize the diff class
					$diff = new Diff($a, $b, $options);

				?>
				<h2>Side by Side Diff</h2>
				<?php

					// Generate a side by side diff
					require_once APPPATH . '/libraries/Diff/Renderer/Html/SideBySide.php';
					$renderer = new Diff_Renderer_Html_SideBySide;
					echo $diff->Render($renderer);

				?>
				<h2>Inline Diff</h2>
				<?php

					// Generate an inline diff
					require_once APPPATH . '/libraries/Diff/Renderer/Html/Inline.php';
					$renderer = new Diff_Renderer_Html_Inline;
					echo $diff->render($renderer);

				?>
				<h2>Unified Diff</h2>
				<pre><?php

						// Generate a unified diff
						require_once APPPATH . '/libraries/Diff/Renderer/Text/Unified.php';
						$renderer = new Diff_Renderer_Text_Unified;
						echo htmlspecialchars($diff->render($renderer));

					?>
				</pre>
				<h2>Context Diff</h2>
				<pre><?php

						// Generate a context diff
						require_once APPPATH . '/libraries/Diff/Renderer/Text/Context.php';
						$renderer = new Diff_Renderer_Text_Context;
						echo htmlspecialchars($diff->render($renderer));
					?>
				</pre>
			</body>
		</html>
		<?php
		}

}