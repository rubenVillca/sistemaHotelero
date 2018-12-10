<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 24/08/2017
 * Time: 21:41
 */
require_once 'services/CheckInService.php';
require_once 'model/CardModel.php';
require_once 'model/TypeModel.php';
require_once 'model/DocumentModel.php';
require_once 'model/PhoneModel.php';
require_once 'model/UserModel.php';
require_once 'model/ReserveModel.php';

class CheckInController extends Controller {
	private $serviceCheckIn;
	private $reserveModel;

	public function __construct() {
		parent::__construct();
		$this->serviceCheckIn =new CheckInService($this->conexion,$this->idHotel);
		$this->reserveModel   = new ReserveModel($this->conexion);
	}

	public function indexAction() {
		$title = 'Registrar ingreso de clientes';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_CHECK_IN;
		$this->breadCrumbs->insertBread('', 'Registrar ingreso');
		$this->breadCrumbs->insertBread('checkIn/', $title);

		$searchUser = isset($_POST['searchUser']) ? trim($_POST['searchUser']) : '';
		$dateIn = Helper::getLastDay(0);
		$dateOut = Helper::getLastDay(1);
		$timeIn = $timeOut = date("H:i:s");

		$listConsumHistory1 = $this->serviceCheckIn->getListCheckConsume(Constants::$TYPE_CHECK_IN, Constants::$STATE_CHECK_PROCESS_WITH_INCUMBENT);//lista reservas checkIn y en proceo
		$listConsumHistory3 = $this->serviceCheckIn->getListCheckConsume(Constants::$TYPE_CHECK_IN, Constants::$STATE_CHECK_PROCESS_WITHOUT_INCUMBENT);//pendientes
		$listConsumHistory2 = $this->serviceCheckIn->getListCheckConsume(Constants::$TYPE_CHECK_IN, Constants::$STATE_CHECK_ACTIVE);//lista reservas checkIn y en activos
		//$listConsumHistory4 = $this->serviceCheckIn->getListCheckConsume(Constants::$TYPE_CHECK_IN, Constants::$STATE_CHECK_FINISHED);//lista finalizadas

		$listReserveHistory7 = $this->reserveModel->getListReserveGroup($this->idHotel, Constants::$TYPE_CHECK_RESERVE, Constants::$STATE_CHECK_ACTIVE, 'CHECK', 0);//reservas activas
		$listReserveHistory5 = $this->reserveModel->getListReserveGroup($this->idHotel, Constants::$TYPE_CHECK_RESERVE, Constants::$STATE_CHECK_PROCESS_WITH_INCUMBENT, 'CHECK', 0);//nuevo con titular
		$listReserveHistory6 = $this->reserveModel->getListReserveGroup($this->idHotel, Constants::$TYPE_CHECK_RESERVE, Constants::$STATE_CHECK_PROCESS_WITHOUT_INCUMBENT, 'CHECK', 0);//nuevo vacio sin titular
		//$listReserveHistory8 = $this->reserveModel->getListReserveGroup($this->idHotel, Constants::$TYPE_CHECK_RESERVE, Constants::$STATE_CHECK_FINISHED, 'CHECK', 0);//reservas activas
		$listReserveHistory9 = $this->reserveModel->getListReserveGroup($this->idHotel, Constants::$TYPE_CHECK_RESERVE, Constants::$STATE_CHECK_PENDING, 'CHECK', 0);//reservas activas
		$listConsum = array_merge($listConsumHistory1, $listConsumHistory3, $listConsumHistory2,$listReserveHistory5,$listReserveHistory6,$listReserveHistory7,$listReserveHistory9);

		return new View('checkIn', $title, $this->breadCrumbs->getBreads(), $this->mesaje,
		                compact('listUserPhone', 'listConsum', 'dateIn', 'dateOut', 'searchUser', 'timeIn', 'timeOut'));
	}

