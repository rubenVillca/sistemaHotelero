<?php
require_once 'model/PersonModel.php';
require_once 'model/ServiceModel.php';
require_once 'model/CardModel.php';
require_once 'model/RoomModel.php';

class ConsumeModel extends Consultas {
	private $personModel;
	private $serviceModel;
	private $cardModel;
	private $roomModel;

	public function __construct($conexion) {
		parent::__construct($conexion);
		$this->personModel  = new PersonModel($this->conexion);
		$this->serviceModel = new ServiceModel($this->conexion);
		$this->cardModel    = new CardModel($this->conexion);
		$this->roomModel    = new RoomModel($this->conexion);
	}

	public function deleteCheck($idCheck) {//cancelar check_person
		$stateCancelCheck=Constants::$STATE_CHECK_CANCEL;
		$stateCancelConsume=Constants::$STATE_CHECK_CONSUME_CANCEL;
		$query
			= "UPDATE check_person
                SET ID_STATE_CHECK = '$stateCancelCheck'
                WHERE ID_CHECK = '$idCheck'";
		$this->conexion->update($query);
		$query2
			= "UPDATE consume_service
                	   SET ACTIVE_CONSUME_SERVICE = '$stateCancelConsume'
                	   WHERE ID_CHECK = '$idCheck'";
		$this->conexion->update($query2);

		$queryRoom
			= "UPDATE room, consume_service,occupation
 					SET  room.DATE_CHECK_IN_ROOM=curdate(),room.DATE_CHECK_OUT_ROOM=curdate(),
 						 room.TIME_CHECK_IN_ROOM='0000-00-00',room.TIME_CHECK_OUT_ROOM='0000-00-00'
					WHERE consume_service.ID_CHECK = '$idCheck' 
					AND consume_service.ID_CONSUME_SERVICE=occupation.ID_CONSUME_SERVICE 
					AND occupation.ID_ROOM=room.ID_ROOM";
		$this->conexion->update($queryRoom);
	}

	public function deleteConsume_dd($idConsum) {
		$query1 = "UPDATE consume_service SET ACTIVE_CONSUME_SERVICE='-1' WHERE ID_CONSUME_SERVICE='$idConsum'";
		$this->conexion->update($query1);
		//obtener idCheck
		$query2  = "SELECT c.ID_CHECK  FROM consume_service AS c WHERE c.ID_CONSUME_SERVICE='$idConsum'";
		$idCheck = $this->conexion->consultar($query2)[0]['ID_CHECK'];
		//consultar si el check tiene consumos
		$query4 = "SELECT ID_CHECK FROM consume_service WHERE consume_service.ACTIVE_CONSUME_SERVICE>=0 AND ID_CHECK='$idCheck'";
		$check  = $this->conexion->consultar($query4);
		//cambiar estado del check a aliminado
		if (empty($check)) {
			$query5 = "UPDATE check_person SET ID_STATE_CHECK=2 WHERE ID_CHECK='$idCheck'";
			$this->conexion->update($query5);
		}
		//update fecha de ingreso room
		$query6
			= "UPDATE room as r,occupation as o 
                  SET r.DATE_CHECK_OUT_ROOM=curdate(),r.TIME_CHECK_OUT_ROOM=curtime()
                   WHERE r.ID_ROOM=o.ID_ROOM AND o.ID_CONSUME_SERVICE='$idConsum'";
		$this->conexion->update($query6);
	}

	public function deleteMember($idConsume) {
		$queryRemove = "DELETE FROM member_check WHERE ID_CONSUME_SERVICE='$idConsume'";
		$this->conexion->delete($queryRemove);
	}

	public function deleteOccupationRoom($idConsum) {
		$query = "DELETE FROM occupation WHERE ID_CONSUME_SERVICE='$idConsum'";
		$this->conexion->delete($query);
	}

	public function deleteOrderUser($idPerson) {
		$query2
			= "UPDATE check_person AS c
                SET c.ID_STATE_CHECK='2' 
                WHERE c.ID_STATE_CHECK='5' AND c.ID_PERSON_TITULAR='$idPerson'";
		$this->conexion->update($query2);
	}

	public function getCheckPerson($idPerson, $idCheck) {
		$query
			= "SELECT *
                FROM
                    check_person AS chper
                INNER JOIN type_check AS tyche ON chper.ID_TYPE_CHECK = tyche.ID_TYPE_CHECK
                INNER JOIN state_check AS stche ON chper.ID_STATE_CHECK = stche.ID_STATE_CHECK
                INNER JOIN person AS perso ON chper.ID_PERSON_TITULAR = perso.ID_PERSON
                WHERE
                    if($idPerson>0,chper.ID_PERSON_TITULAR = '$idPerson',true)
                AND if($idCheck>0,chper.ID_CHECK = '$idCheck',true)";

		return $this->conexion->consultar($query);
	}

	public function getConsumeFood($idPerson, $idCheck) {
		$query
			= "SELECT * 
				FROM
				 	consume_food as c
					INNER JOIN cost_food as cf ON c.ID_FOOD = cf.ID_FOOD AND c.ID_TYPE_MONEY = cf.ID_TYPE_MONEY AND c.UNIT_COST_FOOD = cf.UNIT_COST_FOOD
					INNER JOIN food as f ON cf.ID_FOOD = f.ID_FOOD
					INNER JOIN type_money as t ON cf.ID_TYPE_MONEY = t.ID_TYPE_MONEY
					INNER JOIN check_person as cp ON c.ID_CHECK = cp.ID_CHECK
				WHERE
					cp.ID_CHECK='$idCheck' AND cp.ID_PERSON_TITULAR='$idPerson'";

		return $this->conexion->consultar($query);
	}

	public function getConsumeHistoryCheck($id_person, $idState, $idType, $isGroupCheck) {
		$query
			= "SELECT *,sum(ce_se.PAY_CONSUME_SERVICE) as TOTAL_PAY, sum(ce_se.PRICE_CONSUME_SERVICE) as TOTAL_PRICE
				FROM
					check_person AS ch_pe
				INNER JOIN consume_service AS ce_se ON ce_se.ID_CHECK = ch_pe.ID_CHECK
				INNER JOIN cost_service AS ct_se ON ce_se.ID_COST_SERVICE = ct_se.ID_COST_SERVICE
				INNER JOIN service AS servi ON ct_se.ID_SERVICE = servi.ID_SERVICE
				INNER JOIN state_service AS st_se ON servi.ID_STATE_SERVICE = st_se.ID_STATE_SERVICE
				INNER JOIN state_check AS se_ch ON ch_pe.ID_STATE_CHECK = se_ch.ID_STATE_CHECK
				INNER JOIN type_consume AS ty_co ON ce_se.ID_TYPE_CONSUME = ty_co.ID_TYPE_CONSUME
				INNER JOIN type_check AS ty_ch ON ch_pe.ID_TYPE_CHECK = ty_ch.ID_TYPE_CHECK
				WHERE
					if($id_person>0,ch_pe.ID_PERSON_TITULAR = '$id_person',ch_pe.ID_PERSON_TITULAR>0)
					AND if($idState>0,ch_pe.ID_STATE_CHECK='$idState',ch_pe.ID_STATE_CHECK>0)
					AND if($idType>0,ch_pe.ID_TYPE_CHECK='$idType',ch_pe.ID_TYPE_CHECK>0)
				GROUP BY if('$isGroupCheck' ,ch_pe.ID_CHECK,ce_se.ID_CONSUME_SERVICE)
				ORDER BY ch_pe.ID_CHECK,ce_se.ID_CONSUME_SERVICE";

		return $this->conexion->consultar($query);
	}

