<?php
require_once 'model/PersonModel.php';
require_once 'model/UserModel.php';
require_once 'model/ServiceModel.php';
require_once 'model/ConsumeModel.php';
require_once 'model/CardModel.php';

class ReserveModel extends Consultas {

	private $personModel;
	private $consumModel;
	private $cardModel;
	private $serviceModel;

	public function __construct($conexion) {
		parent::__construct($conexion);
		$this->personModel  = new PersonModel($this->conexion);
		$this->consumModel  = new ConsumeModel($this->conexion);
		$this->cardModel    = new CardModel($this->conexion);
		$this->serviceModel = new ServiceModel($this->conexion);
	}

	//************************************************************************************************** RESERVE **/

	public function deleteReservePast($idHotel) {//eliminar reservas q no hayan sido reslizado la reserve en al menos 1 hora
		$query
			= "UPDATE check_person
                    SET ID_STATE_CHECK = '8',
                     TIME_UPDATE_CHECK = CURTIME(),
                     DATE_UPDATE_CHECK = CURDATE()
                    WHERE
                      DATE_ADD(TIME_UPDATE_CHECK, INTERVAL 1 HOUR)<CURTIME()  
                    AND (ID_STATE_CHECK='7' OR ID_STATE_CHECK='5')
                    AND ID_HOTEL='$idHotel';";
		$this->conexion->update($query);
	}

	public function getListReserve($idHotel, $idTypeCheck, $idStateCheck) {
		return $this->getListReserveGroup($idHotel, $idTypeCheck, $idStateCheck, 'CHECK',0);
	}

	///lista de reservas activas de un hotel

	public function getListReserveConsumRoom($idConsume) {
		$query
			= "SELECT *
                FROM
                    consume_service AS c
                INNER JOIN reserve AS r ON r.ID_CONSUME_SERVICE = c.ID_CONSUME_SERVICE
                INNER JOIN occupation AS o ON o.ID_CONSUME_SERVICE = c.ID_CONSUME_SERVICE
                WHERE
                    c.ID_CONSUME_SERVICE = '$idConsume'
                AND c.ACTIVE_CONSUME_SERVICE = '1'
                GROUP BY
                    c.ID_CONSUME_SERVICE";

		return $this->conexion->consultar($query);
	}

	/**
	 * obtener la lista de reservas haechas por una persona
	 *
	 * @param $idConsume : id del consumo
	 * @return array: lista de reservas de un consumo
	 */
	public function getListReserveConsume($idConsume) {
		$query
			= "SELECT *
                FROM
                  consume_service AS co_se
                INNER JOIN type_consume AS ty_co ON co_se.ID_TYPE_CONSUME = ty_co.ID_TYPE_CONSUME
                INNER JOIN reserve AS reser ON co_se.ID_CONSUME_SERVICE = reser.ID_CONSUME_SERVICE
                INNER JOIN room_model as ro_mo ON ro_mo.ID_ROOM_MODEL=reser.ID_ROOM_MODEL
                WHERE
                  co_se.ID_CONSUME_SERVICE='$idConsume'";

		return $this->conexion->consultar($query);
	}

