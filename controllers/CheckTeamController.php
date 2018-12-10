<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 02/09/2017
 * Time: 9:15
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
require_once 'model/ConsumeModel.php';

class CheckTeamController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		header('Location: '.Helper::base().'checkIn');
	}

	public function editAction($idConsum) {
		$consumeModel = new ConsumeModel($this->conexion);
		$serviceModel = new ServiceModel($this->conexion);

		$title = 'Editar Huespedes';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_CHECK_IN;

		$this->breadCrumbs->insertBread('', 'Registro');
		$this->breadCrumbs->insertBread('checkIn/', 'Check In');
		$this->breadCrumbs->insertBread('consume/editTeam/'.$idConsum, 'Editar');

		$consum = $consumeModel->getConsumeService($idConsum)[0];
		$roomOccupied = $consumeModel->getOccupiedRoom($idConsum);
		$listTeam = $this->getListTeamConsum($idConsum);

		$articleModel = new ArticleModel($this->conexion);
		$listArticle = $articleModel->select();
		$articleConsumeModel = new ArticleConsumeModel($this->conexion);
		$articleConsumeModel->setIdConsume($idConsum);
		$articleConsum = $articleConsumeModel->select();

		$service = $consum['ID_SERVICE']>0 ? $serviceModel->getService($consum['ID_SERVICE'])[0] : array();
		$typeRoom = $serviceModel->getServiceTypeRoom($consum['ID_SERVICE']);
		$costService = $serviceModel->getServiceCost($consum['ID_SERVICE'], $consum['UNIT_COST_SERVICE'], $consum['UNIT_DAY_COST_SERVICE'], $consum['UNIT_HOUR_COST_SERVICE']);

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('document');
		$listTypeDoc = $typeModel->select();

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('phone');
		$listTypePhone = $typeModel->select();

		$listPais = Helper::getListCountry();
		$totalCost = $costTotal = 0;
		$totalHour = (strtotime($consum['DATE_END_CONSUME_SERVICE'])-strtotime($consum['DATE_START_CONSUME_SERVICE']))/(60*60);
		$totalDay = $totalHour/24;
		if($costService[0]['UNIT_DAY_COST_SERVICE']>0) {
			$totalCost += ($totalDay/$costService[0]['UNIT_DAY_COST_SERVICE'])*$costService[0]['PRICE_COST_SERVICE'];
		}
		if($costService[0]['UNIT_HOUR_COST_SERVICE']>0) {
			$totalCost += ($totalDay*24/$costService[0]['UNIT_HOUR_COST_SERVICE'])*$costService[0]['PRICE_COST_SERVICE'];
		}

		$idCheck=$consum['ID_CHECK'];
		$totalCost = $costService[0]['NAME_TYPE_MONEY'].' '.$totalCost;
		$checkPerson = $consumeModel->getCheckPerson(0, $idCheck)[0];
		$userModel=new UserModel($this->conexion);
		$listPerson=$userModel->getListNameUser();

		$listConsumeRoom=$consumeModel->getListConsume($idCheck);

		$vars=array();
		$vars['consum']=$consum;
		$vars['service']=$service;
		$vars['listPais']=$listPais;
		$vars['totalCost']=$totalCost;
		$vars['totalHour']=$totalHour;
		$vars['roomOccupied']=$roomOccupied;
		$vars['checkPerson']=$checkPerson;
		$vars['listTypePhone']=$listTypePhone;
		$vars['listTypeDoc']=$listTypeDoc;
		$vars['listTeam']=$listTeam;
		$vars['listArticle']=$listArticle;
		$vars['articleConsum']=$articleConsum;
		$vars['idConsum']=$idConsum;
		$vars['typeRoom']=$typeRoom;
		$vars['costService']=$costService;
		$vars['listPerson']=$listPerson;
		$vars['step']=3;
		$vars['stateCheck']=$checkPerson['ID_STATE_CHECK'];
		$vars['typeCheck']=$checkPerson['ID_TYPE_CHECK'];
		$vars['listConsumeRoom']=$listConsumeRoom;
		$vars['idCheck']=$consum['ID_CHECK'];
		return new View('checkInSearch', $title, $this->breadCrumbs->getBreads(), $this->mesaje,$vars);
	}

	public function edit_ddAction($idConsume) {
		$consumeModel = new ConsumeModel($this->conexion);

		$this->updateArticles($idConsume);
		$this->updateListTeam($_POST['team'], $idConsume);
		$idCheck=$consumeModel->updateConsumState($idConsume, 2);
		header('Location: '.Helper::base().'checkIn/panel/'.$idCheck);
	}

	private function getListTeamConsum($idConsum) {
		$consumeModel = new ConsumeModel($this->conexion);

		$listTeam = $consumeModel->getListTeam($idConsum);
		$i = 0;
		$res = array();
		foreach($listTeam as $team) {
			$documentModel = new DocumentModel($this->conexion);
			$documentModel->setIdPerson($team['ID_PERSON']);
			$documentModel->syncUp();

			$phoneModel = new PhoneModel($this->conexion);
			$phoneModel->setIdPerson($team['ID_PERSON']);
			$phoneModel->syncUp();
			$res[$i] = $team;
			$res[$i]['listDocument'] = $documentModel->select();
			$res[$i]['listPhone'] = $phoneModel->select();
			$i++;
		}

		return $res;
	}

	private function updateArticles($idConsume) {
		$articleConsumeModel = new ArticleConsumeModel($this->conexion);
		$articleConsumeModel->setIdConsume($idConsume);
		$articleConsumeModel->delete();

		$listArticle = isset($_POST['listIdArticle']) ? $_POST['listIdArticle'] : array();
		foreach($listArticle as $idArticle) {
			$articleConsumeModel = new ArticleConsumeModel($this->conexion);
			$articleConsumeModel->setIdState(Constants::$STATE_ARTICLE_TAKEN);
			$articleConsumeModel->setIdArticle($idArticle);
			$articleConsumeModel->setIdConsume($idConsume);
			$articleConsumeModel->insert();
		}
	}

	private function updateListTeam($listTeam, $idConsume) {
		$consumeModel = new ConsumeModel($this->conexion);
		$userModel = new UserModel($this->conexion);

		$consumeModel->deleteMember($idConsume);

		foreach($listTeam as $team) {
			if (isset($team['isOccupiedXTitular'])&&$team['isOccupiedXTitular']=='on') {
				$idPersonMember = empty($_POST['idPersonTitular'])?0:$_POST['idPersonTitular'];
			}else {
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

				foreach($team['listDocument'] as $document) {
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
			$userModel->insertUserRol($idPersonMember, 3);//insertar usuario rol

			$consumeModel->updatePersonMember($idPersonMember, $idConsume);
		}
	}
}
