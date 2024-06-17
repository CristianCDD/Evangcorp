<?php

class Conexion
{
    private static $host = "68.66.226.89";
    private static $db = "evang_evangcorpsistem";
    private static $user = "evang_sistemaEvang";
    private static $pass = "4gUkuLC9DmWz";

    static public function conectar()
    {

        $link = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$db, self::$user, self::$pass);
        $link->exec("set names utf8");

        return $link;
    }
}