	public function getListReserveGroup($idHotel, $idTypeCheck, $idStateCheck, $group, $idCheck) {
		$stateActive=1;
		$stateProgress=2;
		$query
			= "SELECT 
					sum(PAY_CONSUME_SERVICE) as payTotal,
					sum(PRICE_CONSUME_SERVICE) as priceTotal,
					sum(co_se.UNIT_CONSUME_SERVICE) as roomTotal,
					count(co_se.ID_CONSUME_SERVICE) as consumeTotal,
					count(co_se.ACTIVE_CONSUME_SERVICE='$stateActive') as consumeActiveTotal,
					count(co_se.ACTIVE_CONSUME_SERVICE='$stateProgress') as consumeProgressTotal,
					ch_pe.*,perso.*, st_che.*,ty_ch.*, co_se.*, ct_se.*, ty_co.*, servi.*, ty_mo.*, reser.* 
                FROM
                    check_person AS ch_pe
                INNER JOIN person AS perso ON ch_pe.ID_PERSON_TITULAR = perso.ID_PERSON
                INNER JOIN state_check AS st_che ON ch_pe.ID_STATE_CHECK = st_che.ID_STATE_CHECK
                INNER JOIN type_check AS ty_ch ON ch_pe.ID_TYPE_CHECK = ty_ch.ID_TYPE_CHECK
                INNER JOIN consume_service AS co_se ON co_se.ID_CHECK = ch_pe.ID_CHECK
                INNER JOIN cost_service AS ct_se ON co_se.ID_COST_SERVICE = ct_se.ID_COST_SERVICE
                INNER JOIN type_consume AS ty_co ON co_se.ID_TYPE_CONSUME = ty_co.ID_TYPE_CONSUME
                INNER JOIN service AS servi ON ct_se.ID_SERVICE = servi.ID_SERVICE
                INNER JOIN type_money AS ty_mo ON ct_se.ID_TYPE_MONEY = ty_mo.ID_TYPE_MONEY
                INNER JOIN reserve AS reser ON co_se.ID_CONSUME_SERVICE = reser.ID_CONSUME_SERVICE
                WHERE
                    ch_pe.ID_HOTEL = '$idHotel'
                    and if('$idCheck'>0,ch_pe.ID_CHECK='$idCheck',true )
	                AND ch_pe.ID_TYPE_CHECK = '$idTypeCheck'
	                AND if('$idStateCheck'>0,ch_pe.ID_STATE_CHECK='$idStateCheck',true )
                GROUP BY
                    co_se.ID_$group
                ORDER BY co_se.ID_CONSUME_SERVICE ASC ";

		return $this->conexion->consultar($query);
	}

	public function getListReserveTitular($idHotel, $idTypeCheck, $idStateCheck, $group, $idPerson) {
		$stateActive=1;
		$stateProgress=2;
		$query
			= "SELECT 
					sum(PAY_CONSUME_SERVICE) as payTotal,
					sum(PRICE_CONSUME_SERVICE) as priceTotal,
					sum(co_se.UNIT_CONSUME_SERVICE) as roomTotal,
					count(co_se.ID_CONSUME_SERVICE) as consumeTotal,
					count(co_se.ACTIVE_CONSUME_SERVICE='$stateActive') as consumeActiveTotal,
					count(co_se.ACTIVE_CONSUME_SERVICE='$stateProgress') as consumeProgressTotal,
					ch_pe.*,perso.*, st_che.*,ty_ch.*, co_se.*, ct_se.*, ty_co.*, servi.*, ty_mo.*, reser.* 
                FROM
                    check_person AS ch_pe
                INNER JOIN person AS perso ON ch_pe.ID_PERSON_TITULAR = perso.ID_PERSON
                INNER JOIN state_check AS st_che ON ch_pe.ID_STATE_CHECK = st_che.ID_STATE_CHECK
                INNER JOIN type_check AS ty_ch ON ch_pe.ID_TYPE_CHECK = ty_ch.ID_TYPE_CHECK
                INNER JOIN consume_service AS co_se ON co_se.ID_CHECK = ch_pe.ID_CHECK
                INNER JOIN cost_service AS ct_se ON co_se.ID_COST_SERVICE = ct_se.ID_COST_SERVICE
                INNER JOIN type_consume AS ty_co ON co_se.ID_TYPE_CONSUME = ty_co.ID_TYPE_CONSUME
                INNER JOIN service AS servi ON ct_se.ID_SERVICE = servi.ID_SERVICE
                INNER JOIN type_money AS ty_mo ON ct_se.ID_TYPE_MONEY = ty_mo.ID_TYPE_MONEY
                INNER JOIN reserve AS reser ON co_se.ID_CONSUME_SERVICE = reser.ID_CONSUME_SERVICE
                WHERE
                    ch_pe.ID_HOTEL = '$idHotel'
                    and if('$idPerson'>0,ch_pe.ID_PERSON_TITULAR='$idPerson',true )
	                AND if('$idTypeCheck'>0,ch_pe.ID_TYPE_CHECK = '$idTypeCheck',true)
	                AND if('$idStateCheck'>0,ch_pe.ID_STATE_CHECK='$idStateCheck',true )
                GROUP BY
                    co_se.ID_$group
                ORDER BY co_se.ID_CONSUME_SERVICE ASC ";

		return $this->conexion->consultar($query);
	}

