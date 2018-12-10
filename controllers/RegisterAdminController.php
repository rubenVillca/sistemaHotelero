<?php
require_once 'model/TypeModel.php';

class RegisterAdminController {
	private $conexion;

	public function __construct() {
		$this->conexion = new Conexion();
		$this->conexion->conectar();
	}

	public function indexAction() {
		$title = 'Registrar administrador';
		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('phone');
		$listTypePhone = $typeModel->select();

		if(isset($_SESSION['ACTIVE']) && $_SESSION['ACTIVE'] == 0) {
			return new View('profileInsertUser', $title, array(), array(), compact('listTypePhone'));
		}
		else {
			header('Location: '.Helper::base());

			return 'Administrador no registrado';
		}
	}
}
