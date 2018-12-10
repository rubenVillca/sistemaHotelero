<?php
require_once 'model/DocumentModel.php';
require_once 'model/PhoneModel.php';
require_once 'model/PersonModel.php';

class ProfileAndroidController extends Controller {
	private $docModel;
	private $phoneModel;
	private $personModel;

	public function __construct() {
		parent::__construct();
		$this->docModel = new DocumentModel($this->conexion);
		$this->phoneModel = new PhoneModel($this->conexion);
		$this->personModel = new PersonModel($this->conexion);
	}

	public function indexAction() {
		$idPerson = isset($_POST['idPerson']) ? $_POST['idPerson'] : 0;
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
			$listDocument = $this->docModel->getListDoc($idPerson);
			if(!empty($listDocument)) {
				$numberDocument = $listDocument[0]['NUMBER_DOCUMENT'];
				$typeDocument = $listDocument[0]['NAME_TYPE_DOCUMENT'];
			}
		}
		$dataAndroid = compact('nameUser', 'namePerson', 'nameLastPerson', 'dateBorn', 'numberPhone', 'typeDocument', 'numberDocument', 'email', 'sex', 'address', 'state', 'imageProfile', 'point', 'city', 'country', 'dateRegister', 'idPerson');
		header('Content-Type: application/json');

		return json_encode($dataAndroid, JSON_PRETTY_PRINT);
	}

	public function uploadAction(){
		$imageProfile=Img::uploadImg('img/profile/');

		$personModel=new PersonModel($this->conexion);
		$personModel->setId(isset($_POST['idPerson'])?$_POST['idPerson']:0);
		$personModel->syncUp();
		$personModel->setImage($imageProfile['urlImg']);
		$personModel->update();

		return $this->indexAction();
	}
}
