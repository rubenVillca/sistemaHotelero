<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 25/08/2017
 * Time: 9:18
 */
require_once 'model/StateModel.php';
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

class CheckOutController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		$userModel = new UserModel($this->conexion);
		$title = 'Registrar salida de clientes';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_CHECK_IN;
		$this->breadCrumbs->insertBread('', 'Registro');
		$this->breadCrumbs->insertBread('checkIn/', 'registrar Salida');
		if(isset($_POST['btnSearchUser'])) {
			$searchUser = $_POST['searchUser'];
			$idCheck = $searchUser;
		}
		$listUser = $userModel->getListIdUser(3);
		$listCheckIn = $this->getListCheckIn();

		return new View('checkOut', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('searchUser', 'listCheckIn', 'idCheck', 'listUser'));
	}

	public function editAction($idCheck) {
		$consumeModel = new ConsumeModel($this->conexion);
		$documentModel = new DocumentModel($this->conexion);
		$phoneModel = new PhoneModel($this->conexion);

		$title = 'Registrar salida de cliente';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_CHECK_IN;
		$this->breadCrumbs->insertBread('', 'Registro');
		$this->breadCrumbs->insertBread('checkIn/', 'registrar Salida');
		$this->breadCrumbs->insertBread('checkOut/edit/', 'Registrar salida');

		$person = $consumeModel->getCheckPerson(0,$idCheck);
		if(!empty($person)) {
			$person = $person[0];
			if($person['ID_TYPE_CHECK'] == 2) {//si el usuario esta registrado chckIn
				$listConsumRoom = $this->getListConsumRoom($idCheck);//habitaciones consumidas
				$listConsumService = $consumeModel->getListConsume($idCheck);//servicios consumidos
				$listconsumeFood = $consumeModel->getListConsumeFood($idCheck);//comidas consumidas
				$nPhone = $phoneModel->getListPhone($person['ID_PERSON_TITULAR']);//telefonos del huesped
				$nDoc = $documentModel->getListDoc($person['ID_PERSON_TITULAR']);//documentos del huesped
			}
			else {
				header('Location: '.Helper::base().'checkIn/');
			}
		}

		$vars=array();
		//$vars['listCheckIn']=$listCheckIn;
		$vars['idCheck']=$idCheck;
		$vars['person']=$person;
		$vars['nDoc']=$nDoc;
		$vars['nPhone']=$nPhone;
		$vars['listConsumRoom']=$listConsumRoom;
		$vars['listConsumService']=$listConsumService;
		//$vars['listTypeUser']=$listTypeUser;
		//$vars['listTypeDoc']=$listTypeDoc;
		//$vars['listUser']=$listUser;
		//$vars['listServices']=$listServices;
		//$vars['idPersonCheckIn']=$idPersonCheckIn;
		//$vars['pay']=$pay;
		$vars['listconsumeFood']=$listconsumeFood;
		$vars['step']=5;
		$vars['stateCheck']=$person['ID_STATE_CHECK'];
		$vars['typeCheck']=$person['ID_TYPE_CHECK'];
		$vars['idCheck']=$idCheck;
		$vars['idConsum']=0;

		return new View('checkInSearch', $title, $this->breadCrumbs->getBreads(), $this->mesaje, $vars);
	}

	public function insert_ddAction($idCheck) {
		$consumeModel = new ConsumeModel($this->conexion);
		$person = $consumeModel->getCheckPerson(0,$idCheck);
		if(isset($_POST['pay']) && !empty($person)) {
			$person = $person[0];
			$listArticle = isset($_POST['listArticle']) ? $_POST['listArticle'] : array();
			$pay = isset($_POST['pay']) ? $_POST['pay'] : '0.0';
			if($idCheck>0) {//si la perosna tiene cuenta de usuario
				$isSave = $consumeModel->insertCheckOut($idCheck, $listArticle, $pay);
				if($isSave == -1)
					$this->setMesaje('danger', 'No se pudo registrar el Check out');
				else
					$this->setMesaje('success', "Registrado Salida de hu&eacute;sped <a href='print/billing/$idCheck' target='_blank'><b>Imprimir</b></a>");
			}
			$this->sendMesajeCheckOut($person['EMAIL_PERSON'], $idCheck, $person);
		}
		header('Location: '.Helper::base().'checkIn/show/'.$idCheck);

		return 'Registro exitoso';
	}

	private function getListCheckIn() {
		$consumeModel = new ConsumeModel($this->conexion);
		$documentModel = new DocumentModel($this->conexion);
		$listCheckIn = $consumeModel->getListCheckRoom($this->idHotel, 2, 1);//lista de check in registrado activos
		$i = 0;
		foreach($listCheckIn as $check) {
			$listDocUser = $documentModel->getListDoc($check['ID_PERSON_TITULAR']);
			$listCheckIn[$i]['check'] = $consumeModel->getCheckPerson(0,$check['ID_CHECK'])[0];
			$listCheckIn[$i]['list_doc'] = $listDocUser;
			$i++;
		}

		return $listCheckIn;
	}

	private function getListConsumRoom($idCheck) {
		$consumeModel = new ConsumeModel($this->conexion);
		$listConsum = $consumeModel->getConsumeRoom($idCheck,0);
		$res = $listConsum;
		$i = 0;
		foreach($listConsum as $consum) {
			$articleConsumeModel = new ArticleConsumeModel($this->conexion);
			$articleConsumeModel->setIdConsume($consum['ID_CONSUME_SERVICE']);
			$articleConsume = $articleConsumeModel->select();
			array_push($res[$i++], $articleConsume);
		}

		return $res;
	}

	private function sendMesajeCheckOut($nameUserCheckIn, $idCheckIn, $person) {
		$messageModel = new MessageModel($this->conexion);
		$typeMesaje = 3;
		$tittle = "Salida de un Huesped: $nameUserCheckIn";
		$container = "El h&uacute;esped: $person[NAME_PERSON] $person[LAST_NAME_PERSON]  con n&uacute;mero de registro: $idCheckIn 
                    con correo Electronico: $person[EMAIL_PERSON] nacido en: $person[DATE_BORN_PERSON]<br>";
		$messageModel->insertMessage($person['ID_PERSON_TITULAR'], 'admin', $tittle, $container, $typeMesaje);
		$messageModel->insertMessage($person['ID_PERSON_TITULAR'],$person['ID_PERSON_TITULAR'], $tittle, $container, $typeMesaje);
	}
}