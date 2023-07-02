<?php

require_once('../../models/Db.php');

class Language
{
    private $id;
    private $name;
    private $ISOCode;

    function __construct($id, $name, $ISOCode)
    {
        $this->id = $id;
        $this->name = $name;
        $this->ISOCode = $ISOCode;
    }


	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}
	
	/**
	 * @param mixed $id 
	 * @return self
	 */
	public function setId($id): self {
		$this->id = $id;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getName() {
		return $this->name;
	}
	
	/**
	 * @param mixed $name 
	 * @return self
	 */
	public function setName($name): self {
		$this->name = $name;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getISOCode() {
		return $this->ISOCode;
	}
	
	/**
	 * @param mixed $ISOCode 
	 * @return self
	 */
	public function setISOCode($ISOCode): self {
		$this->ISOCode = $ISOCode;
		return $this;
	}

	public static function getAll()
    {

        $mysqli = Db::initConnectionDb();

        $query = $mysqli->query("SELECT * FROM LANGUAGE");

        $listData = [];
        foreach ($query as $item) {
            $itemObject = new Language($item['id'], $item['name'], $item['iso']);
            array_push($listData, $itemObject);
        }
        $mysqli->close();

        return $listData;
    }

	public static function getById($id)
    {
        $mysqli = Db::initConnectionDb();

        $languageData = $mysqli->query("SELECT * FROM LANGUAGE WHERE id='$id'");
        $languageObject = null;
        foreach ($languageData as $languageItem) {
            $languageObject = new Language($languageItem['id'], $languageItem['name'], $languageItem['iso']);
            break;
        }

        $mysqli->close();

        return $languageObject;
    }

    public static function hasAudiosLinked($id)
    {
        $mysqli = Db::initConnectionDb();

        $hasAudios = $mysqli->query("SELECT COUNT(*) as total FROM HAVE_AUDIO WHERE language_id='$id'");
        $data=$hasAudios->fetch_assoc();

        $mysqli->close();
        return $data['total'] >= 1;
    }

    public static function hasCaptionsLinked($id)
    {
        $mysqli = Db::initConnectionDb();

        $hasCaptions = $mysqli->query("SELECT COUNT(*) as total FROM HAVE_CAPTIONS WHERE language_id='$id'");
        $data=$hasCaptions->fetch_assoc();
    
        $mysqli->close();

        return $data['total'] >= 1;
    }

    public static function getByName($name)
    {
        $mysqli = Db::initConnectionDb();

        $languageData = $mysqli->query("SELECT * FROM LANGUAGE WHERE name='$name'");
        $languageObject = null;
        foreach ($languageData as $languageItem) {
            $languageObject = new Language($languageItem['id'], $languageItem['name'], $languageItem['iso']);
            break;
        }

        $mysqli->close();

        return $languageObject;
    }

	public static function insert($name, $iso)
    {
        $mysqli = Db::initConnectionDb();

        $result = $mysqli->query("INSERT INTO LANGUAGE (name, iso) VALUES ('$name', '$iso')");
        $mysqli->close();

        return $result;
    }

	public static function update($id, $name, $iso)
    {
        $mysqli = Db::initConnectionDb();
       
        $result = $mysqli->query("UPDATE LANGUAGE SET name='$name', iso='$iso' where id='$id'");
        $mysqli->close();

        return $result;
    }

	public static function delete($id)
    {
        $mysqli = Db::initConnectionDb();

        $result = $mysqli->query("DELETE FROM LANGUAGE where id='$id'");
        $mysqli->close();

        return $result;
    }
}

?>