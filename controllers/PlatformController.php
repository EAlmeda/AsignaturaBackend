<?php
    require_once('.../../models/Platform.php');

    function initConnectionDb()
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

    function listPlatforms() {
        $mysqli = initConnectionDb();
        $platformList = $mysqli->query("SELECT * FROM platforms");

        $platformObjectArray = [];
        foreach($platformList as $platformItem){
            $platformObject = new Platform($platformItem['id'], $platformItem['name']);
            array_push($platformArray, $platformObjectArray);
        }
        $mysqli->close();

        return $platformObjectArray;
    }

    function storePlatform ($platformName) {
        $mysqli = initConnectionDb();

        $platformCreated = false;
        //TODO: Comprobar todas las validaciones
        if(isset($platformName) && getPlatformByName($platformName)) {
            if($resultadoInsert = $mysqli-> query("INSERT INTO platforms (name) VALUES ('$platformName')")) {
                $platformCreated = true;
            }
        } else {
            return 'No se ha enviado la información correcta';
        }
        
        $mysqli->close();

        return $platformCreated;
    }

    function getPlatform ($platformId) {
        $mysqli = initConnectionDb();

        $platformData = $mysqli->query("SELECT * FROM platform WHERE id=$platformId");
        $platformObject = null;
        foreach($platformData as $platformItem){
            $platformObject = new Platform($platformItem['id'], $platformItem['name']);
            break;
        }
        
        $mysqli->close();

        return $platformObject;
    }

    function getPlatformByName ($platformName) {
        $mysqli = initConnectionDb();

        $platformData = $mysqli->query("SELECT * FROM platform WHERE name=$platformName");
        $platformObject = null;
        foreach($platformData as $platformItem){
            $platformObject = new Platform($platformItem['id'], $platformItem['name']);
            break;
        }
        
        $mysqli->close();

        return $platformObject;
    }

    function updatePlatform ($platformId, $platformName) {
        $mysqli = initConnectionDb();

        $platformEdited = false;
        
        if(getPlatform($platformId)) {
            if($resultadoUpdate = $mysqli->query("UPDATE platforms SET name='$platformName' where id=$platformId")) {
                $platformEdited = true;
            }
        }

        $mysqli->close();

        return $platformEdited;
    }

    function deletePlatform ($platformId) {
        $mysqli = initConnectionDb();

        $platformDeleted = false;
        
        if(getPlatform($platformId)) {
            if($resultado = $mysqli->query("DELETE FROM platforms where id=$platformId")) {
                $platformDeleted = true;
            }
        }

        $mysqli->close();

        return $platformDeleted;
    }
?>