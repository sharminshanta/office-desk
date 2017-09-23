<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Permissions_model extends CI_Model
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
     * Fetch all permissions
     */
    public static function getPermissions()
    {
        $result = [];

        try {
            $result = self::$db
                ->get('permissions')
                ->result();

            if ($result) {
                return $result;
            }
        } catch (Exception $exception) {
            throw $exception;
        }

        return false;
    }
}