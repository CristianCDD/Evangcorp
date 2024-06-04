<?php

class Conexion
{
    private static $host = "localhost";
    private static $db = "evangcorpsistem";
    private static $user = "root";
    private static $pass = "";

    static public function conectar()
    {

        $link = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db, self::$user, self::$pass);
        $link->exec("set names utf8");

        return $link;
    }
}
