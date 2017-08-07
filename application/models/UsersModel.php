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
    public static function addUser()
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

        /**
         * check user's email address as if duplicate email address is not permitted
         * to database
         */
        $checkUser = self::$db->where('email_address', $userData['email_address'])
                    ->select('id')
                    ->get('users')
                    ->row();

        if($checkUser == null) {
            if ($userData) {
                self::$db->insert('users', $userData);
                $lastInsertID = self::$db->insert_id();
            } else {
                return false;
            }
        }

        $userProfileData = [
          'user_id' => $lastInsertID,
          'first_name' => $_POST['user']['first_name'],
          'last_name' => $_POST['user']['last_name'],
          'created' => date('Y-m-d h:i:s'),
        ];

        /**
         *check user as if duplicate user is not permitted
         * to database
         */
        if($checkUser == null) {
            if ($userProfileData) {
                self::$db->insert('users_profile', $userProfileData);
            } else {
                return false;
            }
        }

        $userRole = [
            'user_id' => $lastInsertID,
            'role_id' => $_POST['user']['role_id'],
            'created' => date('Y-m-d h:i:s'),
        ];

        /**
         * check user's id as if duplicate user is not permitted
         * to database
         */
        if($checkUser == null) {
            if($userRole) {
                self::$db->insert('users_roles', $userRole);
            } else {
                return false;
            }
        }

       return $lastInsertID;
    }


    /**
     * @param $id
     * @return bool
     * Get uuid of a user that is created at this moment for his details information
     * Returns uuid of last created user
     */
    public static  function userInfo($id)
    {
        $info = self::$db->where('id', $id)
            ->select('uuid')
            ->get('users')
            ->row();

        if($info) {
           return $info;
        } else {
            return false;
        }
    }

    /**
     * @param $emailAddress
     * @return bool
     */
    public static function getEmailAddress($emailAddress)
    {
        $emailAddress = self::$db->where('email_address', $emailAddress)
            ->select('email_address')
            ->get('users')
            ->row();

        if($emailAddress) {
            return true;
        } else{
            return false;
        }
    }

    /**
     * @return mixed
     * All users count
     */
    public static function record_count() {
        return self::$db->count_all("users");
    }

    /**
     * Fetching all users
     */
    public static function getUsers()
    {
        $users = self::$db
            ->get('users')
            ->result();

        if($users) {
            return $users;
        }else {
            return false;
        }
    }

    /**
     * @param $limit
     * @param $start
     * @return array|bool
     * Test Pagination
     */
    public static function getUsers1($limit, $start)
    {
        self::$db->limit($limit, $start);
        $query = self::$db
            ->get('users');

        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = $row;
            }
            return $data;
        }
        return false;
    }
}