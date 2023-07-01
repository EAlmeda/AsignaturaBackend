<?php
require_once('../../models/serie.php');

/**
 * Metodo que lista las series
 */
function listSeries()
{
    $serieList = Serie::getAll();

    $serieObjectArray = [];
    foreach ($serieList as $serieItem) {
        $serieObject = new Serie(
            $serieItem->getId(),
            $serieItem->getName(),
            $serieItem->getPlatforms(),
            $serieItem->getDirectors(),
            $serieItem->getActors(),
            $serieItem->getAudioLanguage(),
            $serieItem->getCaptionLanguage()
        );
        array_push($serieObjectArray, $serieObject);
    }
    
    array_push($serieObjectArray, $serieObject);

    return $serieObjectArray;
}


/**
 * Metodo que guarda una serie
 */
function storeSerie($serieName, $seriePlatforms,  $serieDirects, $serieActs, $serieAudios, $serieCaptions)
{
    $serie = Serie::getByName($serieName);

    if (isset($serie)) {
        echo ('The serie name already exists.');
        return false;
    }

    if (!isset($serieName) || !isset($seriePlatforms) || !isset($serieDirects) || !isset($serieActs) || !isset($serieAudios) || !isset($serieCaptions)) {
        echo ('There is any empty field.');
        return false;
    // }
    // if (Serie::insert($serie->getId(), $serieName, $seriePlatforms,  $serieDirects, $serieActs, $serieAudios, $serieCaptions)) {
    //     return true;
    } else {
        echo ('An error occurred adding the serie to DB');
        return false;
    }
}

function getSerie($serieId)
{
    return Serie::getById($serieId);
}

/**
 * Metodo que actualiza una serie
 */
function updateSerie($serieId, $serieName, $seriePlatforms,  $serieDirects, $serieActs, $serieAudios, $serieCaptions)
{
    $serieEdited = false;

    if (Serie::getById($serieId)) {
        if (Serie::update($serieId, $serieName, $seriePlatforms,  $serieDirects, $serieActs, $serieAudios, $serieCaptions)) {
            $serieEdited = true;
        }
    }

    return $serieEdited;
}

/**
 * Metodo que elimina una serie
 */
function deleteSerie($serieId)
{

    $serieDeleted = false;

    if (getSerie($serieId)) {
        if (Serie::delete($serieId)) {
            $serieDeleted = true;
        }
    }

    return $serieDeleted;
}
