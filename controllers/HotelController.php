<?php
require_once 'model/HotelModel.php';

class HotelController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		return $this->editAction();
	}

	public function editAction() {
		$hotelModel = new HotelModel($this->conexion);
		$title = 'Configurar Informacion del hotel';

		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('hotel/edit/', 'Editar características de hotel');

		$listHotel = $hotelModel->getInfoHotel($this->idHotel);
		if(!empty($listHotel))
			$hotel = $listHotel[0];
		else
			$hotel = array('ID_HOTEL'               => '-1',
			               'NAME_HOTEL'             => '',
			               'DATE_FOUNDATION_HOTEL'  => '',
			               'LOGO_HOTEL'             => '',
			               'ADDRESS_HOTEL'          => '',
			               'ADDRESS_GPS_X_HOTEL'    => '0',
			               'ADDRESS_GPS_Y_HOTEL'    => '0',
			               'ADDRESS_IMAGE_HOTEL'    => '',
			               'HISTORY_HOTEL'          => '',
			               'MISSION_HOTEL'          => '',
			               'VISION_HOTEL'           => '',
			               'SCOPE_HOTEL'            => '',
			               'OBJECTIVE_HOTEL'        => '',
			               'WATCHWORD_HOTEL'        => '',
			               'DESCRIPTION_HOTEL'      => '',
			               'EMAIL_HOTEL'            => '',
			               'PHONE_HOTEL'            => '',
			               'DOMINIO_HOTEL'          => '',
			               'ID_TYPE_HOTEL'          => '',
			               'NAME_TYPE_HOTEL'        => '',
			               'DESCRIPTION_TYPE_HOTEL' => '',
			               'DATE_TYPE_HOTEL'        => '',
			               'TIME_TYPE_HOTEL'        => '',
			               'IMAGE_TYPE_HOTEL'       => '',
			               'VALUE_TYPE_HOTEL'       => ''
			);

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('hotel');
		$listTypeHotel = $typeModel->select();

		return new View('hotelEdit', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('hotel', 'listTypeHotel'));
	}

	public function insert_ddAction($idHotel) {
		$hotelModel = new HotelModel($this->conexion);

		if(isset($_POST['btnSave'])) {
			$idTypeHotel = isset($_POST['idTypeHotel']) ? $_POST['idTypeHotel'] : '';
			$nameHotel = isset($_POST['nameHotel']) ? $_POST['nameHotel'] : '';
			$mision = isset($_POST['mision']) ? $_POST['mision'] : '';
			$vision = isset($_POST['vision']) ? $_POST['vision'] : '';
			$address = isset($_POST['address']) ? $_POST['address'] : '';
			$dateFund = isset($_POST['dateFund']) ? $_POST['dateFund'] : '';
			$dominio = isset($_POST['dominio']) ? $_POST['dominio'] : '';
			$history = isset($_POST['history']) ? $_POST['history'] : '';
			//direccion GPS del hotel
			$addressGPSX = isset($_POST['addressGPSX']) ? $_POST['addressGPSX'] : '';
			$addressGPSY = isset($_POST['addressGPSY']) ? $_POST['addressGPSY'] : '';
			//para el logo del hotel
			$img1 = Img::uploadIcon('imgAddressIcon', "img/system/", 'logo.png');
			$addressLogo = $img1['urlImg'];
			if($addressLogo == '') {
				$addressLogo = isset($_POST['imgAddressIconOld']) ? $_POST['imgAddressIconOld'] : '';
			}

			//para la imagen de portada del hotel
			$img2 = Img::uploadIcon('imgAddress', "img/system/", 'hotel_font.jpg');
			$addressImg = $img2['urlImg'];
			if($addressImg == '') {
				$addressImg = isset($_POST['imgAddressOld']) ? $_POST['imgAddressOld'] : '';
			}

			$scope = isset($_POST['scope']) ? $_POST['scope'] : '';
			$objetive = isset($_POST['objetive']) ? $_POST['objetive'] : '';
			$watchWord = isset($_POST['watchWord']) ? $_POST['watchWord'] : '';
			$description = isset($_POST['description']) ? $_POST['description'] : '';
			$email = isset($_POST['email']) ? $_POST['email'] : '';
			$phone = isset($_POST['phone']) ? $_POST['phone'] : '';
			if($idHotel>0) {
				$hotelModel->updateInfoHotel($idHotel, $nameHotel, $mision, $vision, $address, $dateFund, $dominio, $history, $idTypeHotel, $addressLogo, $addressGPSX, $addressGPSY, $addressImg, $scope, $objetive, $watchWord, $description, $email, $phone);
				$this->setMesaje('success', 'Informacion de hotel actualizados');
			}
			else {
				$idHotel = $hotelModel->insertInfoHotel($nameHotel, $mision, $vision, $address, $dateFund, $dominio, $history, $idTypeHotel, $addressLogo, $addressGPSX, $addressGPSY, $addressImg, $scope, $objetive, $watchWord, $description, $email, $phone);
				if($idHotel>0)
					$this->setMesaje('success', 'Datos de hotel insertado');
			}
		}

		header('Location: '.Helper::base().'hotel/edit/');

		return 'Registro exitoso';
	}
}