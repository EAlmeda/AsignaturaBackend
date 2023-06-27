<?php
    echo('test2');
    require_once('../../models/Db.php');

    

    function listPlatforms() {
        $mysqli = Db::initConnectionDb();
        $platformList = $mysqli->query("SELECT * FROM platform");

        $platformObjectArray = [];
        foreach($platformList as $platformItem){
            echo('a');
            $platformObject = new Platform($platformItem['id'], $platformItem['name']);
            array_push($platformObjectArray, $platformObject);
        }
        $mysqli->close();

        return $platformObjectArray;
    }

    function storePlatform ($platformName) {
        $mysqli = Db::initConnectionDb();

        $platformCreated = false;
        //TODO: Comprobar todas las validaciones
        if(isset($platformName) && getPlatformByName($platformName)) {
            if($resultadoInsert = $mysqli-> query("INSERT INTO platform (name) VALUES ('$platformName')")) {
                $platformCreated = true;
            }
        } else {
            return 'No se ha enviado la información correcta';
        }
        
        $mysqli->close();

        return $platformCreated;
    }

    function getPlatform ($platformId) {
        $mysqli = Db::initConnectionDb();

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
        $mysqli = Db::initConnectionDb();

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
        $mysqli = Db::initConnectionDb();

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
        $mysqli = Db::initConnectionDb();

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