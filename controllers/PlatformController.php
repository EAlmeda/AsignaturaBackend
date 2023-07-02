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
        echo ('The platform name already exists.');
        return false;
    }

    if (!isset($platformName)) {
        echo ('There is any empty field.');
        return false;
    }
    if (Platform::insert($platformName)) {
        return true;
    } else {
        echo ('An error occurred adding the platform to DB');
        return false;
    }
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

     if (getPlatform($platformId) && !Platform::hasSeriesLinked($platformId)) {
         if (Platform::delete($platformId)) {
             $platformDeleted = true;
         }
     }

    return $platformDeleted;
}
