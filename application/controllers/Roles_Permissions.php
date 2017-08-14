<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles_Permissions extends CI_Controller
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
        $permissions['roles_permissions'] = Roles_Permissions_model::getAssignPermissions($permissions['role']->id);
        $content['header'] = $this->load->view('common/header', '', true);
        $content['navbar'] = $this->load->view('common/navbar', '', true);
        $content['placeholder'] = $this->load->view('users/roles_permissions', $permissions, true);
        $content['footer'] = $this->load->view('common/footer', '', true);
        $this->load->view('dashboard/dashboard', $content);
    }

    /**
     * To assign permissions to role
     */
    public function assignPermission()
    {
        $rolePermission = Roles_Permissions_model::add();
        var_dump($rolePermission); die();
    }

    /**
     * User's permission check
     */
    public function testPermission()
    {
        $permissions = Utilities::is_permitTest('users_add');
        var_dump($permissions); die();

    }
}