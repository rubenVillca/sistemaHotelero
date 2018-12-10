<?php

class ModelRoomModel extends Consultas {
	//GET
	public function getTypeRoom($idType) {
		$query = "SELECT *
                    FROM room_model AS d
                    WHERE d.ID_ROOM_MODEL = '$idType'";

		return $this->conexion->consultar($query);
	}

	public function getListTypeRoomDisable() {
		return $this->getListTypeRoomSelect(0);
	}

	public function getListTypeRoomHabFree() {//tipo de habitacion q no esten sieno utilizados en un servicio
		$query = "SELECT tro.*
                FROM
                room_model AS tro
                LEFT OUTER JOIN service_room_model AS str ON tro.ID_ROOM_MODEL=str.ID_ROOM_MODEL
                WHERE tro.VALUE_TYPE_ROOM_MODEL=1 AND str.ID_ROOM_MODEL IS NULL";

		return $this->conexion->consultar($query);
	}

	public function getListTypeRoomHab() {
		return $this->getListTypeRoomSelect(1);
	}

	public function getListTypeRoomAmb() {
		return $this->getListTypeRoomSelect(2);
	}

	//INSERT
	public function insertTypeRoom($name, $descr, $nAdult, $nBoy, $nPet, $value, $img) {
		$query = "INSERT INTO room_model 
                      VALUES (DEFAULT ,'$name','$descr',curdate(),curtime(),'$img','$nAdult','$nBoy','$nPet','$value');";

		return $this->conexion->insert($query);
	}

	//UPDATE
	public function updateTypeRoom($idType, $name, $descr, $nAdul, $nBoy, $nPet, $value, $urlImg) {
		if($urlImg == '') {
			$question = "UPDATE room_model AS t
                    SET t.VALUE_TYPE_ROOM_MODEL = '$value',t.NAME_ROOM_MODEL='$name', t.DESCRIPTION_ROOM_MODEL='$descr', t.DATE_CREATED_ROOM_MODEL=CURDATE(), t.TIME_CREATED_ROOM_MODEL=CURTIME(),t.UNIT_ADULT_ROOM_MODEL='$nAdul',t.UNIT_BOY_ROOM_MODEL='$nBoy',t.UNIT_PET_ROOM_MODEL=$nPet
                    WHERE t.ID_ROOM_MODEL = '$idType'";
		}
		else {
			$question = "UPDATE room_model AS t
                    SET t.VALUE_TYPE_ROOM_MODEL = '$value',t.NAME_ROOM_MODEL='$name', t.DESCRIPTION_ROOM_MODEL='$descr', t.DATE_CREATED_ROOM_MODEL=CURDATE(), t.TIME_CREATED_ROOM_MODEL=CURTIME(),t.IMAGE_ROOM_MODEL='$urlImg',t.UNIT_ADULT_ROOM_MODEL='$nAdul',t.UNIT_BOY_ROOM_MODEL='$nBoy'
                    WHERE t.ID_ROOM_MODEL = '$idType'";
		}
		$this->conexion->update($question);
	}

	//DELETE
	public function deleteTypeRoom($idType) {
		$question = "UPDATE room_model as t
                    SET t.VALUE_TYPE_ROOM_MODEL = '-1'
                    WHERE t.ID_ROOM_MODEL = '$idType'";
		$this->conexion->insert($question);
	}

	//private
	private function getListTypeRoomSelect($value) {
		$query = "SELECT *
                FROM
                    room_model AS d
                WHERE d.VALUE_TYPE_ROOM_MODEL='$value'";

		return $this->conexion->consultar($query);
	}
}