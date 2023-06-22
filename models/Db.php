<?php

class Db{
    public static function initConnectionDb()
    {
        $db_host = 'localhost';
        $db_user = 'root';
        $db_password = 'root';
        $db_db = 'actividad1';
    
        $mysqli = @new mysqli(
            $db_host,
            $db_user,
            $db_password,
            $db_db
        );
        if ($mysqli->connect_error) {
            die('Error: ' . $mysqli->connect_error);
        }
    
        return $mysqli;
    }
}





?>