	/**
	 * obtener la lista de habtaciones ocupadas en el consumo requerido
	 *
	 * @param $idConsume :id del consumo
	 * @return array: lista de habitaciones ocupadas en el consumo idConsume
	 */
	public function getConsumeOccupation($idConsume) {
		$query
			      = "SELECT *
                FROM
                    consume_service AS cose
                INNER JOIN type_consume AS tyco ON cose.ID_TYPE_CONSUME = tyco.ID_TYPE_CONSUME
                INNER JOIN occupation AS occu ON occu.ID_CONSUME_SERVICE = cose.ID_CONSUME_SERVICE
                INNER JOIN room ON occu.ID_ROOM = room.ID_ROOM
                INNER JOIN room_model AS tyro ON room.ID_ROOM_MODEL = tyro.ID_ROOM_MODEL
                WHERE cose.ID_CONSUME_SERVICE='$idConsume'
                      AND cose.ACTIVE_CONSUME_SERVICE>0
                GROUP BY cose.ID_CONSUME_SERVICE";
		$resQuery = $this->conexion->consultar($query);

		return $resQuery;
	}

	/**
	 * obtener la lista de habitaciones ocupadas
	 *
	 * @param $idCheck : id del checkPerson
	 * @param $idConsume :id del consumo
	 * @return array : lista de habitaciones ocupadas por la reserva
	 */
	public function getConsumeRoom($idCheck, $idConsume) {
		$query
			      = "SELECT *
                FROM
                    consume_service AS cose
                INNER JOIN type_consume AS tyco ON cose.ID_TYPE_CONSUME = tyco.ID_TYPE_CONSUME
                INNER JOIN occupation AS occu ON occu.ID_CONSUME_SERVICE = cose.ID_CONSUME_SERVICE
                INNER JOIN room ON occu.ID_ROOM = room.ID_ROOM
                INNER JOIN room_model AS tyro ON room.ID_ROOM_MODEL = tyro.ID_ROOM_MODEL
                INNER JOIN cost_service as ct on cose.ID_COST_SERVICE=ct.ID_COST_SERVICE
                INNER JOIN service as serv ON  ct.ID_SERVICE =serv.ID_SERVICE
                WHERE 
                	if($idConsume>0,cose.ID_CONSUME_SERVICE='$idConsume',cose.ID_CONSUME_SERVICE>0)
                AND if($idCheck>0,cose.ID_CHECK='$idCheck',cose.ID_CHECK>0)
                AND cose.ACTIVE_CONSUME_SERVICE>0
                GROUP BY cose.ID_CONSUME_SERVICE";
		$resQuery = $this->conexion->consultar($query);

		return $resQuery;
	}

	public function getConsumeService($idConsume) {
		$query
			      = "SELECT *
                FROM
                    consume_service AS cose
                INNER JOIN type_consume AS tyco ON cose.ID_TYPE_CONSUME = tyco.ID_TYPE_CONSUME
                INNER JOIN cost_service AS ctse ON cose.ID_COST_SERVICE = ctse.ID_COST_SERVICE
				WHERE
					cose.ID_CONSUME_SERVICE = '$idConsume'";
		//dd($query);
		$resQuery = $this->conexion->consultar($query);

		return $resQuery;
	}

	public function getConsumeServices($idPerson, $idCheck) {
		$query
			= "SELECT * 
				FROM
				 	check_person AS chp 
					INNER JOIN consume_service AS cms ON cms.ID_CHECK = chp.ID_CHECK
					INNER JOIN cost_service AS cts ON cms.ID_COST_SERVICE = cts.ID_COST_SERVICE
					INNER JOIN type_money as tm ON cts.ID_TYPE_MONEY = tm.ID_TYPE_MONEY
					INNER JOIN service AS se ON cts.ID_SERVICE = se.ID_SERVICE
					INNER JOIN type_consume AS tc ON cms.ID_TYPE_CONSUME = tc.ID_TYPE_CONSUME 
				WHERE
					cms.ID_CHECK = '$idCheck' 
					AND chp.ID_PERSON_TITULAR = '$idPerson'
					ORDER BY chp.ID_CHECK,cms.ID_CONSUME_SERVICE";

		return $this->conexion->consultar($query);
	}

	public function getCostService($idCost) {
		$query
			= "SELECT *
	              FROM	cost_service
	              INNER JOIN type_money ON cost_service.ID_TYPE_MONEY = type_money.ID_TYPE_MONEY
	              WHERE cost_service.ID_COST_SERVICE = '$idCost'";

		return $this->conexion->consultar($query);
	}

	public function getListCheck($idHotel, $idState, $idType,$idTitular) {
		$query
			= "SELECT *
				FROM check_person
				WHERE
					check_person.ID_TYPE_CHECK = '$idType'
				AND check_person.ID_STATE_CHECK = '$idState'
				and if('$idTitular'>0,check_person.ID_PERSON_TITULAR='$idTitular',true)
				AND check_person.ID_HOTEL='$idHotel';";

		return $this->conexion->consultar($query);
	}

	public function getListCheckConsume($idHotel, $idType, $idState) {
		$stateActive   = 1;
		$stateProgress = 2;
		$query
		               = "SELECT 
					sum(PAY_CONSUME_SERVICE) as payTotal,
					sum(PRICE_CONSUME_SERVICE) as priceTotal,
					count(ID_ROOM) as roomTotal,
					count(co_se.ID_CONSUME_SERVICE) as consumeTotal,
					count(co_se.ACTIVE_CONSUME_SERVICE='$stateActive') as consumeActiveTotal,
					count(co_se.ACTIVE_CONSUME_SERVICE='$stateProgress') as consumeProgressTotal,
					ck_pe.*,co_se.*, te_co.*,p.*
                FROM
                    check_person AS ck_pe
                INNER JOIN consume_service AS co_se ON co_se.ID_CHECK = ck_pe.ID_CHECK
				INNER JOIN type_consume AS te_co ON co_se.ID_TYPE_CONSUME = te_co.ID_TYPE_CONSUME
				INNER JOIN occupation AS occup ON occup.ID_CONSUME_SERVICE = co_se.ID_CONSUME_SERVICE
				INNER JOIN person as p on ck_pe.ID_PERSON_TITULAR = p.ID_PERSON
                WHERE
                    ck_pe.ID_HOTEL = '$idHotel'
                AND ck_pe.ID_STATE_CHECK = '$idState'
                AND ck_pe.ID_TYPE_CHECK = '$idType'
                AND co_se.ACTIVE_CONSUME_SERVICE >= 0
                GROUP BY ck_pe.ID_CHECK
                ORDER BY co_se.ID_CONSUME_SERVICE DESC";

		return $this->conexion->consultar($query);
	}

