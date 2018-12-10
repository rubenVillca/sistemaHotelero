<?php
require_once 'model/FoodModel.php';

class MenuController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		$foodModel = new FoodModel($this->conexion);
		$title = 'Lista de Menus de comida';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_FOOD;

		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('menu/', 'Lista de menus de comidas');

		$listMenu = $foodModel->getListMenuFood();

		return new View('menuList', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listMenu'));
	}

	public function delete_ddAction($idMenu) {
		$foodModel = new FoodModel($this->conexion);
		if(is_numeric($idMenu) && $idMenu>0) {
			$res = $foodModel->deleteMenu($idMenu);
			if($res>0)
				$this->setMesaje('success', 'Fichero eliminado');
			else
				$this->setMesaje('warning', 'No se ha podido eliminar');
		}
		else {
			$this->setMesaje('warning', 'No se puede eliminar eliminar: '.$idMenu);
		}
		header('Location: '.Helper::base().'menu/panel/');

		return 'Registro exitoso';
	}

	public function editAction($idMenu) {
		$foodModel = new FoodModel($this->conexion);
		$title = 'Editar Menu';

		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('menu/panel/', 'Lista de menus');
		$this->breadCrumbs->insertBread('menu/edit/', 'Editar Menu');

		$menu = $foodModel->getMenuListFood($idMenu);
		$listFood = $foodModel->getListFood();

		return new View('menuEdit', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('menu', 'listFood'));
	}

	public function insertAction() {
		$foodModel = new FoodModel($this->conexion);
		$title = 'Insertar Menu de comidas';

		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('menu/insert/', 'Insertar menu de Comidas');

		$listFood = $foodModel->getListFood();

		return new View('menuInsert', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listFood'));
	}

	public function insert_ddAction() {
		$foodModel = new FoodModel($this->conexion);
		$nameMenuFood = isset($_POST['nameMenuFood']) ? $_POST['nameMenuFood'] : '';
		$dateMenuIni = isset($_POST['dateMenuIni']) ? $_POST['dateMenuIni'] : '';
		$dateMenuFin = isset($_POST['dateMenuFin']) ? $_POST['dateMenuFin'] : '';
		$activeMenu = isset($_POST['activeMenu']) ? $_POST['activeMenu'] : '';
		$listIdFood = isset($_POST['idFood']) ? $_POST['idFood'] : array();
		$idMenuFood = $foodModel->insertMenu($nameMenuFood, $dateMenuIni, $dateMenuFin, $activeMenu);
		$foodModel->insertMenuFood($idMenuFood, $listIdFood);
		header('Location: '.Helper::base().'menu/panel/');

		return 'Registro exitoso';
	}

	public function showAction($idMenu) {
		$foodModel = new FoodModel($this->conexion);
		if(!is_numeric($idMenu) || $idMenu<=0)
			header('Location: '.Helper::base().'menu/');
		$listFood = $foodModel->getMenuListFood($idMenu);
		if(!empty($listFood)) {
			for($i = 0; $i<count($listFood); $i++) {
				$listFood[$i]['costFood'] = $foodModel->getCostFood($listFood[$i]['ID_FOOD']);
			}
		}
		$title = 'Alimento: '.$listFood[0]['NAME_FOOD'];

		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('food/show/'.$idMenu, $listFood[0]['NAME_FOOD']);

		return new View('menuShow', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listFood'));
	}

	public function panelAction() {
		$foodModel = new FoodModel($this->conexion);
		$title = 'Lista de Menus de comida';

		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('menu/panel/', 'Lista de menus de comidas');

		$listMenu = $foodModel->getListMenuFood();

		return new View('menuFoodPanel', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listMenu'));
	}

	public function edit_ddAction($idMenu) {
		$foodModel = new FoodModel($this->conexion);
		$nameMenuFood = isset($_POST['nameMenuFood']) ? $_POST['nameMenuFood'] : '';
		$dateMenuIni = isset($_POST['dateMenuIni']) ? $_POST['dateMenuIni'] : '';
		$dateMenuFin = isset($_POST['dateMenuFin']) ? $_POST['dateMenuFin'] : '';
		$activeMenu = isset($_POST['activeMenu']) ? $_POST['activeMenu'] : '';
		$listIdFood = isset($_POST['idFood']) ? $_POST['idFood'] : array();
		$foodModel->updateMenu($idMenu, $nameMenuFood, $dateMenuIni, $dateMenuFin, $activeMenu);
		$foodModel->updateMenuFood($idMenu, $listIdFood);
		$this->setMesaje('success', "Menu $nameMenuFood actualizado");
		header('Location: '.Helper::base().'menu/');

		return 'Registro exitoso';
	}
}