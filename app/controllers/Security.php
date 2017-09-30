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
                    $link = 'http://localhost:8008/security/passwordReset?email='. $email . '&password_token='.$uniqidId;
                    var_dump($link); die();
                }
            }else {
                $message['error'] = 'Email address hasn\'t yet registered';
                $this->session->set_userdata($message);
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
                $user = UsersModel::getUserByPasswordToken($token);
                if(isset($user) && $user) {
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
        $content['placeholder'] = $this->load->view('emails/reset_pwd', '', true);
        $this->load->view('emails/default', $content);
    }
}