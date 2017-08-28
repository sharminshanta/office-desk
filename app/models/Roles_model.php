<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles_model extends CI_Model
{
    /**
     * @var
     */
    private static $db;

    /**
     * Roles constructor.
     */
    function __construct()
    {
        parent::__construct();
        self::$db = &get_instance()->db;
    }

    /**
     * @param $id
     */
    public static function getName($roleID)
    {
        $role = self::$db->where('id', $roleID)
            ->select(['slug', 'name'])
            ->get('roles')
            ->row();

        if($role) {
            return $role;
        } else {
            return false;
        }
    }

    /**
     * @return mixed
     */
    public static function getRoles()
    {
        $roles = self::$db
            ->order_by('id', 'desc')
            ->get('roles')
            ->result();

        if($roles) {
            return $roles;
        }else{
            return false;
        }
    }

    /**
     * @param $roleUUID
     * @return bool
     */
    public static function details($roleUUID)
    {
        $role = self::$db->where('uuid', $roleUUID)
            ->get('roles')
            ->row();

        if($role) {
            return $role;
        }else{
            return false;
        }
    }

    /**
     * @param $roleName
     * @return array
     * @throws Exception
     */
    public static function checkRoleName($roleName)
    {
        try {
            $result = self::$db->where('name', $roleName)
                ->get('roles')
                ->row();
            if ($result) {
                return true;
            }
        } catch (Exception $exception) {
            throw $exception;
        }

        return false;
    }

    public static function create($postData, $userID)
    {
        $data = [];
        try {
            $data = [
                'uuid' => Utilities::v4(),
                'name' => $postData['name'],
                'slug' => strtolower(str_replace(' ', '-', Utilities::generateSlugText((trim($postData['name']))))),
                'description' => $postData['description'],
                'user_id' => $userID,
                'created' => date('Y-m-d h:i:s'),
            ];

            $data = self::$db->insert('roles', $data);
            if ($data) {
                return $data;
            }
        } catch (Exception $exception) {
            throw $exception;
        }

        return $data;
    }
}