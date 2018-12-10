<?php
require_once 'model/ConsumeFoodModel.php';

class OrderController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		$consumeModel = new ConsumeFoodModel($this->conexion);
		$title = 'Enviar Pedidos';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_SETTINGS;

		$this->breadCrumbs->insertBread('', 'Registro');
		$this->breadCrumbs->insertBread('consume/sendOrder/', 'Enviar pedido');

		$listOrder = $consumeModel->getListConsumeFood($this->idHotel);

		return new View('orderList', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listOrder'));
	}

	public function insert_ddAction($idConsumeFood) {
		$consumeModel = new ConsumeFoodModel($this->conexion);
		$consumeModel->updateStateConsumeFood($idConsumeFood, 1);
		header('Location: '.Helper::base().'order/');

		return 'Registro exitoso';
	}
}