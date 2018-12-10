<?php

class StatisticalModel extends Consultas {
	public function getDistribution($dateIn, $dateOut, $idService, $idHotel) {
		$query = "SELECT
                    ser.*,
                    tmo.*,
                    COUNT(con.ID_CONSUME_SERVICE) AS TOTAL_CONSUM,
                    con.DATE_START_CONSUME_SERVICE AS DATE_START,
                    SUM(cos.UNIT_COST_SERVICE) AS TOTAL_PERSON,
                    if(tco.VALUE_TYPE_CONSUME=1,SUM(con.PAY_CONSUME_SERVICE),0) AS INGRESO,
                    if(tco.VALUE_TYPE_CONSUME=2,SUM(con.PAY_CONSUME_SERVICE),0) AS RESERVA,
                    if(tco.VALUE_TYPE_CONSUME=3,SUM(con.PRICE_CONSUME_SERVICE),0) AS EGRESO,
                    SUM(cos.POINT_OBTAIN_COST_SERVICE) AS POINT_OBTAIN,
                    SUM(cos.POINT_REQUIRED_COST_SERVICE) AS POINT_REQUIRED,
                    SUM(cos.UNIT_HOUR_COST_SERVICE) AS TIME,
                    SUM(cos.UNIT_DAY_COST_SERVICE) AS DAY
                FROM
                    consume_service AS con
                    INNER JOIN type_consume AS tco ON con.ID_TYPE_CONSUME = tco.ID_TYPE_CONSUME
                    INNER JOIN cost_service AS cos ON con.ID_COST_SERVICE = cos.ID_COST_SERVICE
                    INNER JOIN service AS ser ON cos.ID_SERVICE = ser.ID_SERVICE
                    INNER JOIN type_money AS tmo ON cos.ID_TYPE_MONEY = tmo.ID_TYPE_MONEY
                WHERE
                    con.DATE_START_CONSUME_SERVICE >= '$dateIn'
                -- AND con.DATE_END_CONSUME_SERVICE <= '$dateOut'
                AND ser.ID_HOTEL='$idHotel'
                AND if('$idService'>0,ser.ID_SERVICE = '$idService',true)
                GROUP BY
                    con.DATE_START_CONSUME_SERVICE";
		//dd($query);
		return $this->conexion->consultar($query);
	}

	public function getDistributionMonth($dateIn, $dateOut, $idService, $idHotel) {
		$query = "SELECT
					ser.*,
					COUNT(con.ID_CONSUME_SERVICE) AS TOTAL_CONSUM,
					CONCAT(MONTH (con.DATE_START_CONSUME_SERVICE),'-', YEAR (con.DATE_START_CONSUME_SERVICE)) AS DATE_IN,
					SUM(cos.UNIT_COST_SERVICE) AS TOTAL_PERSON,
					SUM(con.PAY_CONSUME_SERVICE > 0) AS INGRESO,
					SUM(cos.PRICE_COST_SERVICE < 0) AS EGRESO,
					SUM(cos.POINT_OBTAIN_COST_SERVICE) AS POINT_OBTAIN,
					SUM(cos.POINT_REQUIRED_COST_SERVICE) AS POINT_REQUIRED,
					SUM(cos.UNIT_HOUR_COST_SERVICE) AS TIME,
					SUM(cos.UNIT_DAY_COST_SERVICE) AS DAY,
					tmo.NAME_TYPE_MONEY AS TYPE_MONEY
				FROM
					service AS ser,
					cost_service AS cos,
					consume_service AS con,
					type_consume AS tco,
					type_money AS tmo
				WHERE
					ser.ID_SERVICE=cos.ID_SERVICE
					AND con.ID_COST_SERVICE=cos.ID_COST_SERVICE
				AND con.ID_TYPE_CONSUME = tco.ID_TYPE_CONSUME
				AND cos.ID_TYPE_MONEY = tmo.ID_TYPE_MONEY						
				AND con.DATE_START_CONSUME_SERVICE >= '$dateIn'
				AND con.DATE_END_CONSUME_SERVICE <= '$dateOut'
				AND ser.ID_SERVICE = '$idService'
				AND ser.ID_HOTEL = '$idHotel'
				GROUP BY
					MONTH (con.DATE_START_CONSUME_SERVICE),
					YEAR (con.DATE_START_CONSUME_SERVICE)";

		return $this->conexion->consultar($query);
	}

	public function getListBrowser() {
		$query = "SELECT
                    COUNT(s.BROWSER) AS TOTAL,
                    s.*
                FROM
                    session AS s
                GROUP BY
                    s.BROWSER";

		return $this->conexion->consultar($query);
	}

	public function getStatisticalQuestion() {
		$query = "SELECT (sum(r.DESCRIPTION_RESPONSE)/(count(question.ID_QUESTION)*5))*100 AS totalQuestion,question.*,i.* 
				 FROM question
				  INNER JOIN response AS r ON r.ID_QUESTION=question.ID_QUESTION
				  INNER JOIN inquest AS i ON i.ID_INQUEST=question.ID_INQUEST
				 WHERE question.ACTIVE_QUESTION=2 
				 GROUP BY question.ID_QUESTION";

		return $this->conexion->consultar($query);
	}
}
