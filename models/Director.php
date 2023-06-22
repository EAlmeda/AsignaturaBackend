<?php

    class Director extends Person{
        function __construct($id, $name, $surname, $birthdate, $nationality){
            parent::__construct($id, $name, $surname, $birthdate, $nationality);
        }
    }
?>