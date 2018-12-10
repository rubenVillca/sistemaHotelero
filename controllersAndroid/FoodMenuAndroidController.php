<?php
require_once 'model/FoodModel.php';
require_once 'model/ConsumeModel.php';
require_once 'model/ConsumeFoodModel.php';
require_once 'model/PersonModel.php';

class FoodMenuAndroidController extends Controller {
	private $foodMenuModel;
	private $consumeModel;

	public function __construct() {
		parent::__construct();
		$this->foodMenuModel = new FoodModel($this->conexion);
		$this->consumeModel = new ConsumeModel($this->conexion);
	}

	public function indexAction() {
		$foodMenu = $this->getMenuList();
		$dataAndroid = compact('foodMenu');
		header('Content-Type: application/json');

		return json_encode($dataAndroid, JSON_PRETTY_PRINT);
	}

	private function getMenuList() {//lista de servicios tipo ofertas
		$listQuery = $this->foodMenuModel->getListMenuFoodActive();
		$listMenuFood = array();
		$i = 0;
		foreach($listQuery as $item) {
			$item['NAME_MENU']=utf8_encode($item['NAME_MENU']);
			$listFood = $this->foodMenuModel->getMenuListFood($item['ID_MENU']);
			$listFoodRes = array();
			$j = 0;
			foreach($listFood as $food) {
				$listPrice = $this->foodMenuModel->getCostFood($food['ID_FOOD']);
				$listFoodRes[$j]['ID_FOOD'] = $food['ID_FOOD'];
				$listFoodRes[$j]['ID_TYPE_FOOD'] = $food['ID_TYPE_FOOD'];
				$listFoodRes[$j]['NAME_TYPE_FOOD'] = $food['NAME_TYPE_FOOD'];
				$listFoodRes[$j]['NAME_STATE_FOOD'] = $food['NAME_STATE_FOOD'];
				$listFoodRes[$j]['NAME_FOOD'] = utf8_encode($food['NAME_FOOD']);
				$listFoodRes[$j]['VALUE_STATE_FOOD'] = utf8_encode($food['VALUE_STATE_FOOD']);
				$listFoodRes[$j]['DESCRIPTION_FOOD'] = utf8_encode(strip_tags($food['DESCRIPTION_FOOD']));
				$listFoodRes[$j]['IMAGE_FOOD'] = utf8_encode($food['IMAGE_FOOD']);
				$listFoodRes[$j++]['prices'] = $listPrice;
			}
			$item['foods'] = $listFoodRes;
			$listMenuFood[$i++] = $item;
		}

		return $listMenuFood;
	}

	public function updateAction() {
		$idFood = isset($_POST['idFood']) ? $_POST['idFood'] : 0;
		$idCheck = isset($_POST['idCheck']) ? $_POST['idCheck'] : 0;
		$idTypeMoney = isset($_POST['idTypeMoney']) ? $_POST['idTypeMoney'] : 0;
		$unit = isset($_POST['unit']) ? $_POST['unit'] : 1;
		$unitTotal = isset($_POST['unitTotal']) ? $_POST['unitTotal'] : 0;
		$priceTotal = isset($_POST['priceTotal']) ? $_POST['priceTotal'] : 0;
		$site = isset($_POST['site']) ? $_POST['site'] : '';
		$idConsumeFood = $this->consumeModel->insertConsumeFood($idCheck, $idFood, $idTypeMoney, $unit, 0, $priceTotal, $unitTotal, $site, 0);

		$dataAndroid = compact('idConsumeFood');
		header('Content-Type: application/json');

		return json_encode($dataAndroid, JSON_PRETTY_PRINT);
	}
}