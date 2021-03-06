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

    /**
     * @param $postData
     * @param $userID
     * @return array
     * @throws Exception
     */
    public static function create($postData, $userID)
    {
        try {
            $data = [
                'uuid' => Utilities::v4(),
                'name' => $postData['name'],
                'slug' => strtolower(str_replace(' ', '-', Utilities::generateSlugText((trim($postData['name']))))),
                'description' => $postData['description'],
                'user_id' => $userID,
                'is_locked' => 1,
                'created' => date('Y-m-d h:i:s'),
            ];

            $data = self::$db->insert('roles', $data);
            if ($data) {
                return true;
            }
        } catch (Exception $exception) {
            throw $exception;
        }

        return false;
    }

    /**
     * @param $postData
     * @param $userID
     * @return array
     * @throws Exception
     */
    public static function update($postData, $userID, $roleID)
    {
        try {
            $data = [
                'uuid' => Utilities::v4(),
                'name' => $postData['name'],
                'slug' => strtolower(str_replace(' ', '-', Utilities::generateSlugText((trim($postData['name']))))),
                'description' => $postData['description'],
                'user_id' => $userID,
                'modified' => date('Y-m-d h:i:s'),
            ];

            $data = self::$db->where('id', $roleID)->update('roles', $data);
            if ($data) {
                return true;
            }
        } catch (Exception $exception) {
            throw $exception;
        }

        return false;
    }

    /**
     * @param $uuid
     * @return bool
     * @throws Exception
     */
    public static function isRoleExist($uuid)
    {
        try {
            $roleDetails = Roles_model::details($uuid);
            $isExistuserRole = self::$db->where('users_roles.role_id', $roleDetails->id)
                ->where('roles_permissions.role_id', $roleDetails->id)
                ->join('roles_permissions', 'users_roles.role_id = roles_permissions.role_id')
                ->get('users_roles')
                ->row();
            if ($isExistuserRole) {
                return true;
            }
        } catch (Exception $exception) {
            throw $exception;
        }

        return false;
    }

    /**
     * @param $uuid
     * @return bool
     * @throws Exception
     */
    public static function delete($uuid)
    {
        try {
            $deleted = self::$db->where('uuid', $uuid)
                ->delete('roles');
            if ($deleted) {
                return true;
            }
        } catch (Exception $exception) {
            throw  $exception;
        }

        return false;
    }
}