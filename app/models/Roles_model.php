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
}