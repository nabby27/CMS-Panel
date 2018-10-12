<?php
class Database {
    public static function StartUp() {
        $dbUser = 'root';
        $dbPass = 'root';
        $dbName = 'CMS';
        $host = 'localhost';
        
        $pdo = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8", $dbUser, $dbPass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        return $pdo;
    }
}