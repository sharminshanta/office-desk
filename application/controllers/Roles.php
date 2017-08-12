<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CI_Controller
{
    /**
     * Permissions constructor.
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Fetch all roles
     */
    public function lists()
    {
        $roles['roles'] = Roles_model::getRoles();
        $content['header'] = $this->load->view('common/header', '', true);
        $content['navbar'] = $this->load->view('common/navbar', '', true);
        $content['placeholder'] = $this->load->view('roles/default', $roles, true);
        $content['footer'] = $this->load->view('common/footer', '', true);
        $this->load->view('dashboard/dashboard', $content);
    }
}