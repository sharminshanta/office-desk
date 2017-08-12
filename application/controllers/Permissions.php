<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permissions extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function permissionsTest()
    {
        $content['header'] = $this->load->view('common/header', '', true);
        $content['navbar'] = $this->load->view('common/navbar', '', true);
        $content['placeholder'] = $this->load->view('users/roles_permissions', '', true);
        $content['footer'] = $this->load->view('common/footer', '', true);
        $this->load->view('dashboard/dashboard', $content);
    }
}