	public function getListCheckConsumeTitular($idHotel, $idType, $idState,$idPersonTitular) {
		$stateActive   = 1;
		$stateProgress = 2;
		$query      = "SELECT 
							sum(PAY_CONSUME_SERVICE) as payTotal,
							sum(PRICE_CONSUME_SERVICE) as priceTotal,
							count(ID_ROOM) as roomTotal,
							count(co_se.ID_CONSUME_SERVICE) as consumeTotal,
							count(co_se.ACTIVE_CONSUME_SERVICE='$stateActive') as consumeActiveTotal,
							count(co_se.ACTIVE_CONSUME_SERVICE='$stateProgress') as consumeProgressTotal,
							ck_pe.*,co_se.*, te_co.*,p.*
		                FROM
		                    check_person AS ck_pe
		                INNER JOIN consume_service AS co_se ON co_se.ID_CHECK = ck_pe.ID_CHECK
						INNER JOIN type_consume AS te_co ON co_se.ID_TYPE_CONSUME = te_co.ID_TYPE_CONSUME
						INNER JOIN occupation AS occup ON occup.ID_CONSUME_SERVICE = co_se.ID_CONSUME_SERVICE
						INNER JOIN person as p on ck_pe.ID_PERSON_TITULAR = p.ID_PERSON
		                WHERE
		                    ck_pe.ID_HOTEL = '$idHotel'
		                AND ck_pe.ID_PERSON_TITULAR='$idPersonTitular'
		                AND ck_pe.ID_STATE_CHECK = '$idState'
		                AND ck_pe.ID_TYPE_CHECK = '$idType'
		                AND co_se.ACTIVE_CONSUME_SERVICE >= 0
		                GROUP BY ck_pe.ID_CHECK
		                ORDER BY co_se.ID_CONSUME_SERVICE DESC";

		return $this->conexion->consultar($query);
	}

	public function getListCheckConsumeList($idCheck) {//lista de registro check_in en proceso
		$query
			= "SELECT *
                FROM
                    check_person AS ck_pe
                INNER JOIN consume_service AS co_se ON co_se.ID_CHECK = ck_pe.ID_CHECK
                INNER JOIN cost_service AS ct_se ON co_se.ID_COST_SERVICE = ct_se.ID_COST_SERVICE
                INNER JOIN type_money AS te_mo ON ct_se.ID_TYPE_MONEY = te_mo.ID_TYPE_MONEY
                INNER JOIN type_consume AS te_co ON co_se.ID_TYPE_CONSUME = te_co.ID_TYPE_CONSUME
                INNER JOIN occupation AS occup ON occup.ID_CONSUME_SERVICE = co_se.ID_CONSUME_SERVICE
                INNER JOIN room AS rooms ON occup.ID_ROOM = rooms.ID_ROOM
                INNER JOIN service AS servs ON ct_se.ID_SERVICE = servs.ID_SERVICE
                INNER JOIN state_check AS stck ON ck_pe.ID_STATE_CHECK = stck.ID_STATE_CHECK
                INNER JOIN service AS serv ON ct_se.ID_SERVICE = serv.ID_SERVICE
                INNER JOIN room_model AS tyro ON rooms.ID_ROOM_MODEL = tyro.ID_ROOM_MODEL
                WHERE
                    ck_pe.ID_CHECK = '$idCheck'
                AND co_se.ACTIVE_CONSUME_SERVICE >= 0
                GROUP BY co_se.ID_CONSUME_SERVICE
                ORDER BY co_se.ID_CONSUME_SERVICE DESC";

		return $this->conexion->consultar($query);
	}

	public function getListCheckMember($idCheck) {
		$query
			= "SELECT *
                FROM
                    consume_service AS c
                INNER JOIN member_check AS m ON c.ID_CONSUME_SERVICE = m.ID_CONSUME_SERVICE
                INNER JOIN person AS p ON m.ID_PERSON = p.ID_PERSON
                WHERE
                    c.ID_CHECK = '$idCheck' AND m.ACTIVE_MEMBER>0
                GROUP BY p.ID_PERSON";

		return $this->conexion->consultar($query);
	}

	public function getListCheckOut($idHotel, $idState, $idType, $date) {
		$query
			= "SELECT *
				FROM check_person
				WHERE
					check_person.ID_TYPE_CHECK = '$idType'
				AND check_person.ID_STATE_CHECK = '$idState'
				AND check_person.ID_HOTEL='$idHotel'
				AND check_person.DATE_END_CHECK<='$date';";

		return $this->conexion->consultar($query);
	}

	public function getListCheckPending($idHotel, $idState, $idType, $date) {
		$query
			= "SELECT *
				FROM check_person
				WHERE
					check_person.ID_TYPE_CHECK = '$idType'
				AND check_person.ID_STATE_CHECK = '$idState'
				AND check_person.ID_HOTEL='$idHotel'
				AND check_person.DATE_END_CHECK>='$date';";

		return $this->conexion->consultar($query);
	}

	public function getListCheckReserve($idHotel, $idType, $idState) {//lista de registro check_in en proceso
		$query
			= "SELECT *
                FROM
                    check_person AS ck_pe
                INNER JOIN consume_service AS co_se ON co_se.ID_CHECK = ck_pe.ID_CHECK
                INNER JOIN cost_service AS ct_se ON co_se.ID_COST_SERVICE = ct_se.ID_COST_SERVICE
                INNER JOIN type_money AS te_mo ON ct_se.ID_TYPE_MONEY = te_mo.ID_TYPE_MONEY
                INNER JOIN type_consume AS te_co ON co_se.ID_TYPE_CONSUME = te_co.ID_TYPE_CONSUME
                INNER JOIN service AS servs ON ct_se.ID_SERVICE = servs.ID_SERVICE
                INNER JOIN state_check AS stck ON ck_pe.ID_STATE_CHECK = stck.ID_STATE_CHECK
                INNER JOIN service AS serv ON ct_se.ID_SERVICE = serv.ID_SERVICE
                INNER JOIN reserve AS reser ON co_se.ID_CONSUME_SERVICE = reser.ID_CONSUME_SERVICE
                INNER JOIN room_model AS tyro ON reser.ID_ROOM_MODEL = tyro.ID_ROOM_MODEL
                WHERE
                    ck_pe.ID_HOTEL = '$idHotel'
                AND ck_pe.ID_STATE_CHECK = '$idState'
                AND ck_pe.ID_TYPE_CHECK = '$idType'
                AND co_se.ACTIVE_CONSUME_SERVICE >= 0
                GROUP BY co_se.ID_CONSUME_SERVICE
                ORDER BY co_se.ID_CONSUME_SERVICE DESC";

		return $this->conexion->consultar($query);
	}

