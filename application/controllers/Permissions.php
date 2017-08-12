<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permissions extends CI_Controller
{
    /**
     * Permissions constructor.
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Fetch all permissions
     */
    public function assign()
    {
        $permissions['role'] = Roles_model::details($this->uri->segment(3));
        $permissions['permissions'] = Permissions_model::getPermissions();
        $content['header'] = $this->load->view('common/header', '', true);
        $content['navbar'] = $this->load->view('common/navbar', '', true);
        $content['placeholder'] = $this->load->view('users/roles_permissions', $permissions, true);
        $content['footer'] = $this->load->view('common/footer', '', true);
        $this->load->view('dashboard/dashboard', $content);
    }
}