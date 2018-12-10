<?php
require_once 'model/TypeModel.php';
require_once 'model/ModelRoomModel.php';
require_once 'model/ServiceModel.php';

class ServiceController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		$serviceModel = new ServiceModel($this->conexion);
		$this->breadCrumbs->insertBread('service/', 'Servicio');

		$_SESSION['MENU'] = Constants::$MENU_SELECTED_SERVICE;

		$listServices = $serviceModel->getServiceList($this->idHotel);
		$title = 'Lista de servicios';

		return new View('serviceList', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listServices', 'idService'));
	}

	public function delete_ddAction($idService) {
		$serviceModel = new ServiceModel($this->conexion);

		if($idService>0) {
			$serviceModel->updateServiceState($idService, 3);
		}//estado del servicio=aeliminado
		header('Location: '.Helper::base().'service/panel/');

		return 'Registro exitoso';
	}

	public function editAction($idService) {
		$typeRoomModel = new ModelRoomModel($this->conexion);
		$serviceModel = new ServiceModel($this->conexion);

		if(!is_numeric($idService) || $idService<1)
			header('Location: '.Helper::base().'service/panel/');
		$service = $serviceModel->getService($idService);
		if(empty($service))
			header('Location: '.Helper::base().'service/panel/');
		$title = 'Configurar Servicio del hotel';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_SERVICE;

		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('service/panel/', 'Lista de servicios');
		$this->breadCrumbs->insertBread('service/panel/'.$idService, 'Editar servicio');

		$serviceTypeRoom = $serviceModel->getServiceTypeRoom($idService);
		$serviceCost = $serviceModel->getServiceCostList($idService);
		$listType = $this->getListType();

		$stateModel = new StateModel($this->conexion);
		$stateModel->setNameTable('service');
		$listState = $stateModel->select();

		$listTypeRoom1 = $typeRoomModel->getListTypeRoomHabFree();//habitaciones
		$listTypeRoom2 = $typeRoomModel->getListTypeRoomAmb();//ambientes

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('money');
		$listTypeMoney = $typeModel->select();

		return new View('serviceEdit', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listType', 'listState', 'service', 'serviceTypeRoom', 'serviceCost', 'listTypeRoom1', 'listTypeRoom2', 'listTypeMoney'));
	}

	public function insertAction() {
		$typeRoomModel = new ModelRoomModel($this->conexion);

		$title = 'Insertar servicio';

		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('service/insert/', 'Crear nuevo servicio');

		$listType = $this->getListType();

		$stateModel = new StateModel($this->conexion);
		$stateModel->setNameTable('service');
		$listState = $stateModel->select();

		$listTypeRoom1 = $typeRoomModel->getListTypeRoomHabFree();
		$listTypeRoom2 = $typeRoomModel->getListTypeRoomAmb();

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('money');
		$listTypeMoney = $typeModel->select();

		return new View('serviceInsert', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listType', 'listState', 'listTypeRoom1', 'listTypeRoom2', 'listTypeMoney'));
	}

	public function insert_ddAction() {
		$serviceModel = new ServiceModel($this->conexion);

		if(isset($_POST['nameService'], $_POST['typeService'])) {
			$name = isset($_POST['nameService']) ? $_POST['nameService'] : '';
			$idTypeService = isset($_POST['typeService']) ? $_POST['typeService'] : '0';
			$listTypeRoom = isset($_POST['listTypeRoom']) ? $_POST['listTypeRoom'] : array();
			$idState = isset($_POST['stateService']) ? $_POST['stateService'] : '0';
			$listCost = isset($_POST['cost']) ? $_POST['cost'] : array();

			$img = Img::uploadImg("img/service/");
			$imgAddress = $img['urlImg'];

			$descr = isset($_POST['descr']) ? $_POST['descr'] : '';
			$reserve = isset($_POST['reserve']) ? $_POST['reserve'] : 0;
			$idService = $serviceModel->insertService($name, $idTypeService, $listTypeRoom, $idState, $listCost, $imgAddress, $descr, $reserve, $this->idHotel);
			if($idService>0)
				$this->setMesaje('success', 'Servicio Insertado');
			else
				$this->setMesaje('danget', 'Servicio no insertado');
		}
		header('Location: '.Helper::base().'service/panel/');

		return 'Registro exitoso';
	}

	public function showAction($idService) {
		$serviceModel = new ServiceModel($this->conexion);

		$_SESSION['MENU'] = Constants::$MENU_SELECTED_SERVICE;
		$listServices = $serviceModel->getServiceList($this->idHotel);
		if(empty($idService) && !empty($listServices)) {
			$idService = $listServices[0]['ID_SERVICE'];
		}
		$serviceContent = $serviceModel->getService($idService);
		$serviceCost = $serviceModel->getServiceCostList($idService);
		$serviceTypeRoom = $serviceModel->getServiceTypeRoom($idService);
		if(empty($serviceContent))
			header('Location: '.Helper::base().'service/');
		$title = 'Servicio: '.$serviceContent[0]['NAME_SERVICE'];

		$this->breadCrumbs->insertBread('service/', 'Servicios');
		$this->breadCrumbs->insertBread('service/show/'.$idService, $serviceContent[0]['NAME_SERVICE']);

		return new View('serviceShow', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listServices', 'serviceContent', 'idService', 'serviceCost', 'serviceTypeRoom', 'serviceFood'));
	}

	public function panelAction() {
		$serviceModel = new ServiceModel($this->conexion);

		$title = 'Configurar Servicios del hotel';

		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('service/panel/', 'lista de Servicios');

		$listServices = $serviceModel->getServiceList($this->idHotel);

		return new View('servicePanel', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listServices', 'listType', 'listState'));
	}

	public function edit_ddAction($idService) {
		$serviceModel = new ServiceModel($this->conexion);

		if(!is_numeric($idService) || $idService<1 || !isset($_POST['name']))
			header('Location: '.Helper::base().'service/panel/');
		$name = isset($_POST['name']) ? $_POST['name'] : '';
		$type = isset($_POST['type']) ? $_POST['type'] : '0';
		$state = isset($_POST['state']) ? $_POST['state'] : '0';
		$descr = isset($_POST['descr']) ? $_POST['descr'] : '';

		$img = Img::uploadImg("img/service/");
		$imgService = $img['urlImg'];

		$listTypeRoom = isset($_POST['listTypeRoom']) ? $_POST['listTypeRoom'] : array();
		$cost = isset($_POST['cost']) ? $_POST['cost'] : array();
		$reserve = isset($_POST['reserve']) ? $_POST['reserve'] : 0;
		$serviceModel->updateService($idService, $name, $type, $state, $descr, $imgService, $listTypeRoom, $cost, $reserve);
		header('Location: '.Helper::base().'service/panel/');

		return 'Registro exitoso';
	}

	private function getListType() {
		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('service');
		$typeModel->setValue(Constants::$STATE_SERVICE_ACTIVE);
		$listType1 = $typeModel->select();

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('service');
		$typeModel->setValue(Constants::$STATE_SERVICE_INACTIVE);
		$listType2 = $typeModel->select();

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('service');
		$typeModel->setValue(Constants::$STATE_SERVICE_MAINTENANCE);
		$listType3 = $typeModel->select();

		return array_merge($listType1, $listType2, $listType3);
	}
}