<?php
require_once 'model/PersonModel.php';
require_once 'model/ConsumeModel.php';

class HistoryController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		$consumeModel = new ConsumeModel($this->conexion);
		$title = 'Historial';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_PRICE;
		$this->breadCrumbs->insertBread("history/", $title);
		$listConsum = $consumeModel->getConsumeHistoryCheck($_SESSION['ID_PERSON'],0,0,true);

		return new View('history', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listConsum'));
	}

	/**
	 * historial de la estadia del cliente en el hotel de un check
	 *
	 * @param $idCheck
	 * @return View
	 */
	public function showAction($idCheck) {
		$consumeModel = new ConsumeModel($this->conexion);
		$title = 'Historial de consumo en su Estadia';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_CONSUME;

		$this->breadCrumbs->insertBread('history/', 'Historial');
		$this->breadCrumbs->insertBread("history/check/", $title);

		$consumeServices = $consumeModel->getConsumeServices($_SESSION['ID_PERSON'], $idCheck);
		$consumeService = array();
		$i = 0;
		foreach($consumeServices as $service) {
			$consumeService[$i] = $service;
			$consumeService[$i]['reserve'] = $consumeModel->getListConsumReserve($idCheck);
			$consumeService[$i++]['room'] = $consumeModel->getListConsumeRoom($service['ID_CONSUME_SERVICE']);
		}
		$consumeFood = $consumeModel->getConsumeFood($_SESSION['ID_PERSON'], $idCheck);

		return new View('historyShow', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('consumeService', 'consumeFood'));
	}
}