	public function getListReserveTypeRoom($idDetail) {
		$query = "SELECT * FROM reserve WHERE ID_CONSUME_SERVICE='$idDetail'";

		return $this->conexion->consultar($query);
	}

	public function getListReserveUser($idPerson, $idHotel) {
		$typeCheckReserve=Constants::$TYPE_CHECK_RESERVE;
		$query
			= "SELECT *
                FROM
                    check_person AS ch_pe
                INNER JOIN person AS perso ON ch_pe.ID_PERSON_TITULAR = perso.ID_PERSON
                INNER JOIN state_check AS st_che ON ch_pe.ID_STATE_CHECK = st_che.ID_STATE_CHECK
                INNER JOIN type_check AS ty_ch ON ch_pe.ID_TYPE_CHECK = ty_ch.ID_TYPE_CHECK
                INNER JOIN consume_service AS co_se ON co_se.ID_CHECK = ch_pe.ID_CHECK
                INNER JOIN cost_service AS ct_se ON co_se.ID_COST_SERVICE = ct_se.ID_COST_SERVICE
                INNER JOIN type_consume AS ty_co ON co_se.ID_TYPE_CONSUME = ty_co.ID_TYPE_CONSUME
                INNER JOIN service AS servi ON ct_se.ID_SERVICE = servi.ID_SERVICE
                INNER JOIN type_money AS ty_mo ON ct_se.ID_TYPE_MONEY = ty_mo.ID_TYPE_MONEY
                INNER JOIN reserve AS reser ON co_se.ID_CONSUME_SERVICE = reser.ID_CONSUME_SERVICE
                WHERE
                    ch_pe.ID_HOTEL = '$idHotel'
                AND ch_pe.ID_PERSON_TITULAR = '$idPerson'
                AND st_che.VALUE_STATE_CHECK >= 0
                AND co_se.ACTIVE_CONSUME_SERVICE>=0
                AND ch_pe.ID_TYPE_CHECK='$typeCheckReserve'
                ORDER BY ch_pe.ID_CHECK DESC, co_se.ID_CONSUME_SERVICE ASC ";

		return $this->conexion->consultar($query);
	}

	public function getListCheckUser($idPerson, $idHotel) {
		$typeCheckIn=Constants::$TYPE_CHECK_IN;
		$query
			= "SELECT *
                FROM
                    check_person AS ch_pe
                INNER JOIN person AS perso ON ch_pe.ID_PERSON_TITULAR = perso.ID_PERSON
                INNER JOIN state_check AS st_che ON ch_pe.ID_STATE_CHECK = st_che.ID_STATE_CHECK
                INNER JOIN type_check AS ty_ch ON ch_pe.ID_TYPE_CHECK = ty_ch.ID_TYPE_CHECK
                INNER JOIN consume_service AS co_se ON co_se.ID_CHECK = ch_pe.ID_CHECK
                INNER JOIN cost_service AS ct_se ON co_se.ID_COST_SERVICE = ct_se.ID_COST_SERVICE
                INNER JOIN type_consume AS ty_co ON co_se.ID_TYPE_CONSUME = ty_co.ID_TYPE_CONSUME
                INNER JOIN service AS servi ON ct_se.ID_SERVICE = servi.ID_SERVICE
                INNER JOIN type_money AS ty_mo ON ct_se.ID_TYPE_MONEY = ty_mo.ID_TYPE_MONEY
                WHERE
                    ch_pe.ID_HOTEL = '$idHotel'
                AND ch_pe.ID_PERSON_TITULAR = '$idPerson'
                AND st_che.VALUE_STATE_CHECK >= 0
                AND ch_pe.ID_TYPE_CHECK ='$typeCheckIn'
                AND co_se.ACTIVE_CONSUME_SERVICE>=0
                ORDER BY ch_pe.ID_CHECK DESC, co_se.ID_CONSUME_SERVICE ASC ";

		return $this->conexion->consultar($query);
	}

