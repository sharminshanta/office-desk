<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    /**
     * Login constructor.
     */
    public function __construct() {
        parent::__construct();

        /**
         * All data of a user is saved with session
         * If all data is true then redirect to dashboard
         */
        $user = $this->session->userdata('details', 'role');

        if($user != null) {
            redirect('dashboard','refresh');
        }
    }

    /**
     * default page of application is login page that is always done by index method
     */
    public function index()	{
        $this->load->view('auth/login');
    }

    /**
     * user email & password post by form
     * user check with database
     * if user is authorised then redirect to dashboard route
     * else user is unauthorised then redirect to login route
     */
    public function authentication() {
        $email = $this->input->post('email_address', true);
        $password = md5($this->input->post('password', true));
        $user = UsersModel::authentication($email, $password);

        if ($user) {
            $userDetails['details'] = UsersModel::userDetails($user->uuid);
            $userDetails['role'] = Roles_model::getName($userDetails['details']['user']->role_id);
            $this->session->set_userdata($userDetails);
            $userDetails['user_id'] = $this->session->set_userdata($user->id);
            redirect('dashboard');
        } else {
            $message['error'] = 'Credentials miss matched !';
            $this->session->set_userdata($message);
            redirect('login');
        }
    }
}