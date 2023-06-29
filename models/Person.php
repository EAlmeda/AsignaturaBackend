<?php
require_once('../../models/Db.php');

class Person
{
    private $id;
    private $name;
    private $surname;
    private $birthdate;
    private $nationality;

    function __construct($id, $name, $surname, $birthdate, $nationality)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        if($id>21)
        echo($birthdate);
        $this->birthdate = date("d/m/Y", strtotime($birthdate));
        $this->nationality = $nationality;
    }


    /**
     * @return mixed
     */
    public function getNationality()
    {
        return $this->nationality;
    }

    /**
     * @param mixed $nationality 
     * @return self
     */
    public function setNationality($nationality): self
    {
        $this->nationality = $nationality;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getBirthdate()
    {
        return $this->birthdate;
    }

    /**
     * @param mixed $birthdate 
     * @return self
     */
    public function setBirthdate($birthdate): self
    {
        $this->birthdate = $birthdate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id 
     * @return self
     */
    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name 
     * @return self
     */
    public function setName($name): self
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * @param mixed $surname 
     * @return self
     */
    public function setSurname($surname): self
    {
        $this->surname = $surname;
        return $this;
    }

    public function getFullname()
    {
        return $this->name . ' ' . $this->surname;
    }

    public static function getAll()
    {

        $mysqli = Db::initConnectionDb();

        $query = $mysqli->query("SELECT * FROM PERSON");

        $listData = [];
        foreach ($query as $item) {
            $itemObject = new Person($item['id'], $item['name'], $item['surname'], $item['birth_date'], $item['nationality']);
            array_push($listData, $itemObject);
        }
        $mysqli->close();

        return $listData;
    }

    public static function insert($name,$surname,$birthdate,$nationality)
	{
		$mysqli = Db::initConnectionDb();
        $date = date("Y-m-d", strtotime($birthdate));
		$result = $mysqli->query("INSERT INTO PERSON (name,surname,birth_date,nationality) VALUES ('$name','$surname','$date','$nationality')");
		$mysqli->close();

		return $result;
	}

    public static function getById($id)
    {
        $mysqli = Db::initConnectionDb();

        $query = $mysqli->query("SELECT * FROM PERSON WHERE id='$id'");

        $itemObject = null;
        foreach ($query as $item) {
            $itemObject = new Person($item['id'], $item['name'], $item['surname'], $item['birth_date'], $item['nationality']);

            break;
        }

        $mysqli->close();

        return $itemObject;
    }

    public static function delete($id)
    {

        $mysqli = Db::initConnectionDb();

        $result = $mysqli->query("DELETE FROM PERSON WHERE id='$id'");
        $mysqli->close();

        return $result;
    }
}
