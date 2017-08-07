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

        $user = $this->session->userdata('details');

        if($user == null) {
            $message['error'] = 'Sorry! Access Denied. You don’t have permission to do.';
            $this->session->set_userdata($message);
            redirect('login','refresh');
        }

        $role = Roles::getName($user['user']->role_id);

        if($role->slug == 'general-user') {
            $message['error'] = 'Sorry! Access Denied. You don’t have permission to do.';
            $this->session->set_userdata($message);
            redirect('login','refresh');
        }


    }

    /**
     * It's default page for user controller
     */
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
     * This is user's add method
     * Firstly check user's information with form input data
     * If form validation occurs error then data is not permitted to database insert
     */
    public function create()
    {
        //@TODO try to manage it with the best way
        /**
         * Form validation with valitron that is so easy
         */
        $formData = $_POST['user'];
        $validation = new Valitron\Validator($formData);
        $validation->rule('required', 'first_name')->message('First name is required');
        $validation->rule('required', 'last_name')->message('Last name is required');
        $validation->rule('required', 'email_address')->message('Email address is required');
        $validation->rule('required', 'role_id')->message('Role is required');
        $validation->rule('required', 'password')->message('Password is required');
        $validation->rule('required', 'confirm_password')->message('Confirm password is required');
        $validation->rule('lengthMin', 'password', 6);
        $validation->rule('email', 'email_address')->message('This is invalid email address');
        $userMail = UsersModel::getEmailAddress($formData['email_address']);
        $validation->rule('equals', 'password', 'confirm_password')->message('Password does not matched');

        if (!preg_match('/^[a-zA-Z][a-zA-Z ]*$/', $formData['first_name'])) {
            $validation->addInstanceRule('firstName', function () {
                return false;
            });
            $validation->rule('firstName', 'first_name')->message('Alphabetic characters only');
        }

        if (!preg_match('/^[a-zA-Z][a-zA-Z ]*$/', $formData['last_name'])) {
            $validation->addInstanceRule('lastName', function () {
                return false;
            });
            $validation->rule('lastName', 'last_name')->message('Alphabetic characters only');
        }

        if ($userMail == true) {
            $validation->addInstanceRule('uMail', function () {
                return false;
            });
            $validation->rule('uMail', 'email_address')->message('This email has already registered');
        }

        if (!$validation->validate()) {
            $error['error'] = $validation->errors();
            $oldValue['oldValue'] = $validation->data();
            $this->session->set_userdata($error);
            $this->session->set_userdata($oldValue);
            redirect('users');
        }

        try{
            $userID = UsersModel::addUser();
            $success = true;
        }catch (Exception $exception) {
            $exception->getMessage('This is an error');
            $success = false;
        }

        if($success == true) {
            $message['success'] = 'New user has been created successfully';
            $this->session->set_userdata($message);
            $user = UsersModel::userInfo($userID);
            redirect('users/details/' . $user->uuid);
        }
    }

    /**
     * User's information
     * When a new user is created , redirect to his detail page
     */
    public function details()
    {
        $uuid = $this->uri->segment(3);
        $userDetails['details'] = UsersModel::userDetails($uuid);
        $userDetails['role'] = Roles::getName($userDetails['details']['user']->role_id);
        $data['header'] = $this->load->view('common/header', '', true);
        $data['navbar'] = $this->load->view('common/navbar', '', true);
        $data['placeholder'] = $this->load->view('users/details', $userDetails, true);
        $data['footer'] = $this->load->view('common/footer', '', true);
        $this->load->view('dashboard/dashboard', $data);
    }

    /**
     * Get all users
     */
    public function lists()
    {
        $users['users'] = UsersModel::getUsers();
        $content['header'] = $this->load->view('common/header', '', true);
        $content['navbar'] = $this->load->view('common/navbar', '', true);
        $content['placeholder'] = $this->load->view('users/list', $users, true);
        $content['footer'] = $this->load->view('common/footer', '', true);
        $this->load->view('dashboard/dashboard', $content);
    }

    /**
     * Just try pagination
     */
    public function testLists()
    {
        $config = array();
        $config["base_url"] = base_url() . "users/testLists";
        $config["total_rows"] = UsersModel::record_count();
        $config["per_page"] = 4;
        $config["uri_segment"] = 3;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data["users"] = UsersModel::getUsers1($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        $content['header'] = $this->load->view('common/header', '', true);
        $content['navbar'] = $this->load->view('common/navbar', '', true);
        $content['placeholder'] = $this->load->view('users/test_pagination', $data, true);
        $content['footer'] = $this->load->view('common/footer', '', true);
        $this->load->view('dashboard/dashboard', $content);
    }
}