<?php
    class Home extends MY_Controller
    {
        public function __construct()
        {
            parent::__construct();
        }
        
        public function Index()
        {   
            if($this->is_logged_in())
            {
                   
                redirect(site_url('dashboard'));
            }
            else{

                $login_params = array('scope' =>'email,user_groups,user_games_activity,friends_groups');
                
                $user_id = $this->facebook->getUser();
            
                if($user_id) {

                    // We have a user ID, so probably a logged in user.
                    // If not, we'll get an exception, which we handle below.
                    try {

                        $user_profile = $this->facebook->api('/me','GET');
                        $user_profile['access_token'] = $this->facebook->getAccessToken();
                        $user = $this->user_model->login_with_facebook($user_profile);
                        $this->session->set_userdata("user_id",$user_profile['id']);
                        
                       
                        redirect(site_url('dashboard'));

                    } catch(FacebookApiException $e) {
                        // If the user is logged out, you can have a 
                        // user ID even though the access token is invalid.
                        // In this case, we'll get an exception, so we'll
                        // just ask the user to login again here.
                        $login_url = $this->facebook->getLoginUrl($login_params); 
                        $this->load->view('login',array('fb_login_url' => $login_url));
                        error_log($e->getType());
                        error_log($e->getMessage());
                    }   
                } else {

                    // No user, print a link for the user to login
                    $login_url = $this->facebook->getLoginUrl($login_params);
                    $this->load->view('login',array('fb_login_url' => $login_url));

                }
            }  
        }
      
    }
