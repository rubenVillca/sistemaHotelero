<?php
require_once 'model/HotelModel.php';

class InfoAndroidController extends Controller {
	private $hotelModel;

	public function __construct() {
		parent::__construct();
		$this->hotelModel = new HotelModel($this->conexion);
	}

	public function indexAction() {
		$hotel = $this->hotelModel->getInfoHotel($this->idHotel);
		if(!empty($hotel)) {
			$hotel = $hotel[0];
		}
		$dataAndroid = compact('hotel');
		header('Content-Type: application/json');

		return json_encode($dataAndroid, JSON_PRETTY_PRINT);
	}
}
