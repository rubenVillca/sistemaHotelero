<?php

class RoomModel extends Consultas {
	//GET
	/**
	 * @param $idRoom : id de habitacion a buscar
	 * @return array: habtiacion con identificacor idRoom
	 */
	public function getRoom($idRoom) {
		return $this->getRoomWhere($idHotel = -1, $idRoom);
	}

	/**
	 * @param $idHotel : Identificador del hotel
	 * @return array: lista de habitaciones habilitadas del hotel
	 */
	public function getListRoom($idHotel) {
		return $this->getRoomWhere($idHotel, $idRoom = -1);
	}

	/**
	 * @param $idDetail : id del RoomModel
	 * @param $dateIn :fecha de ingreso a una habitacion
	 * @param $dateOut :fecha de salida de una habitacion
	 * @param $idHotel : identificador del hotel
	 * @return array: lista de habitaciones de un tipo de habitacion especifico
	 */
	public function getListTypeRoomFreeModel($idDetail, $dateIn, $dateOut, $idHotel) {
		$query = "SELECT room.*,tyro.*
				FROM
					room
				INNER JOIN room_model AS tyro ON room.ID_ROOM_MODEL = tyro.ID_ROOM_MODEL
				LEFT JOIN (
							SELECT
								r.*
							FROM
								room AS r
							INNER JOIN occupation AS oc ON oc.ID_ROOM = r.ID_ROOM
							INNER JOIN consume_service AS co ON oc.ID_CONSUME_SERVICE = co.ID_CONSUME_SERVICE
							WHERE co.ACTIVE_CONSUME_SERVICE=1 
								AND (
								(
									'$dateOut' > co.DATE_START_CONSUME_SERVICE
									AND '$dateOut' > co.DATE_END_CONSUME_SERVICE
									AND '$dateIn' > co.DATE_END_CONSUME_SERVICE
								)
								OR (
									'$dateIn' < co.DATE_START_CONSUME_SERVICE
									AND '$dateOut' < co.DATE_END_CONSUME_SERVICE
									AND '$dateOut' < co.DATE_START_CONSUME_SERVICE
								)OR (
								  '$dateIn'=co.DATE_END_CONSUME_SERVICE
								)
							)
						) as r2 ON room.ID_ROOM=r2.id_room
				WHERE
				  		room.ID_HOTEL = '$idHotel'
					AND ( 
                            (
                                '$dateOut' >= room.DATE_CHECK_IN_ROOM 
                                AND '$dateOut' >= room.DATE_CHECK_OUT_ROOM 
                                AND '$dateIn' >= room.DATE_CHECK_OUT_ROOM
                            )OR (
                                '$dateIn' <= room.DATE_CHECK_IN_ROOM 
                                AND '$dateOut' <= room.DATE_CHECK_OUT_ROOM 
                                AND '$dateOut' <= room.DATE_CHECK_IN_ROOM
                            )OR (
                              '$dateIn'=room.DATE_CHECK_OUT_ROOM
                            )
						)
					AND room.STATE_ROOM > 0
					AND tyro.VALUE_TYPE_ROOM_MODEL='1'
					AND tyro.ID_ROOM_MODEL='$idDetail'
					GROUP BY
						room.ID_ROOM
					ORDER BY
						room.DATE_CHECK_OUT_ROOM,room.TIME_CHECK_OUT_ROOM ASC";

		return $this->conexion->consultar($query);
	}

