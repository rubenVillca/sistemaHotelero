<?php

class FoodModel extends Consultas {
	//*********************************************************************************************** FOOD, MENU **/
	public function deleteFood($idFood) {
		$query0 = "UPDATE food as f 
					 SET f.ID_STATE_FOOD='3' 
					 WHERE f.ID_FOOD='$idFood'";
		return $this->conexion->update($query0);
	}

	public function deleteMenu($idMenu) {
		$query2 = "UPDATE menu set ACTIVE_MENU=-1 WHERE ID_MENU = '$idMenu'";

		return $this->conexion->update($query2);
	}

	public function getCostFood($idFood) {
		$query = "SELECT *
                FROM
                    cost_food AS cfo
                INNER JOIN type_money AS tmo ON cfo.ID_TYPE_MONEY = tmo.ID_TYPE_MONEY
                WHERE cfo.ID_FOOD='$idFood' AND cfo.ACTIVE_COST_FOOD=1";

		return $this->conexion->consultar($query);
	}

	public function getFood($idFood) {
		$query = "SELECT *
                FROM
                    food AS foo
                INNER JOIN type_food AS tfo ON foo.ID_TYPE_FOOD = tfo.ID_TYPE_FOOD
                INNER JOIN state_food AS sfo ON foo.ID_STATE_FOOD = sfo.ID_STATE_FOOD
                WHERE
                    foo.ID_FOOD = '$idFood'
                    AND sfo.VALUE_STATE_FOOD>=0";

		return $this->conexion->consultar($query);
	}

	public function getListFood() {
		return $this->getListFoodValue(0);//con values >=0
	}

	public function getListFoodActive() {
		return $this->getListFoodValue(1);//con value >=1
	}

	public function getListMenuCost() {//lista de comidas de un menu
		$query = "SELECT *
                FROM
                    menu
                INNER JOIN menu_food AS mefo ON mefo.ID_MENU = menu.ID_MENU
                INNER JOIN food ON mefo.ID_FOOD = food.ID_FOOD
                INNER JOIN state_food AS stfo ON food.ID_STATE_FOOD = stfo.ID_STATE_FOOD
                INNER JOIN type_food AS tyfo ON food.ID_TYPE_FOOD = tyfo.ID_TYPE_FOOD
                INNER JOIN cost_food AS cofo ON cofo.ID_FOOD = food.ID_FOOD
                INNER JOIN type_money AS tymo ON cofo.ID_TYPE_MONEY = tymo.ID_TYPE_MONEY
                WHERE
                    menu.ACTIVE_MENU >= 0
                AND stfo.VALUE_STATE_FOOD > 0
                AND menu.DATE_START_MENU <= CURDATE()
                AND menu.DATE_END_MENU >= CURDATE()
                GROUP BY
                    food.ID_FOOD
                ORDER BY
                    menu.ID_MENU";

		return $this->conexion->consultar($query);
	}

	public function getListMenuFood() {//lista de menus
		$query = "SELECT *
                FROM menu
                WHERE menu.ACTIVE_MENU>=0
                ORDER BY DATE_START_MENU DESC ";

		return $this->conexion->consultar($query);
	}

	public function getListMenuFoodActive() {//lista de menus
		$query = "SELECT *
                FROM menu
                WHERE menu.ACTIVE_MENU>=0
                AND menu.DATE_START_MENU<=curdate()
                AND menu.DATE_END_MENU>=curdate()
                ORDER BY DATE_START_MENU DESC ";

		return $this->conexion->consultar($query);
	}

	public function getMenuListFood($idMenu) {//lista de comidas de un menu
		$query = "SELECT *
               FROM
                    menu
                INNER JOIN menu_food ON menu_food.ID_MENU = menu.ID_MENU
                INNER JOIN food ON menu_food.ID_FOOD = food.ID_FOOD
                INNER JOIN type_food ON food.ID_TYPE_FOOD=type_food.ID_TYPE_FOOD
                INNER JOIN state_food ON food.ID_STATE_FOOD=state_food.ID_STATE_FOOD
                WHERE menu.ACTIVE_MENU>=0 AND menu.ID_MENU='$idMenu'";

		return $this->conexion->consultar($query);
	}

	public function insertFood($nameFood, $descFood, $idTypeFood, $idStateFood, $imgAddress, $listCost) {
		$query1 = "INSERT INTO food VALUES(DEFAULT ,'$idTypeFood','$idStateFood','$nameFood','$descFood','$imgAddress')";
		$idFood = $this->conexion->insert($query1);
		if($idFood>0)
			$this->insertCostFood($idFood, $listCost);
	}

	public function insertMenu($nameMenuFood, $dateMenuIni, $dateMenuFin, $activeMenu) {
		$query3 = "INSERT INTO menu (ACTIVE_MENU, `TIME_UPDATE_MENU`, `DATE_UPDATE_MENU`, `TIME_CREATED_MENU`, `DATE_CREATED_MENU`, `DATE_START_MENU`, `DATE_END_MENU`, `NAME_MENU`) 
                       VALUES('$activeMenu',curtime(),curdate(),curtime(),curdate(),'$dateMenuIni','$dateMenuFin','$nameMenuFood')";

		return $this->conexion->insert($query3);
	}

