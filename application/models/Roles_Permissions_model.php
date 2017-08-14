<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles_Permissions_model extends CI_Model
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

    /*
     * Assign permission for each role
     */
    public static function add()
    {
        $role = $_POST['permission']['role_id'];
        $permissions = $_POST['permission']['permission_id'];

        foreach($permissions as $permissionID){
            $entry = self::$db->set('role_id', $role)
                ->set('permission_id', $permissionID)
                ->insert('roles_permissions');
        }

        if ($entry) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return mixed
     */
    public static function getAssignPermissions($roleID)
    {
        $permissions = self::$db->where('role_id', $roleID)
            ->select('permission_id')
            ->get('roles_permissions')
            ->result();

        return $permissions;
    }

    /**
     * @return mixed
     */
    public static function getAssignPermissionsName($permissionsID = [])
    {
        $permissions = self::$db->where('id', $permissionsID)
            ->get('permissions')
            ->row();

        return $permissions;
    }
}