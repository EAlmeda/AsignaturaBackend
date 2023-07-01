<?php
 require_once('../../models/Language.php');

/**
 * Metodo que lista los idiomas
 */
function listLanguages()
{
    $languageList = Language::getAll();

    $languageObjectArray = [];
    foreach ($languageList as $languageItem) {
        $languageObject = new Language($languageItem->getId(), $languageItem->getName(), $languageItem->getISOCode());
        array_push($languageObjectArray, $languageObject);
    }

    return $languageList;
}

function getLanguageData($languageId){
    return Language::getById($languageId);
}

/**
 * Metodo que guarda un idioma
 */
function storeLanguage($languageName, $languageIso)
{
    $language = language::getByName($languageName);

    if (isset($language)) {
        echo ('The language name already exists.');
        return false;
    }

    if (!isset($languageName) || !isset($languageIso)) {
        echo ('There is any empty field.');
        return false;
    }
    if (language::insert($languageName, $languageIso)) {
        return true;
    } else {
        echo ('An error occurred adding the language to DB');
        return false;
    }
}

/**
 * Metodo que actualiza un idioma
 */
function updateLanguage($languageId, $languageName, $languageIso)
{
    $languageEdited = false;

    if (language::getById($languageId)) {
        if (language::update($languageId,$languageName,$languageIso)) {
            $languageEdited = true;
        }
    }

    return $languageEdited;
}

/**
 * Metodo que elimina un idioma
 */
function deleteLanguage($languageId)
{
    $languageDeleted = false;

    if (Language::getById($languageId) && !Language::hasAudiosLinked($languageId) && !Language::hasCaptionsLinked($languageId)) {
        if (Language::delete($languageId)) {
            $languageDeleted = true;
        }
    }

    return $languageDeleted;
}

?>