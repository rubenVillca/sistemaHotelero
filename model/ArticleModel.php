<?php

class ArticleModel extends Consultas {
	private $id;
	private $name;
	private $description;
	private $state;
	private $unit;

	public function __construct($conexion) {
		parent::__construct($conexion);
		$this->id = 0;
		$this->name = '';
		$this->description = '';
		$this->state = 0;
		$this->unit = 0;
	}

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param int $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @param string $description
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * @return int
	 */
	public function getState() {
		return $this->state;
	}

	/**
	 * @param int $state
	 */
	public function setState($state) {
		$this->state = $state;
	}

	/**
	 * @return int
	 */
	public function getUnit() {
		return $this->unit;
	}

	/**
	 * @param int $unit
	 */
	public function setUnit($unit) {
		$this->unit = $unit;
	}

	public function syncUp() {
		$listArticle = $this->select();
		foreach($listArticle as $article) {
			$this->id = $article['ID_ARTICLE'];
			$this->name = $article['NAME_ARTICLE'];
			$this->description = $article['DESCRIPTION_ARTICLE'];
			$this->state = $article['STATE_ARTICLE'];
			$this->unit = $article['UNIT_ARTICLE'];
		}
	}

	public function select() {
		$query = "SELECT *
	              FROM article
	              WHERE
	                 if('$this->id'>0,ID_ARTICLE='$this->id',article.ID_ARTICLE>0) AND
	                if('$this->state'>0,STATE_ARTICLE='$this->state',article.STATE_ARTICLE>0)";

		return $this->conexion->consultar($query);
	}

	public function update() {
		if($this->id) {
			$query = "UPDATE article SET 
						NAME_ARTICLE='$this->name',
						DESCRIPTION_ARTICLE='$this->description',
						STATE_ARTICLE='$this->state',
						UNIT_ARTICLE='$this->unit'
                	WHERE
                		if('$this->id'>0,ID_ARTICLE='$this->id',article.ID_ARTICLE>0) AND
	                	if('$this->state'>0,STATE_ARTICLE='$this->state',article.STATE_ARTICLE>0)";

			return $this->conexion->update($query);
		}
		else {
			return $this->insert();
		}
	}

	public function insert() {
		$query = "INSERT INTO article(ID_ARTICLE, NAME_ARTICLE, DESCRIPTION_ARTICLE, STATE_ARTICLE, UNIT_ARTICLE) 
			VALUES(DEFAULT,
			'$this->name',
			'$this->description',
			'$this->state',
			'$this->unit');";

		return $this->conexion->insert($query);
	}

	public function delete() {
		$query = "DELETE FROM article WHERE ID_ARTICLE='$this->id'";
		$this->conexion->delete($query);
	}
}