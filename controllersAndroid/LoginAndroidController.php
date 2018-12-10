<?php
require_once 'model/DocumentModel.php';
require_once 'model/PhoneModel.php';
require_once 'model/PersonModel.php';
require_once 'model/UserModel.php';

class LoginAndroidController extends Controller {
	private $userModel;
	private $docModel;
	private $phoneModel;
	private $personModel;

	public function __construct() {
		parent::__construct();
		$this->userModel = new UserModel($this->conexion);
		$this->docModel = new DocumentModel($this->conexion);
		$this->phoneModel = new PhoneModel($this->conexion);
		$this->personModel = new PersonModel($this->conexion);
	}

	public function indexAction() {
		$nameUser = isset($_POST['email']) ? $_POST['email'] : 'cliente@gmail.com';
		$pass = isset($_POST['pass']) ? $_POST['pass'] : 'cliente';
		$idPerson = $this->iniciarSession($nameUser, $pass);
		$dataPerson = $this->personModel->getPersonForID($idPerson);
		if(!empty($dataPerson)) {
			$idPerson = $dataPerson[0]['ID_PERSON'];
			$email = $dataPerson[0]['EMAIL_PERSON'];
			$namePerson = $dataPerson[0]['NAME_PERSON'];
			$nameLastPerson = $dataPerson[0]['LAST_NAME_PERSON'];
			$sex = $dataPerson[0]['SEX_PERSON'];
			$point = $dataPerson[0]['POINT_PERSON'];
			$city = $dataPerson[0]['CITY_PERSON'];
			$country = $dataPerson[0]['COUNTRY_PERSON'];
			$dateBorn = $dataPerson[0]['DATE_BORN_PERSON'];
			$dateRegister = $dataPerson[0]['DATE_REGISTER_PERSON'];
			$address = $dataPerson[0]['ADDRESS_PERSON'];
			$imageProfile = $dataPerson[0]['IMAGE_PROFILE'];
			$state = $dataPerson[0]['NAME_STATE_USER'];
			$listPhone = $this->phoneModel->getListPhone($idPerson);
			if(!empty($listPhone))
				$numberPhone = $listPhone[0]['NUMBER_PHONE'];
			else
				$numberPhone = 0;
			$listDocument = $this->docModel->getListDoc($idPerson);
			if(!empty($listDocument)) {
				$numberDocument = $listDocument[0]['NUMBER_DOCUMENT'];
				$typeDocument = $listDocument[0]['NAME_TYPE_DOCUMENT'];
			}
			else {
				$numberDocument = 0;
				$typeDocument = '';
			}
		}
		$dataAndroid = compact('nameUser', 'namePerson', 'nameLastPerson', 'dateBorn', 'numberPhone', 'typeDocument', 'numberDocument', 'email', 'sex', 'address', 'state', 'imageProfile', 'point', 'city', 'country', 'dateRegister', 'idPerson');
		header('Content-Type: application/json');

		return json_encode($dataAndroid, JSON_PRETTY_PRINT);
	}

	private function iniciarSession($email, $pass) {
		$listNameUser = $this->userModel->getLogin($email);
		$idPerson = 0;
		if(!empty($listNameUser)) {
			foreach($listNameUser as $u) {
				if(!empty($u['NAME_USER']) && $u['ACTIVE_USER'] && $u['VALUE_STATE_USER']) {
					if(password_verify($pass, $u['PASSWORD'])) {
						$_SESSION['ID_PERSON'] = $u['ID_PERSON'];
						$idPerson = $u['ID_PERSON'];
						$_SESSION['TYPE_USER'] = 'android';
						$_SESSION['NAME_USER'] = $u['NAME_USER'];
						break;
					}
					else {
						$idPerson = -1;
					}
				}
				else {
					$idPerson = -2;
				}
			}
		}

		return $idPerson;
	}
}
    