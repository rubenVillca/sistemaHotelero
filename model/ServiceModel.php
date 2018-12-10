<?php
require_once 'model/FoodModel.php';

class ServiceModel extends Consultas {
	private $foodModel;

	public function __construct($conexion) {
		parent::__construct($conexion);
		$this->foodModel = new FoodModel($conexion);
	}

	//SERVICE
	public function updateServiceState($idService, $idState) {
		$query1 = "UPDATE service as s
               SET s.ID_STATE_SERVICE='$idState'
               WHERE s.ID_SERVICE='$idService'";
		$this->conexion->update($query1);
	}

	public function getServiceList($idHotel) {
		return $this->getServicesList($idHotel, 0, 0);
	}

	public function getServiceListActive($idHotel) {
		return $this->getServicesList($idHotel, 1, 0);
	}

	public function getServiceListConsum($idHotel) {
		return $this->getServiceListValue($idHotel, $valueType = 1);
	}

	//LIST_SERVICE
	public function getServiceCost($idService, $nUnit, $nDay, $nHour) {
		return $this->getServiceCostLists($idService, $nUnit, $nDay, $nHour);
	}

	public function getServiceCostLists($idService, $nUnit, $nDay, $nHour) {
		$where = '';
		if($nUnit > 0)
			$where = $where.' AND cse.UNIT_COST_SERVICE='.$nUnit;
		if($nDay > 0)
			$where = $where.' AND cse.UNIT_DAY_COST_SERVICE='.$nDay;
		if($nHour > 0)
			$where = $where.' AND cse.UNIT_HOUR_COST_SERVICE='.$nHour;
		$query = "SELECT cse.*,tmo.*
                FROM
                    cost_service AS cse
                INNER JOIN type_money AS tmo ON cse.ID_TYPE_MONEY = tmo.ID_TYPE_MONEY
                WHERE
                    cse.ID_SERVICE = '$idService' AND  cse.ACTIVE_COST_SERVICE=1
                     $where
                    GROUP BY cse.ID_SERVICE,cse.UNIT_COST_SERVICE,cse.UNIT_DAY_COST_SERVICE,cse.UNIT_HOUR_COST_SERVICE, cse.TIME_CREATED_COST_SERVICE DESC ";

		return $this->conexion->consultar($query);
	}

	public function getServiceCostList($idService) {
		return $this->getServiceCostLists($idService, -1, -1, -1);
	}

	public function getServiceTypeRoom($idService) {//lista de tipos de habitacion en un cuarto
		$query = "SELECT *
                FROM
                    service_room_model AS str
                INNER JOIN room_model AS tro ON str.ID_ROOM_MODEL = tro.ID_ROOM_MODEL
                WHERE
                    str.ID_SERVICE = '$idService' AND str.UNIT_ROOM_MODEL>0";

		return $this->conexion->consultar($query);
	}

	public function getServiceListOffer($idHotel) {
		return $this->getOfferListValue($idHotel, $stateValue = -2);
	}

	public function getServiceTypeOffer($idHotel) {
		return $this->getServiceListType($idHotel, -2);
	}

	//SERVICE_COST
	public function getServiceListType($idHotel, $idTypeService) {
		//lista de servicios de tipo x
		return $this->getServicesList($idHotel, 1, $idTypeService);
	}

	public function insertOffer($name, $idStateService, $idTypeService, $descr, $dateIni, $timeIni, $dateFin, $timeFin, $imgService, $listTypeRoom, $listCost, $isReserved, $idHotel) {
		$idService = $this->insertService($name, $idTypeService, $listTypeRoom, $idStateService, $listCost, $imgService, $descr, $isReserved, $idHotel);
		//Insertar fechas a los serivicios
		$this->insertServiceDate($idService, $dateIni, $timeIni, $dateFin, $timeFin, 1);

		return $idService;
	}

	public function insertService($name, $idTypeService, $listTypeRoom, $idStateService, $listCost, $imgService, $descr, $isReserve, $idHotel) {
		$query1 = "INSERT INTO service VALUES (DEFAULT ,'$idStateService','$idHotel','$idTypeService','$name','$descr','$imgService','$isReserve');";
		$idService = $this->conexion->insert($query1);
		if($idService > 0) {
			$nRoom = 1;
			$this->insertServiceTypeRoom($listTypeRoom, $idService, $nRoom);
			$this->insertServiceListCost($idService, $listCost);
		}

		return $idService;
	}

	public function insertServiceListCost($idService, $listCost) {
		$i = 0;
		foreach($listCost as $cost) {
			$i = $this->insertServiceCost($idService, $cost);
		}

		return $i;
	}

