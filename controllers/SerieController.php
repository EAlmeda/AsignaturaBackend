<?php
require_once('../../models/serie.php');

/**
 * Metodo que lista los idiomas
 */
function listSeries()
{
    $serieList = Serie::getAll();

    $serieObjectArray = [];
    // foreach ($serieList as $serieItem) {
        // $serieObject = new Serie($serieItem->getId(), $serieItem->getName());
        // array_push($serieObjectArray, $serieObject);
    // }

    return $serieList;
}

function storeSerie($serieName)
{
    // $serie = Serie::getByName($serieName);

    // if (isset($serie)) {
    //     echo ('El nombre de la plataforma ya existe');
    //     return false;
    // }

    // if (!isset($serieName)) {
    //     echo ('Hay algún campo vacío');
    //     return false;
    // }
    // if (serie::insert($serieName)) {
    //     return true;
    // } else {
    //     echo ('Ha ocurrido un error añadiendo la plataforma a BD');
    //     return false;
    // }
}

?>