<?php
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
        $this->birthdate = $birthdate;
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
        return $this->name.' '.$this->surname;
    }
}
