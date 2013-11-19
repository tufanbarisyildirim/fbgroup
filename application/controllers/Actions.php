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

        public function not_found()
        {
            $this->load->view('errors/error_404');
        }

        public function get_group_users()
        {
            $this->check_admin();
            //$users = $this->user_model->get_where(array('fb_username' => ''));
            $users = $this->user_model->get_all(array('fb_username' => ''));

            /**
            * @var $user User_model
            */
            $user = null;

            foreach($users as $user)
            {
                $result =  $this->facebook->api('/'  . $user->id,'GET',array('access_token',$this->config->item('access_token')));

               $user->update(array(
                    'name' => trim($result['first_name']." " . $result['middle_name']),
                    'surname' =>$result['last_name'],
                    'fb_username' =>$result['username'],
                    'gender' =>$result['gender'],
                    'locale' =>$result['locale']
                ));
            }   

            //manual update will be here.
        }
}