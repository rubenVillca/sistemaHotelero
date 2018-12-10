<?php
require_once 'model/TypeModel.php';

class CardModel extends Consultas {
	private $id;
	private $idCheck;
	private $idType;
	private $number;
	private $month;
	private $year;
	private $ccv;
	private $isValid;
	private $typeMoney;
	private $deposit;
	private $typeCard;

	public function __construct($conexion) {
		parent::__construct($conexion);
		$this->id = 0;
		$this->idCheck = 0;
		$this->idType = 0;
		$this->number = 0;
		$this->month = 0;
		$this->year = 0;
		$this->ccv = 0;
		$this->isValid = false;
		$this->typeMoney = '$';
		$this->deposit = 0;
		$this->typeCard = new TypeModel($conexion);
	}

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getIdCheck() {
		return $this->idCheck;
	}

	/**
	 * @param mixed $idCheck
	 */
	public function setIdCheck($idCheck) {
		$this->idCheck = $idCheck;
	}

	/**
	 * @return mixed
	 */
	public function getIdType() {
		return $this->idType;
	}

	/**
	 * @param mixed $idType
	 */
	public function setIdType($idType) {
		$this->idType = $idType;
	}

	/**
	 * @return mixed
	 */
	public function getNumber() {
		return $this->number;
	}

	/**
	 * @param mixed $number
	 */
	public function setNumber($number) {
		$this->number = $number;
	}

	/**
	 * @return mixed
	 */
	public function getMonth() {
		return $this->month;
	}

	/**
	 * @param mixed $month
	 */
	public function setMonth($month) {
		$this->month = $month;
	}

	/**
	 * @return mixed
	 */
	public function getYear() {
		return $this->year;
	}

	/**
	 * @param mixed $year
	 */
	public function setYear($year) {
		$this->year = $year;
	}

	/**
	 * @return mixed
	 */
	public function getCcv() {
		return $this->ccv;
	}

	/**
	 * @param mixed $ccv
	 */
	public function setCcv($ccv) {
		$this->ccv = $ccv;
	}

	/**
	 * @return mixed
	 */
	public function getIsValid() {
		return $this->isValid;
	}

	/**
	 * @param mixed $isValid
	 */
	public function setIsValid($isValid) {
		$this->isValid = $isValid;
	}

	/**
	 * @return mixed
	 */
	public function getTypeMoney() {
		return $this->typeMoney;
	}

	/**
	 * @param mixed $typeMoney
	 */
	public function setTypeMoney($typeMoney) {
		$this->typeMoney = $typeMoney;
	}

	/**
	 * @return mixed
	 */
	public function getDeposit() {
		return $this->deposit;
	}

	/**
	 * @param mixed $deposit
	 */
	public function setDeposit($deposit) {
		$this->deposit = $deposit;
	}

	/**
	 * @return TypeModel
	 */
	public function getTypeCard() {
		return $this->typeCard;
	}

	/**
	 * @param TypeModel $typeCard
	 */
	public function setTypeCard($typeCard) {
		$this->typeCard = $typeCard;
	}

	public function syncUp() {
		$listCard = $this->select();
		foreach($listCard as $card) {
			$this->id = $card['ID_CARD'];
			$this->idCheck = $card['ID_CHECK'];
			$this->idType = $card['ID_TYPE_CARD'];
			$this->number = $card['NUMBER_CARD'];
			$this->month = $card['MONTH_CARD'];
			$this->year = $card['CCV_CARD'];
			$this->ccv = $card['CCV_CARD'];
			$this->isValid = $card['VALID_CARD'];
			$this->typeMoney = $card['TYPE_MONEY_CARD'];
			$this->deposit = $card['DEPOSIT_CARD'];
		}
		$this->typeCard->setId($this->idType);
		$this->typeCard->setNameTable('CARD');
		$this->typeCard->syncUp();
	}

	public function select() {
		$query = "SELECT *
	                FROM card 
	                INNER JOIN type_card as t ON card.ID_TYPE_CARD = t.ID_TYPE_CARD
	                WHERE
	                 if('$this->idCheck'>0,ID_CHECK='$this->idCheck',ID_CHECK>0) AND
	                if('$this->id'>0,ID_CARD='$this->id',ID_CARD>0)";

		return $this->conexion->consultar($query);
	}

	public function insert() {
		$query = "INSERT INTO card(ID_CARD, ID_CHECK, NUMBER_CARD, ID_TYPE_CARD, MONTH_CARD, YEAR_CARD, CCV_CARD, VALID_CARD, TYPE_MONEY_CARD, DEPOSIT_CARD) 
			VALUES(DEFAULT,
			'$this->idCheck',
			'$this->number',
			'$this->idType',
			'$this->month',
			'$this->year',
			'$this->ccv',
			'$this->isValid',
			'$this->typeMoney',
			'$this->deposit'
			);";

		return $this->conexion->insert($query);
	}

	public function update() {
		if($this->id) {
			$query = "UPDATE card SET 
						ID_CHECK='$this->idCheck', 
						NUMBER_CARD='$this->number',
						ID_TYPE_CARD='$this->idType',
						MONTH_CARD='$this->month',
						YEAR_CARD='$this->year', 
						CCV_CARD='$this->ccv', 
						VALID_CARD='$this->isValid',
						TYPE_MONEY_CARD='$this->typeMoney', 
						DEPOSIT_CARD='$this->deposit'
                WHERE
                	if('$this->idCheck'>0,ID_CHECK='$this->idCheck',ID_CHECK>0) AND
	                if('$this->id'>0,ID_CARD='$this->id',ID_CARD>0)";

			return $this->conexion->update($query);
		}else{
			return $this->insert();
		}
	}

	public function delete() {
		$query = "DELETE FROM card WHERE ID_CHECK='$this->idCheck'";
		$this->conexion->delete($query);
	}
}
