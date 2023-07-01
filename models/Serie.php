<?php
require_once('../../models/Db.php');
require_once('../../models/Person.php');
require_once('../../models/Language.php');
require_once('../../models/Platform.php');
class Serie
{
	private $id;
	private $name;
	private $platforms;
	private $directors;
	private $actors;
	private $audioLanguage;
	private $captionLanguage;

	function __construct($id, $name, $platforms = null, $directors = null, $actors = [], $audioLanguage = null, $captionLanguage = null)
	{
		$this->id = $id;
		$this->name = $name;
		$this->platforms = $platforms;
		$this->directors = $directors;
		$this->actors = $actors;
		$this->audioLanguage = $audioLanguage;
		$this->captionLanguage = $captionLanguage;
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
	public function getPlatforms()
	{
		return $this->platforms;
	}

	/**
	 * @param mixed $platform s
	 * @return self
	 */
	public function setPlatforms($platforms): self
	{
		$this->platforms = $platforms;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getDirectors()
	{
		return $this->directors;
	}

	/**
	 * @param mixed $directors
	 * @return self
	 */
	public function setDirectors($directors): self
	{
		$this->directors = $directors;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getActors()
	{
		return $this->actors;
	}

	/**
	 * @param mixed $actors 
	 * @return self
	 */
	public function setActors($actors): self
	{
		$this->actors = $actors;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getAudioLanguage()
	{
		return $this->audioLanguage;
	}

	/**
	 * @param mixed $audioLanguage 
	 * @return self
	 */
	public function setAudioLanguage($audioLanguage): self
	{
		$this->audioLanguage = $audioLanguage;
		return $this;
	}

	/**
	 * @return mixed
	 */
	public function getCaptionLanguage()
	{
		return $this->captionLanguage;
	}

	/**
	 * @param mixed $captionLanguage 
	 * @return self
	 */
	public function setCaptionLanguage($captionLanguage): self
	{
		$this->captionLanguage = $captionLanguage;
		return $this;
	}

	public static function getAll()
	{

		$mysqli = Db::initConnectionDb();

		$query = $mysqli->query("SELECT * FROM serie");

		$listData = [];
		foreach ($query as $item) {
			$serie = new Serie($item['id'], $item['name']);
			$serie->setActorsDB($serie->getId()); //Actores
			$serie->setAudiosDB($serie->getId()); //Audios
			$serie->setPlatformsDB($serie->getId()); //Plataformas
			$serie->setCaptionsDB($serie->getId()); //Subtitulos
			$serie->setDirectorsDB($serie->getId()); //Directores
			array_push($listData, $serie);
		}
		$mysqli->close();

		return $listData;
	}

	/**
	 * Establece los actores obteniendolos de base de datos
	 */
	private function setActorsDB($serieId)
	{
		$mysqli = Db::initConnectionDb();

		$query = $mysqli->query("SELECT * FROM person as p join acts as a where a.person_id = p.id AND a.serie_id='$serieId'");

		$actors = [];
		foreach ($query as $item) {
			$actor = new Person($item['id'], $item['name'], $item['surname'], $item['birth_date'], $item['nationality']);

			array_push($actors, $actor);
		}
		$mysqli->close();

		$this->setActors($actors);
	}


	/**
	 * Establece los directores obteniendolos de base de datos
	 */
	private function setDirectorsDB($serieId)
	{
		$mysqli = Db::initConnectionDb();

		$query = $mysqli->query("SELECT * FROM person as p join directs as d where d.person_id = p.id AND d.serie_id='$serieId'");

		$directors = [];
		foreach ($query as $item) {
			$director = new Person($item['id'], $item['name'], $item['surname'], $item['birth_date'], $item['nationality']);

			array_push($directors, $director);
		}
		$mysqli->close();

		$this->setDirectors($directors);
	}
	/**
	 * Establece los audios obteniendolos de base de datos
	 */
	private function setAudiosDB($serieId)
	{
		$mysqli = Db::initConnectionDb();

		$query = $mysqli->query("SELECT * FROM have_audio as ha join language as l where l.id = ha.language_id AND ha.serie_id='$serieId'");

		$audios = [];
		foreach ($query as $item) {
			$audio = new Language($item['id'], $item['name'], $item['iso']);

			array_push($audios, $audio);
		}
		$mysqli->close();

		$this->setAudioLanguage($audios);
	}

	/**
	 * Establece los subtitulos obteniendolos de base de datos
	 */
	private function setCaptionsDB($serieId)
	{
		$mysqli = Db::initConnectionDb();

		$query = $mysqli->query("SELECT * FROM have_captions as hc join language as l where l.id = hc.language_id AND hc.serie_id='$serieId'");

		$captions = [];
		foreach ($query as $item) {
			$caption = new Language($item['id'], $item['name'], $item['iso']);

			array_push($captions, $caption);
		}
		$mysqli->close();

		$this->setCaptionLanguage($captions);
	}

	/**
	 * Establece las plataformas obteniendolas de base de datos
	 */
	private function setPlatformsDB($serieId)
	{
		$mysqli = Db::initConnectionDb();

		$query = $mysqli->query("SELECT * FROM belongs as b join platform as p where b.platform_id = p.id AND b.serie_id='$serieId'");

		$platforms = [];
		foreach ($query as $item) {
			$platform = new Platform($item['id'], $item['name']);

			array_push($platforms, $platform);
		}
		$mysqli->close();

		$this->setPlatforms($platforms);
	}

	public static function getByName($name)
	{
		$mysqli = Db::initConnectionDb();

		$serieData = $mysqli->query("SELECT * FROM SERIE WHERE name='$name'");
		$serieObject = null;
		foreach ($serieData as $serieItem) {
			$serieObject = new Platform($serieItem['id'], $serieItem['name']);
			break;
		}

		$mysqli->close();

		return $serieObject;
	}

	public static function getById($id)
	{
		$mysqli = Db::initConnectionDb();

		$serieData = $mysqli->query("SELECT * FROM SERIE WHERE id='$id'");
		$serieObject = null;
		foreach ($serieData as $serieItem) {
			$serieObject = new Serie($serieItem['id'], $serieItem['name']);
			$serieObject->setActorsDB($serieObject->getId()); //Actores
			$serieObject->setAudiosDB($serieObject->getId()); //Audios
			$serieObject->setPlatformsDB($serieObject->getId()); //Plataformas
			$serieObject->setCaptionsDB($serieObject->getId()); //Subtitulos
			$serieObject->setDirectorsDB($serieObject->getId()); //Directores
			break;
		}

		$mysqli->close();

		return $serieObject;
	}

	public function havePlatform($platform)
	{
		foreach ($this->getPlatforms() as $compare) {
			if ($compare->getId() == $platform->getId()) {
				return true;
			}
		}
		return false;
	}

	public function haveActor($actor)
	{
		foreach ($this->getActors() as $compare) {
			if ($compare->getId() == $actor->getId()) {
				return true;
			}
		}
		return false;
	}

	public function haveDirector($director)
	{
		foreach ($this->getDirectors() as $compare) {
			if ($compare->getId() == $director->getId()) {
				return true;
			}
		}
		return false;
	}

	public function haveAudio($audio)
	{
		foreach ($this->getAudioLanguage() as $compare) {
			if ($compare->getId() == $audio->getId()) {
				return true;
			}
		}
		return false;
	}

	public function haveCaption($caption)
	{
		foreach ($this->getCaptionLanguage() as $compare) {
			if ($compare->getId() == $caption->getId()) {
				return true;
			}
		}
		return false;
	}

	public static function insert($name, $platforms,  $directs, $acts, $audios, $captions)
	{
		$mysqli = Db::initConnectionDb();

		$result = $mysqli->query("INSERT INTO SERIE (name) VALUES ('$name')");
		$id = $mysqli->insert_id;
		if (!$result) return $result;

		//Insert relationships
		foreach ($platforms as $platform_id) {
			$result = $result ? $mysqli->query("INSERT INTO BELONGS (platform_id, serie_id) VALUES ('$platform_id', '$id')") : false;
			if (!$result) return $result;
		}
		foreach ($directs as $direc_id) {
			$result = $result ? $mysqli->query("INSERT INTO DIRECTS (person_id, serie_id) VALUES ('$direc_id', '$id')") : false;
			if (!$result) return $result;
		}
		foreach ($acts as $act_id) {
			$result = $result ? $mysqli->query("INSERT INTO ACTS (person_id, serie_id) VALUES ('$act_id', '$id')") : false;
			if (!$result) return $result;
		}
		foreach ($audios as $audio_id) {
			$result = $result ? $mysqli->query("INSERT INTO HAVE_AUDIO (language_id, serie_id) VALUES ('$audio_id', '$id')") : false;
			if (!$result) return $result;
		}

		foreach ($captions as $caption_id) {
			$result = $result ? $mysqli->query("INSERT INTO HAVE_CAPTIONS (language_id, serie_id) VALUES ('$caption_id', '$id')") : false;
			if (!$result) return $result;
		}


		$mysqli->close();

		return $result;
	}

	private function contain($array, $id)
	{
		foreach ($array as $compare) {
			if ($compare->getId() == $id) {
				return true;
			}
		}
		return false;
	}

	private function idArrayContain($array, $id)
	{
		foreach ($array as $compare) {
			if ($compare == $id) {
				return true;
			}
		}
		return false;
	}

	public function update($id, $name, $newPlatforms,  $newDirectors, $newActors, $newAudios, $newCaptions)
	{
		$mysqli = Db::initConnectionDb();

		$result = $mysqli->query("UPDATE SERIE SET name='$name' where id='$id'");
		if (!$result) return $result;

		//Actualizar plataformas
		foreach ($this->getPlatforms() as $seriePlatform) {
			if (!$this->idArrayContain($newPlatforms, $seriePlatform->getId())) {
				$platformId = $seriePlatform->getId();
				$mysqli->query("delete from belongs where platform_id='$platformId' and serie_id='$id'");
			}
		}
		foreach ($newPlatforms as $newPlatform) {
			if (!$this->contain($this->getPlatforms(), $newPlatform)) {
				$mysqli->query("insert into belongs(serie_id,platform_id) values('$id','$newPlatform')");
			}
		}

		//Actualizar directores
		foreach ($this->getDirectors() as $serieDirector) {
			if (!$this->idArrayContain($newDirectors, $serieDirector->getId())) {
				$directorId = $serieDirector->getId();
				$mysqli->query("delete from directs where person_id='$directorId' and serie_id='$id'");
			}
		}
		foreach ($newDirectors as $newDirector) {
			if (!$this->contain($this->getDirectors(), $newDirector)) {
				$mysqli->query("insert into directs(serie_id,person_id) values('$id','$newDirector')");
			}
		}

		//Actualizar actores
		foreach ($this->getActors() as $serieActor) {
			if (!$this->idArrayContain($newActors, $serieActor->getId())) {
				$actorId = $serieActor->getId();
				$mysqli->query("delete from acts where person_id='$actorId' and serie_id='$id'");
			}
		}
		foreach ($newActors as $newActor) {
			if (!$this->contain($this->getActors(), $newActor)) {
				$mysqli->query("insert into acts(serie_id,person_id) values('$id','$newActor')");
			}
		}

		//Actualizar audio
		foreach ($this->getAudioLanguage() as $serieAudio) {
			if (!$this->idArrayContain($newAudios, $serieAudio->getId())) {
				$audioId = $serieAudio->getId();
				$mysqli->query("delete from have_audio where language_id='$audioId' and serie_id='$id'");
			}
		}
		foreach ($newAudios as $newAudio) {
			if (!$this->contain($this->getAudioLanguage(), $newAudio)) {
				$mysqli->query("insert into have_audio(serie_id,language_id) values('$id','$newAudio')");
			}
		}

		//Actulizar subtitulos
		foreach ($this->getCaptionLanguage() as $serieCaption) {
			if (!$this->idArrayContain($newCaptions, $serieCaption->getId())) {
				$captionId = $serieCaption->getId();
				$mysqli->query("delete from have_captions where language_id='$captionId' and serie_id='$id'");
			}
		}
		foreach ($newCaptions as $newCaption) {
			if (!$this->contain($this->getCaptionLanguage(), $newCaption)) {
				$mysqli->query("insert into have_captions(serie_id,language_id) values('$id','$newCaption')");
			}
		}

		$mysqli->close();

		return $result;
	}

	public static function delete($id)
	{

		$mysqli = Db::initConnectionDb();

		//Delete dependencies
		$result = $mysqli->query("DELETE FROM BELONGS WHERE serie_id='$id'");
		if (!$result) return $result;
		$result = $result ? $mysqli->query("DELETE FROM DIRECTS WHERE serie_id='$id'") : false;
		if (!$result) return $result;
		$result = $result ? $mysqli->query("DELETE FROM ACTS WHERE serie_id='$id'") : false;
		if (!$result) return $result;
		$result = $result ? $mysqli->query("DELETE FROM HAVE_AUDIO WHERE serie_id='$id'") : false;
		if (!$result) return $result;
		$result = $result ? $mysqli->query("DELETE FROM HAVE_CAPTIONS WHERE serie_id='$id'") : false;
		if (!$result) return $result;

		$result = $mysqli->query("DELETE FROM SERIE WHERE id='$id'");
		$mysqli->close();

		return $result;
	}
}