	public function getListCheckReserveCheck($idHotel,$idCheck) {
		$query
			= "SELECT *
                FROM
                    check_person AS ck_pe
                INNER JOIN consume_service AS co_se ON co_se.ID_CHECK = ck_pe.ID_CHECK
                INNER JOIN cost_service AS ct_se ON co_se.ID_COST_SERVICE = ct_se.ID_COST_SERVICE
                INNER JOIN type_money AS te_mo ON ct_se.ID_TYPE_MONEY = te_mo.ID_TYPE_MONEY
                INNER JOIN type_consume AS te_co ON co_se.ID_TYPE_CONSUME = te_co.ID_TYPE_CONSUME
                INNER JOIN service AS servs ON ct_se.ID_SERVICE = servs.ID_SERVICE
                INNER JOIN state_check AS stck ON ck_pe.ID_STATE_CHECK = stck.ID_STATE_CHECK
                INNER JOIN service AS serv ON ct_se.ID_SERVICE = serv.ID_SERVICE
                INNER JOIN reserve AS reser ON co_se.ID_CONSUME_SERVICE = reser.ID_CONSUME_SERVICE
                INNER JOIN room_model AS tyro ON reser.ID_ROOM_MODEL = tyro.ID_ROOM_MODEL
                WHERE
                    ck_pe.ID_HOTEL = '$idHotel'
                AND co_se.ACTIVE_CONSUME_SERVICE >= 0
                and ck_pe.ID_CHECK='$idCheck'
                GROUP BY co_se.ID_CONSUME_SERVICE
                ORDER BY co_se.ID_CONSUME_SERVICE DESC";

		return $this->conexion->consultar($query);
	}

	public function getListCheckRoom($idHotel, $idType, $idState) {//lista de registro check_in en proceso
		$query
			= "SELECT *
                FROM
                    check_person AS ck_pe
                INNER JOIN consume_service AS co_se ON co_se.ID_CHECK = ck_pe.ID_CHECK
                INNER JOIN cost_service AS ct_se ON co_se.ID_COST_SERVICE = ct_se.ID_COST_SERVICE
                INNER JOIN type_money AS te_mo ON ct_se.ID_TYPE_MONEY = te_mo.ID_TYPE_MONEY
                INNER JOIN type_consume AS te_co ON co_se.ID_TYPE_CONSUME = te_co.ID_TYPE_CONSUME
                INNER JOIN occupation AS occup ON occup.ID_CONSUME_SERVICE = co_se.ID_CONSUME_SERVICE
                INNER JOIN room AS rooms ON occup.ID_ROOM = rooms.ID_ROOM
                INNER JOIN service AS servs ON ct_se.ID_SERVICE = servs.ID_SERVICE
                INNER JOIN state_check AS stck ON ck_pe.ID_STATE_CHECK = stck.ID_STATE_CHECK
                INNER JOIN service AS serv ON ct_se.ID_SERVICE = serv.ID_SERVICE
                INNER JOIN room_model AS tyro ON rooms.ID_ROOM_MODEL = tyro.ID_ROOM_MODEL
                WHERE
                    ck_pe.ID_HOTEL = '$idHotel'
                AND ck_pe.ID_STATE_CHECK = '$idState'
                AND ck_pe.ID_TYPE_CHECK = '$idType'
                AND co_se.ACTIVE_CONSUME_SERVICE >= 0
                GROUP BY co_se.ID_CONSUME_SERVICE
                ORDER BY co_se.ID_CONSUME_SERVICE DESC";

		return $this->conexion->consultar($query);
	}

	public function getListCheckRoomSearch($idHotel, $idType, $idState, $search) {//lista de registro check_in en proceso
		$query
			= "SELECT *
                FROM
                    check_person AS ck_pe
                INNER JOIN person AS pers ON ck_pe.ID_PERSON_TITULAR = pers.ID_PERSON
                INNER JOIN consume_service AS co_se ON co_se.ID_CHECK = ck_pe.ID_CHECK
                INNER JOIN cost_service AS ct_se ON co_se.ID_COST_SERVICE = ct_se.ID_COST_SERVICE
                INNER JOIN type_money AS te_mo ON ct_se.ID_TYPE_MONEY = te_mo.ID_TYPE_MONEY
                INNER JOIN type_consume AS te_co ON co_se.ID_TYPE_CONSUME = te_co.ID_TYPE_CONSUME
                INNER JOIN occupation AS occup ON occup.ID_CONSUME_SERVICE = co_se.ID_CONSUME_SERVICE
                INNER JOIN room AS rooms ON occup.ID_ROOM = rooms.ID_ROOM
                INNER JOIN service AS servs ON ct_se.ID_SERVICE = servs.ID_SERVICE
                INNER JOIN state_check AS stck ON ck_pe.ID_STATE_CHECK = stck.ID_STATE_CHECK
                INNER JOIN service AS serv ON ct_se.ID_SERVICE = serv.ID_SERVICE
                INNER JOIN room_model AS tyro ON rooms.ID_ROOM_MODEL = tyro.ID_ROOM_MODEL
                WHERE
                    ck_pe.ID_HOTEL = '$idHotel'
                AND ck_pe.ID_STATE_CHECK = '$idState'
                AND ck_pe.ID_TYPE_CHECK = '$idType'
                AND co_se.ACTIVE_CONSUME_SERVICE >= 0
                AND pers.EMAIL_PERSON like '%$search%'
                GROUP BY co_se.ID_CONSUME_SERVICE
                ORDER BY co_se.ID_CONSUME_SERVICE DESC";

		return $this->conexion->consultar($query);
	}

	public function getListCheckType($idCheck, $idTypeConsum, $minActive) {
		$query
			             = "SELECT *
				FROM
					person AS pers
				INNER JOIN check_person AS chpe ON chpe.ID_PERSON_TITULAR = pers.ID_PERSON
				INNER JOIN state_check AS stch ON chpe.ID_STATE_CHECK = stch.ID_STATE_CHECK
				INNER JOIN consume_service AS cose ON cose.ID_CHECK = chpe.ID_CHECK
				INNER JOIN type_consume AS tyco ON cose.ID_TYPE_CONSUME = tyco.ID_TYPE_CONSUME
				INNER JOIN type_check AS tych ON chpe.ID_TYPE_CHECK = tych.ID_TYPE_CHECK
				INNER JOIN cost_service AS ctse ON cose.ID_COST_SERVICE = ctse.ID_COST_SERVICE
				INNER JOIN type_money AS tymy ON ctse.ID_TYPE_MONEY = tymy.ID_TYPE_MONEY
				WHERE
					chpe.ID_CHECK = '$idCheck'
				AND tyco.ID_TYPE_CONSUME = '$idTypeConsum'
				AND cose.ACTIVE_CONSUME_SERVICE >='$minActive'";
		$listCheckPerson = $this->conexion->consultar($query);
		$res             = array();
		$i               = 0;
		foreach ($listCheckPerson as $checkPerson) {
			$queryOccupation
				                   = "SELECT * 
							  FROM occupation as o 
							  INNER JOIN room as r ON o.ID_ROOM = r.ID_ROOM
							  INNER JOIN room_model as m ON r.ID_ROOM_MODEL = m.ID_ROOM_MODEL
							  WHERE o.ID_CONSUME_SERVICE='$checkPerson[ID_CONSUME_SERVICE]'";
			$listRoomOccupation    = $this->conexion->consultar($queryOccupation);
			$reserveQuery
				                   = "SELECT * FROM reserve as r 
							INNER JOIN room_model as rm ON r.ID_ROOM_MODEL = rm.ID_ROOM_MODEL
							WHERE r.ID_CONSUME_SERVICE='$checkPerson[ID_CONSUME_SERVICE]'";
			$reserve               = $this->conexion->consultar($reserveQuery);
			$res[$i]               = $checkPerson;
			$res[$i]['OCCUPATION'] = $listRoomOccupation;
			$res[$i]['RESERVE']    = $reserve;
			$i++;
		}

		return $res;
	}

