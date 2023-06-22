<?php
class Serie
{
    private $id;
    private $title;
    private $platform;
    private $director;
    private $actors;
    private $audioLanguage;
    private $captionLanguage;

    function __construct($id, $title, $platform, $director, $actors, $audioLanguage, $captionLanguage)
    {
        $this->$id = $id;
        $this->$title = $title;
        $this->$platform = $platform;
        $this->$director = $director;
        $this->$actors = $actors;
        $this->$audioLanguage = $audioLanguage;
        $this->$captionLanguage = $captionLanguage;
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
	public function getTitle() {
		return $this->title;
	}
	
	/**
	 * @param mixed $title 
	 * @return self
	 */
	public function setTitle($title): self {
		$this->title = $title;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getPlatform() {
		return $this->platform;
	}
	
	/**
	 * @param mixed $platform 
	 * @return self
	 */
	public function setPlatform($platform): self {
		$this->platform = $platform;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getDirector() {
		return $this->director;
	}
	
	/**
	 * @param mixed $director 
	 * @return self
	 */
	public function setDirector($director): self {
		$this->director = $director;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getActors() {
		return $this->actors;
	}
	
	/**
	 * @param mixed $actors 
	 * @return self
	 */
	public function setActors($actors): self {
		$this->actors = $actors;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getAudioLanguage() {
		return $this->audioLanguage;
	}
	
	/**
	 * @param mixed $audioLanguage 
	 * @return self
	 */
	public function setAudioLanguage($audioLanguage): self {
		$this->audioLanguage = $audioLanguage;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCaptionLanguage() {
		return $this->captionLanguage;
	}
	
	/**
	 * @param mixed $captionLanguage 
	 * @return self
	 */
	public function setCaptionLanguage($captionLanguage): self {
		$this->captionLanguage = $captionLanguage;
		return $this;
	}
}

?>