	public function getTotalReserveActive($idHotel) {
		$idType  = 1;//tipo reservas
		$idState = 1;//estado activo
		$query
		         = "SELECT
                    COUNT(DISTINCT c.ID_CHECK) as TOTAL
                FROM
                    type_check AS t
                INNER JOIN check_person AS c ON c.ID_TYPE_CHECK = t.ID_TYPE_CHECK
                INNER JOIN state_check AS s ON c.ID_STATE_CHECK = s.ID_STATE_CHECK
                WHERE
                    s.ID_STATE_CHECK = '$idState'
                AND t.ID_TYPE_CHECK = '$idType'
                AND c.ID_HOTEL = '$idHotel'";
		$list    = $this->conexion->consultar($query);
		if (!empty($list)) {
			$res = $list[0]['TOTAL'];
		} else {
			$res = 0;
		}

		return $res;
	}

	public function getTotalReservePending($idHotel) {
		$idType  = 1;//tipo reservas
		$idState = 3;//estado pendiente
		$query
		         = "SELECT
                    COUNT(DISTINCT c.ID_CHECK) as TOTAL
                FROM
                    type_check AS t
                INNER JOIN check_person AS c ON c.ID_TYPE_CHECK = t.ID_TYPE_CHECK
                INNER JOIN state_check AS s ON c.ID_STATE_CHECK = s.ID_STATE_CHECK
                WHERE
                    s.ID_STATE_CHECK = '$idState'
                AND t.ID_TYPE_CHECK = '$idType'
                AND c.ID_HOTEL = '$idHotel'";
		$list    = $this->conexion->consultar($query);
		if (!empty($list)) {
			$res = $list[0]['TOTAL'];
		} else {
			$res = 0;
		}

		return $res;
	}

	//cantidad de reservas activas

	public function insertReserve($idConsume, $idRoomModel, $unitReserve) {
		$query
			= "INSERT INTO reserve(ID_CONSUME_SERVICE, ID_ROOM_MODEL, UNIT_RESERVED) 
				VALUES ('$idConsume', '$idRoomModel', '$unitReserve');";
		return $this->conexion->insert($query);
	}

	public function updateReserve($idCheck, $nCard, $idTypeCard, $ccv, $monthExpCard, $yearExpCard, $validCard, $person, $personPhone, $personDoc) {
		$this->cardModel->setIdCheck($idCheck);
		$this->cardModel->syncUp();
		$this->cardModel->setNumber($nCard);
		$this->cardModel->setIdType($idTypeCard);
		$this->cardModel->setMonth($monthExpCard);
		$this->cardModel->setYear($yearExpCard);
		$this->cardModel->setCcv($ccv);
		$this->cardModel->setIsValid($validCard);
		$this->cardModel->update();

		//$this->deleteMemberCheck($idCheck); //eliminar member check
		if (!empty($person)) {
			//update person
			$this->personModel->updatePerson(
				$person['idPerson'], $person['name'], $person['app'], '', $person['sex'], $person['dateNac'], $person['email'], $person['address'], $person['city'], $person['pais'], isset($person['img']) ?
				$person['img'] : '', $person['point'], $personDoc, $personPhone
			);
			//$this->consumModel->insertCheckMember($idCheck,$person['idPerson']);//insert member_check
			//$this->consumModel->updateConsum($listConsum);//update detail consum
		}
	}

	private function deleteMemberCheck($idCheck) {
		$query4 = "DELETE member_check FROM member_check,consume_service WHERE member_check.ID_CONSUME_SERVICE=consume_service.ID_CHECK AND id_check='$idCheck'";
		$this->conexion->delete($query4);
	}
}