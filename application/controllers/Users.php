<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller
{
    /**
     * Users constructor.
     */
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $roles['roles'] = Roles::getRoles();
        $data['header'] = $this->load->view('common/header', '', true);
        $data['navbar'] = $this->load->view('common/navbar', '', true);
        $data['placeholder'] = $this->load->view('users/add', $roles, true);
        $data['footer'] = $this->load->view('common/footer', '', true);
        $this->load->view('dashboard/dashboard', $data);
    }

    /**
     * This is user's add
     */
    public function create()
    {
        //@TODO try to manage it with the best way

        /**
         * Form validation with the codeigniter default formvalidation rules
         */
        $this->form_validation->set_rules('first_name', 'First Name', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|min_length[5]|max_length[12]');

        if ($this->form_validation->run() == FALSE) {
            $message['error'] = validation_errors();
            $this->session->set_userdata($message);
            redirect('dashboard', 'refresh');
        }

        /*$formData = UsersModel::addUser($_POST);
        var_dump($formData); die();*/
    }
}