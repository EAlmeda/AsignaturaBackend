<?php
 require_once('../../models/Actor.php');

/**
 * Metodo que lista los idiomas
 */
function listActors()
{
    $actorList = Actor::getAll();

    $actorObjectArray = [];
    foreach ($actorList as $actorItem) {
        $actorObject = new Actor($actorItem->getId(), $actorItem->getName(), $actorItem->getSurname(), $actorItem->getBirthDate(), $actorItem->getNationality());
        array_push($actorObjectArray, $actorObject);
    }

    return $actorList;
}