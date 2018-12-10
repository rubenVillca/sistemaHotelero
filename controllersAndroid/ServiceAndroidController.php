<?php
require_once 'model/ServiceModel.php';

class ServiceAndroidController extends Controller {
	private $serviceModel;

	public function __construct() {
		parent::__construct();
		$this->serviceModel = new ServiceModel($this->conexion);
	}

	public function indexAction() {
		$services = $this->getServices();
		$dataAndroid = compact('services');
		header('Content-Type: application/json');

		return json_encode($dataAndroid, JSON_PRETTY_PRINT);
	}

	private function getServices() {//lista de servicios tipo ofertas
		$list = $this->serviceModel->getServiceList($this->idHotel);
		$service = array();
		$i = 0;
		foreach($list as $item) {
			$listCost = $this->serviceModel->getServiceCostList($item['ID_SERVICE']);
			$service[$i] = $item;
			$service[$i++]['prices'] = $listCost;
		}

		return $service;
	}
}