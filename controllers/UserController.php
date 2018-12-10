<?php
require_once 'model/TypeModel.php';
require_once 'model/UserModel.php';
require_once 'model/PersonModel.php';
require_once 'model/MessageModel.php';

class UserController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	/**
	 * registrar usuario nuevo desde con un usuario no registrado
	 **/
	public function indexAction() {
		$title = 'Registrar usuario';
		$this->breadCrumbs->insertBread('', 'Registrar usuario');
		$this->breadCrumbs->insertBread('user/', 'Registrar usuario');

		$_SESSION['MENU'] = Constants::$MENU_SELECTED_USER;

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('phone');
		$listTypePhone = $typeModel->select();

		return new View('profileInsertUser', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listTypePhone'));
	}

	public function insertAction() {
		$userModel = new UserModel($this->conexion);
		$title = 'registro';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_USER;

		$this->breadCrumbs->insertBread('', 'Usuarios');
		$this->breadCrumbs->insertBread('user/insert/', 'Registrar Usuario');
		$listTypeUser = $userModel->getListRolUser();

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('document');
		$listTypeDoc = $typeModel->select();

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('phone');
		$listTypePhone = $typeModel->select();

		$listPais = Helper::getListCountry();

		$stateModel = new StateModel($this->conexion);
		$stateModel->setNameTable('user');
		$listStateUser = $stateModel->select();

		if(isset($_POST['register'])) {
			$idPerson = $this->insertPerson();
			if($idPerson>0) {
				header('Location: '.Helper::base().'profile/list/');
			}
		}

		return new View('profileInsertUsers', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listTypeUser', 'listTypeDoc', 'listTypePhone', 'reg', 'listPais', 'listStateUser'));
	}

	public function insertClientAction() {
		$userModel = new UserModel($this->conexion);

		$title = 'registro';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_RESERVE;

		$this->breadCrumbs->insertBread('', 'Usuarios');
		$this->breadCrumbs->insertBread('user/insert/', 'Registrar Usuario');

		$listTypeUser = $userModel->getRolUser(3);
		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('document');
		$listTypeDoc = $typeModel->select();

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('phone');
		$listTypePhone = $typeModel->select();

		$listPais = Helper::getListCountry();

		$stateModel = new StateModel($this->conexion);
		$stateModel->setNameTable('user');
		$listStateUser = $stateModel->select();

		if(isset($_POST['register'])) {
			$idPerson = $this->insertPerson();
			if($idPerson>0) {
				header('Location: '.Helper::base().'profile/list/');
			}
		}

		return new View('profileInsertUsers', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listTypeUser', 'listTypeDoc', 'listTypePhone', 'reg', 'listPais', 'listStateUser'));
	}

	public function insert_ddAction() {
		if(isset($_POST['pass'])) {
			$idPerson = $this->insertPerson();
			$this->registerPerson($idPerson);
		}
		else {
			header('Location ../home');
		}
	}

	/**
	 *registrar usuario nuevo desde un usuario admin
	 **/

	private function insertPerson() {
		$personModel = new PersonModel($this->conexion);

		//$idPerson = 0;
		if($_POST['pass'] == $_POST['pass-repeat']) {
			if(isset($_SESSION['ACTIVE']) && $_SESSION['ACTIVE'] == 0)
				$idRol = 1;//admin
			else
				$idRol = isset($_POST['idRol']) ? $_POST['idRol'] : '3';
			$personModel->setPassword($_POST['pass']);
			$personModel->setName($_POST['name']);
			$personModel->setLastName($_POST['app']);
			$personModel->setEmail($_POST['email']);
			$personModel->setSex($_POST['sex']);
			$personModel->setAddress(isset($_POST['address']) ? $_POST['address'] : '');
			$personModel->setCity(isset($_POST['city']) ? $_POST['city'] : '');
			$personModel->setCountry(isset($_POST['pais']) ? $_POST['pais'] : '');
			$personModel->setDateBorn(isset($_POST['dateNac']) ? $_POST['dateNac'] : '');
			$personModel->setPoint(isset($_POST['point']) ? $_POST['point'] : '0');
			$img2 = Img::uploadImg("img/user/");
			$personModel->setImage($img2['urlImg']);
			$personModel->setStateUser(isset($_POST['state']) ? $_POST['state'] : '1');
			$personModel->setIdRol($idRol);

			$personModel->insert();

			$documenModel=new DocumentModel($this->conexion);
			$documenModel->updateListDoc(isset($_POST['docUser']) ? $_POST['docUser'] : array(),$personModel->getId());

			$phoneModel=new PhoneModel($this->conexion);
			$phoneModel->updateListPhone(isset($_POST['phoneUser']) ? $_POST['phoneUser'] : array(),$personModel->getId());

			if($personModel->getId()>0 && $idRol>1) {
				$this->insert_dd($personModel->getId(), $idRol, $_POST['phoneUser'][0]['nPhone'], $personModel->getName(), $personModel->getLastName(), $personModel->getSex(), $personModel->getEmail());
			}
		}
		$this->setMessageRegister($personModel->getId());

		return $personModel->getId();
	}

	/**
	 * registrar nuevo usuario, si idPerson<1 entonces un nuevo usuario se esta registrando
	 * caso contrario un usuario con los permisos respectivos esta registrando
	 *
	 * @param $idPerson : persona q esta registrando nuevo usuario
	 */
	private function registerPerson($idPerson) {
		if($idPerson>0) {
			if(isset($_SESSION['ACTIVE']) && $_SESSION['ACTIVE'] == 0) {//si es admin no iniciar sesion
				$_SESSION['ACTIVE'] = 1;
				$this->setMesaje('success', 'Cuenta de administrador creada');
			}
			else {//si  es cliente iniciar session
				$this->setMesaje('success', 'Cuenta de cliente creada');
				if($_SESSION['TYPE_USER'] == Constants::$TYPE_USER_FREE) {
					$_SESSION['TYPE_USER'] = Constants::$TYPE_USER_CLIENT;
					$_SESSION['NAME_USER'] = $_POST['email'];
					$_SESSION['ID_PERSON'] = $idPerson;
					header('Location: '.Helper::base());
				}
				else {
					header('Location: '.Helper::base().'profile/list/');
				}
			}
		}
	}

	private function insert_dd($idPerson, $rol, $nPhoneUser, $name, $appP, $sex, $email) {
		$personModel = new PersonModel($this->conexion);
		$mesajeModel = new MessageModel($this->conexion);

		if($_SESSION['TYPE_USER'] == Constants::$TYPE_USER_FREE) {
			$sender = $idPerson;
		}
		else {
			$person = $personModel->getPerson($_SESSION['NAME_USER']);
			$sender = empty($person) ? '' : $person[0]['ID_PERSON'];
		}
		$receiver = 'admin';
		$tittle = "Registro de nuevo usuario: $rol";
		$container = "Nuevo Usuario Registrado: con  nombre: $name $appP, Sexo: $sex, Correo: $email, Telefono: $nPhoneUser";
		//id de registro de usuario nuevo en type_mesaje
		$typeMesaje = '14';
		//Enviar alerta al administrador informando sobre el registro de nuevas persona
		$mesajeModel->insertMessage($sender, $receiver, $tittle, $container, $typeMesaje);
		$mesajeModel->insertMessage($sender, $sender, $tittle, $container, $typeMesaje);
	}

	private function setMessageRegister($idPerson) {
		switch($idPerson) {
			case  0:
				$this->setMesaje('danger', 'comprobacion de password incorrecto');
				break;
			case -1:
				$this->setMesaje('danger', 'no se pudo realizar el registro de datos intente nuevamente');
				break;
			case -2:
				$this->setMesaje('warning', 'direccion de correo ya existente');
				break;
			default:
				$this->setMesaje('success', 'Registro Exitoso');
				break;
		}
	}
}
