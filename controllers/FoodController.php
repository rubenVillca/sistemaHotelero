<?php
require_once 'model/TypeModel.php';
require_once 'model/StateModel.php';
require_once 'model/FoodModel.php';

class FoodController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		$foodModel = new FoodModel($this->conexion);
		$title = 'Lista de Comidas';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_FOOD;
		$this->breadCrumbs->insertBread('food/', 'Lista de comidas');
		$listFood = $foodModel->getListFoodActive();

		return new View('foodList', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listFood'));
	}

	public function delete_ddAction($idFood) {
		$foodModel = new FoodModel($this->conexion);
		if(is_numeric($idFood) && $idFood>0) {
			$res = $foodModel->deleteFood($idFood);
			if($res>0)
				$this->setMesaje('success', 'Fichero eliminado');
			else
				$this->setMesaje('warning', 'No se ha podido eliminar');
		}
		else {
			$this->setMesaje('warning', 'No se puede eliminar eliminar: '.$idFood);
		}
		header('Location: '.Helper::base().'food/panel/');

		return 'Registro exitoso';
	}

	public function editAction($idFood) {//muestra para edita food
		$foodModel = new FoodModel($this->conexion);
		if(!is_numeric($idFood) || $idFood<=0)
			header('Location: '.Helper::base().'food/');
		$food = $foodModel->getFood($idFood);
		$costFood = $foodModel->getCostFood($idFood);
		if(empty($food))
			header('Location: '.Helper::base().'food/');
		$title = 'Alimento: '.$food[0]['NAME_FOOD'];

		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('food/edit/'.$idFood, $food[0]['NAME_FOOD']);

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('food');
		$listType = $typeModel->select();

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('money');
		$listTypeMoney = $typeModel->select();

		$stateModel = new StateModel($this->conexion);
		$stateModel->setNameTable('food');
		$listState = $stateModel->select();

		return new View('foodEdit', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('food', 'costFood', 'listType', 'listState', 'listTypeMoney'));
	}

	public function insertAction() {
		$title = 'Insertar Comidas';

		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('food/insert/', 'Insertar Comida');

		$stateModel = new StateModel($this->conexion);
		$stateModel->setNameTable('food');
		$listState = $stateModel->select();

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('food');
		$listType = $typeModel->select();

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('money');
		$listTypeMoney = $typeModel->select();

		return new View('foodInsert', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listState', 'listType', 'listTypeMoney'));
	}

	public function insert_ddAction() {//insertar a la bd una comida
		$foodModel = new FoodModel($this->conexion);
		if(isset($_POST['insert'])) {
			$nameFood = isset($_POST['nameFood']) ? $_POST['nameFood'] : '';
			$descFood = isset($_POST['descFood']) ? $_POST['descFood'] : '';
			$idTypeFood = isset($_POST['idTypeFood']) ? $_POST['idTypeFood'] : '';
			$idStateFood = isset($_POST['idStateFood']) ? $_POST['idStateFood'] : '';

			$img = Img::uploadImg("img/food/");
			$imgAddress = $img['urlImg'];
			if(empty($addressImg))
				$this->setMesaje('danger', $img['mesaje']);

			$cost = isset($_POST['cost']) ? $_POST['cost'] : array();
			$foodModel->insertFood($nameFood, $descFood, $idTypeFood, $idStateFood, $imgAddress, $cost);
		}
		header('Location: '.Helper::base().'food/panel/');

		return 'Registro exitoso';
	}

	public function showAction($idFood) {//mostrar food
		$foodModel = new FoodModel($this->conexion);
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_FOOD;
		if(!is_numeric($idFood) || $idFood<=0)
			header('Location: '.Helper::base().'food/');
		$food = $foodModel->getFood($idFood);
		$costFood = $foodModel->getCostFood($idFood);
		if(empty($food))
			header('Location: '.Helper::base().'food/');
		$title = 'Alimento: '.$food[0]['NAME_FOOD'];

		$this->breadCrumbs->insertBread('food/', 'Lista de comidas');
		$this->breadCrumbs->insertBread('food/show/'.$idFood, $food[0]['NAME_FOOD']);

		return new View('foodShow', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('food', 'costFood'));
	}

	public function panelAction() {
		$foodModel = new FoodModel($this->conexion);
		$title = 'Lista de Comidas';

		$this->breadCrumbs->insertBread('home/', 'Inicio');
		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('food/panel/', 'Lista de comidas');

		$listFood = $foodModel->getListFood();

		return new View('foodPanel', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listFood'));
	}

	public function edit_ddAction($idFood) {//actuliza food en la bd y redirecciona a list
		$foodModel = new FoodModel($this->conexion);

		if(is_numeric($idFood) && $idFood>0 && isset($_POST['nameFood'])) {
			$nameFood = isset($_POST['nameFood']) ? $_POST['nameFood'] : '';
			$descrFood = isset($_POST['descrFood']) ? $_POST['descrFood'] : '';
			$idState = isset($_POST['idState']) ? $_POST['idState'] : '';
			$idType = isset($_POST['idType']) ? $_POST['idType'] : '';

			$img = Img::uploadImg("img/food/");
			$imgAddress = $img['urlImg'];
			if(empty($addressImg))
				$this->setMesaje('danger', $img['mesaje']);

			$cost = isset($_POST['cost']) ? $_POST['cost'] : array();
			$res = $foodModel->updateFood($idFood, $nameFood, $descrFood, $idState, $idType, $imgAddress, $cost);
			if($res>0) {
				$this->setMesaje('success', 'Se ha actualizado correctamente');
				header('Location: '.Helper::base().'food/panel/');
			}
			else {
				$this->setMesaje('danger', 'no se pudo actualizar la intente nuevamente');
				header('Location: '.Helper::base().'food/edit/'.$idFood);
			}
		}
		header('Location: '.Helper::base().'food/');

		return 'Registro exitoso';
	}
}