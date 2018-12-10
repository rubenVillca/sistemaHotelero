<?php

class ConsumeFoodModel extends Consultas {

	public function __construct($conexion) {
		parent::__construct($conexion);
	}

	public function getListConsumeFood($idHotel) {
		$query = "SELECT *
                FROM
                    consume_food AS cono
                INNER JOIN check_person AS chp ON cono.ID_CHECK = chp.ID_CHECK
                INNER JOIN person AS per ON chp.ID_PERSON_TITULAR = per.ID_PERSON
                INNER JOIN cost_food AS cosf ON cono.ID_FOOD = cosf.ID_FOOD
                AND cono.ID_TYPE_MONEY = cosf.ID_TYPE_MONEY
                AND cono.UNIT_COST_FOOD = cosf.UNIT_COST_FOOD
                INNER JOIN type_money AS tym ON cosf.ID_TYPE_MONEY = tym.ID_TYPE_MONEY
                INNER JOIN food as foo ON foo.ID_FOOD=cosf.ID_FOOD
                WHERE
                    chp.ID_HOTEL = '$idHotel'
                AND cono.STATE_CONSUME_FOOD >= 0
                GROUP BY cono.ID_CONSUME_FOOD
                ORDER BY cono.STATE_CONSUME_FOOD,cono.DATE_CONSUME_FOOD,cono.TIME_CONSUME_FOOD";

		return $this->conexion->consultar($query);
	}

	public function getListConsumeFoodPending($idHotel, $idState) {
		$query = "SELECT *
	                FROM
	                    consume_food AS cono
	                INNER JOIN check_person AS chp ON cono.ID_CHECK = chp.ID_CHECK
	                INNER JOIN person AS per ON chp.ID_PERSON_TITULAR = per.ID_PERSON
	                INNER JOIN cost_food AS cosf ON cono.ID_FOOD = cosf.ID_FOOD
	                AND cono.ID_TYPE_MONEY = cosf.ID_TYPE_MONEY
	                AND cono.UNIT_COST_FOOD = cosf.UNIT_COST_FOOD
	                INNER JOIN type_money AS tym ON cosf.ID_TYPE_MONEY = tym.ID_TYPE_MONEY
	                INNER JOIN food as foo ON foo.ID_FOOD=cosf.ID_FOOD
	                WHERE
	                    chp.ID_HOTEL = '$idHotel'
	                AND cono.STATE_CONSUME_FOOD = '$idState'
	                GROUP BY cono.ID_CONSUME_FOOD
	                ORDER BY cono.STATE_CONSUME_FOOD,cono.DATE_CONSUME_FOOD,cono.TIME_CONSUME_FOOD";

		return $this->conexion->consultar($query);
	}

	public function updateStateConsumeFood($idConsumeFood, $stateConsumeFood) {
		$query = "UPDATE consume_food
                	SET STATE_CONSUME_FOOD='$stateConsumeFood' 
                	WHERE (ID_CONSUME_FOOD='$idConsumeFood');";
		return $this->conexion->update($query);
	}
}
