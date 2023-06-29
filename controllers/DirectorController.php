<?php
 require_once('../../models/Director.php');

/**
 * Metodo que lista los idiomas
 */
function listDirectors()
{
    $directorList = Director::getAll();

    $directorObjectArray = [];
    foreach ($directorList as $directorItem) {
        $directorObject = new director($directorItem->getId(), $directorItem->getName(), $directorItem->getSurname(), $directorItem->getBirthDate(), $directorItem->getNationality());
        array_push($directorObjectArray, $directorObject);
    }

    return $directorList;
}