	public function listAction() {
		$title = 'Registrar ingreso de clientes';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_CHECK_IN;
		$this->breadCrumbs->insertBread('', 'Registrar ingreso');
		$this->breadCrumbs->insertBread('checkIn/', $title);

		$listConsumHistory0 = $this->serviceCheckIn->getListCheckConsume(Constants::$TYPE_CHECK_OUT, Constants::$STATE_CHECK_FINISHED);//lista reservas checkIn y en proceo
		$listConsumHistory1 = $this->serviceCheckIn->getListCheckConsume(Constants::$TYPE_CHECK_IN, Constants::$STATE_CHECK_FINISHED);//lista reservas checkIn y en proceo
		$listConsumHistory2 = $this->serviceCheckIn->getListCheckConsume(Constants::$TYPE_CHECK_IN, Constants::$STATE_CHECK_CANCEL);//pendientes
		$listConsumHistory3 = $this->serviceCheckIn->getListCheckConsume(Constants::$TYPE_CHECK_IN, Constants::$STATE_CHECK_DENIED);//lista reservas checkIn y en activos
		$listConsumHistory4 = $this->serviceCheckIn->getListCheckConsume(Constants::$TYPE_CHECK_IN, Constants::$STATE_CHECK_DELETE_AUTOMATIC);//lista reservas checkIn y en activos
		$listReserveHistory5 = $this->reserveModel->getListReserveGroup($this->idHotel, Constants::$TYPE_CHECK_RESERVE, Constants::$STATE_CHECK_CANCEL, 'CHECK', 0);//nuevo con titular
		$listReserveHistory6 = $this->reserveModel->getListReserveGroup($this->idHotel, Constants::$TYPE_CHECK_RESERVE, Constants::$STATE_CHECK_DELETE_AUTOMATIC, 'CHECK', 0);//nuevo vacio sin titular
		$listReserveHistory7 = $this->reserveModel->getListReserveGroup($this->idHotel, Constants::$TYPE_CHECK_RESERVE, Constants::$STATE_CHECK_FINISHED, 'CHECK', 0);//reservas activas
		$listReserveHistory9 = $this->reserveModel->getListReserveGroup($this->idHotel, Constants::$TYPE_CHECK_RESERVE, Constants::$STATE_CHECK_DENIED, 'CHECK', 0);//reservas activas
		$listConsum = array_merge($listConsumHistory0,$listConsumHistory1, $listConsumHistory3, $listConsumHistory2,$listConsumHistory4,$listReserveHistory5,$listReserveHistory6,$listReserveHistory7,$listReserveHistory9);
		$isListFinish=true;

		return new View('checkIn', $title, $this->breadCrumbs->getBreads(), $this->mesaje,
		                compact('listConsum','isListFinish'));
	}

	public function panelAction($idCheck) {
		if (!is_numeric($idCheck)||empty($idCheck))
			header('Location:'.Helper::base().'checkIn');
		$title = 'Habitaciones ocupadas';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_CHECK_IN;
		//$this->breadCrumbs->insertBread('', 'Lista de habitaciones ocupadas');
		$this->breadCrumbs->insertBread('checkIn/', 'Lista de registros');
		$this->breadCrumbs->insertBread('checkIn/panel/'.$idCheck, $title);
		$listConsum = $this->serviceCheckIn->getListCheckConsumeList($idCheck);
		$isRegistrable=true;
		foreach ($listConsum as $consum){
			if ($consum['ACTIVE_CONSUME_SERVICE']==Constants::$STATE_CONSUME_INACTIVE||$consum['ID_STATE_CHECK']==Constants::$STATE_CHECK_PROCESS_WITHOUT_INCUMBENT){
				$isRegistrable=false;
			}
		}
		$advance = $this->setAdvance($listConsum);

		$person=$this->serviceCheckIn->getCheckPerson($listConsum[0]['ID_PERSON_TITULAR'],$idCheck)[0];
		$nDoc = $this->serviceCheckIn->getListDoc($listConsum[0]['ID_PERSON_TITULAR']);
		$nPhone = $this->serviceCheckIn->getListPhone($listConsum[0]['ID_PERSON_TITULAR']);

		$vars=array();
		$vars['listConsum']=$listConsum;
		$vars['stateCheck']=$listConsum[0]['ID_STATE_CHECK'];
		$vars['typeCheck']=$listConsum[0]['ID_TYPE_CHECK'];
		$vars['advance']=$advance;
		$vars['step']=4;
		$vars['idCheck']=$idCheck;
		$vars['nDoc']=$nDoc;
		$vars['idConsum']=$listConsum[0]['ID_CONSUME_SERVICE'];
		$vars['nPhone']=$nPhone;
		$vars['person']=$person;
		$vars['isRegistrable']=$isRegistrable;
		return new View('checkInSearch', $title, $this->breadCrumbs->getBreads(), $this->mesaje,$vars);
	}

	public function delete_ddAction($idCheck) {
		$this->serviceCheckIn->deleteCheck($idCheck);
		header('Location: '.Helper::base().'checkIn/');

		return 'Registro exitoso';
	}

