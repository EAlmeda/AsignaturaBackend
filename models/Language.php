<?php
class Language
{
    private $id;
    private $name;
    private $ISOCode;
    private $birthdate;
    private $nationality;

    function __construct($id, $name, $ISOCode)
    {
        $this->$id = $id;
        $this->$name = $name;
        $this->$ISOCode = $ISOCode;
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

	/**
	 * @return mixed
	 */
	public function getBirthdate() {
		return $this->birthdate;
	}
	
	/**
	 * @param mixed $birthdate 
	 * @return self
	 */
	public function setBirthdate($birthdate): self {
		$this->birthdate = $birthdate;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getNationality() {
		return $this->nationality;
	}
	
	/**
	 * @param mixed $nationality 
	 * @return self
	 */
	public function setNationality($nationality): self {
		$this->nationality = $nationality;
		return $this;
	}
}

?>