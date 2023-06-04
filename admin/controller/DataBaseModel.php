<?php

abstract class DataBaseModel
{
    private static $_database;

    private static function setConnexion()
    {
        self::$_database = new PDO('mysql:host=localhost;dbname=site;charset=utf8','root','root');
        self::$_database->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
    }

    protected function getConnexion()
    {
        if(self::$_database == null)
        {
            self::setConnexion();
        }
        return self::$_database;
    }
}