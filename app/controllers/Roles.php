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
     * Fetch all roles
     */
    public function lists()
    {
        /**
         * Check the user's permission
         */
        $isPermit = Utilities::is_permit('roles_lists');

        if ($isPermit == null) {
            redirect('users');
        } else {
            $roles['roles'] = Roles_model::getRoles();
            $content['header'] = $this->load->view('common/header', '', true);
            $content['navbar'] = $this->load->view('common/navbar', '', true);
            $content['placeholder'] = $this->load->view('roles/default', $roles, true);
            $content['footer'] = $this->load->view('common/footer', '', true);
            $this->load->view('dashboard/dashboard', $content);
        }
    }

    public function addRole()
    {
        /**
         * Check the user's permission
         */
        $isPermit = Utilities::is_permit('roles_create');

        if ($isPermit == null) {
            redirect('users');
        } else {
            //@TODO try to manage it with the best way
            /**
             * Form validation with valitron that is so easy
             */
            $postData = $_POST['role'];
            $validation = new Valitron\Validator($postData);
            $validation->rule('required', 'name')->message('Role name is required');
            $isExist = Roles_model::checkRoleName($postData['name']);

            if (!preg_match('/^[a-zA-Z][a-zA-Z ]*$/', $postData['name'])) {
                $validation->addInstanceRule('nameRole', function () {
                    return false;
                });
                $validation->rule('nameRole', 'name')->message('Role name alphabetic characters only');
            }


            if ($isExist == true) {
                $validation->addInstanceRule('roleName', function () {
                    return false;
                });
                $validation->rule('roleName', 'name')->message('This role already exists');
            }

            if (!$validation->validate()) {
                $error['errors'] = $validation->errors();
                $oldValue['oldValue'] = $validation->data();
                $this->session->set_userdata($error);
                $this->session->set_userdata($oldValue);
                redirect('roles/lists');
            }

            try {
                $userDetails = $this->session->userdata('details');
                Roles_model::create($postData, $userDetails['user']->user_id);
                $success = true;
            } catch (Exception $exception) {
                $success = false;
                $message['insert_error'] = $this->session->set_userdata($exception->getMessage());
                $message['insert_error'] = $this->session->set_userdata($exception->getTraceAsString());
            }

            if ($success == true) {
                $message['success'] = 'Role has been created successfully';
                $this->session->set_userdata($message);
                redirect('roles/lists');
            }

            redirect('roles/lists');
        }
    }
}