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

    return $serieObjectArray;
}


function storeSerie($serieName)
{
    $serie = Serie::getByName($serieName);

    if (isset($serie)) {
        echo ('El nombre de la serie ya existe');
        return false;
    }

    if (!isset($serieName)) {
        echo ('Hay algún campo vacío');
        return false;
    }
    if (Serie::insert($serieName)) {
        return true;
    } else {
        echo ('Ha ocurrido un error añadiendo la serie a BD');
        return false;
    }
}

function getSerie($serieId)
{
    return Serie::getById($serieId);
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
