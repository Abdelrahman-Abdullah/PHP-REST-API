<?php

class DatabaseConnection
{

    const LOCALHOST = "mysql:host=localhost";
    const DB_NAME = "rest-api";
    const USER_NAME = "abdelrahmanabdullah";
    const USER_PASS = "123456";
    private static $OPTIONS = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    public static function Connect()
    {
        try {
            return new PDO(
                self::LOCALHOST .";dbname=".self::DB_NAME ,
                self::USER_NAME ,
                self::USER_PASS ,
                static::$OPTIONS
            );
        }catch (PDOException $e)
        {
            echo "Error Happened {$e->getMessage()}";
        }

    }


}