<?php
require_once('../../models/serie.php');


function getMockSerie() {
    $platforms = [];
    array_push($platforms, new Platform(1, "Amazon Prime Video"));
    array_push($platforms, new Platform(2, "Netflix"));
    $directors = [];
    array_push($directors, new Person(2, "Charlie", "Brooker", 1996-04-16, "British"));
    array_push($directors, new Person(2, "Charlie", "Brooker", 1996-04-16, "British"));
    $actors = [];
    array_push($actors, new Person(2, "Charlie", "Brooker", 1996-04-16, "British"));
    array_push($actors, new Person(2, "Charlie", "Brooker", 1996-04-16, "British"));
    $audios = [];
    array_push($audios, new Language(1, "English", "EN"));
    $captions = [];
    array_push($captions, new Language(2, "Spanish", "ES"));

    $serieObject = new Serie(
        1,
        "Casa de papel",
        $platforms,
        $directors,
        $actors,
        $audios,
        $captions,
    );

    return $serieObject;
}
/**
 * Metodo que lista las series
 */
function listSeries()
{
    // $serieList = Serie::getAll();

    $serieObjectArray = [];
    // foreach ($serieList as $serieItem) {
    //     $serieObject = new Serie(
    //         $serieItem->getId(),
    //         $serieItem->getName(),
    //         $serieItem->getPlatforms(),
    //         $serieItem->getDirectors(),
    //         $serieItem->getActors(),
    //         $serieItem->getAudioLanguage(),
    //         $serieItem->getCaptionLanguage()
    //     );
    //     array_push($serieObjectArray, $serieObject);
    // }
    
    array_push($serieObjectArray, getMockSerie());

    return $serieObjectArray;
}


function storeSerie($serieName, $seriePlatforms,  $serieDirects, $serieActs, $serieAudios, $serieCaptions)
{
    $serie = Serie::getByName($serieName);

    if (isset($serie)) {
        echo ('El nombre de la serie ya existe');
        return false;
    }

    if (!isset($serieName)) {
        echo ('Hay algún campo vacío');
        return false;
    // }
    // if (Serie::insert($serie->getId(), $serieName, $seriePlatforms,  $serieDirects, $serieActs, $serieAudios, $serieCaptions)) {
    //     return true;
    } else {
        echo ('Ha ocurrido un error añadiendo la serie a BD');
        return false;
    }
}

function getSerie($serieId)
{
    return Serie::getById($serieId);
}

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
