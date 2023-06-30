<?php
require_once('../../models/person.php');

/**
 * Metodo que lista las personas
 */
function listPeople()
{
    $personList = Person::getAll();

    $peopleObjectArray = [];
    foreach ($personList as $personItem) {
        $personObject = new Person(
            $personItem->getId(),
            $personItem->getName(),
            $personItem->getSurname(),
            $personItem->getBirthDate(),
            $personItem->getNationality()
        );
        array_push($peopleObjectArray, $personObject);
    }

    return $peopleObjectArray;
}


function storePerson($name, $surname, $birthdate, $nationality)
{
    if (!isset($name) || !isset($surname) || !isset($birthdate) || !isset($nationality)) {
        return false;
    }
    if (Person::insert($name, $surname, $birthdate, $nationality)) {
        return true;
    } else {
        echo ('Ha ocurrido un error añadiendo la persona a BD');
        return false;
    }
}

function getPerson($personId)
{
    return Person::getById($personId);
}

function deletePerson($personId)
{
    $personDeleted = false;

    if (getPerson($personId)) {
        if (Person::delete($personId)) {
            $personDeleted = true;
        }
    }

    return $personDeleted;
}

function updatePerson($personId, $personName, $personSurname, $personBirthDate, $personNationality)
{
    $personUpdated = false;
    if (getPerson($personId)){
        if (Person::update($personId, $personName, $personSurname, $personBirthDate, $personNationality)){
            $personUpdated = true;
        }
    }

    return $personUpdated;
    
}