	public function insertServiceDate($idService, $dateIni, $timeIni, $dateFin, $timeFin, $isActive) {
		$query5 = "INSERT INTO offer VALUES (DEFAULT ,'$idService','$dateIni','$timeIni','$dateFin','$timeFin','$isActive')";

		return $this->conexion->insert($query5);
	}

	public function updateOffer($idOffer, $idDate, $name, $descr, $dateIni, $timeIni, $dateFin, $timeFin, $idState, $idType, $addressImg, $listCost, $listTypeRoom, $isReserved) {
		$this->foodModel->deleteMenu($idOffer);//eliminar menu_offer
		$this->updateService($idOffer, $name, $idType, $idState, $descr, $addressImg, $listTypeRoom, $listCost, $isReserved);
		$this->updateServiceDate($idOffer, $idDate, $dateIni, $timeIni, $dateFin, $timeFin, 1);
	}

	//SERVICE_TYPE_ROOM
	public function updateService($idService, $name, $typeService, $stateService, $descr, $imgService, $listTypeRoom, $cost, $isReserved) {
		//ACTUALIZAR SERVICIO
		$service = $this->getService($idService);
		$imgService = empty($imgService) ? $service[0]['IMAGE_SERVICE'] : $imgService;
		$query1 = "UPDATE service 
                       SET NAME_SERVICE = '$name', DESCRIPTION_SERVICE = '$descr', ID_STATE_SERVICE = '$stateService', ID_TYPE_SERVICE = '$typeService',IMAGE_SERVICE='$imgService',RESERVED_SERVICE='$isReserved'
                       WHERE ID_SERVICE = '$idService'";
		$this->conexion->update($query1);
		//ACTUALIZAR COSTOS
		$this->deleteServiceCost($idService);
		foreach($cost as $item) {
			$query9 = "SELECT * FROM cost_service WHERE ID_SERVICE='$idService' AND UNIT_COST_SERVICE='$item[nUnit]' AND UNIT_DAY_COST_SERVICE='$item[nDay]' AND UNIT_HOUR_COST_SERVICE='$item[nHour]'";
			$res = $this->conexion->consultar($query9);
			if(empty($res))
				$this->insertServiceCost($idService, $item);
			else {
				$query2 = "UPDATE cost_service as c
                 SET  c.ID_TYPE_MONEY='$item[idTypeMoney]', c.PRICE_COST_SERVICE='$item[nCost]', c.POINT_OBTAIN_COST_SERVICE='$item[pointObtain]',c.POINT_REQUIRED_COST_SERVICE='$item[pointRequired]',c.ACTIVE_COST_SERVICE='1'
                 WHERE c.ID_SERVICE='$idService' AND c.UNIT_COST_SERVICE='$item[nUnit]' AND c.UNIT_DAY_COST_SERVICE='$item[nDay]' AND c.UNIT_HOUR_COST_SERVICE='$item[nHour]'";
				$this->conexion->update($query2);
			}
		}
		//ACTUALIZAR HABITACIONES
		$this->deleteServiceTypeRoom($idService);
		foreach($listTypeRoom as $idTypeRoom) {
			$query3 = "UPDATE service_room_model SET UNIT_ROOM_MODEL ='1' WHERE ID_SERVICE='$idService' AND ID_ROOM_MODEL='$idTypeRoom'";
			$this->conexion->update($query3);
		}
		$this->insertServiceTypeRoom($listTypeRoom, $idService, 1);
	}

	public function getService($idService) {
		$query = "SELECT *
                FROM
                    service AS ser
                INNER JOIN type_service AS tse ON ser.ID_TYPE_SERVICE = tse.ID_TYPE_SERVICE
                INNER JOIN state_service AS sse ON ser.ID_STATE_SERVICE = sse.ID_STATE_SERVICE
                WHERE
                    ser.ID_SERVICE = '$idService' AND sse.VALUE_STATE_SERVICE>=0";

		return $this->conexion->consultar($query);
	}

	public function getDateOffer($idOffer) {
		$query = "SELECT *
                FROM
                    offer AS sda
                WHERE
                    sda.ID_SERVICE = '$idOffer' AND sda.ACTIVE_OFFER>=0";

		return $this->conexion->consultar($query);
	}

	//OFFER
	private function getServicesList($idHotel, $valueTypeService, $idType) {
		$query = "SELECT *
                FROM
                    service AS ser
                INNER JOIN type_service AS tse ON ser.ID_TYPE_SERVICE = tse.ID_TYPE_SERVICE
                INNER JOIN state_service AS sse ON ser.ID_STATE_SERVICE = sse.ID_STATE_SERVICE
                WHERE
                    ser.ID_HOTEL = '$idHotel'
                    AND sse.VALUE_STATE_SERVICE>='$valueTypeService'
                    AND if('$idType'>0,ser.ID_TYPE_SERVICE='$idType',true )
                    AND if('$valueTypeService' = -2,tse.VALUE_TYPE_SERVICE='$valueTypeService',tse.VALUE_TYPE_SERVICE>0)
                GROUP BY ser.ID_SERVICE
                ORDER BY ser.ID_SERVICE ASC";

		return $this->conexion->consultar($query);
	}

