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
        //$permissionIDs = implode(',', $_POST['permission']['permission_id']);
        //$mainIDs = explode(',', $permissionIDs);


        $formData = [
            'role_id' => $_POST['permission']['role_id'],
            'permission_id' => implode(',', $_POST['permission']['permission_id']),
        ];

        var_dump($formData); die();

        if ($formData) {
            self::$db->insert('roles_permissions', $formData);
        } else {
            return false;
        }
    }
}