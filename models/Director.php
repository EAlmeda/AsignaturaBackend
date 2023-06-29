<?php
    require_once('../../models/Person.php');
    require_once('../../models/Db.php');

    class Director extends Person{
        function __construct($id, $name, $surname, $birthdate, $nationality){
            parent::__construct($id, $name, $surname, $birthdate, $nationality);
        }

        
        public static function getAll()
        {

            $mysqli = Db::initConnectionDb();

            $query = $mysqli->query("SELECT directs.person_id, person.name, person.surname, person.birth_date, person.nationality FROM directs INNER JOIN person ON person.id WHERE person.id = directs.person_id;");

            $listData = [];
            foreach ($query as $item) {
                $itemObject = new Director($item['person_id'], $item['name'], $item['surname'], $item['birth_date'], $item['nationality']);
                array_push($listData, $itemObject);
            }
            $mysqli->close();

            return $listData;
        }
    }
?>