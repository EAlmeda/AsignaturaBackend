<?php
class Language
{
    private $id;
    private $name;
    private $ISOCode;

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
}

?>