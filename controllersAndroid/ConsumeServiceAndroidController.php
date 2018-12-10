<?php
require_once 'model/ConsumeModel.php';
require_once 'model/PersonModel.php';

class ConsumeServiceAndroidController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		$dataAndroid = compact('isSave');
		header('Content-Type: application/json');

		return json_encode($dataAndroid, JSON_PRETTY_PRINT);
	}

	public function insertAction() {
		$consumeModel = new ConsumeModel($this->conexion);
		$idCheck = isset($_POST['idCheck']) ? $_POST['idCheck'] : 0;
		$unit = isset($_POST['unit']) ? $_POST['unit'] : 0;
		$duration = isset($_POST['duration']) ? $_POST['duration'] : 0;
		$timeStart = isset($_POST['timeStart']) ? $_POST['timeStart'] : '00:00:00';
		$detail = isset($_POST['detail']) ? $_POST['detail'] : '';
		$costTotal = isset($_POST['costTotal']) ? $_POST['costTotal'] : '';
		$idCost = isset($_POST['idCost']) ? $_POST['idCost'] : 1;
		$dateIni = strtotime(date('Y-m-d').' '.$timeStart);
		$dateEnd = strtotime('+'.$duration.' minute', $dateIni);

		$consumeModel->insertConsumeRoom($idCheck, Constants::$TYPE_CONSUME_CONSUME_ROOM, $idCost,
		                                 date('Y-m-d', $dateIni), date('H:i:s', $dateIni), date('Y-m-d', $dateEnd), date('H:i:s', $dateEnd),
		                                 0, $costTotal, $detail, 1, -1, $unit, '','');
		$consumeModel->insertCheckMember($idCheck, 0);

		$isAction = 1;
		$dataAndroid = compact('isAction');
		header('Content-Type: application/json');

		return json_encode($dataAndroid, JSON_PRETTY_PRINT);
	}
}
