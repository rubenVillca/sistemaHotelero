<?php
require_once 'model/PersonModel.php';
require_once 'model/MessageModel.php';

class CreateAccountAndroidController extends Controller {
	private $personModel;
	private $mesajeModel;

	public function __construct() {
		parent::__construct();
		$this->personModel = new PersonModel($this->conexion);
		$this->mesajeModel = new MessageModel($this->conexion);
	}

	public function indexAction() {

		$email = isset($_POST['email']) ? $_POST['email'] : '';
		$pass = isset($_POST['pass']) ? $_POST['pass'] : '';
		$name = isset($_POST['name']) ? $_POST['name'] : '';
		$nameApp = isset($_POST['nameAp']) ? $_POST['nameAp'] : '';
		$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
		$sex = isset($_POST['sex']) ? $_POST['sex'] : '';
		$idPerson = $this->register($email, $pass, $name, $nameApp, $phone, $sex);
		$dataAndroid = compact('idPerson');
		header('Content-Type: application/json');

		return json_encode($dataAndroid, JSON_PRETTY_PRINT);
	}

	private function register($email, $pass, $name, $app, $phone, $sex) {
		$idRol = 3;//cliente

		$personModel = new PersonModel($this->conexion);
		$personModel->setPassword($pass);
		$personModel->setName($name);
		$personModel->setLastName($app);
		$personModel->setEmail($email);
		$personModel->setSex($sex);
		$personModel->setStateUser(1);//activo
		$personModel->setIdRol($idRol);

		$personModel->insert();

		$phoneModel = new PhoneModel($this->conexion);
		$phoneModel->updateListPhone(array(array('nPhone' => $phone, 'idType' => 1)), $personModel->getId());

		$sender = $personModel->getId();
		$receiver = 'admin';
		$tittle = 'Registro de nuevo usuario desde la aplicacion';
		$container = "Nuevo Usuario Registrado: $email con  nombre: $name $app '', Sexo: $sex, Correo: $email, Telefono: $phone";
		$typeMesaje = '14';   //id de registro de usuario nuevo en type_mesaje
		$this->mesajeModel->insertMessage($sender, $receiver, $tittle, $container, $typeMesaje);
		$this->mesajeModel->insertMessage($sender, $sender, $tittle, $container, $typeMesaje);

		return $personModel->getId();
	}
}