<?php

class Database
{
    private static $connection = null;

    public static function getConnection()
    {
        if (self::$connection === null) {
            $host = 'localhost';
            $dbname = 'workshop_poo';
            $username = 'root';
            $password = ''; 

            try {
                self::$connection = new PDO("mysql:host=$host;port=3307;dbname=$dbname;", $username, $password);
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "it's not working!!!!";
                die("Erreur connexion : " . $e->getMessage());
            }
        }

        return self::$connection;
    }
}

