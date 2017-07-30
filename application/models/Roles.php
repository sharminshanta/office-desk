<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Roles extends CI_Model
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
    public static function getName($id)
    {
        $role = self::$db->where('id', $id)
            ->select(['slug', 'name'])
            ->get('roles')
            ->row();

        if($role) {
            return $role;
        } else {
            false;
        }
    }

    public static function getRoles()
    {
        $roles = self::$db
            ->get('roles')
            ->result();

        return $roles;
        //var_dump($roles); die();

    }
}