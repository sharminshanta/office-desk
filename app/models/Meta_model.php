<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meta_model extends CI_Model {


    /**
     * @var
     */
    private static $db;

    /**
     * @var
     */
    private static $session;

    /**
     * @var string
     */
    private static $table;

    /**
     * UsersModel constructor.
     */
    function __construct()
    {
        parent::__construct();
        self::$db = &get_instance()->db;
        self::$session = &get_instance()->session;
        self::$table = 'meta';
    }

    /**
     * @param $key
     * @return int
     * @throws Exception
     */
    public static function metaCount($key)
    {
        $result = 0;

        try {
            $result = self::$db->count_all(self::$table);
            if ($result) {
                return $result;
            }
        } catch (Exception $exception) {
            throw $exception;
        }

        return $result;
    }

    /**
     * @param $key
     * @param $value
     * @return array
     * @throws Exception
     */
    public static function create($key, $value)
    {
        $result = [];

        $postData = [
            'key' => $key,
            'value' => $value
        ];
        try {
            $result = self::$db->insert(self::$table, $postData);
            if ($result) {
                return $result;
            }
        } catch (Exception $exception) {
            throw $exception;
        }

        return $result;
    }

    /**
     * @param $key
     * @param $value
     * @return array
     * @throws Exception
     */
    public static function update($key, $value)
    {
        $result = [];

        $postData = [
            'key' => $key,
            'value' => $value
        ];
        try {
            $result = self::$db->where('key', $postData['key'])->get(self::$table)->row();
            $metaID = (int)$result->id;
            $result = self::$db->where('id', $metaID)->update(self::$table, $postData);
            if ($result) {
                return $result;
            }
        } catch (Exception $exception) {
            throw $exception;
        }

        return $result;
    }

    /**
     * @param $key
     * @return bool
     * @throws Exception
     */
    public static function getMeta($key)
    {
        $metaData = [];

        try {
           $metaData = self::$db
               ->where('key', $key)
               ->get(self::$table)
                ->row();

           if ($metaData) {
               return $metaData->value;
           }
        } catch (Exception $exception) {
            throw $exception;
        }

        return false;
    }
}