<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller
{
    public function index()
    {
        $authinfo = [
            'auth' => $this->session->userdata('authinfo'),
            'role' => $this->session->userdata('role')
        ];

        if($authinfo['auth'] == null && $authinfo['role'] == null) {
            $this->session->set_flashdata('error', 'Sorry, You have not logged yet.');
            redirect('login','refresh');
        }

        unset($authinfo['auth']);
        unset($authinfo['role']);
        session_destroy();
        redirect('login');
    }
}