	public function getListConsumReserve($idCheck) {
		return $this->getListConsumeActive($idCheck, 0);
	}

	public function getListConsume($idCheck) {
		return $this->getListConsumeActive($idCheck, 0);
	}

	public function getListConsumeActive($idCheck, $active) {
		$query
			= "SELECT *
                FROM
                    consume_service AS cmse
                INNER JOIN type_consume AS teco ON cmse.ID_TYPE_CONSUME = teco.ID_TYPE_CONSUME
                INNER JOIN cost_service AS ctse ON cmse.ID_COST_SERVICE = ctse.ID_COST_SERVICE
                INNER JOIN type_money AS temy ON ctse.ID_TYPE_MONEY = temy.ID_TYPE_MONEY
                INNER JOIN service AS serv ON serv.ID_SERVICE = ctse.ID_SERVICE
                WHERE
                    cmse.ID_CHECK = '$idCheck'
                AND cmse.ACTIVE_CONSUME_SERVICE >='$active'
                GROUP BY cmse.ID_CONSUME_SERVICE
                ORDER BY cmse.ID_CONSUME_SERVICE ASC";

		return $this->conexion->consultar($query);
	}

	public function getListConsumeFood($idCheck) {
		$query
			= "SELECT *
                FROM
                    consume_food AS cmfo
                INNER JOIN cost_food AS csfo ON cmfo.ID_FOOD = csfo.ID_FOOD
                AND cmfo.ID_TYPE_MONEY = csfo.ID_TYPE_MONEY
                AND cmfo.UNIT_COST_FOOD = csfo.UNIT_COST_FOOD
                INNER JOIN food ON csfo.ID_FOOD = food.ID_FOOD
                INNER JOIN type_money AS tymo ON csfo.ID_TYPE_MONEY = tymo.ID_TYPE_MONEY
                INNER JOIN type_food AS tyfo ON food.ID_TYPE_FOOD = tyfo.ID_TYPE_FOOD
                WHERE
                    cmfo.ID_CHECK = '$idCheck'";

		return $this->conexion->consultar($query);
	}

	public function getListConsumeMember($idConsum) {
		$query
			= "SELECT *
                FROM
                    member_check AS m
                INNER JOIN person AS p ON m.ID_PERSON = p.ID_PERSON
                WHERE m.ACTIVE_MEMBER=1 AND m.ID_CONSUME_SERVICE='$idConsum'
                GROUP BY p.ID_PERSON;";

		return $this->conexion->consultar($query);
	}

	public function getListConsumeRoom($idConsume) {
		$query
			= "SELECT * 
				FROM
				 	consume_service as c	
					INNER JOIN occupation AS o ON c.ID_CONSUME_SERVICE = o.ID_CONSUME_SERVICE
					INNER JOIN room AS r ON o.ID_ROOM = r.ID_ROOM
					INNER JOIN room_model as m ON r.ID_ROOM_MODEL = m.ID_ROOM_MODEL
				WHERE
					c.ID_CONSUME_SERVICE='$idConsume'";

		return $this->conexion->consultar($query);
	}

	public function getListConsumeTypeRoom($idDetail, $dateIn, $timeIn, $dateOut, $timeOut) {
		$query
			= "SELECT *
                  FROM
                    reserve AS res
					INNER JOIN consume_service AS con ON res.ID_CONSUME_SERVICE = con.ID_CONSUME_SERVICE
					INNER JOIN check_person AS che ON con.ID_CHECK = che.ID_CHECK
					INNER JOIN state_check AS stc ON che.ID_STATE_CHECK = stc.ID_STATE_CHECK
					LEFT JOIN occupation as occ ON occ.ID_CONSUME_SERVICE=con.ID_CONSUME_SERVICE
					WHERE
						con.ACTIVE_CONSUME_SERVICE >= 0
					AND stc.VALUE_STATE_CHECK >= 0
					AND res.ID_ROOM_MODEL = '$idDetail'
					AND (
					('$timeIn'>=con.TIME_START_CONSUME_SERVICE AND '$dateIn' BETWEEN con.DATE_START_CONSUME_SERVICE AND con.DATE_END_CONSUME_SERVICE )
					 OR ('$timeOut'<=con.TIME_END_CONSUME_SERVICE AND '$dateOut' BETWEEN con.DATE_START_CONSUME_SERVICE AND con.DATE_END_CONSUME_SERVICE))
					 GROUP BY con.ID_CONSUME_SERVICE";

		return $this->conexion->consultar($query);
	}

	public function getListOcupationRoom() {
		$query
			= "SELECT * 
				FROM consume_service AS c 
				INNER JOIN occupation AS o ON o.ID_CONSUME_SERVICE=c.ID_CONSUME_SERVICE
				INNER JOIN room AS r ON r.ID_ROOM=o.ID_ROOM
				INNER JOIN type_consume AS t ON t.ID_TYPE_CONSUME=c.ID_TYPE_CONSUME";

		return $this->conexion->consultar($query);
	}

	public function getListTeam($idConsum) {
		$query
			= "SELECT *    
	                FROM
	                 member_check AS m
	                INNER JOIN person AS p ON m.ID_PERSON = p.ID_PERSON
	                WHERE
	                    m.ID_CONSUME_SERVICE = '$idConsum'
	                GROUP BY p.ID_PERSON";

		return $this->conexion->consultar($query);
	}

	public function getOccupiedRoom($idConsum) {
		$query
			      = "SELECT *
                FROM
                    consume_service AS cose
                INNER JOIN type_consume AS tyco ON cose.ID_TYPE_CONSUME = tyco.ID_TYPE_CONSUME
                INNER JOIN occupation AS occu ON occu.ID_CONSUME_SERVICE = cose.ID_CONSUME_SERVICE
                INNER JOIN room ON occu.ID_ROOM = room.ID_ROOM
                INNER JOIN room_model AS tyro ON room.ID_ROOM_MODEL = tyro.ID_ROOM_MODEL
                WHERE cose.ID_CONSUME_SERVICE='$idConsum'";
		$resQuery = $this->conexion->consultar($query);

		return $resQuery;
	}

