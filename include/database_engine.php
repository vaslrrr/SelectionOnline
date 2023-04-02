<?php

class DB
{

    private static $DB_HOST = "localhost";
    private static $DB_USER = "root";
    private static $DB_PASS = "";
    private static $DB_NAME = "selection";

    private static $connection = null;

    public static function init()
    {
        self::$connection = new PDO('mysql:host=' . self::$DB_HOST . ';dbname=' . self::$DB_NAME, self::$DB_USER, self::$DB_PASS, array(PDO::ATTR_PERSISTENT => true));
        self::$connection->exec("set names utf8mb4");
        self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        self::$connection->setAttribute(PDO::ATTR_EMULATE_PREPARES, true);
    }

    public static function query($sql, $data = [])
    {
        if (self::$connection == null) {
            return null;
        }

        $statement = self::$connection->prepare($sql);
        $statement->execute($data);
        $statement->closeCursor();
    }

    public static function fetch($sql, $data = [])
    {
        if (self::$connection == null) {
            return null;
        }

        $statement = self::$connection->prepare($sql);
        $statement->execute($data);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        $statement->closeCursor();

        return $result;
    }

    public static function fetchAll($sql, $data = [])
    {
        if (self::$connection == null) {
            return null;
        }

        $statement = self::$connection->prepare($sql);
        $statement->execute($data);
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        $statement->closeCursor();

        return $result;
    }

    public static function insert($table_name, $data, $ignore = false)
    {
        if (self::$connection == null) {
            return null;
        }

        if (empty($data)) {
            return false;
        }

        $keys = array_keys($data);

        if (empty($keys)) {
            return;
        }

        $colmns = "`" . implode("`, `", $keys) . "`";
        $vls = ":" . implode(", :", $keys);

        if ($ignore == true) {
            $statement = self::$connection->prepare("INSERT IGNORE INTO $table_name($colmns) VALUES($vls)");
        } else {
            $statement = self::$connection->prepare("INSERT INTO $table_name($colmns) VALUES($vls)");
        }
        $statement->execute($data);
        $statement->closeCursor();
    }

    public static function lastInsertID()
    {
        if (self::$connection == null) {
            return null;
        }

        return self::$connection->lastInsertId();
    }
}