<?php
require_once('../../models/Db.php');


class Platform
{
    private $id;
    private $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
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

    public static function getAll()
    {

        $mysqli = Db::initConnectionDb();

        $query = $mysqli->query("SELECT * FROM PLATFORM");

        $listData = [];
        foreach ($query as $item) {
            $itemObject = new Platform($item['id'], $item['name']);
            array_push($listData, $itemObject);
        }
        $mysqli->close();

        return $listData;
    }

    public static function getByName($name)
    {
        $mysqli = Db::initConnectionDb();

        $platformData = $mysqli->query("SELECT * FROM platform WHERE name='$name'");
        $platformObject = null;
        foreach ($platformData as $platformItem) {
            $platformObject = new Platform($platformItem['id'], $platformItem['name']);
            break;
        }

        $mysqli->close();

        return $platformObject;
    }

    public static function getById($id)
    {
        $mysqli = Db::initConnectionDb();

        $platformData = $mysqli->query("SELECT * FROM platform WHERE id='$id'");
        $platformObject = null;
        foreach ($platformData as $platformItem) {
            $platformObject = new Platform($platformItem['id'], $platformItem['name']);
            break;
        }

        $mysqli->close();

        return $platformObject;
    }

    public static function insert($name)
    {
        $mysqli = Db::initConnectionDb();

        $result = $mysqli->query("INSERT INTO PLATFORM (name) VALUES ('$name')");
        $mysqli->close();

        return $result;
    }

    public static function update($id, $name)
    {
        $mysqli = Db::initConnectionDb();

        $result = $mysqli->query("UPDATE PLATFORM SET name='$name' where id='$id'");
        $mysqli->close();

        return $result;
    }

    public static function delete($id){
        
        $mysqli = Db::initConnectionDb();

        $result = $mysqli->query("DELETE FROM PLATFORM WHERE id='$id'");
        $mysqli->close();

        return $result;
    }
}
