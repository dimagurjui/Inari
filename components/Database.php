<?php

class Database
{
    private static $instance = null;

    public static $db = null;

    private function __construct()
    {

    }

    private function __clone()
    {

    }

    public static function getInstance()
    {
        if(self::$instance === null)
        {
            self::$instance = new self();
            self::$db = self::getConnection();
        }
        return self::$instance->getDb();
    }

    private function getDb()
    {
        return self::$db;
    }

    private static function getConfig()
    {
        // Get configs:
        $dbconfigPath = ROOT.'/config/dbconfig.php';
        return include_once($dbconfigPath);
    }

    private static function getConnection()
    {
        $dbconfig = self::getConfig();
        $dsn = "mysql:host={$dbconfig['host']};dbname={$dbconfig['dbname']}";
        $encoding = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        return new PDO($dsn, $dbconfig['user'], $dbconfig['password'], $encoding);
    }
}