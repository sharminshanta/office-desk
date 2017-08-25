<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller
{
    /**
     * Settings constructor.
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
     * Security Question Changed
     */
    public function security()
    {
        $isPermit = Utilities::is_permit('users_security_question_changed');

        if ($isPermit == null) {
            redirect('users');
        } else {
            $securityQuestion['userDetails'] = UsersModel::userDetails($this->uri->segment(3));
            $securityQuestion['question_one'] = $securityQuestion['userDetails']['user']->security_questions_one;
            $securityQuestion['question_two'] = $securityQuestion['userDetails']['user']->security_questions_two;
            $securityQuestion['answer_one'] = $securityQuestion['userDetails']['user']->security_questions_one_answer;
            $securityQuestion['answer_two'] = $securityQuestion['userDetails']['user']->security_questions_two_answer;
            $content['header'] = $this->load->view('common/header', '', true);
            $content['navbar'] = $this->load->view('common/navbar', '', true);
            $content['placeholder'] = $this->load->view('settings/security_settings', $securityQuestion, true);
            $content['footer'] = $this->load->view('common/footer', '', true);
            $this->load->view('dashboard/dashboard', $content);
        }
    }

    /**
     * Firstly validate the form data and if data doesn't validate proper then redirect to same page
     */
    public function changeSecurityQuestion()
    {
        $postData = $_POST['user'];
        $validation = new Valitron\Validator($postData);
        $validation->rule('required', 'security_questions_one')->message('Question is required');
        $validation->rule('required', 'security_questions_two')->message('Question is required');
        $validation->rule('required', 'security_questions_one_answer')->message('Answer is required');
        $validation->rule('required', 'security_questions_two_answer')->message('Answer is required');

        if ($postData['security_questions_one'] == $postData['security_questions_two']) {
            $validation->addInstanceRule('questionCheck', function () {
                return false;
            });
            $validation->rule('questionCheck', 'security_questions_one')->message('Questions are same. Choose the different question');
        }

        if (!$validation->validate()) {
            $errors['errors'] = $validation->errors();
            $this->session->set_userdata($errors);
            redirect('settings/security/' . $this->uri->segment(3));
        } else {
            try {
                UsersModel::securityQuestion($postData, $this->uri->segment(3));
                $success = true;
            } catch (Exception $exception) {
                $exception->getMessage();
                $success = false;
            }

            if ($success == true) {
                $message['success'] = 'Security has been updated successfully';
                $this->session->set_userdata($message);
                redirect('settings/security/' . $this->uri->segment(3));
            }
        }
    }

    /**
     * Change password post data
     * Firstly check validate data then updata the password
     */
    public function changePassword()
    {
        $postData = $_POST['user'];
        $user = UsersModel::userDetails($this->uri->segment(3));
        $validation = new Valitron\Validator($postData);
        $validation->rule('required', 'current_password')->message('Current password is required');
        $validation->rule('required', 'new_password')->message('New password is required');
        $validation->rule('required', 'confirm_password')->message('Confirm password is required');
        $validation->rule('lengthMin', 'new_password', 6)->message('Password must be minimum 6 characters');

        if ($postData['new_password'] != $postData['confirm_password']) {
            $validation->addInstanceRule('checkPassword', function () {
                return false;
            });
            $validation->rule('checkPassword', 'new_password')->message('New password doesn\'t match with confirm password');
        }

        if (md5($postData['current_password']) != $user['user']->password) {
            $validation->addInstanceRule('currentPassword', function () {
                return false;
            });
            $validation->rule('currentPassword', 'current_password')->message('Current password doesn\'t match');
        }

        if (!$validation->validate()) {
            $errors['errors'] = $validation->errors();
            $this->session->set_userdata($errors);
            redirect('settings/security/' . $this->uri->segment(3));
        } else {
            try {
                UsersModel::changePassword($postData, $this->uri->segment(3));
                $success = true;
            } catch (Exception $exception) {
                $exception->getMessage();
                $success = false;
            }

            if ($success == true) {
                $message['success'] = 'Password has been updated successfully';
                $this->session->set_userdata($message);
                redirect('settings/security/' . $this->uri->segment(3));
            }
        }
    }

    public function profile_picture()
    {
        var_dump(111); die();
    }

}