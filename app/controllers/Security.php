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
        $postData = $_POST['email_address'];
        var_dump($postData); die();
    }


}