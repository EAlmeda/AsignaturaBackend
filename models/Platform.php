<?php
require_once('Db.php');

class Platform
{
    private $id;
    private $name;

    public function __construct($id, $name)
    {
        $this->$id = $id;
        $this->$name = $name;
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

    public function getAll()
    {
        $mysqli = Db::initConnectionDb();
        
        $query = $mysqli->query("SELECT * FROM PLATFORMS");
        $listData = [];
        foreach($query as $item){
            $itemObject = new Platform($item['id'],$item['name']);
            array_push($listData,$itemObject);
        }
        $mysqli->close();

        return $listData;
    }
}

?>