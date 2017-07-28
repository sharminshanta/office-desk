<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller
{
    public function index()
    {
        $user = $this->session->userdata('details');

        if($user == null) {
            $message['error'] = 'Sorry, You have not logged yet.';
            $this->session->set_userdata($message);
            redirect('login','refresh');
        }

        $this->session->unset_userdata('details');
        $logoutMessage['success'] = 'You are successfully logout !';
        $this->session->set_userdata($logoutMessage);
        redirect('login');
    }
}