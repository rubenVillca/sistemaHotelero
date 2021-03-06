<?php
require_once 'model/PersonModel.php';
require_once 'model/MessageModel.php';

class SuggestionAndroidController extends Controller {
	private $personModel;
	private $mesajeModel;

	public function __construct() {
		parent::__construct();
		$this->personModel = new PersonModel($this->conexion);
		$this->mesajeModel = new MessageModel($this->conexion);
	}

	public function indexAction() {
		$idPerson = isset($_POST['idPerson']) ? $_POST['idPerson'] : 0;
		$suggestion = isset($_POST['message']) ? $_POST['message'] : '';
		$tittle = "Sugerencia registrada";
		$typeMesaje = 11;                     //Sugerencias
		$receiver = Constants::$TYPE_USER_ADMIN;
		$isSave = $this->mesajeModel->insertMessage($idPerson, $receiver, $tittle, $suggestion, $typeMesaje);
		$dataAndroid = compact('isSave');
		header('Content-Type: application/json');

		return json_encode($dataAndroid, JSON_PRETTY_PRINT);
	}
}
