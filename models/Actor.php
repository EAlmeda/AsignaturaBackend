<?php
    require_once('../../models/Person.php');
    require_once('../../models/Db.php');

    class Actor extends Person{
        function __construct($id, $name, $surname, $birthdate, $nationality){
            parent::__construct($id, $name, $surname, $birthdate, $nationality);
        }

        public static function getAll()
        {

            $mysqli = Db::initConnectionDb();

            $query = $mysqli->query("SELECT distinct acts.person_id, person.name, person.surname, person.birth_date, person.nationality FROM acts INNER JOIN person ON person.id WHERE person.id = acts.person_id;");

            $listData = [];
            foreach ($query as $item) {
                $itemObject = new Actor($item['person_id'], $item['name'], $item['surname'], $item['birth_date'], $item['nationality']);
                array_push($listData, $itemObject);
            }
            $mysqli->close();

            return $listData;
        }
    }
?>