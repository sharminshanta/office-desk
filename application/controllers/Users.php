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
     *
     */
    public function create()
    {
        $formData = UsersModel::addUser($_POST);
        var_dump($formData); die();
    }
}