	public function deleteConsume_ddAction($idConsum) {
		$this->serviceCheckIn->deleteConsume_dd($idConsum);
		header('Location: '.Helper::base().'checkIn/');
	}

	public function insertAction($idCheck) {
		$isCheck = $idCheck>0 ? true : false;
		if(isset($_POST['order']) && is_numeric($idCheck)) {//para idCheck>0 y idCheck<=0
			$daysCheckIn=isset($_POST['daysCheckIn'])?$_POST['daysCheckIn']:0;
			$hoursCheckIn=isset($_POST['hoursCheckIn'])?$_POST['hoursCheckIn']:0;
			$dateOut=date('Y-m-d',strtotime("+$daysCheckIn day +$hoursCheckIn hour",strtotime(date('Y-m-d H:i:s'))));
			$timeOut=date('H:i:s',strtotime("+$daysCheckIn day +$hoursCheckIn hour",strtotime(date('Y-m-d H:i:s'))));
			$idPersonRecep = $_SESSION['ID_PERSON'];
			$listRoom = isset($_POST['listRoom']) ? $_POST['listRoom'] : array();
			$idPersonIncumbent = $this->serviceCheckIn->getIdPersonIncumbent($idCheck);//obtener idPerson del titular

			$idCheck = $this->serviceCheckIn->insertCheckConsume($idCheck, $listRoom, $dateOut, date('Y-m-d'), $timeOut, date('H:i:s'), $idPersonIncumbent, $idPersonRecep);
		}
		if($isCheck)//si ya existe el check
			header('Location: '.Helper::base().'checkIn/panel/'.$idCheck);
		else//si no existe un check y acaba de ser creado
			header('Location: '.Helper::base().'checkIn/edit/'.$idCheck);

		return 'Registro exitoso';
	}

	public function readPersonAction($nameUser) {
		$person = $this->serviceCheckIn->getPerson($nameUser);
		$person[0]['listDocument'] = $this->serviceCheckIn->getListDoc($person[0]['ID_PERSON']);
		$person[0]['listPhone'] = $this->serviceCheckIn->getListPhone($person[0]['ID_PERSON']);

		return json_encode($person, JSON_PRETTY_PRINT);
	}

	public function insert_ddAction($idCheck) {
		$title = 'Huesped registrado en el hotel';
		$check = $this->serviceCheckIn->getCheckPerson(0,$idCheck)[0];

		$this->serviceCheckIn->setIdCheck($check['ID_CHECK']);
		$content = "<p>Huesped registrado en fecha ".date('Y-m-d').
			' por el usuario '.$check['NAME_PERSON'].' '.$check['LAST_NAME_PERSON']
			.'con el correo electronico: '.$check['EMAIL_PERSON'].".</p>"
			."<p>Las fechas de la reserva son en fechas del:".$check['DATE_START_CHECK'].' a '
			.$check['DATE_END_CHECK'].' con n&uacute;mero de reserva'.$check['ID_CHECK']
			.', n&uacute;mero de tarjeta '.$this->serviceCheckIn->getNumberCard().', tipo de tarjeta'
			.$this->serviceCheckIn->getTypeCard()->getName()."</p>";
		$this->serviceCheckIn->updateCheckState($idState = 1, $idCheck);//activo
		$this->serviceCheckIn->updateCheckType($idTypeCheck = 2, $idCheck);//checkIn
		$typeMesaje = '2';
		$this->serviceCheckIn->insertMessage($check['ID_PERSON'], 'admin', $title, $content, $typeMesaje);
		$this->serviceCheckIn->insertMessage($check['ID_PERSON'], 'recepcion', $title, $content, $typeMesaje);
		$this->serviceCheckIn->insertMessage($check['ID_PERSON'],$check['ID_PERSON'] , $title, $content, $typeMesaje);
		header('Location: '.Helper::base().'checkIn/');
	}

