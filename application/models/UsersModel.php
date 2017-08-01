<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersModel extends CI_Model {

    /**
     * @var
     */
    private static $db;

    /**
     * UsersModel constructor.
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
           return false;
        }
    }

    /**
     * @param $uuid
     * @return mixed
     */
    public static function userDetails($uuid)
    {
        $user['user'] = self:: $db->where('uuid', $uuid)
            ->join('users_roles', 'users.id = users_roles.user_id')
            ->join('users_profile', 'users.id = users_profile.user_id')
            ->get('users')
            ->row();

        $user['address'] = self::$db->where('user_id', $user['user']->id)
            ->get('users_addresses')
            ->row();

        if ($user) {
            return $user;
        } else {
           return false;
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
           return false;
        }
    }

    /**
     * @param array $data
     * @return array
     */
    public function addUser($userID, $roleID)
    {
        $CI = &get_instance();
        $CI->load->model('Utilities');

        $userData = [
            'uuid' => $CI->Utilities->v4(),
            'username' => $_POST['user']['email_address'],
            'email_address' => $_POST['user']['email_address'],
            'password' => md5($_POST['user']['password']),
            'created' => date('Y-m-d h:i:s'),
            ];

        $userRole = [
            'user_id' => $userID,
            'role_id' => $roleID,
            'created' => date('Y-m-d h:i:s'),
        ];

        if ($userData && $userRole) {
            $this->db->insert('users', $userData);
            $this->db->insert('users_roles', $userRole);
        } else {
            return false;
        }
    }
}