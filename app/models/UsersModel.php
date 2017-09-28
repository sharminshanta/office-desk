<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UsersModel extends CI_Model {

    /**
     * @var
     */
    private static $db;
    /**
     * @var
     */
    private static $session;

    /**
     * UsersModel constructor.
     */
    function __construct()
    {
        parent::__construct();
        self::$db = &get_instance()->db;
        self::$session = &get_instance()->session;
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
            ->where('is_visible', 1)
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
        $user['profile'] = self:: $db->where('uuid', $uuid)
            ->join('users_roles', 'users.id = users_roles.user_id')
            ->join('users_profile', 'users.id = users_profile.user_id')
            ->get('users')
            ->row();

        $user['address'] = self::$db->where('user_id', $user['profile']->user_id)
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
            ->order_by('id', 'desc')
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

    /**
     * @param $userID
     * @return bool|string
     */
    public static function updateProfile($userID)
    {
        $user = self::$db->where('user_id', $userID)
            ->select('user_id')
            ->get('users_profile')
            ->row();

        if(!$user) {
            return "This is not a valid user";
        }

        $profileData = [
            'first_name' => $_POST['profile']['first_name'],
            'last_name' => $_POST['profile']['last_name'],
            'family_name' => $_POST['profile']['family_name'],
            'nick_name' => $_POST['profile']['family_name'],
            'title' => $_POST['profile']['title'],
            'gender' => $_POST['profile']['gender'],
            'date_of_birth' => date($_POST['profile']['date_of_birth']),
            'timezone' => $_POST['profile']['timezone'],
            'language' => $_POST['profile']['language'],
            'modified' => date('Y-m-d h:i:s'),
        ];

        if ($profileData) {
            self::$db->where('user_id', $userID);
            self::$db->update('users_profile', $profileData);
        } else {
            return false;
        }

        $userData = [
            'modified' => date('Y-m-d h:i:s'),
        ];

        if ($userData) {
            self::$db->where('id', $userID);
            self::$db->update('users', $userData);
        }else{
            return false;
        }
    }

    /**
     * @param $uuid
     */
    public static function updateAddress($uuid)
    {
        $user = self::$db->where('uuid', $uuid)
            ->get('users')
            ->row();

        if ($user) {
            $isAddress = self::$db->where('user_id', $user->id)
                ->get('users_addresses')
                ->row();

            if ($isAddress == null) {
                $formData = $_POST['address'];

                $addressData = [
                    'user_id' => $user->id,
                    'street' => $formData['street'],
                    'street_secondary' => $formData['street_secondary'],
                    'city' => $formData['city'],
                    'state' => $formData['state'],
                    'postal_code' => $formData['postal_code'],
                    'country' => $formData['country'],
                    'phone' => $formData['phone'],
                    'fax' => $formData['fax'],
                    'created' => date("Y-m-d h:i:s"),
                ];

                if ($addressData) {
                    self::$db->insert('users_addresses', $addressData);
                }
            } else {
                $formData = $_POST['address'];

                $addressData = [
                    'user_id' => $user->id,
                    'street' => $formData['street'],
                    'street_secondary' => $formData['street_secondary'],
                    'city' => $formData['city'],
                    'state' => $formData['state'],
                    'postal_code' => $formData['postal_code'],
                    'country' => $formData['country'],
                    'phone' => $formData['phone'],
                    'fax' => $formData['fax'],
                    'modified' => date("Y-m-d h:i:s"),
                ];

                if ($addressData) {
                    self::$db->where('user_id', $user->id)->update('users_addresses', $addressData);
                    $userData = [
                        'created' => date("Y-m-d h:i:s"),
                    ];

                    self::$db->where('id', $user->id)->update('users', $userData);
                }
            }
        } else {
            return false;
        }
    }

    /**
     * @param $uuid
     */
    public static function accessControll($uuid)
    {

        $userData = [
            'status' => $_POST['users']['status'],
            'is_visible' => $_POST['users']['is_visible'],
            'modified' =>  date("Y-m-d h:i:s"),
        ];

        $roleData = [
            'role_id' =>  $_POST['roles']['role_id'],
            'modified' =>  date("Y-m-d h:i:s"),
        ];

        $isUser = self::$db->where('uuid', $uuid)
            ->get('users')
            ->row();

        if ($isUser) {
            try{
                self::$db->where('id', $isUser->id)->update('users', $userData);
            }catch (Exception $exception) {
                throw $exception;
            }

            try{
                self::$db->where('user_id', $isUser->id)->update('users_roles', $roleData);
            }catch (Exception $exception) {
                throw $exception;
            }
        }
    }

    /**
     * @param $uuid
     */
    public static function deleteUser($uuid)
    {
        try {
            $delete = self::$db->where('uuid', $uuid)->delete('users');
            return $delete;
        } catch (Exception $exception) {
            throw $exception;
        }

    }

    /**
     * @param $postData
     * @param $uuid
     * @return bool
     * @throws Exception
     */
    public static function securityQuestion($postData, $uuid)
    {
        try{
            $user = self::$db->where('uuid', $uuid)
                ->select('id')
                ->get('users')
                ->row();

            if ($user) {
                $postData = [
                  'security_questions_one' => $postData['security_questions_one'],
                  'security_questions_two' => $postData['security_questions_two'],
                  'security_questions_one_answer' => $postData['security_questions_one_answer'],
                  'security_questions_two_answer' => $postData['security_questions_two_answer']
                ];

                if ($postData) {
                    try {
                        self::$db->where('user_id', $user->id)->update('users_profile', $postData);
                        return true;
                    } catch (Exception $exception) {
                        throw $exception;
                    }
                }
            }

            return false;
        } catch (Exception $exception) {
            throw  $exception;
        }
    }

    /**
     * @param $postData
     * @param $uuid
     * @return bool
     * @throws Exception
     */
    public static function changePassword($postData, $uuid)
    {
        try{
            $user = self::$db->where('uuid', $uuid)
                ->select('uuid')
                ->get('users')
                ->row();

            if ($user) {
                $postData = [
                    'password' => md5($postData['new_password']),
                ];

                if ($postData) {
                    try {
                        self::$db->where('uuid', $user->uuid)->update('users', $postData);
                        return true;
                    } catch (Exception $exception) {
                        throw $exception;
                    }
                }
            }

            return false;
        } catch (Exception $exception) {
            throw  $exception;
        }
    }

    /**
     * @param $uuid
     * @param $imagePath
     * @return bool
     * @throws Exception
     */
    public static function profilePicChange($uuid, $imagePath)
    {
        try{
            $user = self::$db->where('uuid', $uuid)
                ->select('id')
                ->get('users')
                ->row();

            if ($user) {
                $postData = [
                    'picture' => $imagePath,
                ];

                if ($postData) {
                    try {
                        self::$db->where('user_id', $user->id)->update('users_profile', $postData);
                    } catch (Exception $exception) {
                        throw $exception;
                    }
                }
            }

            return false;
        } catch (Exception $exception) {
            throw  $exception;
        }
    }
}