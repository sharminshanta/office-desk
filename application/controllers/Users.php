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

    /**
     * It's default page for user controller
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
     * This is for user's add(user's add form).Firstly check the permission with each user's role
     * if that user is permitted to add a user then he/she would add a new user.
     */
    public function home()
    {
        /**
         * Check the user's permission
         */
        $isPermit = Utilities::is_permitTest('users_add');

        if ($isPermit == null) {
            redirect('users');
        } else {
            $roles['roles'] = Roles_model::getRoles();
            $data['header'] = $this->load->view('common/header', '', true);
            $data['navbar'] = $this->load->view('common/navbar', '', true);
            $data['placeholder'] = $this->load->view('users/add', $roles, true);
            $data['footer'] = $this->load->view('common/footer', '', true);
            $this->load->view('dashboard/dashboard', $data);
        }
    }

    /**
     * This is for user's add.Firstly check user's information with form input data
     * If form validation occurs error then data is not permitted to database insert
     */
    public function create()
    {
        /**
         * Check the user's permission
         */
        $isPermit = Utilities::is_permitTest('users_add');

        if ($isPermit == null) {
            redirect('users');
        } else {
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

            try {
                $userID = UsersModel::addUser();
                $success = true;
            } catch (Exception $exception) {
                $exception->getMessage('This is an error');
                $success = false;
            }

            if ($success == true) {
                $message['success'] = 'New user has been created successfully';
                $this->session->set_userdata($message);
                $user = UsersModel::userInfo($userID);
                redirect('users/details/' . $user->uuid . '/overview');
            }

        }
    }

    /**
     * This is for fetching all users.Firstly check user's role
     * if that user is permitted to see a user then he/she would add a new user.
     * Get all users
     */
    public function lists()
    {
        /**
         * Check the user's permission
         */
        $isPermit = Utilities::is_permitTest('users_lists');

        if ($isPermit == null) {
            redirect('users');
        } else {
            $users['users'] = UsersModel::getUsers();
            $content['header'] = $this->load->view('common/header', '', true);
            $content['navbar'] = $this->load->view('common/navbar', '', true);
            $content['placeholder'] = $this->load->view('users/list', $users, true);
            $content['footer'] = $this->load->view('common/footer', '', true);
            $this->load->view('dashboard/dashboard', $content);
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
        $userDetails['role'] = Roles_model::getName($userDetails['details']['user']->role_id);
        $data['header'] = $this->load->view('common/header', '', true);
        $data['navbar'] = $this->load->view('common/navbar', '', true);
        $data['placeholder'] = $this->load->view('users/details', $userDetails, true);
        $data['footer'] = $this->load->view('common/footer', '', true);
        $this->load->view('dashboard/dashboard', $data);
    }

    /**
     * User's profile update view page
     */
    public function profile()
    {
        //@TODO try to manage it with the best way
        /**
         * Form validation with valitron that is so easy
         */

        $uuid = $this->uri->segment(3);
        $userDetails['details'] = UsersModel::userDetails($uuid);
        $userDetails['timezones'] = Utilities::getTimezones();
        $userDetails['countries'] = Utilities::getCountries();
        $userDetails['roles'] = Roles_model::getRoles();
        $content['header'] = $this->load->view('common/header', '', true);
        $content['navbar'] = $this->load->view('common/navbar', '', true);
        $content['placeholder'] = $this->load->view('users/profile', $userDetails, true);
        $content['footer'] = $this->load->view('common/footer', '', true);
        $this->load->view('dashboard/dashboard', $content);
    }

    /**
     * User's profile update post
     */
    public function updateProfile()
    {
        $formData = $_POST['profile'];
        $validation = new Valitron\Validator($formData);
        $validation->rule('required', 'first_name')->message('First name is required');
        $validation->rule('required', 'last_name')->message('Last name is required');
        $validation->rule('required', 'gender')->message('Gender is required');
        $validation->rule('required', 'timezone')->message('Timezone is required');


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

        if ($formData['date_of_birth'] == date("Y-m-d") or $formData['date_of_birth'] > date('Y-m-d')) {
            $validation->addInstanceRule('dateOfBirth', function () {
                return false;
            });
            $validation->rule('dateOfBirth', 'date_of_birth')->message('Invalid birth date');
        }


        if (!$validation->validate()) {
            $errors['errors'] = $validation->errors();
            $oldValue['oldValues'] = $validation->data();
            $this->session->set_userdata($errors);
            $this->session->set_userdata($oldValue);
            redirect('users/profile/' . $this->uri->segment(3));
        } else {
            try{
                UsersModel::updateProfile($formData['user_id']);
                $success = true;
            }catch (Exception $exception) {
                $exception->getMessage('This is an error');
                $success = false;
            }

            if($success == true) {
                $message['success'] = 'User has been updated successfully';
                $this->session->set_userdata($message);
                $user = UsersModel::userInfo($formData['user_id']);
                redirect('users/details/' . $user->uuid);
            }
        }
    }

    /**
     * Users address update post
     */
    public function address()
    {
        $formData = $_POST['profile'];
        $validation = new Valitron\Validator($formData);
        $validation->rule('required', 'street')->message('Street is required');
        $validation->rule('required', 'city')->message('City is required');
        $validation->rule('required', 'country')->message('Country is required');
        $validation->rule('required', 'phone')->message('Phone is required');


        if (!$validation->validate()) {
            $errors['errors'] = $validation->errors();
            $this->session->set_userdata($errors);
            redirect('users/profile/' . $this->uri->segment(3));
        } else {
            try {
                UsersModel::updateAddress($this->uri->segment(3));
                $success = true;
            } catch (Exception $exception) {
                $exception->getMessage();
                $success = false;
            }

            if ($success == true) {
                $message['success'] = 'Address has been updated successfully';
                $this->session->set_userdata($message);
                redirect('users/profile/' . $this->uri->segment(3));
            }
        }
    }

    /**
     * User's notes
     */
    public function notes()
    {
        $uuid = $this->uri->segment(3);
        $userDetails['details'] = UsersModel::userDetails($uuid);
        $userDetails['timezones'] = Utilities::getTimezones();
        $userDetails['countries'] = Utilities::getCountries();
        $content['header'] = $this->load->view('common/header', '', true);
        $content['navbar'] = $this->load->view('common/navbar', '', true);
        $content['placeholder'] = $this->load->view('users/notes', $userDetails, true);
        $content['footer'] = $this->load->view('common/footer', '', true);
        $this->load->view('dashboard/dashboard', $content);
    }
}