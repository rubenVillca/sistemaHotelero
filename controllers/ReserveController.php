<?php
require_once 'model/TypeModel.php';
require_once 'model/UserModel.php';
require_once 'model/ModelRoomModel.php';
require_once 'model/DocumentModel.php';
require_once 'model/PhoneModel.php';
require_once 'model/PersonModel.php';
require_once 'model/ConsumeModel.php';
require_once 'model/MessageModel.php';
require_once 'model/ServiceModel.php';
require_once 'model/ReserveModel.php';
require_once 'model/CardModel.php';
require_once 'model/RoomModel.php';
require_once 'model/ArticleModel.php';
require_once 'model/ArticleConsumeModel.php';
require_once 'services/CheckInService.php';

class ReserveController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		$reserveModel = new ReserveModel($this->conexion);

		$title            = 'Lista de reservas en proceso';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_RESERVE;

		$this->breadCrumbs->insertBread('', 'Registro');
		$this->breadCrumbs->insertBread('reserve/', 'Reservas');

		$timeIn  = '06:00:00';
		$timeOut = '06:00:00';
		$dateIn  = Helper::getLastDay(1);
		$dateOut = Helper::getLastDay(2);
		$nPerson = 1;
		$reserveModel->deleteReservePast($this->idHotel);
		$listReserveHistory1 = $reserveModel->getListReserveGroup($this->idHotel, Constants::$TYPE_CHECK_RESERVE, Constants::$STATE_CHECK_PROCESS_WITH_INCUMBENT, 'CONSUME_SERVICE', 0);//nuevo con titular
		$listReserveHistory2 = $reserveModel->getListReserveGroup($this->idHotel, Constants::$TYPE_CHECK_RESERVE, Constants::$STATE_CHECK_PROCESS_WITHOUT_INCUMBENT, 'CONSUME_SERVICE', 0);//nuevo vacio sin titular
		$listReserveHistory3 = $reserveModel->getListReserveGroup($this->idHotel, Constants::$TYPE_CHECK_RESERVE, Constants::$STATE_CHECK_ACTIVE, 'CONSUME_SERVICE', 0);//reservas activas
		$listReserveHistory4 = $reserveModel->getListReserveGroup($this->idHotel, Constants::$TYPE_CHECK_RESERVE, Constants::$STATE_CHECK_FINISHED, 'CONSUME_SERVICE', 0);//reservas activas
		$listReserveHistory  = array_merge($listReserveHistory2, $listReserveHistory1, $listReserveHistory3,$listReserveHistory4);

		return new View('reservePanel', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('timeIn', 'timeOut', 'dateIn', 'dateOut', 'listReserveHistory', 'nPerson'));
	}

	public function indexClientAction() {
		$reserveModel = new ReserveModel($this->conexion);

		$title            = 'Lista de reservas en proceso';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_RESERVE;

		$this->breadCrumbs->insertBread('', 'Registro');
		$this->breadCrumbs->insertBread('reserve/', 'Reservas');

		$timeIn  = '06:00:00';
		$timeOut = '06:00:00';
		$dateIn  = Helper::getLastDay(1);
		$dateOut = Helper::getLastDay(2);
		$nPerson = 1;
		$reserveModel->deleteReservePast($this->idHotel);
		$listReserveHistory = array();
		if (isset($_SESSION['ID_PERSON']) && $_SESSION['ID_PERSON'] > 0) {
			$listReserve = $reserveModel->getListReserveUser($_SESSION['ID_PERSON'], $this->idHotel);//nuevo vacio sin titular
			$listCheck = $reserveModel->getListCheckUser($_SESSION['ID_PERSON'], $this->idHotel);//nuevo vacio sin titular
			$listReserveHistory=array_merge($listCheck,$listReserve);
		}
		return new View('reservePanel', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('timeIn', 'timeOut', 'dateIn', 'dateOut', 'listReserveHistory', 'nPerson'));
	}

	public function checkInfoAction($idCheck) {
		$documentModel = new DocumentModel($this->conexion);
		$phoneModel    = new PhoneModel($this->conexion);
		$consumeModel  = new ConsumeModel($this->conexion);
		$cardModel     = new CardModel($this->conexion);
		$roomModel     = new RoomModel($this->conexion);

		$_SESSION['MENU'] = Constants::$MENU_SELECTED_RESERVE;
		$title            = 'Lista de precios';
		$this->breadCrumbs->insertBread('price/', 'precios');
		if (!is_numeric($idCheck) || $idCheck < 1) {
			header('Location: ' . Helper::base() . 'reserve/pending/');
		}
		$check = $consumeModel->getCheckPerson(0, $idCheck)[0];//info de check + person check
		$userDoc=$documentModel->getListDoc($check['ID_PERSON_TITULAR']);//documentos de titular
		$userPhone = $phoneModel->getListPhone($check['ID_PERSON_TITULAR']);//telefonos de titular
		$cardModel->setIdCheck($idCheck);
		$cardModel->syncUp();
		$card          = $cardModel->select();//cardas de check
		$listConsumAux = $consumeModel->getListCheckReserveCheck($this->idHotel, $idCheck);
		$listConsum    = array();
		$listRoomFree  = array();

		$articleModel = new ArticleModel($this->conexion);
		$listArticle  = $articleModel->select();

		foreach ($listConsumAux as $consum) {
			$listMemberAux                          = $consumeModel->getListConsumeMember($consum['ID_CONSUME_SERVICE']);//dato de huespedes y consumo
			$listMember                             = array();
			$listModelRoom                          = $roomModel->getListTypeRoomFreeModel($consum['ID_ROOM_MODEL'], $consum['DATE_START_CONSUME_SERVICE'], $consum['DATE_END_CONSUME_SERVICE'], $this->idHotel);
			$listRoomFree[$consum['ID_ROOM_MODEL']] = $listModelRoom;
			foreach ($listMemberAux as $member) {
				$listMember[$member['ID_PERSON']] = $member;
				$documentModel->getListDoc($member['ID_PERSON']);
				$listMember[$member['ID_PERSON']]['list_phone'] = $phoneModel->getListPhone($member['ID_PERSON']);
			}
			$listConsum[$consum['ID_CONSUME_SERVICE']]                = $consum;
			$listConsum[$consum['ID_CONSUME_SERVICE']]['list_member'] = $listMember;
		}

		$payRequired=0;
		foreach ($listConsum as $consume){
			$payRequired+=$consume['PRICE_CONSUME_SERVICE']*Constants::$PERCENTAGE_PAY_RESERVE;
		}

		$vars=array();
		$vars['check']=$check;
		$vars['userDoc']=$userDoc;
		$vars['userPhone']=$userPhone;
		$vars['card']=$card;
		$vars['listConsum']=$listConsum;
		$vars['listRoomFree']=$listRoomFree;
		$vars['listArticle']=$listArticle;
		$vars['payRequired']=$payRequired;
		return new View('reserveCheckInfo', $title, $this->breadCrumbs->getBreads(), $this->mesaje, $vars);
	}

	public function deleteCheckAction($idCheck) {
		$consumeModel = new ConsumeModel($this->conexion);

		$idState = 2;//estado check eliminado
		$consumeModel->updateCheckState($idState, $idCheck);
		if (isset($_SESSION['nCheckTotal'])) {
			$_SESSION['nCheckTotal'] = ($_SESSION['nCheckTotal'] > 0) ? $_SESSION['nCheckTotal'] - 1 : 0;
		} else {
			$_SESSION['nCheckTotal'] = 0;
		}

		if ($_SESSION['TYPE_USER']==Constants::$TYPE_USER_CLIENT)
			header('Location: ' . Helper::base() . 'reserve/');
		else
			header('Location: ' . Helper::base() . 'checkIn/');
	}

	public function deleteConsume_ddAction($idConsum) {
		$consumeModel = new ConsumeModel($this->conexion);

		$consumeModel->deleteConsume_dd($idConsum);
		header('Location: ' . Helper::base() . 'reserve/');

		return 'Registro exitoso';
	}

	public function deletePendingAction($idCheck) {
		$consumeModel = new ConsumeModel($this->conexion);

		if (is_numeric($idCheck) && $idCheck > 0) {
			$consumeModel->updateCheckState(4, $idCheck);//negado
		}
		header('Location: ' . Helper::base() . 'checkIn/list/');

		return 'Registro exitoso';
	}

	public function editConsumeAction($idConsum) {
		$consumeModel = new ConsumeModel($this->conexion);
		$serviceModel = new ServiceModel($this->conexion);

		$title            = 'Solicitar reserva hotelera';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_RESERVE;

		$this->breadCrumbs->insertBread('', 'Registro');
		$this->breadCrumbs->insertBread('reserve/', 'Reservas');

		$consum      = $consumeModel->getConsumeService($idConsum)[0];
		$typeRoom    = $serviceModel->getServiceTypeRoom($consum['ID_SERVICE']);
		$costService = $serviceModel->getServiceCost($consum['ID_SERVICE'], $consum['UNIT_COST_SERVICE'], $consum['UNIT_DAY_COST_SERVICE'], $consum['UNIT_HOUR_COST_SERVICE']);
		$totalCost   = $costTotal = 0;
		$totalHour   = (strtotime($consum['DATE_END_CONSUME_SERVICE']) - strtotime($consum['DATE_START_CONSUME_SERVICE'])) / (60 * 60);
		$listTeam    = $this->getListTeamConsum($idConsum);
		$idService   = $consumeModel->getConsumeService($idConsum)['0']['ID_SERVICE'];
		$service     = $idService > 0 ? $serviceModel->getService($idService)[0] : array();

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('document');
		$listTypeDoc = $typeModel->select();

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('phone');
		$listTypePhone = $typeModel->select();

		$listPais = Helper::getListCountry();
		//$reserveModel = new ReserveModel($this->conexion);
		//$roomOccupied = $reserveModel->getListReserveConsume($idConsum);

		$roomOccupied = $consumeModel->getReserveRoomModelConsume($idConsum);
		$roomModelOccupied=$consumeModel->getReserveRoomModelConsume($idConsum);
		$totalRoomFree=empty($roomModelOccupied)?0:($roomModelOccupied[0]['UNIT_ADULT_ROOM_MODEL']+$roomModelOccupied[0]['UNIT_BOY_ROOM_MODEL']);

		if (!empty($consum)) {
			$checkPerson = $consumeModel->getCheckPerson(0, $consum['ID_CHECK']);
			$checkPerson=empty($checkPerson)?:$checkPerson[0];
		}else
			$checkPerson=array();

		return new View('reserveEditTeam', $title, $this->breadCrumbs->getBreads(), $this->mesaje,
		                compact('value', 'consum', 'list', 'service', 'listPais', 'totalCost', 'totalHour', 'roomOccupied',
		                        'listTypePhone', 'listTypeDoc', 'listTeam', 'listArticle','totalRoomFree',
		                        'articleConsum', 'idConsum', 'typeRoom', 'costService','checkPerson'));
	}

	public function editIncumbentAction($idCheck) {
		$documentModel = new DocumentModel($this->conexion);
		$phoneModel    = new PhoneModel($this->conexion);
		$personModel   = new PersonModel($this->conexion);
		$consumeModel  = new ConsumeModel($this->conexion);
		$cardModel     = new CardModel($this->conexion);

		$title            = 'Ingresar datos del titular';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_RESERVE;

		$this->breadCrumbs->insertBread('', 'Registro');
		$this->breadCrumbs->insertBread('reserve/', 'Registrar ingreso');
		$this->breadCrumbs->insertBread('reserve/editIncumbent/' . $idCheck, 'Registrar ingreso');

		$userModel=new UserModel($this->conexion);
		$listPerson=$userModel->getListNameUser();
		$searchUser = isset($_POST['searchUser']) ? trim($_POST['searchUser']) : '';
		if ($idCheck > 0) {
			$check = $consumeModel->getCheckPerson(0, $idCheck)[0];
			$cardModel->setIdCheck($idCheck);
			$cardModel->syncUp();
			$listCheckCard = $cardModel->select();

			$typeModel = new TypeModel($this->conexion);
			$typeModel->setNameTable('card');
			$listTypeCard = $typeModel->select();

			$months          = Helper::getMonths();
			$listConsumCheck = $consumeModel->getListCheckType($idCheck, 3, 0);//lista de consumo consumo
			$listPais        = Helper::getListCountry();
			if (isset($_POST['btnSearchUser']) && $idCheck > 0) {
				$searchUser = isset($_POST['searchUser']) ? trim($_POST['searchUser']) : '';
				$check2     = $personModel->getPerson($searchUser);
				if (!empty($check2)) {
					$check2                      = $personModel->getPerson($searchUser)[0];
					$check2['ID_CHECK']          = $idCheck;
					$check2['ID_PERSON_TITULAR'] = $check2['ID_PERSON'];
					$check                       = $check2;
				}
			}

			$typeModel = new TypeModel($this->conexion);
			$typeModel->setNameTable('document');
			$listTypeDoc = $typeModel->select();

			$typeModel = new TypeModel($this->conexion);
			$typeModel->setNameTable('phone');
			$listTypePhone = $typeModel->select();

			$docCheck   = $documentModel->getListDoc($check['ID_PERSON_TITULAR']);
			$phoneCheck = $phoneModel->getListPhone($check['ID_PERSON_TITULAR']);

			$reserveModel = new ReserveModel($this->conexion);
			$reserveModel->deleteReservePast($this->idHotel);
			$listReserveHistory2 = $reserveModel->getListReserveGroup($this->idHotel, Constants::$TYPE_CHECK_RESERVE, Constants::$STATE_CHECK_PROCESS_WITHOUT_INCUMBENT, 'CONSUME_SERVICE', $idCheck);//nuevo vacio sin titular
			$listReserveHistory1 = $reserveModel->getListReserveGroup($this->idHotel, Constants::$TYPE_CHECK_RESERVE, Constants::$STATE_CHECK_PROCESS_WITH_INCUMBENT, 'CONSUME_SERVICE', $idCheck);//nuevo con titular
			$listReserveHistory3 = $reserveModel->getListReserveGroup($this->idHotel, Constants::$TYPE_CHECK_RESERVE, Constants::$STATE_CHECK_ACTIVE, 'CONSUME_SERVICE', $idCheck);//reservas activas
			$listReserveHistory  = array_merge($listReserveHistory2, $listReserveHistory1, $listReserveHistory3);
		}
		$totalPay=0;
		foreach ($listConsumCheck as $consume){
			$totalPay+=$consume['PRICE_CONSUME_SERVICE'];
		}
		//dd($listCheckCard);
		$vars=array();
		$vars['listPerson']=$listPerson;
		$vars['listConsumCheck']=$listConsumCheck;
		$vars['check']=$check;
		$vars['listPais']=$listPais;
		$vars['docCheck']=$docCheck;
		$vars['phoneCheck']=$phoneCheck;
		$vars['listCheckCard']=$listCheckCard;
		$vars['listTypePhone']=$listTypePhone;
		$vars['listTypeDoc']=$listTypeDoc;
		$vars['months']=$months;
		$vars['searchUser']=$searchUser;
		$vars['listTypeCard']=$listTypeCard;
		$vars['listReserveHistory']=$listReserveHistory;
		$vars['payRequired']=Constants::$PERCENTAGE_PAY_RESERVE*$totalPay;
		return new View('reserveEditIncumbent', $title, $this->breadCrumbs->getBreads(), $this->mesaje,$vars);
	}

	public function editReserveAction($idCheck) {
		$consumeModel = new ConsumeModel($this->conexion);
		$cardModel    = new CardModel($this->conexion);

		$title            = 'Editar reserva';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_RESERVE;

		$this->breadCrumbs->insertBread('', 'Reservas');
		$this->breadCrumbs->insertBread('reserve/editReserve/' . $idCheck, 'Lista de reservas');

		$reserve    = $consumeModel->getCheckPerson(0, $idCheck)[0];
		$listConsum = $consumeModel->getListConsume($idCheck);
		$listMonth  = Helper::getMonths();
		$cardModel->setIdCheck($idCheck);
		$cardModel->syncUp();
		$cardUserList = $cardModel->select();

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('card');
		$listTypeCard = $typeModel->select();

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('document');
		$listTypeDoc = $typeModel->select();

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('phone');
		$listTypePhone = $typeModel->select();

		$phoneModel = new PhoneModel($this->conexion);
		$phoneModel->setIdPerson($reserve['ID_PERSON_TITULAR']);
		$listPhone = $phoneModel->select();

		$documentModel = new DocumentModel($this->conexion);
		$documentModel->setIdPerson($reserve['ID_PERSON_TITULAR']);
		$listDoc = $documentModel->select();

		$listCountry = Helper::getListCountry();

		$vars=array();
		$vars['reserve']=$reserve;
		$vars['listConsum']=$listConsum;
		$vars['cardUserList']=$cardUserList;
		$vars['listTypeCard']=$listTypeCard;
		$vars['listDoc']=$listDoc;
		$vars['listPhone']=$listPhone;
		$vars['listTypeDoc']=$listTypeDoc;
		$vars['listTypePhone']=$listTypePhone;
		$vars['listMonth']=$listMonth;
		$vars['listCountry']=$listCountry;

		return new View('reserveEditCheckIn', $title, $this->breadCrumbs->getBreads(), $this->mesaje, $vars);
	}

	public function editReserveTeamAction($idConsum) {
		$consumeModel = new ConsumeModel($this->conexion);
		$serviceModel = new ServiceModel($this->conexion);
		$reserveModel = new ReserveModel($this->conexion);
		$roomModel    = new RoomModel($this->conexion);

		$title            = 'Editar reserva';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_RESERVE;

		$this->breadCrumbs->insertBread('', 'Reservas');
		$this->breadCrumbs->insertBread('reserve/editReserveTeam/' . $idConsum, 'Lista de reservas');

		if (empty($consumeModel->getConsumeService($idConsum))) {
			$this->setMesaje('warning',"El consumo $idConsum no esta disponible");
			header('Location: '.Helper::base().'reserve/');
		}

		$consum               = $consumeModel->getConsumeService($idConsum)[0];
		$consum['list_room']  = $consumeModel->getOccupiedRoom($idConsum);
		$listTypeRoomReserved = $reserveModel->getListReserveTypeRoom($consum['ID_CONSUME_SERVICE']);//tipos de habitaciones reservados
		$listRoomFree         = array();//habitaciones libres
		foreach ($listTypeRoomReserved as $reserved) {
			$listTypeAux = $roomModel->getListTypeRoomFreeModel($reserved['ID_ROOM_MODEL'], $consum['DATE_START_CONSUME_SERVICE'], $consum['DATE_END_CONSUME_SERVICE'], $this->idHotel);
			$listType    = array();
			foreach ($listTypeAux as $item) {
				$listType[$item['ID_ROOM']] = $item;
			}
			$listRoomOccupied = $roomModel->getListOccupiedRoom($consum['DATE_START_CONSUME_SERVICE'], $consum['DATE_END_CONSUME_SERVICE'], $this->idHotel);
			foreach ($listRoomOccupied as $item) {
				unset($listType[$item['ID_ROOM']]);
			}
			if (!empty($listType))
				$listRoomFree[$reserved['ID_ROOM_MODEL']] = $listType;
		}
		$listTeam = $this->getListTeamConsum($idConsum);

		$articleModel = new ArticleModel($this->conexion);
		$listArticle  = $articleModel->select();

		$articleConsumeModel = new ArticleConsumeModel($this->conexion);
		$articleConsumeModel->setIdConsume($idConsum);
		$articleConsum = $articleConsumeModel->select();

		$service     = $consum['ID_SERVICE'] > 0 ? $serviceModel->getService($consum['ID_SERVICE'])[0] : array();
		$typeRoom    = $serviceModel->getServiceTypeRoom($consum['ID_SERVICE']);
		$costService = $serviceModel->getServiceCost($consum['ID_SERVICE'], $consum['UNIT_COST_SERVICE'], $consum['UNIT_DAY_COST_SERVICE'], $consum['UNIT_HOUR_COST_SERVICE']);

		$totalCost = $costTotal = 0;
		$totalHour = (strtotime($consum['DATE_END_CONSUME_SERVICE']) - strtotime($consum['DATE_START_CONSUME_SERVICE'])) / (60 * 60);
		$totalDay  = $totalHour / 24;
		if ($costService[0]['UNIT_DAY_COST_SERVICE'] > 0) {
			$totalCost += ($totalDay / $costService[0]['UNIT_DAY_COST_SERVICE']) * $costService[0]['PRICE_COST_SERVICE'];
		}
		if ($costService[0]['UNIT_HOUR_COST_SERVICE'] > 0) {
			$totalCost += ($totalDay * 24 / $costService[0]['UNIT_HOUR_COST_SERVICE']) * $costService[0]['PRICE_COST_SERVICE'];
		}
		$totalCost = $costService[0]['NAME_TYPE_MONEY'] . ' ' . $totalCost;

		$checkPerson = $consumeModel->getCheckPerson(0, $consum['ID_CHECK'])[0];

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('document');
		$listTypeDoc = $typeModel->select();

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('phone');
		$listTypePhone = $typeModel->select();

		$listPais  = Helper::getListCountry();

		$articleModel = new ArticleModel($this->conexion);
		$listArticle = $articleModel->select();
		$articleConsumeModel = new ArticleConsumeModel($this->conexion);
		$articleConsumeModel->setIdConsume($idConsum);
		$articleConsum = $articleConsumeModel->select();

		$roomOccupied = $consumeModel->getReserveRoomModelConsume($idConsum);
		$roomModelOccupied=$consumeModel->getReserveRoomModelConsume($idConsum);
		$totalRoomFree=empty($roomModelOccupied)?0:($roomModelOccupied[0]['UNIT_ADULT_ROOM_MODEL']+$roomModelOccupied[0]['UNIT_BOY_ROOM_MODEL']);

		$userModel=new UserModel($this->conexion);
		$listPerson=$userModel->getListNameUser();

		return new View('reserveEditTeamCheckIn', $title, $this->breadCrumbs->getBreads(), $this->mesaje,
		                compact('value', 'consum', 'list', 'module', 'service', 'listPais', 'totalCost', 'totalHour', 'roomOccupied','listPerson',
		                        'listTypePhone', 'listTypeDoc', 'listTeam', 'listArticle', 'articleConsum', 'idConsum', 'typeRoom', 'costService', 'listRoomFree','checkPerson','totalRoomFree'));
	}

	public function insertAction($idCheck) {
		$idCheck = $this->save($idCheck, 0);

		header('Location: ' . Helper::base() . 'reserve/editIncumbent/' . $idCheck);

		return 'Registro exitoso';
	}

	/**
	 * @param $idCheck : identificador de registro de ingreso, si es menor a 1 se crea un nuevo registro
	 * @return string
	 */
	public function insertClientAction($idCheck) {
		$idCheck = $this->save($idCheck, $_SESSION['ID_PERSON']);
		header('Location: ' . Helper::base() . 'reserve/editIncumbent/' . $idCheck);

		return 'Registro exitoso';
	}

	public function listAction() {
		$consumeModel = new ConsumeModel($this->conexion);
		$reserveModel = new ReserveModel($this->conexion);
		$serviceCheckIn =new CheckInService($this->conexion,$this->idHotel);

		$title            = 'Lista de reservas activas';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_RESERVE;

		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('reserve/list/', 'Lista de reservas');

		$checkReserveTitular = $reserveModel->getListReserve($this->idHotel, Constants::$TYPE_CHECK_RESERVE, Constants::$STATE_CHECK_PROCESS_WITH_INCUMBENT);//reservas activas
		$checkReserveNoTitular = $reserveModel->getListReserve($this->idHotel, Constants::$TYPE_CHECK_RESERVE, Constants::$STATE_CHECK_PROCESS_WITH_INCUMBENT);//reservas activas
		$checkReserveActivo = $reserveModel->getListReserve($this->idHotel, Constants::$TYPE_CHECK_RESERVE, Constants::$STATE_CHECK_ACTIVE);//reservas activas
		$checkReservePending = $reserveModel->getListReserve($this->idHotel, Constants::$TYPE_CHECK_RESERVE, Constants::$STATE_CHECK_PENDING);//reservas activas

		$checkReserve=array_merge($checkReserveNoTitular,$checkReserveTitular,$checkReserveActivo,$checkReservePending);

		$listReserve = array();
		$i           = 0;
		foreach ($checkReserve as $reserve) {
			$listReserve[$i] = $reserve;
			$listConsum      = $consumeModel->getListConsumReserve($reserve['ID_CHECK']);
			$isReserveSelect = TRUE;
			foreach ($listConsum as $consum) {
				$listReserve[$i]['list_consum'][$consum['ID_CONSUME_SERVICE']]              = $consum;
				$listReserve[$i]['list_consum'][$consum['ID_CONSUME_SERVICE']]['list_room'] = $consumeModel->getOccupiedRoom($consum['ID_CONSUME_SERVICE']);
				if (empty($listReserve[$i]['list_consum'][$consum['ID_CONSUME_SERVICE']]['list_room']))
					$isReserveSelect = FALSE;
			}
			$listReserve[$i]['is_room_select'] = $isReserveSelect;
			$i++;
		}

		return new View('reserveList', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listReserve', 'listPhone'));
	}

	public function listClientAction() {
		$consumeModel = new ConsumeModel($this->conexion);
		$reserveModel = new ReserveModel($this->conexion);
		$serviceCheckIn =new CheckInService($this->conexion,$this->idHotel);

		$title            = 'Lista de reservas activas';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_RESERVE;

		if (isset($_SESSION['TYPE_USER'])&&$_SESSION['TYPE_USER']==Constants::$TYPE_USER_ADMIN) {
			$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		}
		$this->breadCrumbs->insertBread('reserve/', 'Lista de reservas');
		$checkReserve=array();
		if(isset($_SESSION['ID_PERSON'])) {
			$checkReserveTitular   = $reserveModel->getListReserveTitular($this->idHotel, Constants::$TYPE_CHECK_RESERVE, Constants::$STATE_CHECK_PROCESS_WITH_INCUMBENT,'CHECK',$_SESSION['ID_PERSON']);//reservas activas
			$checkReserveNoTitular = $reserveModel->getListReserveTitular($this->idHotel, Constants::$TYPE_CHECK_RESERVE, Constants::$STATE_CHECK_PROCESS_WITHOUT_INCUMBENT,'CHECK',$_SESSION['ID_PERSON']);//reservas activas
			$checkReserveActivo    = $reserveModel->getListReserveTitular($this->idHotel, Constants::$TYPE_CHECK_RESERVE, Constants::$STATE_CHECK_ACTIVE,'CHECK',$_SESSION['ID_PERSON']);//reservas activas
			$checkReservePending   = $reserveModel->getListReserveTitular($this->idHotel, Constants::$TYPE_CHECK_RESERVE, Constants::$STATE_CHECK_PENDING,'CHECK',$_SESSION['ID_PERSON']);//reservas activas
			$checkInActive         = $consumeModel->getListCheckConsumeTitular($this->idHotel,Constants::$TYPE_CHECK_IN, Constants::$STATE_CHECK_ACTIVE,$_SESSION['ID_PERSON']);//reservas activas
			$checkInPending        = $consumeModel->getListCheckConsumeTitular($this->idHotel,Constants::$TYPE_CHECK_IN, Constants::$STATE_CHECK_PENDING,$_SESSION['ID_PERSON']);//checks pendientes

			$checkReserve = array_merge($checkReserveNoTitular, $checkReserveTitular, $checkReserveActivo, $checkReservePending, $checkInActive, $checkInPending);
		}
		$listReserve = array();
		$i           = 0;
		foreach ($checkReserve as $reserve) {
			$listReserve[$i] = $reserve;
			$listConsum      = $consumeModel->getListConsumReserve($reserve['ID_CHECK']);
			$isReserveSelect = TRUE;
			foreach ($listConsum as $consum) {
				$listReserve[$i]['list_consum'][$consum['ID_CONSUME_SERVICE']]              = $consum;
				$listReserve[$i]['list_consum'][$consum['ID_CONSUME_SERVICE']]['list_room'] = $consumeModel->getOccupiedRoom($consum['ID_CONSUME_SERVICE']);
				if (empty($listReserve[$i]['list_consum'][$consum['ID_CONSUME_SERVICE']]['list_room']))
					$isReserveSelect = FALSE;
			}
			$listReserve[$i]['is_room_select'] = $isReserveSelect;
			$i++;
		}

		$vars=array();
		$vars['listReserve']=$listReserve;
		return new View('reserveList', $title, $this->breadCrumbs->getBreads(), $this->mesaje,$vars);
	}

	public function pendingAction() {//reservas pendientes a validar por un trabajador
		$consumeModel = new ConsumeModel($this->conexion);

		$_SESSION['MENU'] = Constants::$MENU_SELECTED_RESERVE;
		$title            = 'Solicitud de reservas';

		$this->breadCrumbs->insertBread('', 'registro');
		$this->breadCrumbs->insertBread('reserve/pending/', 'reservas pendientes');

		$listReserve1 = $consumeModel->getListCheckReserve($this->idHotel, 1, Constants::$STATE_CHECK_PENDING);//reservas pendientes por validar
		$listReserve2 = $consumeModel->getListCheckReserve($this->idHotel, 1, Constants::$STATE_CHECK_FINISHED);//reservas finalizadas correctamente
		$listReserve3 = $consumeModel->getListCheckReserve($this->idHotel, 1, Constants::$STATE_CHECK_ACTIVE);//reservas activas
		$listReserve=array_merge($listReserve1,$listReserve2,$listReserve3);
		return new View('reservePending', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listReserve'));
	}

	public function registerUserAction() {
		$this->insertPerson();
		return $this->insertClientAction(0);
	}

	public function savePendingAction($idCheck) {
		$consumeModel = new ConsumeModel($this->conexion);

		if (is_numeric($idCheck) && $idCheck > 0) {
			$consumeModel->updateTypeReception(Constants::$STATE_CHECK_ACTIVE, Constants::$TYPE_CHECK_RESERVE, $idCheck, $_SESSION['ID_PERSON']);//cambiar estado
			$consumeModel->updatePayConsumeCard($idCheck,Constants::$STATE_CONSUME_ACTIVE,0);
		}
		header('Location: ' . Helper::base() . 'reserve/list/');

		return 'Registro exitoso';
	}

	public function saveReserveAction($idCheck) {
		$this->saveReserve($idCheck, 1);
	}

	public function saveReserveClientAction($idCheck) {
		$this->saveReserve($idCheck, 3);
	}

	/**
	 * busca y muestra en una lista las habitaciones disponibles en un rango determinado
	 * si existe el $idCheck y si es mayor a 0 recoge las fechas y hora de ingreso recoge los datos de la BD
	 *si no existe recupera la fecha y hora de ingreso con $_POST[]
	 *
	 * @param $idCheck : identificador del registro de cuenta de cliente
	 * @return View
	 */
	public function searchAction($idCheck) {
		$consumeModel = new ConsumeModel($this->conexion);

		$title            = 'Solicitar reserva hotelera';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_CHECK_IN;

		$this->breadCrumbs->insertBread('reserve/', 'Reservas');
		$this->breadCrumbs->insertBread('reserve/search/' . $idCheck, 'Buscar reservas');

		if ($idCheck > 0) {//para actualizar la reserva
			$check   = $consumeModel->getCheckPerson(0, $idCheck)[0];
			$timeIn  = $check['TIME_START_CHECK'];
			$dateIn  = $check['DATE_START_CHECK'];
			$timeOut = $check['TIME_END_CHECK'];
			$dateOut = $check['DATE_END_CHECK'];
			$nPerson = 1;
			$nBoy    = 0;
		} else {
			$timeIn  = isset($_POST['timeIn']) ? $_POST['timeIn'] : '06:00:00';
			$timeOut = isset($_POST['timeOut']) ? $_POST['timeOut'] : '06:00:00';
			$dateIn  = isset($_POST['dateIn']) ? $_POST['dateIn'] : Helper::getLastDay(1);
			$dateOut = isset($_POST['dateOut']) ? $_POST['dateOut'] : Helper::getLastDay(2);
			$nPerson = isset($_POST['nPerson']) ? $_POST['nPerson'] : 1;
			$nBoy    = isset($_POST['nBoy']) ? $_POST['nBoy'] : 0;
		}
		$listReservable = $this->getServiceListFree($timeIn, $dateIn, $timeOut, $dateOut, $nPerson, $nBoy);
		$vars=array();
		$vars['idCheck']=$idCheck;
		$vars['dateIn']=$dateIn;
		$vars['timeIn']=$timeIn;
		$vars['timeOut']=$timeOut;
		$vars['dateOut']=$dateOut;
		$vars['listReservable']=$listReservable;
		$vars['nPerson']=$nPerson;
		return new View('reserveSearch', $title, $this->breadCrumbs->getBreads(), $this->mesaje,$vars);
	}

	public function showAction($idCheck){
		$consumeModel = new ConsumeModel($this->conexion);
		$reserveModel = new ReserveModel($this->conexion);

		$title            = 'Lista de reservas activas';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_RESERVE;

		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('reserve/show/'.$idCheck, 'Lista de reservas');

		$checkReserve=$reserveModel->getListReserveGroup($this->idHotel, Constants::$TYPE_CHECK_RESERVE, '','CHECK',$idCheck);
		$listReserve = array();
		$i           = 0;
		foreach ($checkReserve as $reserve) {
			$listReserve[$i] = $reserve;
			$listConsum      = $consumeModel->getListConsumReserve($idCheck);
			$isReserveSelect = TRUE;
			foreach ($listConsum as $consum) {
				$listReserve[$i]['list_consum'][$consum['ID_CONSUME_SERVICE']]              = $consum;
				$listReserve[$i]['list_consum'][$consum['ID_CONSUME_SERVICE']]['list_room'] = $consumeModel->getOccupiedRoom($consum['ID_CONSUME_SERVICE']);
				if (empty($listReserve[$i]['list_consum'][$consum['ID_CONSUME_SERVICE']]['list_room']))
					$isReserveSelect = FALSE;
			}
			$listReserve[$i]['is_room_select'] = $isReserveSelect;
			$i++;
		}

		return new View('reserveList', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listReserve'));
	}

	public function updateIncumbentAction($idCheck, $idPerson) {
		if ($idCheck > 0) {
			$consumeModel = new ConsumeModel($this->conexion);

			$check = $consumeModel->getCheckPerson(0, $idCheck)[0];
			$this->updateIncumbentReserve($check['ID_PERSON'], $idCheck, $idPerson);
			$deposit = $this->updateConsumeCheckIn();
			$this->updateCard($idCheck, $deposit);
			$consumeModel->updateCheckState(Constants::$STATE_CHECK_PROCESS_WITH_INCUMBENT, $idCheck);
		}

		//$this->updateConsumCheckIn();

		//$consumeModel->updateCheckState($idState = 5, $idCheck);
		header('Location: ' . Helper::base() . 'reserve/saveReserve/' . $idCheck . '/');

		return 'Reserva exitosa';
	}

	public function updateReserveCheckInAction($idCheck) {
		$consumeModel = new ConsumeModel($this->conexion);
		$reserveModel = new ReserveModel($this->conexion);

		//persona titular
		$person      = isset($_POST['person']) ? $_POST['person'] : [];
		$personDoc   = isset($_POST['docUser']) ? $_POST['docUser'] : [];
		$personPhone = isset($_POST['phoneUser']) ? $_POST['phoneUser'] : [];
		//datos de reserva
		$dateIniReserve = isset($_POST['dateIniReserve']) ? $_POST['dateIniReserve'] : '';
		$timeIniReserve = isset($_POST['timeIniReserve']) ? $_POST['timeIniReserve'] : '';
		$dateFinReserve = isset($_POST['dateFinReserve']) ? $_POST['dateFinReserve'] : '';
		$timeFinReserve = isset($_POST['timeFinReserve']) ? $_POST['timeFinReserve'] : '';
		$observation    = isset($_POST['observation']) ? $_POST['observation'] : '';
		$totalPay       = isset($_POST['totalPay']) ? $_POST['totalPay'] : '0';
		//datos de tarjeta
		$listCard = isset($_POST['listCard']) ? $_POST['listCard'] : array();
		$consumeModel->updateCheckPerson(1,$dateIniReserve, $timeIniReserve, $dateFinReserve, $timeFinReserve,$observation,$idCheck);
		foreach ($listCard as $card) {
			$nCard        = $card['nCard'];
			$idTypeCard   = $card['idTypeCard'];
			$ccv          = $card['ccv'];
			$monthExpCard = $card['month'];
			$yearExpCard  = $card['year'];
			$validCard    = isset($card['validCard']) ? $card['validCard'] : '-1';
			$reserveModel->updateReserve($idCheck, $nCard, $idTypeCard, $ccv, $monthExpCard, $yearExpCard, $validCard, $person, $personPhone, $personDoc);
		}
		$consumeModel->updatePayCheckIn($idCheck, $totalPay);
		header('Location: ' . Helper::base() . 'reserve/show/'.$idCheck);

		return 'Registro exitoso';
	}

	public function updateReserveCheckInTeamAction($idConsume) {
		$personModel  = new PersonModel($this->conexion);
		$consumeModel = new ConsumeModel($this->conexion);
		$articleModel = new ArticleModel($this->conexion);

		$listTeam    = isset($_POST['team']) ? $_POST['team'] : array();
		$listArticle = isset($_POST['listIdArticle']) ? $_POST['listIdArticle'] : array();
		$idRoom      = isset($_POST['idRoom']) ? $_POST['idRoom'] : '';
		foreach ($listTeam as $team) {
			if (!isset($team['isOccupiedXTitular'])||!$team['isOccupiedXTitular']=='on') {
				$personModel->updatePerson(
					$team['idPerson'], $team['name'], $team['app'], '', $team['sex'], $team['dateNac'], isset($team['email']) ?
					$team['email'] : '', $team['address'], isset($team['city']) ? $team['city'] :
						'', $team['pais'], '', 0, array($team['listDocument'][0]), array()
				);
			}
		}

		$articleConsumeModel = new ArticleConsumeModel($this->conexion);
		$articleConsumeModel->setIdConsume($idConsume);
		$articleConsumeModel->setIdState(Constants::$STATE_ARTICLE_TAKEN);
		foreach ($listArticle as $idArticle) {
			$articleConsumeModel->setIdArticle($idArticle);
			$articleModel->insert();
		}

		$idCheck=$consumeModel->updateConsumState($idConsume, $active = 1);
		$consumeModel->deleteOccupationRoom($idConsume);
		if (!empty($consume = $consumeModel->getConsumeService($idConsume))) {
			$consume = $consume[0];
			$consumeModel->insertOccupationRoom($idConsume, $idRoom, $consume['DATE_START_CONSUME_SERVICE'], $consume['TIME_START_CONSUME_SERVICE'], $consume['DATE_END_CONSUME_SERVICE'], $consume['TIME_END_CONSUME_SERVICE']);
		}
		header('Location: ' . Helper::base() . 'reserve/show/'.$idCheck);

		return 'Registro exitoso';
	}

	public function updateTeamAction($idConsum) {
		$consumeModel = new ConsumeModel($this->conexion);
		$userModel    = new UserModel($this->conexion);

		$listTeam = empty($_POST['team'])?array():$_POST['team'];
		foreach ($listTeam as $team) {
			if (isset($team['isOccupiedXTitular'])&&$team['isOccupiedXTitular']=='on') {
				$idPersonMember = empty($_POST['idPersonTitular'])?0:$_POST['idPersonTitular'];
			}else{
				$personModel = new PersonModel($this->conexion);
				$personModel->setId($team['idPerson']);
				$personModel->syncUp();
				$personModel->setName($team['name']);
				$personModel->setLastName($team['app']);
				$personModel->setSex($team['sex']);
				$personModel->setDateBorn($team['dateNac']);
				$personModel->setAddress($team['address']);
				$personModel->setCountry($team['pais']);
				$personModel->setPassword('');
				$idPersonMember = $personModel->update();
			}
			$userModel->insertUserRol($idPersonMember, 3);//insertar usuario rol

			//insertar documento
			if (empty($team['isOccupiedXTitular'])) {
				foreach ($team['listDocument'] as $document) {
					$documentModel = new DocumentModel($this->conexion);
					$documentModel->setNumber(isset($document['nDocOld']) ? $document['nDocOld'] : 0);
					$documentModel->setIdPerson($idPersonMember);
					$documentModel->setidType($document['idType']);
					$documentModel->syncUp();
					$documentModel->delete();//eliminar anterior

					$documentModel->setNumber($document['nDoc']);
					$documentModel->insert();
				}
			}
			$consumeModel->updateConsumState($idConsum, Constants::$STATE_CONSUME_ACTIVE);

			$consumeModel->updatePersonMember($idPersonMember, $idConsum);
		}

		header('Location: ' . Helper::base() . 'reserve/');

		return 'Registro exitoso';
	}

	public function updateValidCardAction($idCheck,$idCard) {
		$cardModel = new CardModel($this->conexion);
		$consumeModel=new ConsumeModel($this->conexion);

		$validCard = isset($_POST['validCard']) ? ($_POST['validCard'] == 'on' ? 1 : 0) : 0;
		$cardModel->setIdCheck($idCheck);
		$cardModel->syncUp();
		$cardModel->setIsValid($validCard);
		$cardModel->update();
		header('Location: ' . Helper::base() . 'reserve/checkInfo/' . $idCheck);

		return 'Registro exitoso';
	}

	private function getListTeamConsum($idConsum) {
		$consumeModel = new ConsumeModel($this->conexion);

		$listTeam = $consumeModel->getListTeam($idConsum);
		$i        = 0;
		$res      = array();
		foreach ($listTeam as $team) {
			$documentModel = new DocumentModel($this->conexion);
			$documentModel->setIdPerson($team['ID_PERSON']);
			$documentModel->syncUp();

			$phoneModel = new PhoneModel($this->conexion);
			$phoneModel->setIdPerson($team['ID_PERSON']);
			$phoneModel->syncUp();
			$res[$i]                 = $team;
			$res[$i]['listDocument'] = $documentModel->select();
			$res[$i]['listPhone']    = $phoneModel->select();
			$i++;
		}

		return $res;
	}

	private function getServiceListFree($timeIn, $dateIn, $timeOut, $dateOut, $nPerson, $nBoy) {
		$consumeModel = new ConsumeModel($this->conexion);
		$serviceModel = new ServiceModel($this->conexion);
		$roomModel    = new RoomModel($this->conexion);

		$listReservable = array();
		//verificar fecha valida de reserva valida
		if (strtotime($dateOut) >= strtotime($dateIn) && strtotime($dateIn) >= strtotime(date('Y-m-d'))) {
			$listTypeRoom = $res = $roomModel->getListModelRoomFree($dateIn, $dateOut, $nPerson, $nBoy, $this->idHotel);
			$aux          = array();
			$i            = 0;
			foreach ($listTypeRoom as $typeRoom) {
				$listRoomAux = $roomModel->getListTypeRoomFreeModel($typeRoom['ID_ROOM_MODEL'], $dateIn, $dateOut, $this->idHotel);
				$listRoom    = array();
				foreach ($listRoomAux as $room) {
					if ($room['DATE_CHECK_OUT_ROOM'] === date('Y-m-d')) {
						if ($room['TIME_CHECK_OUT_ROOM'] <= date('H:i:s'))
							$listRoom[$room['ID_ROOM']] = $room;
					} elseif ($room['DATE_CHECK_OUT_ROOM'] < date('Y-m-d')) {
						$listRoom[$room['ID_ROOM']] = $room;
					}
				}
				$listCost    = $serviceModel->getServiceCostList($typeRoom['ID_SERVICE']);
				$auxListCost = array();
				foreach ($listCost as $cost) {
					$totalHourConsum = (strtotime($dateOut) - strtotime($dateIn) + (strtotime($timeOut) - strtotime($timeIn))) / (3600);
					$totalHourCost   = ($cost['UNIT_DAY_COST_SERVICE'] * 24 + $cost['UNIT_HOUR_COST_SERVICE']) == 0 ?
						1 : $cost['UNIT_DAY_COST_SERVICE'] * 24 + $cost['UNIT_HOUR_COST_SERVICE'];
					$totalTime = (($totalHourConsum % $totalHourCost) == 0) ? $totalHourConsum / $totalHourCost : 0;
					$priceConsum  = $cost['PRICE_COST_SERVICE'] * $totalTime;

					$cost['PRICE_TOTAL']                   = $priceConsum;
					$auxListCost[$cost['ID_COST_SERVICE']] = $cost;

				}
				$listReservedAux = $consumeModel->getListConsumeTypeRoom($typeRoom['ID_ROOM_MODEL'], $dateIn, $timeIn, $dateOut, $timeOut);
				$nReseved        = 0;
				foreach ($listReservedAux as $reserved) {
					$nReseved += $reserved['UNIT_RESERVED'];
				}
				$aux[$i]               = $typeRoom;
				$aux[$i]['n_reserved'] = $nReseved;
				$aux[$i]['list_cost']  = $auxListCost;
				$aux[$i]['list_room']  = $listRoom;
				$i++;
			}
			$listReservable = $aux;
			if (empty($listReservable))
				$this->setMesaje('warning', 'No existen habitaciones disponibles para las fechas, ingreso: ' . $dateIn . ' Salida:' . $dateOut);
		} elseif (strtotime($dateIn) < strtotime(date('Y-m-d'))){
			$this->setMesaje('danger', 'La fecha de ingreso mayor a la fecha de actual: ' . $dateIn . ' Salida:' . $dateOut);
		}else{
			$this->setMesaje('warning', 'Fechas no validas, ingreso: ' . $dateIn . ' Salida:' . $dateOut);
		}
		if (!empty($listReservable))
			$this->setMesaje('success', 'Habitaciones libres en fecha: ' . $dateIn . ' a:' . $dateOut);


		return $listReservable;
	}

	private function insertPerson() {
		$personModel = new PersonModel($this->conexion);
		$personModel->syncUp();
		$personModel->setName(isset($_POST['name']) ? $_POST['name'] : '');
		$personModel->setLastName(isset($_POST['app']) ? $_POST['app'] : '');
		$personModel->setSex(isset($_POST['sex']) ? $_POST['sex'] : -1);
		$personModel->setDateBorn(isset($_POST['dateNac']) ? $_POST['dateNac'] : '');
		$personModel->setEmail(isset($_POST['email']) ? $_POST['email'] : '');
		$personModel->setAddress(isset($_POST['address']) ? $_POST['address'] : '');
		$personModel->setCity(isset($_POST['city']) ? $_POST['city'] : '');
		$personModel->setCountry(isset($_POST['pais']) ? $_POST['pais'] : '');
		$personModel->setIdRol(3);
		$idPerson = $personModel->insert();

		//insertar documento
		$listDocument = isset($_POST['docUser']) ? $_POST['docUser'] : array();
		foreach ($listDocument as $document) {
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
		foreach ($listPhone as $phone) {
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


		$_SESSION['ID_PERSON']=$idPerson;
		$_SESSION['TYPE_USER']=Constants::$TYPE_USER_CLIENT;
		$_SESSION['NAME_USER']=$personModel->getEmail();
		$_SESSION['REGISTER_GUEST']=0;
		return $idPerson;
	}

	/**
	 * @param $idCheck : numero de registro
	 * @param $idTitular : es mayor a 0 si la persona q hace la reserva es un cliente, caso contrario se creara un nuevo cliente
	 * @return int:idcheck insertado o modificado
	 */
	private function save($idCheck, $idTitular) {
		$reserveModel  = new ReserveModel($this->conexion);
		$consumeModel  = new ConsumeModel($this->conexion);
		$idPersonRecep = isset($_SESSION['ID_PERSON'])?$_SESSION['ID_PERSON']:0;

		if (is_numeric($idCheck)) {//para idCheck>0 y idCheck<=0
			$dateIn   = isset($_POST['dateIn']) ? $_POST['dateIn'] : Helper::getLastDay(0);
			$timeIn   = isset($_POST['timeIn']) ? $_POST['timeIn'] : date("H:i:s");
			$dateOut  = isset($_POST['dateOut']) ? $_POST['dateOut'] : Helper::getLastDay(1);
			$timeOut  = isset($_POST['timeOut']) ? $_POST['timeOut'] : '6:00:00';
			$listRoom = isset($_POST['listRoom']) ? $_POST['listRoom'] : array();
			$typePay='';
			//obtener idPerson del titular
			if ($idTitular < 1) {
				$personModel = new PersonModel($this->conexion);
				$idTitular   = $personModel->insert();
			}
			if ($idCheck < 1) {
				$idCheck             = $consumeModel->insertCheckPerson($this->idHotel, $idTitular, $idPersonRecep, Constants::$STATE_CHECK_PROCESS_WITHOUT_INCUMBENT, $dateIn, $timeIn, $dateOut, $timeOut, '', Constants::$TYPE_CHECK_RESERVE);
				$_SESSION['nCheckTotal'] = isset($_SESSION['nCheckTotal']) ? $_SESSION['nCheckTotal'] + 1 : 1;
			}
			foreach ($listRoom as $item) {
				if (isset($item['idCost'], $item['unitPerson'], $item['nRoom']) && $item['nRoom'] > 0) {
					$cost = $consumeModel->getCostService($item['idCost'])[0];
					for ($i = 0; $i < $item['nRoom']; $i++) {
						$idConsume = $consumeModel->insertConsumeRoom(
							$idCheck, Constants::$TYPE_CONSUME_CONSUME_ROOM, $item['idCost'], $dateIn, $timeIn, $dateOut, $timeOut, 0, $cost['PRICE_COST_SERVICE'], 'Reserva', 1, -1, 1, '',$typePay
						);
						$consumeModel->insertCheckMember($idCheck, 0);

						$reserveModel->insertReserve($idConsume, $item['idTypeRoom'], 1);
					}
				}
			}
		}

		return $idCheck;
	}

	private function saveReserve($idCheck, $idStateCheck) {
		$consumeModel = new ConsumeModel($this->conexion);
		$messageModel = new MessageModel($this->conexion);
		$cardModel    = new CardModel($this->conexion);

		//para recepcionista y administrador
		$title = 'Solicitud de reserva';
		$check = $consumeModel->getCheckPerson(0, $idCheck)[0];
		$cardModel->setIdCheck($idCheck);
		$cardModel->syncUp();
		$content    = "<p>Envio de soliciud de reserva en fecha " . date('Y-m-d') . ' por el usuario ' . $check['NAME_PERSON'] . ' ' . $check['LAST_NAME_PERSON'] . 'con el correo electronico: ' . $check['EMAIL_PERSON'] . ".</p>" . "<p>Las fechas de la reserva son en fechas del:" . $check['DATE_START_CHECK'] . ' a ' . $check['DATE_END_CHECK'] . ' con n&uacute;mero de reserva' . $check['ID_CHECK'] . ', n&uacute;mero de tarjeta ' . $cardModel->getNumber() . ', tipo de tarjeta' . $cardModel->getTypeCard()->getName() . "</p>";
		$typeMesaje = '6';
		$consumeModel->updateCheckState($idStateCheck, $idCheck);
		$messageModel->insertMessage($check['ID_PERSON'], 'admin', $title, $content, $typeMesaje);
		$messageModel->insertMessage($check['ID_PERSON'], 'recepcion', $title, $content, $typeMesaje);
		$messageModel->insertMessage($check['ID_PERSON'], $check['ID_PERSON'], $title, $content, $typeMesaje);
		header('Location: ' . Helper::base() . 'checkIn/show/'.$idCheck);

		return 'Registro exitoso';
	}

	private function updateCard($idCheck, $deposit) {
		$cardModel = new CardModel($this->conexion);
		$typePay=isset($_POST['typePay']) ? $_POST['typePay'] : 0;
		if ($typePay == 1) {
			$cardModel->setIdCheck($idCheck);
			$cardModel->syncUp();
			$cardModel->setNumber(isset($_POST['nCard']) ? $_POST['nCard'] : '');
			$cardModel->setIdType(isset($_POST['idTypeCard']) ? $_POST['idTypeCard'] : '-1');
			$cardModel->setMonth(isset($_POST['month']) ? $_POST['month'] : '');
			$cardModel->setYear(isset($_POST['year']) ? $_POST['year'] : '');
			$cardModel->setCcv(isset($_POST['ccv']) ? $_POST['ccv'] : '');
			$cardModel->setIsValid(isset($_POST['validCard']) ? $_POST['validCard'] : '0');
			$cardModel->setDeposit($deposit);
			$cardModel->update();
		}
		if ($typePay == 2) {
			$resultImage=Img::uploadImg('img/deposit/');
			$imageDeposit=$resultImage['urlImg'];

			$cardModel->setIdCheck($idCheck);
			$cardModel->syncUp();
			$cardModel->setNumber($imageDeposit);
			$cardModel->setIdType(Constants::$TYPE_CARD_DEPOSIT);
			$cardModel->setMonth(date('m'));
			$cardModel->setYear(date('Y'));
			$cardModel->setIsValid($_SESSION['TYPE_USER']==Constants::$TYPE_USER_CLIENT?0:1);
			$cardModel->setDeposit($deposit);
			$cardModel->update();
		}
	}

	private function updateConsumeCheckIn() {
		$consumeModel = new ConsumeModel($this->conexion);
		$totalDeposit=0;
		$listPay = isset($_POST['cost']) ? $_POST['cost'] : array();
		foreach ($listPay as $pay) {
			if (isset($pay['payService'])){
				$totalDeposit+=$pay['payService'];
				$consumeModel->updateConsumCheckIn($pay['idConsum'],$pay['payService']);
			}else {
				$totalDeposit+=$consumeModel->updateConsumCheckInDefault($pay['idConsum']);
			}
		}

		return $totalDeposit;
	}

	private function updateIncumbentReserve($idPersonIncumbent, $idCheck, $idPersonReplace) {
		$personModel  = new PersonModel($this->conexion);
		$consumeModel = new ConsumeModel($this->conexion);
		$userModel    = new UserModel($this->conexion);
		if ($idPersonReplace > 0) {
			$idPersonIncumbent = $idPersonReplace;
		}

		$personModel->setId($idPersonIncumbent);
		$personModel->syncUp();
		$personModel->setName(isset($_POST['name']) ? $_POST['name'] : '');
		$personModel->setLastName(isset($_POST['app']) ? $_POST['app'] : '');
		$personModel->setSex(isset($_POST['sex']) ? $_POST['sex'] : -1);
		$personModel->setDateBorn(isset($_POST['dateNac']) ? $_POST['dateNac'] : '');
		$personModel->setEmail(isset($_POST['email']) ? $_POST['email'] : '');
		$personModel->setAddress(isset($_POST['address']) ? $_POST['address'] : '');
		$personModel->setCity(isset($_POST['city']) ? $_POST['city'] : '');
		$personModel->setCountry(isset($_POST['pais']) ? $_POST['pais'] : '');
		$personModel->setPoint(isset($_POST['point']) ? $_POST['point'] : 0);
		$personModel->update();

		//insertar documento
		$listDocument = isset($_POST['docUser']) ? $_POST['docUser'] : array();
		foreach ($listDocument as $document) {
			$documentModel = new DocumentModel($this->conexion);
			$documentModel->setIdPerson($idPersonIncumbent);
			$documentModel->setidType($document['idType']);
			$documentModel->syncUp();
			$documentModel->delete();//eliminar anterior
			$documentModel->setIdPerson($idPersonIncumbent);
			$documentModel->setIdType($document['idType']);
			$documentModel->syncUp();
			$documentModel->setNumber($document['nDoc']);
			$documentModel->update();
		}
		//insertar telefono
		$listPhone = isset($_POST['phoneUser']) ? $_POST['phoneUser'] : array();
		foreach ($listPhone as $phone) {
			$phoneModel = new PhoneModel($this->conexion);
			$phoneModel->setNumber(isset($phone['nPhoneOld']) ? $phone['nPhoneOld'] : 0);
			$phoneModel->syncUp();
			$phoneModel->delete();//eliminar el telefono anterior
			$phoneModel->setIdPerson($idPersonIncumbent);
			$phoneModel->syncUp();
			$phoneModel->setNumber($phone['nPhone']);
			$phoneModel->setIdType($phone['idType']);
			$phoneModel->insert();//insertar nuevo
		}
		//actualizar si estaba en la vista reserveDataUser
		if ($idPersonIncumbent > 0) {
			$consumeModel->updateCheckIncumbentCheck($idCheck, $idPersonIncumbent);
			if (isset($_POST['resetPass'])) {
				$userModel->updatePassUser($idPersonIncumbent, date('123456'));
			}
		}

		return $idPersonIncumbent;
	}
}
