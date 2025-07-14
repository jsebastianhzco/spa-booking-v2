<?php

class Database
{
    public static function StartUp()
    {
        $pdo = new PDO("mysql:host=localhost;dbname=acupuncture_reservations","acupuncture_wp1","N^pD5e3LBZ#@(vUs#h)84&*1");
        return $pdo;
    }
}

?>
