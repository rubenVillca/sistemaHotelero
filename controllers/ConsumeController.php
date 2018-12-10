<?php
require_once 'model/TypeModel.php';
require_once 'model/UserModel.php';
require_once 'model/DocumentModel.php';
require_once 'model/PhoneModel.php';
require_once 'model/PersonModel.php';
require_once 'model/ConsumeModel.php';
require_once 'model/MessageModel.php';
require_once 'model/ServiceModel.php';
require_once 'model/RoomModel.php';
require_once 'model/ArticleModel.php';
require_once 'model/ArticleConsumeModel.php';
require_once 'model/CardModel.php';
require_once 'model/FoodModel.php';

class ConsumeController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		return $this->searchAction('');
	}

	public function foodAction($idCheck) {
		$consumeModel = new ConsumeModel($this->conexion);
		$documentModel = new DocumentModel($this->conexion);
		$phoneModel = new PhoneModel($this->conexion);
		$foodModel = new FoodModel($this->conexion);

		$title = 'Consumir alimentos';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_CONSUME;

		$this->breadCrumbs->insertBread('', 'Registro');
		$this->breadCrumbs->insertBread('consume/', 'Registrar Consumo');
		$this->breadCrumbs->insertBread('consume/food/'.$idCheck, 'Registrar Consumo de alimentos');

		//buscar idCheck
		if($idCheck>0) {
			$person = $consumeModel->getCheckPerson(0,$idCheck)[0];
			if($person['ID_STATE_CHECK'] == 1 && $person['ID_TYPE_CHECK'] == 2) {
				$nDoc = $documentModel->getListDoc($person['ID_PERSON_TITULAR']);
				$nPhone = $phoneModel->getListPhone($person['ID_PERSON_TITULAR']);
				$listFood = $foodModel->getListMenuCost();//servicios de cosumo
			}
			$typeModel = new TypeModel($this->conexion);
			$typeModel->setNameTable('money');
			$listType = $typeModel->select();
		}
		else {
			$this->setMesaje('info', 'Seleccione un registro');
		}
		$listRoom = $consumeModel->getConsumeRoom($idCheck,0);

		return new View('consumeInsertFood', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('searchUser', 'nDoc', 'nPhone', 'listConsum', 'person', 'listCheckIn', 'listFood', 'idCheck', 'listType', 'listRoom'));
	}

	public function offerAction($idCheck) {
		$consumeModel = new ConsumeModel($this->conexion);
		$documentModel = new DocumentModel($this->conexion);
		$phoneModel = new PhoneModel($this->conexion);
		$serviceModel = new ServiceModel($this->conexion);

		$title = 'Consumir oferta';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_CHECK_IN;

		$this->breadCrumbs->insertBread('', 'Registro');
		$this->breadCrumbs->insertBread('consume/', 'Registrar Consumo');
		$this->breadCrumbs->insertBread('consume/consumService/'.$idCheck, 'Registrar Consumo');

		//buscar idCheck
		if($idCheck>0) {
			$person = $consumeModel->getCheckPerson(0,$idCheck)[0];
			if($person['ID_STATE_CHECK'] == 1 && $person['ID_TYPE_CHECK'] == 2) {
				$nDoc = $documentModel->getListDoc($person['ID_PERSON_TITULAR']);
				$nPhone = $phoneModel->getListPhone($person['ID_PERSON_TITULAR']);
				$listServices = $serviceModel->getServiceListOffer($this->idHotel);//servicios de cosumo
				for($i = 0; $i<count($listServices); $i++) {
					$listServices[$i]['listPrice'] = $serviceModel->getServiceCostList($listServices[$i]['ID_SERVICE']);
				}
			}
			$typeModel = new TypeModel($this->conexion);
			$typeModel->setNameTable('money');
			$listType = $typeModel->select();
		}
		else {
			$this->setMesaje('info', 'Seleccione un registro');
		}

		return new View('consumeInsertService', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('searchUser', 'nDoc', 'nPhone', 'listConsum', 'person', 'listCheckIn', 'listServices', 'idCheck', 'listType'));
	}

	public function serviceAction($idCheck) {
		$consumeModel = new ConsumeModel($this->conexion);
		$documentModel = new DocumentModel($this->conexion);
		$phoneModel = new PhoneModel($this->conexion);
		$serviceModel = new ServiceModel($this->conexion);

		$title = 'Registra consumo de servicio';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_CHECK_IN;

		$this->breadCrumbs->insertBread('', 'Registro');
		$this->breadCrumbs->insertBread('consume/', 'Registrar Consumo');
		$this->breadCrumbs->insertBread('consume/service/'.$idCheck, 'Registrar Consumo');

		//buscar idCheck
		if($idCheck>0) {
			$person = $consumeModel->getCheckPerson(0,$idCheck)[0];
			if($person['ID_STATE_CHECK'] == 1 && $person['ID_TYPE_CHECK'] == 2) {
				$nDoc = $documentModel->getListDoc($person['ID_PERSON_TITULAR']);
				$nPhone = $phoneModel->getListPhone($person['ID_PERSON_TITULAR']);
				$listServices = $serviceModel->getServiceListConsum($this->idHotel);//servicios de cosumo
				for($i = 0; $i<count($listServices); $i++) {
					$listServices[$i]['listPrice'] = $serviceModel->getServiceCostList($listServices[$i]['ID_SERVICE']);
				}
			}
			$typeModel = new TypeModel($this->conexion);
			$typeModel->setNameTable('money');
			$listType = $typeModel->select();
		}
		else {
			$this->setMesaje('info', 'Seleccione un registro');
		}

		return new View('consumeInsertService', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('searchUser', 'nDoc', 'nPhone', 'listConsum', 'person', 'listCheckIn', 'listServices', 'idCheck', 'listType'));
	}

	/**
	 * historial de la estadia del cliente en el hotel
	 */
	public function consumeCheckAction() {
		$consumeModel = new ConsumeModel($this->conexion);

		$title = 'Historial de consumo en su Estadia';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_CONSUME;

		$this->breadCrumbs->insertBread("consume/", 'Consumo de la estadia');
		$listConsum1 = $consumeModel->getConsumeHistoryCheck($_SESSION['ID_PERSON'], 1, 2,false);
		$listConsum2 = $consumeModel->getConsumeHistoryCheck($_SESSION['ID_PERSON'], 1, 1,false);
		$listConsum = array_merge($listConsum1, $listConsum2);

		return new View('history', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listConsum'));
	}

	public function saveConsumeAction($idCheck) {
		$consumeModel = new ConsumeModel($this->conexion);
		//registrar consumo
		$idConsume = 0;
		if(isset($_POST['dateIni'], $_POST['timeIni'], $_POST['detail']) && is_numeric($idCheck) && $idCheck>0) {
			$check = $consumeModel->getCheckPerson(0,$idCheck);
			if(!empty($check)) {
				$time = $_POST['timeConsum'];//en horas day*24+hour
				$dateInConsum = $_POST['dateIni'];
				$timeInConsum = $_POST['timeIni'];
				if($time>=24) {
					$dates = explode('-', $dateInConsum);
					$dateOutConsum = ((int)($time%24)+$dates[0]).'-'.$dates[1].'-'.$dates[2];
				}
				else {
					$dateOutConsum = $dateInConsum;
				}
				$times = explode(":", $timeInConsum);
				$timeOutConsum = ((int)$time+(int)$times[0]).':'.$times[1];
				$detailConsum = $_POST['detail'];
				$units = $_POST['units'];
				$idCost = $_POST['idCost'];
				$payConsum = $_POST['payConsum'];
				$priceConsum = $_POST['priceConsum'];
				$check = $check[0];

				$idConsume = $consumeModel->insertConsumeRoom($idCheck, Constants::$TYPE_CONSUME_CONSUME_ROOM, $idCost,
				                                              $dateInConsum, $timeInConsum, $dateOutConsum, $timeOutConsum,
				                                              $payConsum, $priceConsum, $detailConsum, $active = 1, $idRoom = -1, $units, '','');
				$consumeModel->insertCheckMember($idCheck, $check['ID_PERSON_TITULAR']);
				$this->setMesaje('success', 'Registro Exitoso');
			}
		}
		header('Location: '.Helper::base().'consume/show/'.$idConsume);

		return 'Registro exitoso';
	}

	public function saveConsumeFoodAction($idCheck) {
		$consumeModel = new ConsumeModel($this->conexion);
		$foodModel = new FoodModel($this->conexion);
		//registrar consumo
		if(is_numeric($idCheck) && $idCheck>0) {
			$check = $consumeModel->getCheckPerson(0,$idCheck);
			if(!empty($check)) {
				$payConsum = $_POST['payConsum'];
				$listFood = isset($_POST['listFood']) ? $_POST['listFood'] : array();
				$state = isset($_POST['stateConsumeFood']) ? 1 : 0;
				$site = $_POST['siteConsumeFood'];
				foreach($listFood as $food) {
					if(isset($food['idFood'])) {
						$cost = $foodModel->getCostFood($food['idFood']);
						$cost = empty($cost) ? 0 : $cost[0];
						$consumeModel->insertConsumeFood($idCheck, $food['idFood'], $food['typeMoney'], $food['unit'], $payConsum, $cost['PRICE_COST_FOOD'], $food['units'], $site, $state);
						$payConsum = 0;
					}
				}
				$this->setMesaje('success', 'Registro Exitoso');
			}
		}
		header('Location: '.Helper::base().'checkIn/show/'.$idCheck);

		return 'Registro exitoso';
	}

	public function showAction($idConsume) {
		$consumeModel = new ConsumeModel($this->conexion);
		$serviceModel = new ServiceModel($this->conexion);
		$documentModel = new DocumentModel($this->conexion);
		$phoneModel = new PhoneModel($this->conexion);
		$cardModel = new CardModel($this->conexion);

		$title = 'Detalle de consumo';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_CONSUME;

		$this->breadCrumbs->insertBread('consume/', 'Lista de consumo');
		$this->breadCrumbs->insertBread('consume/show/'.$idConsume, 'Consumo');

		$consum = $consumeModel->getConsumeService($idConsume);
		if (empty($consum)){
			$this->setMesaje('warning','No existe el consumo '.$idConsume);
			header('Location:'.Helper::base().'checkIn/');
		}

		$consum = $consumeModel->getConsumeService($idConsume)[0];
		$check = $consumeModel->getCheckPerson(0,$consum['ID_CHECK'])[0];
		$totalCost = $costTotal = 0;
		$totalHour = (strtotime($consum['DATE_END_CONSUME_SERVICE'])-strtotime($consum['DATE_START_CONSUME_SERVICE']))/(60*60);
		$totalDay = $totalHour/24;
		$costService = $serviceModel->getServiceCost($consum['ID_SERVICE'], $consum['UNIT_COST_SERVICE'], $consum['UNIT_DAY_COST_SERVICE'], $consum['UNIT_HOUR_COST_SERVICE']);
		if($costService[0]['UNIT_DAY_COST_SERVICE']>0) {
			$totalCost += ($totalDay/$costService[0]['UNIT_DAY_COST_SERVICE'])*$costService[0]['PRICE_COST_SERVICE'];
		}
		if($costService[0]['UNIT_HOUR_COST_SERVICE']>0) {
			$totalCost += ($totalDay*24/$costService[0]['UNIT_HOUR_COST_SERVICE'])*$costService[0]['PRICE_COST_SERVICE'];
		}
		$totalCost = $costService[0]['NAME_TYPE_MONEY'].' '.$totalCost;
		$idService = $consum['ID_SERVICE'];
		$service = $idService>0 ? $serviceModel->getService($idService)[0] : array();
		$listTeam = $consumeModel->getListTeam($consum['ID_CONSUME_SERVICE']);
		$i = 0;
		foreach($listTeam as $team) {
			$aux1 = $documentModel->getListDoc($team['ID_PERSON']);
			$listTeam[$i]['documentList']= $aux1;
			$aux2 = $phoneModel->getListPhone($team['ID_PERSON']);
			$listTeam[$i]['phoneList']= $aux2;
			$i++;
		}
		$costService = $serviceModel->getServiceCost($consum['ID_SERVICE'], $consum['UNIT_COST_SERVICE'], $consum['UNIT_DAY_COST_SERVICE'], $consum['UNIT_HOUR_COST_SERVICE']);
		//$listConsumHistory = $this->reserveModel->getListReserveUser($person['ID_PERSON'], $this->idHotel);

		$cardModel->setIdCheck($check['ID_CHECK']);
		$cardModel->syncUp();
		$listCheckCard = $cardModel->select();

		$phoneCheck = $phoneModel->getListPhone($check['ID_PERSON_TITULAR']);
		$docCheck = $documentModel->getListDoc($check['ID_PERSON_TITULAR']);
		$typeRoom = $serviceModel->getServiceTypeRoom($consum['ID_SERVICE']);
		$roomOccupied = $consumeModel->getOccupiedRoom($idConsume);

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('document');
		$listTypeDoc = $typeModel->select();

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('phone');
		$listTypePhone = $typeModel->select();


		$vars=array();
		$vars['service']=$service;
		$vars['check']=$check;
		$vars['docCheck']=$docCheck;
		$vars['phoneCheck']=$phoneCheck;
		$vars['listCheckCard']=$listCheckCard;
		$vars['listTypePhone']=$listTypePhone;
		$vars['listTypeDoc']=$listTypeDoc;
		$vars['listTeam']=$listTeam;
		$vars['roomOccupied']=$roomOccupied;
		$vars['costService']=$costService;
		$vars['consum']=$consum;
		$vars['totalHour']=$totalHour;
		$vars['totalCost']=$totalCost;
		$vars['typeRoom']=$typeRoom;

		return new View('consumeShow', $title, $this->breadCrumbs->getBreads(), $this->mesaje,$vars);
	}

	public function searchAction($searchUser){
		$title = 'Consumo';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_CONSUME;

		$this->breadCrumbs->insertBread('', 'Registro');
		$this->breadCrumbs->insertBread('consume/', 'Registrar Consumo');
		$searchUser=!empty($_POST['searchUser'])?$_POST['searchUser']:$searchUser;

		$listCheckIn = $this->getListCheckInSearch($searchUser);//tabla de checkIn

		return new View('consumeCheckPanel', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('searchUser', 'nDoc', 'nPhone', 'listConsum', 'person', 'listCheckIn', 'listServices'));
	}

	private function getListCheckInSearch($search) {
		$consumeModel = new ConsumeModel($this->conexion);
		$documentModel = new DocumentModel($this->conexion);

		$listCheckIn = $consumeModel->getListCheckRoomSearch($this->idHotel, 2, 1,$search);//lista de check in registrado activos
		$i = 0;
		foreach($listCheckIn as $check) {
			$listDocUser = $documentModel->getListDoc($check['ID_PERSON_TITULAR']);
			$listCheckIn[$i]['check'] = $consumeModel->getCheckPerson(0,$check['ID_CHECK'])[0];
			$listCheckIn[$i]['list_doc'] = $listDocUser;
			$i++;
		}

		return $listCheckIn;
	}
}
