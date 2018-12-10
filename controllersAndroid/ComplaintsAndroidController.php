<?php
require_once 'model/PersonModel.php';
require_once 'model/MessageModel.php';

class ComplaintsAndroidController extends Controller {
	private $personModel;
	private $mesajeModel;

	public function __construct() {
		parent::__construct();
		$this->personModel = new PersonModel($this->conexion);
		$this->mesajeModel = new MessageModel($this->conexion);
	}

	public function indexAction() {
		$idPerson = isset($_POST['idPerson']) ? $_POST['idPerson'] : 0;
		$complaints = isset($_POST['message']) ? $_POST['message'] : '';
		$tittle = "Nueva Queja";
		$typeMesaje = 13;//quejas
		$receiver = "admin";
		$isSave = $this->mesajeModel->insertMessage($idPerson, $receiver, $tittle, $complaints, $typeMesaje);
		$isSave = $this->mesajeModel->insertMessage($idPerson, $idPerson, $tittle, $complaints, $typeMesaje);
		$dataAndroid = compact('isSave');
		header('Content-Type: application/json');

		return json_encode($dataAndroid, JSON_PRETTY_PRINT);
	}
}