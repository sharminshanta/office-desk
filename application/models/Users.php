<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Model {

    /**
     * @var
     */
    private static $db;

    /**
     * Users constructor.
     */
    function __construct()
    {
        parent::__construct();
        self::$db = &get_instance()->db;
    }

    /**
     * @param $email
     * @param $password
     * @return mixed
     */
    public static function authentication($email,$password)
    {
        $user = self:: $db->where('email_address', $email)
            ->where('password', $password)
            ->where('status', 1)
            ->get('users')
            ->row();

        if ($user) {
            return $user;
        } else {
            false;
        }
    }

    /**
     * @param $uuid
     * @return mixed
     */
    public static function userDetails($uuid)
    {
        $user = self:: $db->where('uuid', $uuid)
            ->get('users')
            ->row();

        if ($user) {
            return $user;
        } else {
            false;
        }
    }

    /**
     * @param $uuid
     * @return mixed
     */
    public static function userID($uuid)
    {
        $user = self:: $db->where('uuid', $uuid)
            ->select('id')
            ->get('users')
            ->row();

        if ($user) {
            return $user;
        } else {
            false;
        }
    }
}