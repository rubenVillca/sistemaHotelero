<?php

class RuleModel extends Consultas {
	//**************************************************************************************************** RULES **/
	public function getListRule($idHotel) {
		$query = "SELECT *
                    FROM
                        rule AS rul
                    INNER JOIN type_rule AS tru ON rul.ID_TYPE_RULE = tru.ID_TYPE_RULE
                    WHERE
                        tru.VALUE_TYPE_RULE >= 0
                    AND rul.STATE_RULE >= 0
                    AND rul.ID_HOTEL='$idHotel'
                    ORDER BY rul.ID_TYPE_RULE;";

		return $this->conexion->consultar($query);
	}

	public function insertRule($idHotel, $nameRule, $idTypeRule, $descrRule, $stateRule) {
		if($idTypeRule > 0 && $idHotel > 0) {
			$query = "INSERT INTO rule VALUES ('$idTypeRule','$idHotel','$nameRule','$descrRule','$stateRule')";
			$this->conexion->insert($query);
		}
	}

	public function updateStateRule($idHotel, $nameRule) {
		if($idHotel > 0) {
			$stateRule = -1;//estadoo eliminado
			$query = "UPDATE rule
                        SET STATE_RULE = '$stateRule'
                        WHERE
                            ID_HOTEL = '$idHotel' 
                            AND NAME_RULE='$nameRule'";
			$this->conexion->update($query);
		}
	}

	public function updateRule($nameLast, $idHotel, $nameRule, $idTypeRule, $descrRule, $stateRule) {
		if($idTypeRule > 0 && $idHotel > 0) {
			$query = "UPDATE rule
                    SET ID_TYPE_RULE='$idTypeRule',
                        NAME_RULE='$nameRule',
                        DESCRIPTION_RULE='$descrRule',
                        STATE_RULE = '$stateRule'
                    WHERE
                        ID_HOTEL = '$idHotel' 
                        AND NAME_RULE='$nameLast'";
			$this->conexion->update($query);
		}
	}
}