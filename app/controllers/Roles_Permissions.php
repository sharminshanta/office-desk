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

        /**
         * All data of a user is saved with session
         * If all data is true then redirect to dashboard
         */
        $user = $this->session->userdata('details');

        if($user == null) {
            $message['error'] = 'Sorry! Access Denied. You don’t have permission to do.';
            $this->session->set_userdata($message);
            redirect('login','refresh');
        }
    }

    /**
     * This is default method for this controller
     */
    public function index()
    {
        $content['header'] = $this->load->view('common/header', '', true);
        $content['navbar'] = $this->load->view('common/navbar', '', true);
        $content['placeholder'] = $this->load->view('errors/is_permit', '', true);
        $content['footer'] = $this->load->view('common/footer', '', true);
        $this->load->view('dashboard/dashboard', $content);
    }

    /**
     * Firstly fetch all permissions
     * Fetch all assign permissions of a definite role
     */
    public function assign()
    {
        /**
         * Check the user's permission
         */
        $isPermit = Utilities::is_permit('permissions_add');

        if ($isPermit == null) {
            redirect('roles_Permissions');
        } else {
            $permissions['role'] = Roles_model::details($this->uri->segment(3));
            $permissions['permissions'] = Permissions_model::getPermissions();
            $permissions['roles_permissions'] = Roles_Permissions_model::getAssignPermissions($permissions['role']->id);
            $content['header'] = $this->load->view('common/header', '', true);
            $content['navbar'] = $this->load->view('common/navbar', '', true);
            $content['placeholder'] = $this->load->view('users/roles_permissions', $permissions, true);
            $content['footer'] = $this->load->view('common/footer', '', true);
            $this->load->view('dashboard/dashboard', $content);
        }
    }

    /**
     * To assign permissions to role
     */
    public function assignPermission()
    {
        /**
         * Check the user's permission
         */
        $isPermit = Utilities::is_permit('permissions_add');

        if ($isPermit == null) {
            redirect('roles_Permissions');
        } else {
            try {
                Roles_Permissions_model::add();
                $success = true;
            } catch (Exception $exception) {
                $exception->getMessage('This is an error');
                $success = false;
            }

            if ($success == true) {
                $message['success'] = 'Permission has been assigned successfully';
                $this->session->set_userdata($message);
                redirect('roles_Permissions/assign/' . $this->uri->segment(3));
            }
        }
    }
}