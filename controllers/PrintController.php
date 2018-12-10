<?php
require_once 'controllersPDF/PDFBill.php';
require_once 'controllersPDF/PDFCheck.php';
require_once 'controllersPDF/PDFReserve.php';
require_once 'model/ConsumeModel.php';
require_once 'model/HotelModel.php';

class PrintController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		$title = 'Usuario Administrador facturar';

		return new View('facturar', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact(''));
	}

	public function billingAction($idCheck) {
		$consumeModel = new ConsumeModel($this->conexion);
		$hotelModel = new HotelModel($this->conexion);
		$documentModel = new DocumentModel($this->conexion);
		if (empty($idCheck)||!is_numeric($idCheck)&&$idCheck<1)
			return $this->indexAction();
		$check = $consumeModel->getCheckPerson(0,$idCheck)[0];
		$hotel = $hotelModel->getInfoHotel($this->idHotel)[0];
		$document = $documentModel->getListDoc($check['ID_PERSON_TITULAR']);
		$listConsumeFood = $consumeModel->getListConsumeFood($check['ID_CHECK']);
		$listConsumeService = $consumeModel->getListConsume($check['ID_CHECK']);
		$printPdf = new PDFBill();
		$printPdf->setCheck($check);
		$printPdf->setHotel($hotel);
		$printPdf->setDocumentPerson($document);
		$printPdf->setConsumeFood($listConsumeFood);
		$printPdf->setConsumeService($listConsumeService);
		$printPdf->printBill();
	}

	public function checkAction($idCheck) {
		$consumeModel = new ConsumeModel($this->conexion);
		$hotelModel = new HotelModel($this->conexion);
		$documentModel = new DocumentModel($this->conexion);
		if (empty($idCheck)||!is_numeric($idCheck)&&$idCheck<1)
			return $this->indexAction();
		$check = $consumeModel->getCheckPerson(0,$idCheck)[0];
		$hotel = $hotelModel->getInfoHotel($this->idHotel)[0];
		$document = $documentModel->getListDoc($check['ID_PERSON_TITULAR']);
		$listConsumeFood = $consumeModel->getListConsumeFood($check['ID_CHECK']);
		$listConsumeService = $consumeModel->getListConsume($check['ID_CHECK']);
		$printPdf = new PDFCheck();
		$printPdf->setCheck($check);
		$printPdf->setHotel($hotel);
		$printPdf->setDocumentPerson($document);
		$printPdf->setConsumeFood($listConsumeFood);
		$printPdf->setConsumeService($listConsumeService);
		$printPdf->printBill();
	}

	public function reserveAction($idCheck) {
		$title = 'Facturar';
		$this->setMesaje('success', 'Registra de salida exitosa');
		$consumeModel = new ConsumeModel($this->conexion);
		$hotelModel = new HotelModel($this->conexion);
		$documentModel = new DocumentModel($this->conexion);
		if (empty($idCheck)||!is_numeric($idCheck)&&$idCheck<1)
			return $this->indexAction();
		$check = $consumeModel->getCheckPerson(0,$idCheck)[0];
		$hotel = $hotelModel->getInfoHotel($this->idHotel)[0];
		$document = $documentModel->getListDoc($check['ID_PERSON_TITULAR']);
		$listConsumeFood = $consumeModel->getListConsumeFood($check['ID_CHECK']);
		$listConsumeService = $consumeModel->getListConsume($check['ID_CHECK']);
		$printPdf = new PDFReserve();
		$printPdf->setCheck($check);
		$printPdf->setHotel($hotel);
		$printPdf->setDocumentPerson($document);
		$printPdf->setConsumeFood($listConsumeFood);
		$printPdf->setConsumeService($listConsumeService);
		$printPdf->printBill();

		return new View('facturar', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact(''));
	}
}