	public function insertMenuFood($idMenu, $listIdFood) {
		foreach($listIdFood as $idFood) {
			$query = "INSERT INTO menu_food (`ID_MENU`, `ID_FOOD`) VALUES ('$idMenu', '$idFood');";
			$this->conexion->insert($query);
		}
	}

	public function updateFood($idFood, $nameFood, $descrFood, $idState, $idType, $imgAddress, $cost) {
		if(empty($imgAddress)) {
			$food = $this->getFood($idFood);
			if(!empty($food))
				$imgAddress = $food[0]['IMAGE_FOOD'];
		}
		//actualizar el food
		$query0 = "UPDATE food as f 
					 SET f.NAME_FOOD='$nameFood', f.DESCRIPTION_FOOD='$descrFood',f.ID_STATE_FOOD='$idState',f.ID_TYPE_FOOD='$idType',f.IMAGE_FOOD='$imgAddress' 
					 WHERE f.ID_FOOD='$idFood'";
		$res = $this->conexion->update($query0);
		//update costo del food
		$this->removeCostFood($idFood);//cambiar estado de food a 0
		$this->insertCostFood($idFood, $cost);//insertar los q no estan en la lista
		foreach($cost as $c) {//actualizar
			$query1 = "SELECT c.ID_FOOD FROM cost_food AS c WHERE c.ID_FOOD='$idFood' AND c.ID_TYPE_MONEY='$c[idTypeMoney]' AND c.UNIT_COST_FOOD='$c[nUnit]'";
			$res = $this->conexion->consultar($query1);
			if(!empty($res)) {
				$this->updateCost($idFood, $c['idTypeMoney'], $c['nUnit'], $c['nCost'], $c['pointObtain'], $c['pointRequired']);
			}
		}

		return $res;
	}

	public function updateMenu($idMenu, $nameMenuFood, $dateMenuIni, $dateMenuFin, $activeMenu) {
		$query = "UPDATE menu 
                SET  `ACTIVE_MENU`='$activeMenu', 
                     `TIME_UPDATE_MENU`=curtime(), `DATE_UPDATE_MENU`=curdate(), 
                     `DATE_START_MENU`='$dateMenuIni', `DATE_END_MENU`='$dateMenuFin', 
                     `NAME_MENU`='$nameMenuFood' 
                WHERE (`ID_MENU`='$idMenu');";
		$this->conexion->update($query);
	}

	public function updateMenuFood($idMenuFood, $listIdFood) {
		$query = "DELETE FROM menu_food WHERE (`ID_MENU`='$idMenuFood');";
		$this->conexion->delete($query);
		foreach($listIdFood as $idFood) {
			$query2 = "INSERT INTO menu_food (`ID_MENU`, `ID_FOOD`) VALUES ('$idMenuFood', '$idFood');";
			$this->conexion->insert($query2);
		}
	}

	private function getListFoodValue($value) {
		$query = "SELECT *
                FROM
                    food AS foo
                INNER JOIN state_food AS sfo ON foo.ID_STATE_FOOD = sfo.ID_STATE_FOOD
                INNER JOIN type_food AS tfo ON foo.ID_TYPE_FOOD = tfo.ID_TYPE_FOOD
                INNER JOIN cost_food AS cfo ON cfo.ID_FOOD = foo.ID_FOOD
                INNER JOIN type_money AS tmo ON cfo.ID_TYPE_MONEY = tmo.ID_TYPE_MONEY
                WHERE
                    sfo.VALUE_STATE_FOOD >= '$value'
                    AND cfo.ACTIVE_COST_FOOD='1'
                GROUP BY foo.ID_FOOD";

		return $this->conexion->consultar($query);
	}

	private function insertCostFood($idFood, $listCost) {
		if($idFood>0 && is_array($listCost)) {
			foreach($listCost as $cost) {
				$query = "INSERT INTO cost_food VALUES('$idFood','$cost[idTypeMoney]','$cost[nUnit]','$cost[nCost]','$cost[pointObtain]','$cost[pointRequired]',CURTIME(),CURDATE(),'1')";
				$this->conexion->insert($query);
			}
		}
	}

	private function removeCostFood($idFood) {
		$query = "UPDATE cost_food set ACTIVE_COST_FOOD=0 WHERE ID_FOOD='$idFood'";
		$this->conexion->update($query);
	}

	private function updateCost($idFood, $idTypeMoney, $nUnit, $nCost, $pointObtain, $pointRequired) {
		$query = "UPDATE cost_food as c 
					SET c.PRICE_COST_FOOD='$nCost', c.POINT_OBTAIN_COST_FOOD='$pointObtain', c.POINT_REQUIRED_COST_FOOD='$pointRequired', c.ACTIVE_COST_FOOD='1' 
					WHERE c.ID_FOOD='$idFood' AND c.UNIT_COST_FOOD='$nUnit' AND c.ID_TYPE_MONEY='$idTypeMoney'";
		$this->conexion->update($query);
	}
}