	/**
	 * @param $dateIn : fecha de ingreso a una habitacion
	 * @param $dateOut : fecha de salida de una habitacion
	 * @param $nPerson : cantidad de personas q quieren ingresar a la habtiacion
	 * @param $nBoy
	 * @param $idHotel : identificador del hotel donde estan las habitaciones
	 * @return array : lista de tipos habitaciones disponibles en las fechas dadas
	 */
	public function getListModelRoomFree($dateIn, $dateOut, $nPerson, $nBoy, $idHotel) {//lista de habitaciones disponibles
		$query = "SELECT
						count(room.ID_ROOM) as TOTAL_ROOM,
						(tyro.UNIT_ADULT_ROOM_MODEL+tyro.UNIT_BOY_ROOM_MODEL)*count(room.ID_ROOM) as TOTAL_PERSON,
						room.*,
						tyro.*,
						stro.*,
						serv.*,
						stse.*,
						tyse.*
					FROM
						room
					INNER JOIN room_model AS tyro ON room.ID_ROOM_MODEL = tyro.ID_ROOM_MODEL
					INNER JOIN service_room_model AS stro ON stro.ID_ROOM_MODEL = tyro.ID_ROOM_MODEL
					INNER JOIN service AS serv ON stro.ID_SERVICE = serv.ID_SERVICE
					INNER JOIN state_service AS stse ON serv.ID_STATE_SERVICE = stse.ID_STATE_SERVICE
					INNER JOIN type_service AS tyse ON serv.ID_TYPE_SERVICE = tyse.ID_TYPE_SERVICE
					LEFT JOIN (
							SELECT
								r.*
							FROM
								room AS r
							INNER JOIN occupation AS oc ON oc.ID_ROOM = r.ID_ROOM
							INNER JOIN consume_service AS co ON oc.ID_CONSUME_SERVICE = co.ID_CONSUME_SERVICE
							WHERE co.ACTIVE_CONSUME_SERVICE=1 
								AND (
								(
									'$dateOut' > co.DATE_START_CONSUME_SERVICE
									AND '$dateOut' > co.DATE_END_CONSUME_SERVICE
									AND '$dateIn' > co.DATE_END_CONSUME_SERVICE
								)
								OR (
									'$dateIn' < co.DATE_START_CONSUME_SERVICE
									AND '$dateOut' < co.DATE_END_CONSUME_SERVICE
									AND '$dateOut' < co.DATE_START_CONSUME_SERVICE
								)OR (
								  '$dateIn'=co.DATE_END_CONSUME_SERVICE
								)
							)
						) as r2 ON room.ID_ROOM=r2.id_room
					WHERE
						r2.id_room is NULL
						AND room.ID_HOTEL = '$idHotel'
						AND room.STATE_ROOM > 0
						AND tyro.VALUE_TYPE_ROOM_MODEL='1'
						AND stse.VALUE_STATE_SERVICE>0
						AND tyse.VALUE_TYPE_SERVICE>0
						AND (tyro.UNIT_ADULT_ROOM_MODEL)>='$nPerson'
						AND (tyro.UNIT_BOY_ROOM_MODEL)>='$nBoy'
						GROUP BY
							stro.ID_ROOM_MODEL
						ORDER BY
							tyro.ID_ROOM_MODEL, room.DATE_CHECK_OUT_ROOM,room.TIME_CHECK_OUT_ROOM,serv.ID_SERVICE,serv.ID_TYPE_SERVICE ASC";

		return $this->conexion->consultar($query);
	}

	/**
	 * @param $dateIni : fecha de ingreso a una habitacion
	 * @param $dateOut : fecha de salida de la habitacion
	 * @param $idHotel : identificador del hotel donde estan las habitaciones
	 * @return array: lista de habtiaciones ocupadas en el hotel
	 */
	public function getListOccupiedRoom($dateIni, $dateOut, $idHotel) {
		$query = "SELECT
					room.*
				FROM
					room
				INNER JOIN room_model AS tyro ON room.ID_ROOM_MODEL = tyro.ID_ROOM_MODEL
				INNER JOIN occupation AS occu ON occu.ID_ROOM = room.ID_ROOM
				INNER JOIN consume_service AS cose ON cose.ID_CONSUME_SERVICE=occu.ID_CONSUME_SERVICE
				WHERE  
					room.STATE_ROOM > 0
					AND room.ID_HOTEL='$idHotel'
					AND cose.ACTIVE_CONSUME_SERVICE>=0
					AND NOT ( 
                            (
                                '$dateOut' > cose.DATE_START_CONSUME_SERVICE 
                                AND '$dateOut' > cose.DATE_END_CONSUME_SERVICE 
                                AND '$dateIni' > cose.DATE_END_CONSUME_SERVICE
                            )OR (
                                '$dateIni' < cose.DATE_START_CONSUME_SERVICE 
                                AND '$dateOut' < cose.DATE_END_CONSUME_SERVICE
                                AND '$dateOut' < cose.DATE_START_CONSUME_SERVICE
                            )OR (
                              '$dateIni'=cose.DATE_END_CONSUME_SERVICE
                            )
						)
				
					GROUP BY
						room.ID_ROOM
					ORDER BY
						room.DATE_CHECK_OUT_ROOM,room.TIME_CHECK_OUT_ROOM ASC";

		return $this->conexion->consultar($query);
	}

