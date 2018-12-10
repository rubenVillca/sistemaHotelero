<?php
require_once 'model/PersonModel.php';
require_once 'model/ConsumeModel.php';

class MemberAndroidController extends Controller {

	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		$dataAndroid = compact('isSave');
		header('Content-Type: application/json');

		return json_encode($dataAndroid, JSON_PRETTY_PRINT);
	}

	public function saveAction() {
		$idKeyConsum = isset($_POST['idKeyConsum']) ? $_POST['idKeyConsum'] : 131;
		$idPerson = isset($_POST['idPerson']) ? $_POST['idPerson'] : 163;
		$sexPerson = isset($_POST['sexPerson']) ? $_POST['sexPerson'] : -1;
		$numberDocument = isset($_POST['numberDocument']) ? $_POST['numberDocument'] : '1'.date('mdhis');
		$numberPhone = isset($_POST['numberPhone']) ? $_POST['numberPhone'] : '2'.date('yhis');
		$emailPerson = isset($_POST['emailPerson']) ? $_POST['emailPerson'] : '';
		$namePerson = isset($_POST['namePerson']) ? $_POST['namePerson'] : '';
		$nameLastPerson = isset($_POST['nameLastPerson']) ? $_POST['nameLastPerson'] : '';
		$cityPerson = isset($_POST['cityPerson']) ? $_POST['cityPerson'] : '';
		$countryPerson = isset($_POST['countryPerson']) ? $_POST['countryPerson'] : '';
		$addressPerson = isset($_POST['addressPerson']) ? $_POST['addressPerson'] : '';
		$imgPerson = isset($_POST['imgPerson']) ? $_POST['imgPerson'] : '';
		$dateBornPerson = isset($_POST['dateBornPerson']) ? $_POST['dateBornPerson'] : '';
		$idTypeDocument = isset($_POST['typeDocument']) ? $_POST['typeDocument'] : Constants::$TYPE_DOCUMENT_DNI;

		$personModel=new PersonModel($this->conexion);
		$personModel->setId($idPerson);
		$personModel->syncUp();
		$personModel->setName($namePerson);
		$personModel->setLastName($nameLastPerson);
		$personModel->setSex($sexPerson);
		$personModel->setAddress($addressPerson);
		$personModel->setCountry($countryPerson);
		$personModel->setDateBorn($dateBornPerson);
		$personModel->setEmail($emailPerson);
		$personModel->setImage($imgPerson);
		$personModel->setCity($cityPerson);
		$personModel->update();

		$documentModel=new DocumentModel($this->conexion);
		$documentModel->setIdPerson($personModel->getId());
		$documentModel->setIdType($idTypeDocument);
		$documentModel->syncUp();
		$documentModel->setNumber($numberDocument);
		if (!empty($documentModel->select())) {
			$documentModel->update();
		}else
			$documentModel->insert();

		$phoneModel=new PhoneModel($this->conexion);
		$phoneModel->setIdType(1);
		$phoneModel->setIdPerson($personModel->getId());
		$phoneModel->syncUp();
		$phoneModel->setNumber($numberPhone);
		if (!empty($phoneModel->select()))
			$phoneModel->update();
		else
			$phoneModel->insert();

		$memberModel=new ConsumeModel($this->conexion);
		$memberModel->insertCheckMember($idKeyConsum,$personModel->getId());

		$idPerson=$personModel->getId();
		$dataAndroid = compact('idPerson');
		header('Content-Type: application/json');

		return json_encode($dataAndroid, JSON_PRETTY_PRINT);
	}
}