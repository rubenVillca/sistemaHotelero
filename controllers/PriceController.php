<?php
require_once 'model/ServiceModel.php';
require_once 'model/HotelModel.php';
require_once 'controllersPDF/PDFPriceService.php';

class PriceController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		$serviceModel = new ServiceModel($this->conexion);

		$title = 'Lista de precios';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_PRICE;

		$this->breadCrumbs->insertBread('price/', 'precios');
		$listService = $serviceModel->getServiceList($this->idHotel);//servicios sin habitacion
		$i = 0;
		$services = array();
		foreach($listService as $service) {
			$services[$i] = $service;
			$services[$i++]['PRICE_COST_SERVICE'] = $serviceModel->getServiceCostList($service['ID_SERVICE']);
		}

		return new View('price', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('services'));
	}

	public function printAction() {
		$serviceModel = new ServiceModel($this->conexion);
		$hotelModel = new HotelModel($this->conexion);

		$listService = $serviceModel->getServiceListActive($this->idHotel);//servicios sin habitacion
		$services = array();
		$i = 0;
		foreach($listService as $service) {
			$services[$i] = $service;
			$services[$i++]['PRICE_COST_SERVICE'] = $serviceModel->getServiceCostList($service['ID_SERVICE']);
		}
		$hotel = $hotelModel->getInfoHotel($this->idHotel)[0];
		$pdf = new PDFPriceService();
		$pdf->setHotel($hotel);
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Times', '', 12);
		$pdf->SetWidths(array(10, 30, 30, 30, 30, 60));//tamano de celdas
		$header = array('Nro', 'Servicio', 'Tipo de servicio', 'Precio', 'Tiempo', 'Descripcion');
		$pdf->rowHead($header);
		for($i = 0; $i<count($services); $i++) {
			$pdf->row(array($i+1,
				$services[$i]['NAME_SERVICE'],
				$services[$i]['NAME_TYPE_SERVICE'],
				$services[$i]['PRICE_COST_SERVICE'][0]['NAME_TYPE_MONEY'].' '.$services[$i]['PRICE_COST_SERVICE'][0]['PRICE_COST_SERVICE'],
				'Dias: '.$services[$i]['PRICE_COST_SERVICE'][0]['UNIT_DAY_COST_SERVICE'].' Horas:'.$services[$i]['PRICE_COST_SERVICE'][0]['UNIT_HOUR_COST_SERVICE'],
				Helper::camelUpperCase(strip_tags(utf8_decode($services[$i]['DESCRIPTION_SERVICE'])))
			));
		}
		$pdf->Output();
		return 'Impresion';
	}
}