	//UPDATE
	public function updateRoom($idRoom, $nameRoom, $idHotel, $idTypeRoom, $urlImg, $state) {
		$room = $this->getRoom($idRoom);
		$urlImg = !empty($urlImg) ?: $room[0]['IMAGE_ROOM'];
		$query0 = "UPDATE room
                    SET NAME_ROOM='$nameRoom',ID_HOTEL='$idHotel',ID_ROOM_MODEL='$idTypeRoom',IMAGE_ROOM='$urlImg',STATE_ROOM='$state'
                    WHERE ID_ROOM = '$idRoom'";
		$this->conexion->update($query0);

		return $idRoom;
	}

	public function updateStateRoom($idRoom, $state) {
		$query0 = "UPDATE room
                        SET STATE_ROOM='$state'
                        WHERE ID_ROOM = '$idRoom'";
		$this->conexion->update($query0);

		return 1;
	}

	public function updateOcuppationRoom($idConsum, $listRoom) {
		foreach($listRoom as $idRoom) {
			$query0 = "UPDATE occupation as occ
                        SET ID_ROOM = '$idRoom',
                        WHERE occ.ID_CONSUME_SERVICE = '$idConsum' AND occ.ID_ROOM='$idRoom'";
			$this->conexion->update($query0);
		}
	}

	public function updateRoomCheck($idRoom, $timeIni, $dateIni, $timeFin, $dateFin, $state) {
		$query = "UPDATE room 
              set room.DATE_CHECK_IN_ROOM='$dateIni',room.DATE_CHECK_OUT_ROOM='$dateFin',room.TIME_CHECK_IN_ROOM='$timeIni', room.TIME_CHECK_OUT_ROOM='$timeFin',room.STATE_ROOM='$state' 
              WHERE room.ID_ROOM='$idRoom'";
		$this->conexion->update($query);
	}
	//INSERT

	/**
	 * @param $room : array de habitacion con el nombre y modelo de habitacion
	 * @param $urlImg : direccion donde esta almacenada la imagen
	 * @param $idHotel : identificador del hotel
	 * @return int: identificador de la habitacion insertada
	 */
	public function insertRoom($room, $urlImg, $idHotel) {
		$nameRoom = $room['nameRoom'];
		$idType = $room['idDetailRoom'];
		$stateDefault = 1;//state=1  activo
		$query1 = "INSERT INTO room ('ID_ROOM', 'NAME_ROOM', 'ID_HOTEL', 'ID_ROOM_MODEL', 'IMAGE_ROOM', 'STATE_ROOM', 
									'DATE_CREATED_ROOM', 'TIME_CREATED_ROOM', 'DATE_CHECK_OUT_ROOM', 'TIME_CHECK_OUT_ROOM','DATE_CHECK_IN_ROOM', 'TIME_CHECK_IN_ROOM')
						 VALUES (DEFAULT , '$nameRoom', '$idHotel', '$idType', '$urlImg', '$stateDefault', curdate(),curtime(),curdate(),curtime(),curdate(),curtime());";
		$idRoom = $this->conexion->insert($query1);

		return $idRoom;
	}
	//private

	/**
	 * @param $idHotel : Identificador del hotel
	 * @param $idRoom : id de la habitacion a mostrar
	 * @return array: lista de habitaciones
	 */
	private function getRoomWhere($idHotel, $idRoom) {
		$where = '';
		if($idHotel > 0)
			$where = $where." AND roo.ID_HOTEL ='$idHotel'";
		if($idRoom > 0)
			$where = $where." AND roo.ID_ROOM = '$idRoom'";
		$query = "SELECT *
                FROM
                    room AS roo,
                    room_model AS tro
                WHERE
                    roo.ID_ROOM_MODEL = tro.ID_ROOM_MODEL
                AND roo.STATE_ROOM >= 0 $where";

		return $this->conexion->consultar($query);
	}
}