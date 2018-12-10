<?php
require_once 'model/PersonModel.php';
require_once 'model/MessageModel.php';

class ContactAndroidController extends Controller {
	private $personModel;
	private $mesajeModel;

	public function __construct() {
		parent::__construct();
		$this->personModel = new PersonModel($this->conexion);
		$this->mesajeModel = new MessageModel($this->conexion);
	}

	public function indexAction() {
		$idPerson = isset($_POST['idPerson']) ? $_POST['idPerson'] : 0;
		$tittle = isset($_POST['tittle']) ? $_POST['tittle'] : '';
		$mesaje = isset($_POST['message']) ? $_POST['message'] : '';
		$receiver = isset($_POST['receiver']) ? $_POST['receiver'] : '';
		$typeMesaje = 1;                  //Mensaje
		$isSave = $this->mesajeModel->insertMessage($idPerson, $receiver, $tittle, $mesaje, $typeMesaje);
		$dataAndroid = compact('isSave');
		header('Content-Type: application/json');

		return json_encode($dataAndroid, JSON_PRETTY_PRINT);
	}
}
