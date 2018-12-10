<?php
require_once 'model/StateModel.php';
require_once 'model/TypeModel.php';
require_once 'model/UserModel.php';
require_once 'model/DocumentModel.php';
require_once 'model/PhoneModel.php';
require_once 'model/PersonModel.php';

class ProfileController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	/**mostrar perfil de usuario actual*/
	public function indexAction() {
		$docModel = new DocumentModel($this->conexion);
		$personModel = new PersonModel($this->conexion);
		$title = 'Perfil de usuario';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_USER;

		$this->breadCrumbs->insertBread('profile/', 'Perfil de usuario');

		$person = $personModel->getPerson($this->nameUser)[0];
		$person = $this->replaceImgProfile($person);
		if(!empty($person)) {
			$listPais = Helper::getListCountry();
			$listUserDoc = $docModel->getListDoc($person['ID_PERSON']);
			if(empty($listUserDoc))
				$listUserDoc = array(array('NUMBER_DOCUMENT' => '', 'ID_TYPE_DOCUMENT' => 0));

			$typeModel = new TypeModel($this->conexion);
			$typeModel->setNameTable('document');
			$listTypeDoc = $typeModel->select();

			$typeModel = new TypeModel($this->conexion);
			$typeModel->setNameTable('phone');
			$listTypePhone = $typeModel->select();

			$phoneModel = new PhoneModel($this->conexion);
			$phoneModel->setIdPerson($person['ID_PERSON']);
			$listUserPhone = $phoneModel->select();

			$stateModel = new StateModel($this->conexion);
			$stateModel->setNameTable('user');
			$listUserState = $stateModel->select();
		}
		return new View('profile', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('tipe_user', 'listUserDoc', 'person', 'listUserState', 'listTypeDoc', 'listTypePhone', 'listUserPhone', 'listPais'));
	}

	/**muestra perfil de usuario y permite editar con un modal
	 *
	 * @param $nameUser:nombre del usuario a editar
	 * @return View: vista de edicion de usuario
	 */
	public function editAction($nameUser) {
		$userModel = new UserModel($this->conexion);
		$docModel = new DocumentModel($this->conexion);
		$phoneModel = new PhoneModel($this->conexion);
		$personModel = new PersonModel($this->conexion);

		$nameUser=empty($nameUser)?$_SESSION['NAME_USER']:$nameUser;
		$title = 'Editar Perfil de usuario';

		$this->breadCrumbs->insertBread('', 'Registro');
		$this->breadCrumbs->insertBread('profile/list/', 'Editar Cuentas de usuario');
		$this->breadCrumbs->insertBread('profile/edit/'.$nameUser, $nameUser);

		$_SESSION['MENU'] = Constants::$MENU_SELECTED_USER;
		$searchUser = $this->getSearchUser($nameUser);

		$person = $personModel->getPerson($searchUser)[0];

		$person = $this->replaceImgProfile($person);
		if($person['ID_PERSON']<=0) {
			$this->setMesaje('warning', 'Usuario no encontrado');
			header('Location: '.Helper::base().'profile/list/');
		}
		$listUserPhone = $phoneModel->getListPhone($person['ID_PERSON']);
		$listUserDoc = $docModel->getListDoc($person['ID_PERSON']);

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('document');
		$listTypeDoc = $typeModel->select();

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('phone');
		$listTypePhone = $typeModel->select();

		$stateModel = new StateModel($this->conexion);
		$stateModel->setNameTable('user');
		$listStateUser = $stateModel->select();

		$listTypeUser = $userModel->getListRolUser();
		$listPerson = $personModel->getListPersonRol(3);//lista de clientes
		$listPais = Helper::getListCountry();
		return new View('profileEdit', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('searchUser', 'listTypeDoc', 'listPais', 'listTypePhone', 'listUserPhone', 'listUserDoc', 'listTypeUser', 'listStateUser', 'listPerson', 'person'));
	}

	/**lista de usuarios para admin*/
	public function listAction() {
		$personModel = new PersonModel($this->conexion);

		$title = 'Ver lista de usuario';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_USER;

		$this->breadCrumbs->insertBread('', 'Usuarios');
		$this->breadCrumbs->insertBread('profile/list/', 'Editar Cuentas de usuario');

		if(isset($_POST['searchUser'])) {
			$searchUser = $_POST['searchUser'];
			$person = $personModel->getPerson($searchUser);
			if(!empty($person)) {//si existe la persona direccionar al perfil de la person buscada
				header('Location: '.Helper::base().'profile/edit/'.$person[0]['EMAIL_PERSON']);
			}
			else {
				$this->setMesaje('warning', 'Usuario '.$searchUser.' no encontrado intente con otro nombre');
			}
		}
		$listPerson0 = $personModel->getListPersonRol(1);//admin
		$listPerson1 = $personModel->getListPersonRol(2);//recepcion
		$listPerson2 = $personModel->getListPersonRol(4);//cliente
		$listPerson3 = $personModel->getListPersonRol(5);//cocina
		$listPerson4 = $personModel->getListPersonRol(3);//servicios
		$listPerson = array_merge(array(), $listPerson0, $listPerson1, $listPerson2, $listPerson3, $listPerson4);
		//dd($listPerson);
		return new View('profilePanel', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('searchUser', 'listPerson'));
	}

	/**lista de usuarios para recepcion*/
	public function listClientAction() {
		$personModel = new PersonModel($this->conexion);

		$title = 'Ver lista de usuario';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_USER;

		$this->breadCrumbs->insertBread('', 'Usuarios');
		$this->breadCrumbs->insertBread('profile/list/', 'Editar Cuentas de usuario');

		if(isset($_POST['searchUser'])) {
			$searchUser = $_POST['searchUser'];
			$person = $personModel->getPerson($searchUser);
			if($person[0]['ID_PERSON']>0) {//si existe la persona direccionar al perfil de la person buscada
				header('Location: '.Helper::base().'profile/edit/'.$person[0]['EMAIL_PERSON']);
			}
			else {
				$this->setMesaje('warning', 'Usuario '.$searchUser.'no encontrado');
			}
		}
		$listPerson = $personModel->getListPersonRol(3);;//lista de clientes

		return new View('profilePanel', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('searchUser', 'listPerson'));
	}

	/**actualizar los datos del usuario
	 * @param $idPerson
	 * @return string
	 */
	public function edit_ddAction($idPerson) {
		if(is_numeric($idPerson) && $idPerson>0) {
			if($idPerson>0) {
				$nameUser = $this->updatePerson($idPerson);
				$this->setMesaje('success', 'Datos Actualizados');
			}
			if($idPerson == $_SESSION['ID_PERSON']) {//actualizar datos del usuario actual
				header('Location: '.Helper::base().'profile/');
			}
			elseif(!empty($nameUser)) {//actualizar datos de un usuario elegido de la lista
				header('Location: '.Helper::base().'profile/edit/'.$nameUser);
			}
		}
		else {
			$this->setMesaje('danger',"No se pudo actualizar los datos");
			header('Location: '.Helper::base().'profile/');
		}

		return 'Registro exitoso';
	}

	private function getSearchUser($nameUser) {
		if(isset($_POST['searchUser'])) {
			$searchUser = $_POST['searchUser'];
		}
		else {
			$searchUser = $nameUser;
		}

		return $searchUser;
	}

	/**
	 * @param $person
	 * @return mixed
	 */
	private function replaceImgProfile($person) {
		if(!file_exists($person['IMAGE_PROFILE']))
			$person['IMAGE_PROFILE'] = $person['SEX_PERSON'] ? "img/System/user_man.png" : "img/System/user_woman.png";

		return $person;
	}

	private function updatePerson($idPerson) {
		$userModel = new UserModel($this->conexion);
		$personModel = new PersonModel($this->conexion);
		$nameUser = '';

		if(is_numeric($idPerson) && $idPerson>0) {
			$user = $userModel->getNameUser($idPerson);
			if(!empty($user))
				$nameUser = $user[0]['NAME_USER'];

			$image = Img::uploadImg("img/user/");

			$personModel->setId($idPerson);
			$personModel->syncUp();
			$personModel->setName(isset($_POST['name']) ? $_POST['name'] : '');
			$personModel->setLastName(isset($_POST['app']) ? $_POST['app'] : '');
			$personModel->setSex(isset($_POST['sex']) ? $_POST['sex'] : 0);
			$personModel->setDateBorn(isset($_POST['dataNac']) ? $_POST['dataNac'] : '');
			$personModel->setEmail(isset($_POST['email']) ? $_POST['email'] : '');
			$personModel->setAddress(isset($_POST['direction']) ? $_POST['direction'] : '');
			$personModel->setCity(isset($_POST['city']) ? $_POST['city'] : '');
			$personModel->setCountry(isset($_POST['pais']) ? $_POST['pais'] : '');
			$personModel->setImage($image['urlImg']);
			if (!empty($_POST['passwordNew'])&&!empty($_POST['passwordActual']))
				$personModel->setPassword(isset($_POST['passwordNew']) ? $_POST['passwordNew'] : '');
			else
				$personModel->setPassword('');

			$personModel->update();

			$listDocument = isset($_POST['docUser']) ? $_POST['docUser'] : array();
			foreach($listDocument as $document) {
				$documentModel = new DocumentModel($this->conexion);
				$documentModel->setNumber(isset($document['nDocOld']) ? $document['nDocOld'] : 0);
				$documentModel->setIdPerson($idPerson);
				$documentModel->setidType($document['idType']);
				$documentModel->syncUp();
				$documentModel->delete();//eliminar anterior
				$documentModel->setIdPerson($idPerson);
				$documentModel->setIdType($document['idType']);
				$documentModel->syncUp();
				$documentModel->setNumber($document['nDoc']);
				$documentModel->insert();
			}

			//insertar telefono
			$listPhone = isset($_POST['phoneUser']) ? $_POST['phoneUser'] : array();
			foreach($listPhone as $phone) {
				$phoneModel = new PhoneModel($this->conexion);
				$phoneModel->setNumber(isset($phone['nPhoneOld']) ? $phone['nPhoneOld'] : 0);
				$phoneModel->syncUp();
				$phoneModel->delete();//eliminar el telefono anterior
				$phoneModel->setIdPerson($idPerson);
				$phoneModel->syncUp();
				$phoneModel->setNumber($phone['nPhone']);
				$phoneModel->setIdType($phone['idType']);
				$phoneModel->insert();//insertar nuevo
			}
		}

		return $nameUser;
	}
}
