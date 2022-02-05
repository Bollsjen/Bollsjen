<?php

namespace App\Database;

use \PDO;

class DBConnection {

    private static $host = "127.0.0.1";
    private static $db = "bollsjen";
    private static $username = "root";
    private static $password = "";

    private static function connect(){
        $pdo = new PDO("mysql:host=".self::$host.";dbname=".self::$db.";charset=utf8", self::$username, self::$password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }

    public static function select($query, $params = array()){
        $statement = self::connect()->prepare($query);
        $statement->execute($params);
        $data = $statement->fetchAll();
        return $data;
    }

}