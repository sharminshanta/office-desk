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

        /*if($authinfo['auth'] == null && $authinfo['role'] == null) {
            $message['error'] = 'Sorry, You have not logged yet.';
            $this->session->set_userdata($message);
            redirect('login','refresh');
        }*/
     /*   var_dump($_SESSION); die();

        $this->session->unset_userdata($authinfo['auth']);
        $this->session->unset_userdata($authinfo['role']);
        $logoutMessage['success'] = 'You are successfully logout !';
        $this->session->set_userdata($logoutMessage);*/
        unset($authinfo['auth']);
        unset($authinfo['role']);
        session_destroy();
        redirect('login');
        var_dump($authinfo); die();

    }
}