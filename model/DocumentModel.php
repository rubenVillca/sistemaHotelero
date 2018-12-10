<?php
require_once 'model/UserModel.php';
require_once 'model/TypeModel.php';

class DocumentModel extends Consultas {
	private $idType;
	private $number;
	private $idPerson;
	private $date;
	private $time;
	private $type;
	private $userModel;

	public function __construct($conexion) {
		parent::__construct($conexion);
		$this->userModel = new UserModel($this->conexion);
		$this->idType = 0;
		$this->number = 0;
		$this->idPerson = 0;
		$this->date = 0;
		$this->time = 0;
		$this->type = new TypeModel($conexion);
		$this->type->setNameTable('DOCUMENT');
	}

	public function delete() {
		$deleteNumber = "DELETE FROM person_document WHERE NUMBER_DOCUMENT='$this->number'";
		$this->conexion->delete($deleteNumber);

		$deleteType = "DELETE FROM person_document WHERE ID_TYPE_DOCUMENT='$this->idType' AND ID_PERSON='$this->idPerson'";
		$this->conexion->delete($deleteType);
	}

	/**
	 * @return int
	 */
	public function getDate() {
		return $this->date;
	}

	/**
	 * @param int $date
	 */
	public function setDate($date) {
		$this->date = $date;
	}

	/**
	 * @return int
	 */
	public function getIdPerson() {
		return $this->idPerson;
	}

	/**
	 * @param int $idPerson
	 */
	public function setIdPerson($idPerson) {
		$this->idPerson = $idPerson;
	}

	/**
	 * @return int
	 */
	public function getIdType() {
		return $this->idType;
	}

	/**
	 * @param int $idType
	 */
	public function setIdType($idType) {
		$this->idType = $idType;
	}

	public function getListDoc($idPerson) {
		$question = "SELECT *
                    FROM
                        person_document AS p
                    INNER JOIN type_document AS t ON p.ID_TYPE_DOCUMENT = t.ID_TYPE_DOCUMENT
                    WHERE
                        p.ID_PERSON = '$idPerson'";
		$res = $this->conexion->consultar($question);

		return $res;
	}

	/**
	 * @return int
	 */
	public function getNumber() {
		return $this->number;
	}

	/**
	 * @param int $number
	 */
	public function setNumber($number) {
		if ($number>0)
		$this->number = $number;
	}

	/**
	 * @return int
	 */
	public function getTime() {
		return $this->time;
	}

	/**
	 * @param int $time
	 */
	public function setTime($time) {
		$this->time = $time;
	}

	/**
	 * @return TypeModel
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * @param TypeModel $type
	 */
	public function setType($type) {
		if ($type>0)
		$this->type = $type;
	}

	public function insert() {
		$query = "INSERT INTO person_document(NUMBER_DOCUMENT, ID_TYPE_DOCUMENT, ID_PERSON, DATE_REGISTER_DOCUMENT, TIME_REGISTER_DOCUMENT) 
			VALUES('$this->number','$this->idType','$this->idPerson',curdate(),curtime());";
		return $this->conexion->insert($query);
	}

	public function select() {
		$query = "SELECT *
	                FROM person_document as d
	                INNER JOIN type_document as t ON d.ID_TYPE_DOCUMENT = t.ID_TYPE_DOCUMENT
	                WHERE
	                 if('$this->number'>0,d.NUMBER_DOCUMENT='$this->number',true) AND
	                if('$this->idType'>0,d.ID_TYPE_DOCUMENT='$this->idType',true) AND
	                if('$this->idPerson'>0,d.ID_PERSON='$this->idPerson',true) ";

		return $this->conexion->consultar($query);
	}

	public function syncUp() {
		$listDocument = $this->select();
		foreach($listDocument as $document) {
			$this->idType = $document['ID_TYPE_DOCUMENT'];
			$this->number = $document['NUMBER_DOCUMENT'];
			$this->idPerson = $document['ID_PERSON'];
			$this->date = $document['DATE_REGISTER_DOCUMENT'];
			$this->time = $document['TIME_REGISTER_DOCUMENT'];
		}
		$this->type->setId($this->idType);
		$this->type->setNameTable('DOCUMENT');
		$this->type->syncUp();
	}

	//************************************************************************************************* DOCUMENT **/

	public function update() {
		$res=0;
		if($this->select()) {
			$query = "UPDATE person_document as d SET 
						NUMBER_DOCUMENT='$this->number',
						ID_TYPE_DOCUMENT='$this->idType',
						ID_PERSON='$this->idPerson',
						DATE_REGISTER_DOCUMENT='$this->date',
						TIME_REGISTER_DOCUMENT='$this->time'
                	WHERE
	                    if('$this->number'>0,d.NUMBER_DOCUMENT='$this->number',false) AND
		                if('$this->idType'>0,d.ID_TYPE_DOCUMENT='$this->idType',false)";

			$res=$this->conexion->update($query);
		}

		return $res;
	}

	public function updateListDoc($personDoc, $idPerson) {
		foreach($personDoc as $doc) {
			if(isset($doc['nDocOld'])) {
				$nDocOld = $doc['nDocOld'];
				$query1 = "SELECT * FROM person_document WHERE NUMBER_DOCUMENT='$nDocOld'";
				$res1 = $this->conexion->consultar($query1);
			}
			else {
				$res1 = array();
			}
			if(!empty($res1)) {
				$this->updatePersonDoc($idPerson, $doc['idType'], $doc['nDoc'], $doc['nDocOld']);
			}
			if(empty($res1)) {
				$this->insertPersonDoc($idPerson, $doc['idType'], $doc['nDoc']);
			}
		}
	}

	private function insertPersonDoc($idPerson, $idType, $nDoc) {
		$query0 = "INSERT INTO person_document VALUES ($nDoc,'$idType',$idPerson,CURDATE(),CURTIME())";
		$this->conexion->insert($query0);
	}

	private function updatePersonDoc($idPerson, $idTypeNew, $nDocNew, $nDocOld) {
		$query0 = "UPDATE person_document SET NUMBER_DOCUMENT='$nDocNew',ID_TYPE_DOCUMENT='$idTypeNew' WHERE NUMBER_DOCUMENT='$nDocOld' AND ID_PERSON='$idPerson'";
		$this->conexion->update($query0);
	}
}