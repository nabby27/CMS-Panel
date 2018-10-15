<?php
class Database {
    
    public static function StartUp() {

        $pdo = new PDO(
            "mysql:host=".Settings::DB['host'].";
            dbname=".Settings::DB['name'].";
            charset=utf8", 
            Settings::DB['user'], 
            Settings::DB['pass']
        );
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        return $pdo;
    }

}
