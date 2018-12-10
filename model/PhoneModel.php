<?php
require_once 'model/UserModel.php';

class PhoneModel extends Consultas {
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
		$this->type->setNameTable('PHONE');
	}

	public function syncUp() {
		$listPhone = $this->select();
		foreach($listPhone as $phone) {
			$this->idType = $phone['ID_TYPE_PHONE'];
			$this->number = $phone['NUMBER_PHONE'];
			$this->idPerson = $phone['ID_PERSON'];
			$this->date = $phone['DATE_REGISTER_PHONE'];
			$this->time = $phone['TIME_REGISTER_PHONE'];
		}
		$this->type->setId($this->idType);
		$this->type->setNameTable('PHONE');
		$this->type->syncUp();
	}

	public function select() {
		$query = "SELECT *
	                FROM person_phone as d
	                INNER JOIN type_phone as t ON d.ID_TYPE_PHONE = t.ID_TYPE_PHONE
	                WHERE
	                 if('$this->number'>0,d.NUMBER_PHONE='$this->number',d.NUMBER_PHONE>0) AND
	                if('$this->idType'>0,d.ID_TYPE_PHONE='$this->idType',d.ID_TYPE_PHONE>0) AND
	                if('$this->idPerson'>0,d.ID_PERSON='$this->idPerson',d.ID_PERSON>0)";

		return $this->conexion->consultar($query);
	}

	public function update() {
		if($this->idPerson>0) {
			$query = "UPDATE person_phone as d SET 
						NUMBER_PHONE='$this->number',
						ID_TYPE_PHONE='$this->idType',
						ID_PERSON='$this->idPerson',
						DATE_REGISTER_PHONE=curdate(),
						TIME_REGISTER_PHONE=curtime()
                	WHERE
	                    if('$this->number'>0,d.NUMBER_PHONE='$this->number',d.NUMBER_PHONE>0) AND
		                if('$this->idType'>0,d.ID_TYPE_PHONE='$this->idType',false)";

			return $this->conexion->update($query);
		}
		else {
			return $this->insert();
		}
	}

	public function insert() {
		$query = "INSERT INTO person_phone(NUMBER_PHONE, ID_TYPE_PHONE, ID_PERSON, DATE_REGISTER_PHONE, TIME_REGISTER_PHONE) 
			VALUES('$this->number','$this->idType','$this->idPerson',curdate(),curtime());";

		return $this->conexion->insert($query);
	}

	public function delete() {
		$query = "DELETE FROM person_phone WHERE NUMBER_PHONE='$this->number'";
		$this->conexion->delete($query);

		$deleteType = "DELETE FROM person_phone WHERE ID_TYPE_PHONE='$this->idType' AND ID_PERSON='$this->idPerson'";
		$this->conexion->delete($deleteType);
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
		$this->number = $number;
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
		$this->type = $type;
	}



	//**************************************************************************************************** PHONE **/
	public function getListPhone($idPerson) {
		$question = "SELECT *
                    FROM
                        person_phone AS p
                    INNER JOIN type_phone AS t ON p.ID_TYPE_PHONE = t.ID_TYPE_PHONE
                    WHERE
                        p.ID_PERSON = '$idPerson'";

		return $this->conexion->consultar($question);
	}

	public function updateListPhone($personPhone, $idPerson) {
		foreach($personPhone as $phone) {
			$isInsert = true;
			if(isset($phone['nPhoneOld'])) {
				$nPhoneOld = $phone['nPhoneOld'];
				if(!empty($nPhoneOld) && $nPhoneOld > 0) {
					$query1 = "SELECT * FROM person_phone WHERE NUMBER_PHONE='$nPhoneOld'";
					$res1 = $this->conexion->consultar($query1);
					if(!empty($res1)) {
						$isInsert = false;
					}
				}
			}
			if($isInsert) {
				$this->insertPersonPhone($idPerson, $phone['idType'], $phone['nPhone']);
			}
			else {
				$this->updatePersonPhone($idPerson, $phone['idType'], $phone['nPhone'], $phone['nPhoneOld']);
			}
		}
	}

	private function updatePersonPhone($idPerson, $idTypeNew, $nFonoNew, $nFonoOld) {
		$query2 = "UPDATE person_phone SET NUMBER_PHONE='$nFonoNew',ID_TYPE_PHONE='$idTypeNew' WHERE NUMBER_PHONE='$nFonoOld' AND ID_PERSON='$idPerson'";
		$this->conexion->update($query2);
	}

	private function insertPersonPhone($idPerson, $idType, $nPhone) {
		$query2 = "INSERT INTO person_phone VALUES ($nPhone,$idPerson,'$idType',CURDATE(),CURTIME())";
		$this->conexion->insert($query2);
	}
}