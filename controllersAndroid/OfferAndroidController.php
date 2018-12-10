<?php
require_once "model/ServiceModel.php";

class OfferAndroidController extends Controller {
	private $serviceModel;

	public function __construct() {
		parent::__construct();
		$this->serviceModel = new ServiceModel($this->conexion);
	}

	public function indexAction() {
		$offers = $this->getOffer();
		$dataAndroid = compact('offers');
		header('Content-Type: application/json');

		return json_encode($dataAndroid, JSON_PRETTY_PRINT);
	}

	private function getOffer() {//lista de servicios tipo ofertas
		$listOffer = $this->serviceModel->getServiceListOffer($this->idHotel);
		$resOffer = array();
		$i = 0;
		foreach($listOffer as $offer) {
			$listCost = $this->serviceModel->getServiceCostList($offer['ID_SERVICE']);
			$offer['prices'] = $listCost;
			$resOffer[$i++] = $offer;
		}

		return $resOffer;
	}
}
