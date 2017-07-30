<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersController extends CI_Controller
{
    /**
     * UsersController constructor.
     */
    function __construct()
    {
        parent::__construct();
    }

    /**
     *
     */
    public function create()
    {
        $formData = Users::addUser($_POST);
        var_dump($formData); die();
    }
}