<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller
{
    public function index()
    {
        $isPermit = Utilities::is_permit('office-settings');

        if ($isPermit == null) {
           redirect('users');
        } else {
            echo '<h1>Yeah! You are permitted.</h1>';
        }
    }
}