	public function getReserveRoomModelConsume($idConsume) {
		$query
			      = "SELECT *
	                FROM
	                    consume_service AS cose
	                INNER JOIN type_consume AS tyco ON cose.ID_TYPE_CONSUME = tyco.ID_TYPE_CONSUME
	                INNER JOIN reserve r on cose.ID_CONSUME_SERVICE = r.ID_CONSUME_SERVICE
	                INNER JOIN room_model m on r.ID_ROOM_MODEL = m.ID_ROOM_MODEL
	                WHERE cose.ID_CONSUME_SERVICE='$idConsume'";
		$resQuery = $this->conexion->consultar($query);

		return $resQuery;
	}

	public function getServiceRoomModelConsume($idConsume) {
		$query
			      = "SELECT *
                FROM
                    consume_service AS cose
                INNER JOIN type_consume AS tyco ON cose.ID_TYPE_CONSUME = tyco.ID_TYPE_CONSUME
                INNER JOIN cost_service cs on cose.ID_COST_SERVICE = cs.ID_COST_SERVICE
                INNER JOIN service s on cs.ID_SERVICE = s.ID_SERVICE
                INNER JOIN service_room_model model on s.ID_SERVICE = model.ID_SERVICE
                INNER JOIN room_model m on model.ID_ROOM_MODEL = m.ID_ROOM_MODEL
                INNER JOIN room r on m.ID_ROOM_MODEL = r.ID_ROOM_MODEL
                WHERE cose.ID_CONSUME_SERVICE='$idConsume'";
		$resQuery = $this->conexion->consultar($query);

		return $resQuery;
	}

	public function insertCheck($idCheck, $idHotel, $idPersonTitular, $idPersonRec, $dateIni, $timeIni, $dateFin, $timeFin, $idStateCheck, $observation, $idTypeConsum, $idCost, $idRoom, $priceConsum, $payConsum, $idTypeCheck, $typePayConsume) {
		$query4
			= "UPDATE room
					SET DATE_CHECK_IN_ROOM='$dateIni',TIME_CHECK_IN_ROOM='$timeIni',DATE_CHECK_OUT_ROOM='$dateFin',TIME_CHECK_OUT_ROOM='$timeFin'
					WHERE ID_ROOM='$idRoom';";
		$this->conexion->update($query4);
		if ($idCheck < 1) {//insert check person
			$idCheck = $this->insertCheckPerson($idHotel, $idPersonTitular, $idPersonRec, $idStateCheck, $dateIni, $timeIni, $dateFin, $timeFin, $observation, $idTypeCheck);
		}
		if ($idCheck > 0) {
			$this->insertConsumeRoom($idCheck, $idTypeConsum, $idCost, $dateIni, $timeIni, $dateFin, $timeFin, $payConsum, $priceConsum, 'Consumo habitacion', $active = 0, $idRoom, $nUnit = 1, '', $typePayConsume);
			$this->roomModel->updateRoomCheck($idRoom, $timeIni, $dateIni, $timeFin, $dateFin, 1);
		}

		return $idCheck;
	}

	public function insertCheckIn($idCheck, $idHotel, $idPersonTitular, $idPersonRec, $dateIni, $timeIni, $dateFin, $timeFin, $idStateCheck, $observation, $idTypeConsum, $idCost, $idRoom, $priceConsum, $payConsum) {
		$query4
			= "UPDATE room 
				   SET DATE_CHECK_IN_ROOM='$dateIni',TIME_CHECK_IN_ROOM='$timeIni',DATE_CHECK_OUT_ROOM='$dateFin',TIME_CHECK_OUT_ROOM='$timeFin'
				   WHERE ID_ROOM='$idRoom';";
		$this->conexion->update($query4);
		if ($idCheck < 1) {//insert check person
			$idCheck = $this->insertCheckPerson($idHotel, $idPersonTitular, $idPersonRec, $idStateCheck, $dateIni, $timeIni, $dateFin, $timeFin, $observation, $idTypeCheck = 2);
		}
		if ($idCheck > 0) {
			$this->insertConsumeRoom($idCheck, $idTypeConsum, $idCost, $dateIni, $timeIni, $dateFin, $timeFin, $payConsum, $priceConsum, 'Consumo habitacion', $active = 0, $idRoom, $nUnit = 1, '', Constants::$TYPE_PAY_EFFECTIVE);
			$this->roomModel->updateRoomCheck($idRoom, $timeIni, $dateIni, $timeFin, $dateFin, 1);
		}

		return $idCheck;
	}

	public function insertCheckMember($idConsum, $idPerson) {
		$query = "INSERT INTO member_check VALUES ('$idPerson','$idConsum',1);";
		$this->conexion->insert($query);
	}

	public function insertCheckOut($idCheck, $listArticle, $payConsum) {
		$idTypeConsum = 3;//salida check out
		$res          = $query1 = "UPDATE check_person as c SET c.DATE_END_CHECK=curdate() ,c.TIME_END_CHECK=curtime(),c.ID_TYPE_CHECK = '$idTypeConsum',c.ID_STATE_CHECK='6' WHERE c.id_check='$idCheck'";
		$this->conexion->update($query1);
		//insert consum
		$listConsum = $this->getListConsume($idCheck);
		$total      = $payConsum;
		foreach ($listConsum as $consum) {
			$total = $total + $consum['PAY_CONSUME_SERVICE'] - $consum['PRICE_CONSUME_SERVICE'];
			if ($total >= 0) {
				$this->updateConsumRoom($consum['ID_CONSUME_SERVICE'], $consum['ID_TYPE_CONSUME'], $consum['PRICE_CONSUME_SERVICE'], $consum['DETAIL_CONSUME_SERVICE'], $activeConsum = 0);
			}
		}
		if (is_array($listArticle)) {
			foreach ($listArticle as $item) {
				if (!empty($item['idArticle'])) {
					$idConsum = $item['idConsum'];
					foreach ($item['idArticle'] as $idArt) {
						$query2 = "UPDATE article_consum SET ID_STATE_ARTICLE='2' WHERE ID_CONSUME_SERVICE='$idConsum' and id_article='$idArt'";
						$this->conexion->insert($query2);
					}
				}
			}
		}

		return $res;
	}

	public function insertCheckPerson($idHotel, $idPersoTitular, $idPersonRec, $idStateCheck, $dateIniReserve, $timeIniReserve, $dateFinReserve, $timeFinReserve, $observation, $idType) {
		$query
			= "INSERT INTO check_person(ID_CHECK, ID_PERSON_TITULAR, ID_PERSON_RECEPTION, ID_HOTEL, ID_STATE_CHECK,
 											DATE_START_CHECK, TIME_START_CHECK, DATE_END_CHECK, TIME_END_CHECK, 
											OBSERVATIONS_CHECK, ID_TYPE_CHECK, DATE_CREATED_CHECK, TIME_CREATED_CHECK, DATE_UPDATE_CHECK, TIME_UPDATE_CHECK)
                VALUES(DEFAULT,$idPersoTitular,'$idPersonRec','$idHotel','$idStateCheck',
                      '$dateIniReserve','$timeIniReserve','$dateFinReserve','$timeFinReserve',
                      '$observation','$idType',CURDATE(),CURTIME(),CURDATE(),CURTIME())";