	public function searchAction($idCheck) {
		$title = 'Buscar Habitaciones Libres';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_CHECK_IN;

		$this->breadCrumbs->insertBread('', 'Registrar ingreso');
		$this->breadCrumbs->insertBread('checkIn/', 'Registrar ingreso de clientes');
		$this->breadCrumbs->insertBread('checkIn/show/'.$idCheck, 'Registrar clientes');

		//recolectar fecha
		$daysCheckIn=isset($_POST['daysCheckIn'])?$_POST['daysCheckIn']:0;
		$hoursCheckIn=isset($_POST['hoursCheckIn'])?$_POST['hoursCheckIn']:0;
		$dateIn = date('Y-m-d');
		$dateOut=date('Y-m-d',strtotime("+$daysCheckIn day +$hoursCheckIn hour",strtotime(date('Y-m-d H:i:s'))));
		$idConsume=0;
		if($idCheck>0) {
			$check = $this->serviceCheckIn->getCheckPerson(0,$idCheck)[0];
			$dateIn = $check['DATE_START_CHECK'];
			$timeIn = $check['TIME_START_CHECK'];
			$dateOut = $check['DATE_END_CHECK'];
			$timeOut = $check['TIME_END_CHECK'];
			$listConsume=$this->serviceCheckIn->getListConsume($idCheck);

			$idConsume=empty($check)?0:$listConsume[0]['ID_CONSUME_SERVICE'];
		}
		$res=$this->serviceCheckIn->getListRoom($dateIn, $dateOut);
		$this->setMesaje($res['mensaje'][0],$res['mensaje'][1]);
		$listService = $res['list'];

		$vars=array();
		$vars['listService']=$listService;
		$vars['idCheck']=$idCheck;
		$vars['idConsum']=$idConsume;
		$vars['step']=1;
		$vars['daysCheckIn']=$daysCheckIn;
		$vars['hoursCheckIn']=$hoursCheckIn;
		return new View('checkInSearch', $title, $this->breadCrumbs->getBreads(), $this->mesaje,$vars);
	}

	public function showAction($idCheck) {
		$title = 'Ver Consumo';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_CHECK_IN;
		$this->breadCrumbs->insertBread('checkIn', 'Registrar ingreso');
		$this->breadCrumbs->insertBread('checkIn/show/'.$idCheck, 'Ver Consumo');

		//buscar idCheck
		if($idCheck>0) {
			$searchUser = $idCheck;
			$check = $this->serviceCheckIn->getCheckPerson(0,$idCheck);
			$check = empty($check)?array():$check[0];
			$listConsumService = array();
			if(!empty($check)) {
				$nDoc = $this->serviceCheckIn->getListDoc($check['ID_PERSON_TITULAR']);
				$nPhone = $this->serviceCheckIn->getListPhone($check['ID_PERSON_TITULAR']);
				$listServices = $this->serviceCheckIn->getServiceListConsum();//servicios de cosumo
				for($i = 0; $i<count($listServices); $i++) {
					$listServices[$i]['listPrice'] = $this->serviceCheckIn->getServiceCostList($listServices[$i]['ID_SERVICE']);
				}
				$listConsumServiceQuery = $this->serviceCheckIn->getListConsume($idCheck);
				//dd($listConsumServiceQuery);
				$j = 0;
				foreach($listConsumServiceQuery as $consumService) {
					$listConsumService[$j] = $consumService;
					$dateToday = date('Y-m-d H:i:s');
					if(($consumService['DATE_START_CONSUME_SERVICE'].' '.$consumService['TIME_START_CONSUME_SERVICE'])>$dateToday)
						$state = 'Reserva';
					elseif(($consumService['DATE_END_CONSUME_SERVICE'].' '.$consumService['TIME_END_CONSUME_SERVICE'])<$dateToday)
						$state = 'Terminado';
					else
						$state = 'Activo';
					$listConsumService[$j]['STATE_CONSUME_SERVICE'] = $state;
					$j++;
				}
				$listconsumeFood = $this->serviceCheckIn->getListConsumeFood($idCheck);
			}
			//dd($listConsumService);
			$person=$check;
		}
		else {
			$searchUser = '';
			$this->setMesaje('info', 'Seleccione un registro');
		}
		$vars=array();
		$vars['searchUser']=$searchUser;
		$vars['nDoc']=$nDoc;
		$vars['nPhone']=$nPhone;
		$vars['listConsumService']=$listConsumService;
		$vars['listconsumeFood']=$listconsumeFood;
		$vars['check']=$check;
		$vars['listServices']=$listServices;
		$vars['idCheck']=$idCheck;
		$vars['person']=$person;
		return new View('checkInConsume', $title, $this->breadCrumbs->getBreads(), $this->mesaje,$vars);
	}

