<?php
require_once 'model/StateModel.php';
require_once 'model/TypeModel.php';
require_once 'model/ModelRoomModel.php';
require_once 'model/ServiceModel.php';
require_once 'model/FoodModel.php';

class OfferController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	/**lista de ofertas*/
	public function indexAction() {//lista de ofertas para otros usuarios
		$serviceModel = new ServiceModel($this->conexion);
		$title = 'Lista de ofertas disponibles';
		$listOffer = $serviceModel->getServiceListOffer($this->idHotel);
		$this->breadCrumbs->insertBread('offer/', 'Ofertas');
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_OFFER;

		return new View('offerList', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listOffer'));
	}

	public function delete_ddAction($idOffer) {

		$serviceModel = new ServiceModel($this->conexion);

		if(is_numeric($idOffer) && $idOffer>0) {
			$serviceModel->updateServiceState($idOffer, $state = 3);
		}
		header('Location: '.Helper::base().'offer/panel/');

		return 'Registro exitoso';
	}

	public function editAction($idOffer) {
		$serviceModel = new ServiceModel($this->conexion);
		$foodModel = new FoodModel($this->conexion);
		$typeRoomModel = new ModelRoomModel($this->conexion);

		if(!is_numeric($idOffer) || $idOffer<1)
			header('Location: '.Helper::base().'offer/panel/');
		$offerService = $serviceModel->getService($idOffer);//datos del servicio
		$offerDate = $serviceModel->getDateOffer($idOffer);
		if(empty($serviceModel) || empty($offerDate))
			header('Location: '.Helper::base().'offer/panel/');
		$offer = $offerService[0];
		$offerDate = $offerDate[0];
		$title = 'Editar Oferta';

		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('offer/panel/', 'Lista de ofertas');
		$this->breadCrumbs->insertBread('offer/edit/'.$idOffer, 'Editar Oferta '.$offer['NAME_SERVICE']);

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('service');
		$typeModel->setValue(-2);
		$listTypeOffer = $typeModel->select();

		$stateModel = new StateModel($this->conexion);
		$stateModel->setNameTable('service');
		$listStateOffer = $stateModel->select();

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('money');
		$listTypeMoney = $typeModel->select();

		$listFood = $foodModel->getListFoodActive();
		$listTypeRoom1 = $typeRoomModel->getListTypeRoomHab();
		$listTypeRoom2 = $typeRoomModel->getListTypeRoomAmb();
		$listTypeRoomOffer = $serviceModel->getServiceTypeRoom($idOffer);
		$offerCost = $serviceModel->getServiceCostList($idOffer);

		return new View('offerEdit', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('offer', 'listTypeOffer', 'listStateOffer', 'listTypeMoney', 'listFood', 'listFoodOffer', 'listTypeRoom1', 'listTypeRoom2', 'listTypeRoomOffer', 'offerDate', 'offerCost'));
	}

	public function insertAction() {
		$foodModel = new FoodModel($this->conexion);
		$typeRoomModel = new ModelRoomModel($this->conexion);

		$title = 'Insertar Oferta';

		$this->breadCrumbs->insertBread('settings/', 'Configurar Sistema');
		$this->breadCrumbs->insertBread('offer/insert/', 'Insertar oferta');

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('service');
		$typeModel->setValue(-2);
		$listTypeOffer = $typeModel->select();

		$stateModel = new StateModel($this->conexion);
		$stateModel->setNameTable('service');
		$listStateOffer = $stateModel->select();

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('money');
		$listTypeMoney = $typeModel->select();

		$listTypeRoom1 = $typeRoomModel->getListTypeRoomHab();
		$listTypeRoom2 = $typeRoomModel->getListTypeRoomAmb();
		$foods = $foodModel->getListFoodActive();

		return new View('offerInsert', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listTypeOffer', 'listStateOffer', 'listTypeMoney', 'listTypeRoom1', 'listTypeRoom2', 'foods'));
	}

	public function insert_ddAction() {
		$serviceModel = new ServiceModel($this->conexion);

		if(isset($_POST['btnInsert'])) {
			$name = isset($_POST['name']) ? $_POST['name'] : '';
			$descr = isset($_POST['descr']) ? $_POST['descr'] : '';
			$dateIni = isset($_POST['dateIni']) ? $_POST['dateIni'] : '';
			$timeIni = isset($_POST['timeIni']) ? $_POST['timeIni'] : '';
			$dateFin = isset($_POST['dateFin']) ? $_POST['dateFin'] : '';
			$timeFin = isset($_POST['timeFin']) ? $_POST['timeFin'] : '';
			$idState = isset($_POST['idState']) ? $_POST['idState'] : '';
			$idType = isset($_POST['idType']) ? $_POST['idType'] : '';
			$listCost = isset($_POST['cost']) ? $_POST['cost'] : array();
			$reserve = isset($_POST['reserve']) ? $_POST['reserve'] : 0;
			$listTypeRoom = isset($_POST['idTypeRoom']) ? $_POST['idTypeRoom'] : array();

			$img = Img::uploadImg("img/offers/");
			$imgService = $img['urlImg'];

			$serviceModel->insertOffer($name, $idState, $idType, $descr, $dateIni, $timeIni, $dateFin, $timeFin, $imgService, $listTypeRoom, $listCost, $reserve, $this->idHotel);
		}
		header('Location: '.Helper::base().'offer/panel/');

		return 'Registro exitoso';
	}

	public function showAction($idOffer) {
		$serviceModel = new ServiceModel($this->conexion);

		if(!is_numeric($idOffer) || $idOffer<=0)
			header('Location: '.Helper::base().'offer/');
		$offer = $serviceModel->getService($idOffer);
		if(empty($offer))
			header('Location: '.Helper::base().'offer/');
		$offerCost = $serviceModel->getServiceCostList($idOffer);
		$offerDate = $serviceModel->getDateOffer($idOffer);
		$title = 'Ofertas '.$offer['0']['NAME_SERVICE'];

		$this->breadCrumbs->insertBread('offer/', $offer[0]['NAME_TYPE_SERVICE']);
		$this->breadCrumbs->insertBread('offer/show/'.$idOffer, $offer[0]['NAME_SERVICE']);

		$_SESSION['MENU'] = Constants::$MENU_SELECTED_OFFER;

		return new View('offerShow', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('idOffer', 'offerCost', 'offer', 'offerDate'));
	}

	/**lista de ofertas para admin*/
	public function panelAction() {
		$serviceModel = new ServiceModel($this->conexion);

		$title = 'Lista de ofertas';

		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('offer/panel/', 'Lista de ofertas');

		$offers = $serviceModel->getServiceListOffer($this->idHotel);

		return new View('offerPanel', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('offers'));
	}

	public function edit_ddAction($idOffer, $idDate) {
		$serviceModel = new ServiceModel($this->conexion);

		if(is_numeric($idOffer) && $idOffer>0 && is_numeric($idDate) && $idDate>0) {
			$name = isset($_POST['name']) ? $_POST['name'] : '';
			$descr = isset($_POST['descr']) ? $_POST['descr'] : '';
			$dateIni = isset($_POST['dateIni']) ? $_POST['dateIni'] : '';
			$timeIni = isset($_POST['timeIni']) ? $_POST['timeIni'] : '';
			$dateFin = isset($_POST['dateFin']) ? $_POST['dateFin'] : '';
			$timeFin = isset($_POST['timeFin']) ? $_POST['timeFin'] : '';
			$idState = isset($_POST['idState']) ? $_POST['idState'] : '';
			$idType = isset($_POST['idType']) ? $_POST['idType'] : '';
			$reserve = isset($_POST['reserve']) ? $_POST['reserve'] : 0;
			$cost = isset($_POST['cost']) ? $_POST['cost'] : array();
			$listTypeRoom = isset($_POST['listTypeRoom']) ? $_POST['listTypeRoom'] : [];

			$img = Img::uploadImg("img/offer/");
			$addressImg = $img['urlImg'];

			$serviceModel->updateOffer($idOffer, $idDate, $name, $descr, $dateIni, $timeIni, $dateFin, $timeFin, $idState, $idType, $addressImg, $cost, $listTypeRoom, $reserve);
		}
		header('Location: '.Helper::base().'offer/panel/');

		return 'Registro exitoso';
	}
}