		return $this->conexion->insert($query);
	}

	public function insertConsumeFood($idCheck, $idFood, $typeMoney, $unit, $payConsum, $PRICE_COST_FOOD, $unitsConsum, $site, $state) {
		$query
			           = "INSERT INTO consume_food (`ID_CHECK`, `ID_FOOD`, `ID_TYPE_MONEY`, `UNIT_COST_FOOD`, `PRICE_CONSUME_FOOD`, `PAY_CONSUME_FOOD`, `TIME_CONSUME_FOOD`, `DATE_CONSUME_FOOD`,UNIT_CONSUME_FOOD,SITE_CONSUME_FOOD,STATE_CONSUME_FOOD)
                    VALUES ('$idCheck','$idFood', '$typeMoney', '$unit', '$PRICE_COST_FOOD', '$payConsum', curtime(),curdate(), '$unitsConsum','$site','$state');";
		$idConsumeFood = $this->conexion->insert($query);

		$consume=$this->getCheckPerson(0,$idCheck);
		if (!empty($consume)) {
			$idPerson = $consume[0]['ID_PERSON_TITULAR'];

			$consume = $this->getConsumeFood($idPerson, $idCheck);
			$point   = $consume[0]['POINT_OBTAIN_COST_FOOD'] + $consume[0]['POINT_REQUIRED_COST_FOOD'];

			$triggerUpdate = "UPDATE person SET person.POINT_PERSON=person.POINT_PERSON+'$point' WHERE person.ID_PERSON='$idPerson';";
			$this->conexion->update($triggerUpdate);
		}
		return $idConsumeFood;
	}

	public function insertConsumeRoom($idCheck, $idTypeConsum, $idCost, $dateIn, $timeIn, $dateOut, $timeOut, $pay, $priceConsum, $detailConsum, $active, $idRoom, $nUnit, $imageDeposit, $typePayConsume) {
		$query    = "INSERT INTO consume_service VALUES(DEFAULT,'$idCheck','$idTypeConsum','$idCost',
														'$dateIn','$timeIn','$dateOut','$timeOut','$pay','$priceConsum',
														'$detailConsum','$active','$nUnit','$imageDeposit','$typePayConsume');";
		$idConsum = $this->conexion->insert($query);
		if ($idConsum > 0 && $idRoom > 0) {
			//insert occupation
			$query6 = "INSERT INTO occupation (`ID_CONSUME_SERVICE`, `ID_ROOM`) VALUES ('$idConsum', '$idRoom');";
			$this->conexion->insert($query6);
		}

		return $idConsum;
	}

	public function insertOccupationRoom($idConsum, $idRoom, $dateStart, $timeStart, $dateEnd, $timeEnd) {
		$query = "INSERT INTO occupation (`ID_CONSUME_SERVICE`, `ID_ROOM`) VALUES ('$idConsum', '$idRoom');";
		$this->conexion->insert($query);
		$query
			= "UPDATE room 
				SET DATE_CHECK_IN_ROOM='$dateStart',TIME_CHECK_IN_ROOM='$timeStart',DATE_CHECK_OUT_ROOM='$dateEnd',TIME_CHECK_OUT_ROOM='$timeEnd'
				WHERE ID_ROOM='$idRoom';";
		$this->conexion->update($query);
	}

	public function isCheckIn($id_person) {
		$state     = Constants::$STATE_CHECK_ACTIVE;
		$type      = Constants::$TYPE_CHECK_IN;
		$dateToday = date('Y-m-d');
		$timeToday = date('H:m:s');
		$query
		           = "select * 
				from check_person 
				where ID_PERSON_TITULAR='$id_person' 
				and ID_TYPE_CHECK='$type' 
				and ID_STATE_CHECK='$state'
				and DATE_START_CHECK<='$dateToday'
				and IF ( DATE_START_CHECK = '$dateToday', TIME_START_CHECK <= '$timeToday', TRUE ) 
				and DATE_END_CHECK>='$dateToday'
				and IF ( DATE_END_CHECK = '$dateToday', TIME_END_CHECK >= '$timeToday', TRUE )";
		return count($this->conexion->consultar($query)) > 0 ? TRUE : FALSE;
	}

	public function updateCheck($idCheck, $idPersonHuesp, $idPersonRec, $idState, $observation) {
		$query0
			= "UPDATE check_person
                SET ID_PERSON_TITULAR = '$idPersonHuesp',
                    ID_PERSON_RECEPTION = '$idPersonRec',
                    ID_STATE_CHECK = '$idState',
                    OBSERVATIONS_CHECK = '$observation'
                WHERE ID_CHECK = '$idCheck'";
		$this->conexion->update($query0);
	}

	public function updateCheckConsumeService($idCheck, $idConsume, $idPersonHuesp, $idPersonRec, $idState, $observation, $nCard, $idTypeCard, $ccv, $monthExpCard, $yearExpCard, $validCard, $idTypeConsum, $idService, $listRoom, $listTeam) {
		$cost = 0;
		if ($idService > 0) {
			$serviceRoom = $this->serviceModel->getService($idService)[0];
			$cost        = $serviceRoom['cost'];
		}
		if (isset($serviceRoom) && $idCheck > 0) {
			$this->updateCheck($idCheck, $idPersonHuesp, $idPersonRec, $idState, 'actualizacion de consumo');
			$this->cardModel->setIdCheck($idCheck);
			$this->cardModel->syncUp();
			$this->cardModel->setNumber($nCard);
			$this->cardModel->setIdType($idTypeCard);
			$this->cardModel->setMonth($monthExpCard);
			$this->cardModel->setYear($yearExpCard);
			$this->cardModel->setCcv($ccv);
			$this->cardModel->setIsValid($validCard);
			$this->cardModel->update();
			$this->updateConsumRoom($idConsume, $idTypeConsum, $cost, $observation, '1');

			$this->roomModel->updateOcuppationRoom($idConsume, $listRoom);

			$listArticle = isset($_POST['listIdArticle']) ? $_POST['listIdArticle'] : array();

			$articleModel = new ArticleConsumeModel($this->conexion);
			$articleModel->setIdArticle($idConsume);
			$articleModel->delete();

			foreach ($listArticle as $idArticle) {
				$articleModel->setIdState(Constants::$STATE_ARTICLE_TAKEN);
				$articleModel->setIdArticle($idArticle);
				$articleModel->insert();
			}

			if ($idConsume > 0) {
				foreach ($listTeam as $team) {
					$doc = [['idType' => $team['idTypeDoc'],
					         'nDoc'   => $team['nDoc']]];
					$this->personModel->updatePerson($team['idPerson'], $team['name'], $team['app'], '', $team['SEX_PERSON'], $team['dateNac'], $team['EMAIL_PERSON'], $team['address'], $team['CITY_PERSON'], $team['COUNTRY_PERSON'], '', $serviceRoom['point'], $doc, []);
					$this->deleteMemberCheckConsum($idConsume);
					$this->insertCheckMember($idConsume, $team['idPerson']);//insert member_check
				}
			}
		}
	}

	public function updateCheckIncumbentCheck($idCheck, $idPerson) {
		$query0
			= "UPDATE check_person
                	SET ID_PERSON_TITULAR = '$idPerson'
                	WHERE ID_CHECK = '$idCheck'";
		$this->conexion->update($query0);
	}

	public function updateCheckPerson($idStateCheck, $dateIniReserve, $timeIniReserve, $dateFinReserve, $timeFinReserve, $observation, $idCheck) {
		if (empty($dateIniReserve))
			$query1
				= "UPDATE check_person
                   SET ID_STATE_CHECK='$idStateCheck',
						DATE_START_CHECK=if('$dateIniReserve'<>'','$dateIniReserve',DATE_START_CHECK),
						TIME_START_CHECK=if('$timeIniReserve'<>'','$timeIniReserve',TIME_START_CHECK),
						DATE_END_CHECK=if('$dateFinReserve'<>'','$dateFinReserve',DATE_END_CHECK),
						TIME_END_CHECK=if('$timeFinReserve'<>'','$timeFinReserve',TIME_END_CHECK),
						OBSERVATIONS_CHECK='$observation'
                    WHERE ID_CHECK='$idCheck'";

		$this->conexion->update($query1);
	}

	public function updateCheckState($idState, $idCheck) {
		$query = "UPDATE check_person as c SET c.ID_STATE_CHECK='$idState' WHERE c.ID_CHECK='$idCheck';";
		$this->conexion->update($query);
	}

	public function updateCheckType($idType, $idCheck) {
		$query = "UPDATE check_person as c SET c.ID_TYPE_CHECK='$idType' WHERE c.ID_CHECK='$idCheck';";
		$this->conexion->update($query);
	}

	public function updateConsum($listConsum) {
		foreach ($listConsum as $consum) {
			$idConsum = $consum['idConsum'];
			$active   = $consum['active'];
			$idType   = $consum['idType'];
			$pay      = $consum['pay'];
			$detail   = $consum['detail'];
			$this->updateConsumRoom($idConsum, $idType, $pay, $detail, $active);
		}
	}

	public function updateConsumCheckIn($idConsum, $pay) {
		$query = "UPDATE consume_service SET PAY_CONSUME_SERVICE='$pay' WHERE ID_CONSUME_SERVICE='$idConsum'";
		$this->conexion->update($query);
	}

	public function updateConsumCheckInDefault($idConsum) {
		$query1 = "SELECT * 
				  FROM consume_service as con,cost_service as cos  
				  WHERE ID_CONSUME_SERVICE='$idConsum' and con.ID_COST_SERVICE=cos.ID_COST_SERVICE";
		$selectCost=$this->conexion->consultar($query1);
		$totalPrice=0;
		if (!empty($selectCost))
			$totalPrice+=$selectCost[0]['PRICE_COST_SERVICE']*Constants::$PERCENTAGE_PAY_RESERVE;

		$query = "UPDATE consume_service as con 
				  SET PAY_CONSUME_SERVICE='$totalPrice' 
				  WHERE ID_CONSUME_SERVICE='$idConsum'";
		$this->conexion->update($query);
		return $totalPrice;
	}

	public function updateConsumState($idConsum, $active) {
		$query1 = "UPDATE consume_service SET ACTIVE_CONSUME_SERVICE='$active' WHERE ID_CONSUME_SERVICE='$idConsum'";
		$this->conexion->update($query1);

		$query2      = "SELECT * FROM consume_service WHERE ID_CONSUME_SERVICE='$idConsum'";
		$listConsume = $this->conexion->consultar($query2);
		return empty($listConsume) ? 0 : $listConsume[0]['ID_CHECK'];
	}

	public function updatePayCheckIn($idCheck, $totalPay) {
		$listConsume = $this->getListConsume($idCheck);
		foreach ($listConsume as $consume) {
			if ($totalPay==0){
				$this->updateConsumCheckIn($consume['ID_CONSUME_SERVICE'], 0);
			}

			$payConsume = $consume['PRICE_CONSUME_SERVICE'] - $consume['PAY_CONSUME_SERVICE'];
			if ($totalPay > 0 && $payConsume > 0) {
				$payConsume += $consume['PAY_CONSUME_SERVICE'];
				$totalPay   -= $payConsume;
				$this->updateConsumCheckIn($consume['ID_CONSUME_SERVICE'], $payConsume);
			}
		}
	}

	public function updatePayConsumeCard($idCheck, $stateConsumeActive, $pay) {
		$query1 = "UPDATE check_person as cp,card as c,consume_service as cs 
					SET cs.PAY_CONSUME_SERVICE='$pay' 
					WHERE cp.ID_CHECK='$idCheck' 
					and cp.ID_CHECK=c.ID_CHECK 
					and cs.ID_CHECK=c.ID_CHECK 
					and cs.ACTIVE_CONSUME_SERVICE='$stateConsumeActive'";
		$this->conexion->update($query1);
	}

	public function updatePersonMember($idPerson, $idConsume) {
		$queryInsert = "INSERT INTO member_check(ID_PERSON, ID_CONSUME_SERVICE, ACTIVE_MEMBER) VALUES('$idPerson','$idConsume',1)";

		return $this->conexion->insert($queryInsert);
	}

	public function updateTypeReception($idState, $idType, $idCheck, $idPersonReception) {
		$query1 = "UPDATE check_person as c SET c.ID_STATE_CHECK='$idState', c.ID_TYPE_CHECK='$idType',c.ID_PERSON_RECEPTION='$idPersonReception' WHERE c.ID_CHECK='$idCheck'";
		$this->conexion->update($query1);
	}

	public function updateUserState($idPerson, $state) {
		$query0 = "UPDATE user_hotel as u SET u.ID_STATE_USER='$state' WHERE u.ID_PERSON='$idPerson'";
		$this->conexion->update($query0);
	}

	private function deleteMemberCheckConsum($idConsum) {
		$query4 = "DELETE FROM member_check WHERE ID_CONSUME_SERVICE='$idConsum'";
		$this->conexion->delete($query4);
	}

	private function updateConsumRoom($idConsum, $idTypeConsum, $payConsum, $observation, $activeConsum) {
		$query
			= "UPDATE consume_service
                      SET 
                         ID_TYPE_CONSUME='$idTypeConsum',
                         PAY_CONSUME_SERVICE='$payConsum',
                         DETAIL_CONSUME_SERVICE='$observation',
                         ACTIVE_CONSUME_SERVICE='$activeConsum'
                      WHERE ID_CONSUME_SERVICE = '$idConsum'";
		$this->conexion->update($query);
	}
}