	public function editAction($idCheck) {
		if (!is_numeric($idCheck)||$idCheck<0)
			header('Location:'.Helper::base().'checkIn'.'/');
		$title = 'Editar Informacion de clientes hospeddos en el hotel';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_CHECK_IN;
		$this->breadCrumbs->insertBread('', 'Registro');
		$this->breadCrumbs->insertBread('checkIn/', 'Registrar ingreso');
		$this->breadCrumbs->insertBread('checkIn/edit/'.$idCheck, 'Registrar ingreso');
		$searchUser='';
		if(isset($_POST['btnSearchUser'])) {
			$searchUser = isset($_POST['searchUser']) ? trim($_POST['searchUser']) : '';
			$person = $this->serviceCheckIn->getPerson($searchUser);
			if(!empty($person) && $idCheck>0) {
				$check[0] = $person[0];
				$check[0]['ID_CHECK'] = $idCheck;
				$check[0]['ID_PERSON_TITULAR'] = $person[0]['ID_PERSON'];
				$this->setMesaje('success', 'Usuario encontrado');
			}
			else {
				$this->setMesaje('danger', 'Usuario NO encontrado');
			}
		}
		else {
			$check = $this->serviceCheckIn->getCheckPerson(0,$idCheck);
		}
		if(!empty($check)) {
			$check = $check[0];
			$cardModel = new CardModel($this->conexion);
			$cardModel->setIdCheck($idCheck);
			$cardModel->syncUp();
			$listCheckCard = $cardModel->select();

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
			$phoneModel->setIdPerson($check['ID_PERSON_TITULAR']);
			$phoneCheck = $phoneModel->select();

			$documentModel = new DocumentModel($this->conexion);
			$documentModel->setIdPerson($check['ID_PERSON_TITULAR']);
			$docCheck = $documentModel->select();

			$listConsumCheck = $this->serviceCheckIn->getListCheckType($idCheck, 3, 0);//lista de consumo consumo
		}
		$listPais = Helper::getListCountry();

		$userModel=new UserModel($this->conexion);
		$listPerson=$userModel->getListNameUser();
		$payRequired=0;
		foreach ($listConsumCheck as $consume){
			$payRequired+=$consume['PRICE_CONSUME_SERVICE']*Constants::$PERCENTAGE_PAY_RESERVE;
		}

		$vars=array();
		$vars['step']=2;
		$vars['listConsumCheck']=$listConsumCheck;
		$vars['check']=$check;
		$vars['idCheck']=$idCheck;
		$vars['listPais']=$listPais;
		$vars['docCheck']=$docCheck;
		$vars['phoneCheck']=$phoneCheck;
		$vars['listCheckCard']=$listCheckCard;
		$vars['listTypePhone']=$listTypePhone;
		$vars['listTypeDoc']=$listTypeDoc;
		$vars['searchUser']=$searchUser;
		$vars['listTypeCard']=$listTypeCard;
		$vars['listPerson']=$listPerson;
		$vars['stateCheck']=$listConsumCheck[0]['ID_STATE_CHECK'];
		$vars['typeCheck']=$listConsumCheck[0]['ID_TYPE_CHECK'];
		$vars['idConsum']=$listConsumCheck[0]['ID_CONSUME_SERVICE'];
		$vars['payRequired']=$payRequired;

		return new View('checkInSearch', $title, $this->breadCrumbs->getBreads(), $this->mesaje,$vars);
	}

	public function edit_ddAction($idCheck) {
		$idConsume=0;
		if($idCheck>0) {
			$check = $this->serviceCheckIn->getCheckPerson(0,$idCheck)[0];
			$this->serviceCheckIn->updateIncumbentCheckIn($check['ID_PERSON'], $idCheck);
			$deposit = $this->serviceCheckIn->updateConsumCheckIn();
			$this->serviceCheckIn->updateCard($idCheck, $deposit);
			$this->serviceCheckIn->updateCheckState(5, $idCheck);

			$consumeList=$this->serviceCheckIn->getListConsume($idCheck);
			$idConsume=empty($consumeList)?-1:$consumeList[0]['ID_CONSUME_SERVICE'];
		}
		if ($idConsume<1){
			header('Location: '.Helper::base().'checkIn/panel/'.$idCheck);
		}else {
			header('Location: ' . Helper::base() . 'checkTeam/edit/' . $idConsume);
		}
		return '';
	}

	/**
	 * @param $listConsum
	 * @param $advance
	 * @return int
	 */
	private function setAdvance($listConsum) {
		$advance=0;
		foreach ($listConsum as $consume) {
			switch ($consume['ACTIVE_CONSUME_SERVICE']) {
				case '2':
					$advance += 1;
					break;
				case '5':
					$advance += 1;
					break;
				case '1':
					$advance += 1;
					break;
				case '0':
					$advance += 0;
					break;
				default:
					$advance = 0;
					break;
			}
		}
		if (count($listConsum)>0)
			$advance=($advance/count($listConsum))*100;
		return $advance;
	}
}
