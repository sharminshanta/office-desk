<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Security extends CI_Controller
{
    /**
     * Security constructor.
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Forgot password view route
     */
    public function index()
    {
        $content['header'] = $this->load->view('emails/header', '', true);
        $content['placeholder'] = $this->load->view('emails/main', '', true);
        $this->load->view('emails/default', $content);
    }

    /**
     * Forgot password post route
     */
    public function forgotpwd()
    {
        $email = $_POST['email_address'];

        try {
            $userDetails = UsersModel::getUserByEmail($email);

            if ($userDetails) {
                $uniqidId = Utilities::v4();
                $data = [
                    'password_token' => $uniqidId
                ];

                $update = UsersModel::updateUserByEmail($userDetails->uuid, $data);
                if ($update) {
                    $link = 'http://besofty.com/security/passwordReset?email='. $email . '&password_token='.$uniqidId;
                    var_dump($link); die();
                }
            }else {
                $this->session->set_flashdata('error', 'Email address hasn\'t yet registered');
                redirect('security');
            }
        } catch (Exception $exception) {
            $exception->getMessage();
        }
    }

    /**
     * Passwordreset view route
     */
    public function passwordReset()
    {
        $token = $this->input->get('password_token', TRUE);

        try {
            if(isset($token)) {
                $user['user'] = UsersModel::getUserByPasswordToken($token);
                if(isset($user['user']) && $user['user']) {
                    $message['success'] = 'You can reset your password here';
                    $this->session->set_userdata($message);
                } else {
                    $message['error'] = 'Sorry, Unauthorised access';
                    $this->session->set_userdata($message);
                    //redirect($this->uri->uri_string());
                }
            }
        } catch (Exception $exception) {
            $exception->getMessage();
        }

        $content['header'] = $this->load->view('emails/header', '', true);
        $content['placeholder'] = $this->load->view('emails/reset_pwd', $user, true);
        $this->load->view('emails/default', $content);
    }

    /**
     * Password reset post route
     */
    public function resetPassword()
    {
        $token = $_POST['password_token'];
        $user = UsersModel::getUserByPasswordToken($token);
        $referrerLink = 'http://localhost:8008/security/passwordReset?email='. $user->email_address . '&password_token=' . $user->password_token;

        $validation = new Valitron\Validator($_POST);
        $validation->rule('required', 'new_password')->message('New password is required');
        $validation->rule('lengthMin', 'new_password', 6)->message('Password must be minimum 6 characters');
        $validation->rule('required', 'confirm_password')->message('Confirm password is required');

        if ($_POST['new_password'] != $_POST['confirm_password']) {
            $validation->addInstanceRule('checkPassword', function () {
                return false;
            });
            $validation->rule('checkPassword', 'new_password')->message('New password doesn\'t match with confirm password');
        }

        /**
         * If post data is not valid then redirect to referrer link
         */
        if (!$validation->validate()) {
            $errors['errors'] = $validation->errors();
            $this->session->set_userdata($errors);
            redirect($referrerLink);
        } else {
            try {
                UsersModel::resetPassword($_POST);
                $success = true;
            } catch (Exception $exception) {
                $exception->getMessage();
                $success = false;
            }

            if ($success == true) {
                $message['success'] = 'Password has been updated successfully';
                $this->session->set_userdata($message);
                redirect('login');
            }
        }
    }
}