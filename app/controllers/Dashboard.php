<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    /**
     * Dashboard constructor.
     */
    public function __construct() {
        parent::__construct();

        /**
         * All data of a user is saved with session
         * If all data is true then redirect to dashboard
         */
        $authinfo = [
            'auth' => $this->session->userdata('authinfo'),
            'role' => $this->session->userdata('role')
        ];

        if($authinfo['auth'] == null && $authinfo['role'] == null) {
            $this->session->set_flashdata('error', 'Sorry! Access Denied. You haven\'t permission to do.');
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
            'authinfo' => [
                'auth' => $this->session->userdata('authinfo'),
                'role' => $this->session->userdata('role')
            ],
        ]);
        /*$data['header'] = $this->load->view('common/header', '', true);
        $data['navbar'] = $this->load->view('common/navbar', '', true);
        $data['placeholder'] = $this->load->view('home', $user, true);
        $data['footer'] = $this->load->view('common/footer', '', true);
        $this->load->view('dashboard/dashboard', $data);*/
    }

}