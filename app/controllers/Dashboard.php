<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    /**
     * Dashboard constructor.
     */
    public function __construct() {
        parent::__construct();

        /**
         * All data of a user is saved with session
         * If all data is true then redirect to dashboard
         */
        $user = $this->session->userdata('authinfo', 'role');

        if($user == null) {
            $message['error'] = 'Sorry! Access Denied. You don’t have permission to do.';
            $this->session->set_userdata($message);
            redirect('login','refresh');
        }
    }

    public function index()
    {
        $users = UsersModel::getUsers();
        $attendances = [
            1 => 'There has no attendance',
            2 => 'Please put attendance list'
        ];
        $this->twig->display('home', [
            'users' => $users,
            'attendances' => $attendances,
            'session' => $_SESSION
        ]);
        /*$data['header'] = $this->load->view('common/header', '', true);
        $data['navbar'] = $this->load->view('common/navbar', '', true);
        $data['placeholder'] = $this->load->view('home', $user, true);
        $data['footer'] = $this->load->view('common/footer', '', true);
        $this->load->view('dashboard/dashboard', $data);*/
    }

}