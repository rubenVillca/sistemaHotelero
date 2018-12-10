<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 01/09/2017
 * Time: 22:02
 */

class ArticleConsumeModel extends Consultas {
	private $idArticle;
	private $idConsume;
	private $idState;

	public function __construct($conexion) {
		parent::__construct($conexion);
		$this->idArticle = 0;
		$this->idConsume = 0;
		$this->idState = 0;
	}

	/**
	 * @return int
	 */
	public function getIdArticle() {
		return $this->idArticle;
	}

	/**
	 * @param int $idArticle
	 */
	public function setIdArticle($idArticle) {
		$this->idArticle = $idArticle;
	}

	/**
	 * @return int
	 */
	public function getIdConsume() {
		return $this->idConsume;
	}

	/**
	 * @param int $idConsume
	 */
	public function setIdConsume($idConsume) {
		$this->idConsume = $idConsume;
	}

	/**
	 * @return int
	 */
	public function getIdState() {
		return $this->idState;
	}

	/**
	 * @param int $idState
	 */
	public function setIdState($idState) {
		$this->idState = $idState;
	}

	//corregir
	public function syncUp() {
		$listArticle = $this->select();
		foreach($listArticle as $article) {
			$this->idArticle = $article['ID_ARTICLE'];
			$this->idConsume = $article['ID_CONSUME_SERVICE'];
			$this->idState = $article['ID_STATE_ARTICLE'];
		}
	}

	public function select() {
		$query = "SELECT *
	              FROM article_consum as c
	              INNER JOIN state_article as s ON c.ID_STATE_ARTICLE = s.ID_STATE_ARTICLE
	              INNER JOIN article AS a ON c.ID_ARTICLE = a.ID_ARTICLE
	              WHERE
	                 if('$this->idArticle'>0,c.ID_ARTICLE='$this->idArticle',c.ID_ARTICLE>0) AND
	                 if('$this->idState'>0,c.ID_STATE_ARTICLE='$this->idState',c.ID_STATE_ARTICLE>0) AND 
	                 if('$this->idConsume'>0,ID_CONSUME_SERVICE='$this->idConsume',c.ID_CONSUME_SERVICE>0)";

		return $this->conexion->consultar($query);
	}

	public function update() {
		if($this->idArticle) {
			$query = "UPDATE article_consum SET 
						ID_ARTICLE='$this->idArticle',
						ID_CONSUME_SERVICE='$this->idConsume',
						ID_STATE_ARTICLE='$this->idState'
                	WHERE
                		if('$this->idArticle'>0,ID_ARTICLE='$this->idArticle',article_consum.ID_ARTICLE>0) AND
	                 if('$this->idState'>0,ID_STATE_ARTICLE='$this->idState',article_consum.ID_STATE_ARTICLE>0) AND 
	                 if('$this->idConsume'>0,ID_CONSUME_SERVICE='$this->idConsume',article_consum.ID_CONSUME_SERVICE>0)";

			return $this->conexion->update($query);
		}
		else {
			return $this->insert();
		}
	}

	public function insert() {
		$query = "INSERT INTO article_consum(ID_ARTICLE, ID_CONSUME_SERVICE, ID_STATE_ARTICLE) 
			VALUES('$this->idArticle','$this->idConsume','$this->idState');";
		return $this->conexion->insert($query);
	}

	public function delete() {
		$query = "DELETE FROM article_consum 
				  WHERE
				   if('$this->idArticle'>0,ID_ARTICLE='$this->idArticle',article_consum.ID_ARTICLE>0) AND
	               if('$this->idState'>0,ID_STATE_ARTICLE='$this->idState',article_consum.ID_STATE_ARTICLE>0) AND 
	               if('$this->idConsume'>0,ID_CONSUME_SERVICE='$this->idConsume',article_consum.ID_CONSUME_SERVICE>0)";
		$this->conexion->delete($query);
	}
}
