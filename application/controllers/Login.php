<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();

    }

    /**
     * default page of application is login page that is always done by index method
     */
    public function index()	{
        $this->load->view('auth/login');
    }

    public function test()	{
        echo "test login";
    }
}