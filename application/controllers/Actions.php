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
                $result =  $this->facebook->api('/'  . $user->id,'GET',array('access_token',$this->config->item('access_token')));

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

}