	public function getServiceListValue($idHotel, $value) {
		$query = "SELECT *
                FROM
                     service AS ser
                INNER JOIN type_service AS tse ON ser.ID_TYPE_SERVICE = tse.ID_TYPE_SERVICE
                INNER JOIN state_service AS sse ON ser.ID_STATE_SERVICE = sse.ID_STATE_SERVICE
                INNER JOIN cost_service AS cse ON ser.ID_SERVICE = cse.ID_SERVICE
                WHERE
                    ser.ID_HOTEL = '$idHotel'
                AND tse.VALUE_TYPE_SERVICE='$value'
                AND sse.VALUE_STATE_SERVICE>0
                AND cse.PRICE_COST_SERVICE>0
                GROUP BY ser.ID_SERVICE
                ORDER BY ser.ID_SERVICE";

		return $this->conexion->consultar($query);
	}

	private function getOfferListValue($idHotel, $value) {
		$query = "SELECT *
                FROM
                    offer AS sda
                INNER JOIN service AS ser ON sda.ID_SERVICE = ser.ID_SERVICE
                INNER JOIN type_service AS tse ON ser.ID_TYPE_SERVICE = tse.ID_TYPE_SERVICE
                INNER JOIN state_service AS sse ON ser.ID_STATE_SERVICE = sse.ID_STATE_SERVICE
                INNER JOIN cost_service AS cse ON ser.ID_SERVICE=cse.ID_SERVICE
                INNER JOIN type_money AS tmo ON cse.ID_TYPE_MONEY=tmo.ID_TYPE_MONEY
                WHERE
                    sda.ACTIVE_OFFER >= 0
                AND ser.ID_HOTEL = '$idHotel'
                AND tse.VALUE_TYPE_SERVICE='$value'
                AND sse.VALUE_STATE_SERVICE>0
                GROUP BY ser.ID_SERVICE
                ORDER BY ser.ID_SERVICE";

		return $this->conexion->consultar($query);
	}

	private function insertServiceTypeRoom($listTypeRoom, $idService, $nRoom) {
		foreach($listTypeRoom as $idTypeRoom) {
			$query2 = "INSERT INTO service_room_model VALUES ('$idTypeRoom','$idService','$nRoom',CURDATE(),CURTIME())";
			$this->conexion->insert($query2);
		}
	}

	private function insertServiceCost($idService, $cost) {
		$query = "INSERT INTO cost_service(`ID_COST_SERVICE`, `ID_SERVICE`, `ID_TYPE_MONEY`, `UNIT_COST_SERVICE`, `UNIT_DAY_COST_SERVICE`, `UNIT_HOUR_COST_SERVICE`,
 `PRICE_COST_SERVICE`, `POINT_OBTAIN_COST_SERVICE`, `POINT_REQUIRED_COST_SERVICE`, `ACTIVE_COST_SERVICE`, `TIME_CREATED_COST_SERVICE`, `DATE_CREATED_COST_SERVICE`) 
							VALUES (DEFAULT,'$idService',
									'$cost[idTypeMoney]',
									'$cost[nUnit]',
									'$cost[nDay]',
									'$cost[nHour]',
									'$cost[nCost]',
									'$cost[pointObtain]',
									'$cost[pointRequired]',
									1,
									curtime(),
									curdate());";
		$i = $this->conexion->insert($query);

		return $i;
	}

	//DATE_OFFER
	private function deleteServiceCost($idService) {
		$query = "UPDATE cost_service as c SET c.ACTIVE_COST_SERVICE='0' WHERE c.ID_SERVICE='$idService'";
		$this->conexion->update($query);
	}

	private function deleteServiceTypeRoom($idService) {
		$query = "UPDATE service_room_model as c SET c.UNIT_ROOM_MODEL='0' WHERE c.ID_SERVICE='$idService'";
		$this->conexion->update($query);
	}

	private function updateServiceDate($idOffer, $idDate, $dateIni, $timeIni, $dateFin, $timeFin, $isDateActive) {
		$query1 = "UPDATE
                    offer as d
                SET
                    d.ID_SERVICE='$idOffer',d.DATE_INI_OFFER='$dateIni',d.TIME_INI_OFFER='$timeIni',d.DATE_FIN_OFFER='$dateFin',d.TIME_FIN_OFFER='$timeFin',d.ACTIVE_OFFER='$isDateActive'
                WHERE d.ID_OFFER='$idDate'";
		$this->conexion->update($query1);
	}
}