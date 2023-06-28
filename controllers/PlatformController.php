<?php
require_once('../../models/Platform.php');

/**
 * Metodo que lista las plataformas
 */
function listPlatforms()
{
    $platformList = Platform::getAll();

    $platformObjectArray = [];
    foreach ($platformList as $platformItem) {
        $platformObject = new Platform($platformItem->getId(), $platformItem->getName());
        array_push($platformObjectArray, $platformObject);
    }

    return $platformList;
}

function storePlatform($platformName)
{
    $platform = Platform::getByName($platformName);

    if (isset($platform)) {
        echo ('El nombre de la plataforma ya existe');
        return false;
    }

    if (!isset($platformName)) {
        echo ('Hay algún campo vacío');
        return false;
    }
    if (Platform::insert($platformName)) {
        return true;
    } else {
        echo ('Ha ocurrido un error añadiendo la plataforma a BD');
        return false;
    }
}

function getPlatformByName($platformName)
{
    $mysqli = Db::initConnectionDb();

    $platformData = $mysqli->query("SELECT * FROM platform WHERE name=$platformName");
    $platformObject = null;
    foreach ($platformData as $platformItem) {
        $platformObject = new Platform($platformItem['id'], $platformItem['name']);
        break;
    }

    $mysqli->close();

    return $platformObject;
}

function updatePlatform($platformId, $platformName)
{
    $platformEdited = false;

    if (Platform::getById($platformId)) {
        if (Platform::update($platformId,$platformName)) {
            $platformEdited = true;
        }
    }

    return $platformEdited;
}
function getPlatform($platformId){
    return Platform::getById($platformId);
}

function deletePlatform($platformId)
{

    $platformDeleted = false;

     if (getPlatform($platformId)) {
         if (Platform::delete($platformId)) {
             $platformDeleted = true;
         }
     }

    return $platformDeleted;
}
