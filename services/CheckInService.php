<?php
/**
 * Created by PhpStorm.
 * User: genshiken
 * Date: 9 sep 2018
 * Time: 19:07
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

class CheckInService extends Service {
	private $consumeModel;
	private $roomModel;
	private $serviceModel;
	private $phoneModel;
	private $personModel;
	private $documentModel;
	private $messageModel;
	protected $cardModel;

	/**
	 * CheckInService constructor.
	 * @param $conexion
	 * @param $idHotel
	 */
	public function __construct($conexion,$idHotel) {
		parent::__construct($conexion,$idHotel);
		$this->conexion=$conexion;
		$this->consumeModel = new ConsumeModel($this->conexion);
		$this->roomModel = new RoomModel($this->conexion);
		$this->serviceModel = new ServiceModel($this->conexion);
		$this->phoneModel = new PhoneModel($this->conexion);
		$this->personModel = new PersonModel($this->conexion);
		$this->documentModel = new DocumentModel($this->conexion);
		$this->consumeModel = new ConsumeModel($this->conexion);
		$this->messageModel = new MessageModel($this->conexion);
		$this->cardModel = new CardModel($this->conexion);
	}

	public function getCheckPerson($idPerson, $idCheck) {
		return $this->consumeModel->getCheckPerson($idPerson,$idCheck);
	}

	public function getListCheckType($idCheck, $idTypeConsume, $min) {
		return $this->consumeModel->getListCheckType($idCheck,$idTypeConsume,$min);
	}

	public function getListConsume($idCheck) {
		return $this->consumeModel->getListConsume($idCheck);
	}

	public function getListConsumeFood($idCheck) {
		return $this->consumeModel->getListConsumeFood($idCheck);
	}

	public function getNumberCard() {
		return $this->cardModel->getNumber();
	}

	public function getServiceCostList($idService) {
		return $this->serviceModel->getServiceCostList($idService);
	}

	public function getServiceListConsum() {
		return $this->serviceModel->getServiceListConsum($this->idHotel);
	}

	public function getTypeCard() {
		return $this->cardModel->getTypeCard();
	}

	public function insertMessage($idPersonSender, $idPersonReceiver, $title, $content, $typeMesaje) {
		return $this->messageModel->insertMessage($idPersonSender, $idPersonReceiver, $title, $content, $typeMesaje);
	}

	public function setIdCheck($idCheck) {
		return $this->cardModel->setIdCheck($idCheck);
	}

	public function updateCard($idCheck, $deposit) {
		$cardModel = new CardModel($this->conexion);
		$cardModel->setIdCheck($idCheck);
		$cardModel->syncUp();
		if((isset($_POST['typePay']) ? $_POST['typePay'] : 0)>0) {
			$cardModel->setNumber(isset($_POST['nCard']) ? $_POST['nCard'] : '');
			$cardModel->setIdType(isset($_POST['idTypeCard']) ? $_POST['idTypeCard'] : '-1');
			$cardModel->setMonth(isset($_POST['month']) ? $_POST['month'] : '');
			$cardModel->setYear(isset($_POST['year']) ? $_POST['year'] : '');
			$cardModel->setCcv(isset($_POST['ccv']) ? $_POST['ccv'] : '');
			$cardModel->setIsValid(isset($_POST['validCard']) ? $_POST['validCard'] : '0');
			$cardModel->setDeposit($deposit);
			$cardModel->update();
		}
		else {
			$cardModel->delete();
		}
	}

	public function updateCheckState($idState, $idCheck) {
		return $this->consumeModel->updateCheckState($idState, $idCheck);
	}

	public function updateCheckType($idType, $idCheck) {
		return $this->consumeModel->updateCheckType($idType,$idCheck);
	}

	public function updateConsumCheckIn() {
		$consumeModel = new ConsumeModel($this->conexion);
		$listPay = isset($_POST['cost']) ? $_POST['cost'] : array();
		$deposit = 0;
		foreach($listPay as $pay) {
			$consumeModel->updateConsumCheckIn($pay['idConsum'], $pay['payService']);
			$deposit += $pay['payService'];
		}

		return $deposit;
	}

	public function updateIncumbentCheckIn($idPersonIncumbent, $idCheck) {
		$personModel = new PersonModel($this->conexion);
		$consumeModel = new ConsumeModel($this->conexion);

		$idPersonReplace = isset($_POST['idPerson']) ? $_POST['idPerson'] : 0;
		if($idPersonReplace>0) {
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
		$personModel->setPassword('');
		$personModel->update();
		//insertar documento
		$listDocument = isset($_POST['docUser']) ? $_POST['docUser'] : array();
		foreach($listDocument as $document) {
			if (!empty($document['nDoc'])) {
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
		}
		//insertar telefono
		$listPhone = isset($_POST['phoneUser']) ? $_POST['phoneUser'] : array();
		foreach($listPhone as $phone) {
			if (!empty($phone['nPhone'])) {
				$phoneModel = new PhoneModel($this->conexion);
				$phoneModel->setNumber(isset($phone['nPhoneOld']) ? $phone['nPhoneOld'] : '0');
				$phoneModel->syncUp();
				$phoneModel->delete();//eliminar el telefono anterior
				$phoneModel->setIdPerson($idPersonIncumbent);
				$phoneModel->syncUp();
				$phoneModel->setNumber($phone['nPhone']);
				$phoneModel->setIdType($phone['idType']);
				$phoneModel->insert();//insertar nuevo
			}
		}
		//actualizar si estaba en la vista reserveDataUser
		if($idPersonIncumbent>0) {
			$consumeModel->updateCheckIncumbentCheck($idCheck, $idPersonIncumbent);
		}

		return $idPersonIncumbent;
	}

	/**
	 * @param $idCheck
	 * @return bool|int|mysqli_result|string
	 */
	public function getIdPersonIncumbent($idCheck) {
		$consumeModel = new ConsumeModel($this->conexion);
		$personModel = new PersonModel($this->conexion);
		$userModel = new UserModel($this->conexion);

		if($idCheck>0) {
			$idPersonTitular = $consumeModel->getCheckPerson(0,$idCheck)[0]['ID_PERSON_TITULAR'];
		}
		else {
			$idPersonTitular = $personModel->insert();
			$userModel->insertUserRol($idPersonTitular, 3);
		}

		return $idPersonTitular;
	}

	public function getListRoom($dateIn, $dateOut) {
		//verificar fecha valida de reserva valida
		$res = array();
		$aux=array();
		$mensaje='';
		if(strtotime($dateOut)>strtotime($dateIn) && strtotime($dateIn)>=strtotime(date('Y-m-d'))) {
			//tipos de habitaciones libres
			$listRoomFree = $res = $this->roomModel->getListModelRoomFree($dateIn, $dateOut, 1, 0, $this->idHotel);
			$aux = array();
			$i = 0;
			foreach($listRoomFree as $roomFree) {
				$listCost = $this->serviceModel->getServiceCostList($roomFree['ID_SERVICE']);
				$listRoomType = $this->roomModel->getListTypeRoomFreeModel($roomFree['ID_ROOM_MODEL'], $dateIn, $dateOut, $this->idHotel);
				//si la cantidad de habitaciones disponibles es mayor igual a la cantidad de requerida
				if($roomFree['UNIT_ROOM_MODEL']<=count($listRoomType)) {
					$aux[$i] = $roomFree;
					$aux[$i]['list_cost'] = $listCost;
					$aux[$i]['list_room'] = $listRoomType;
					$i++;
				}
			}
			$res = $aux;
		}
		else {
			$mensaje=array('warning', 'Fecha para no valida, ingreso: ' . $dateIn . ' Salida:' . $dateOut);
		}
		if(!empty($res))
			$mensaje=array('success', 'Habitaciones libres en fecha: '.$dateIn.' a:'.$dateOut);
		if(empty($res))
			$mensaje=array('warning', 'No existen habitaciones disponibles para las fechas, ingreso: '.$dateIn.' Salida:'.$dateOut);
		$aux['mensaje']=$mensaje;
		$aux['list']=$res;
		return $aux;
	}

	public function getListCheckRoom($type,$state){
		return $this->consumeModel->getListCheckRoom($this->idHotel,$type,$state);
	}

	public function getListCheckConsumeList($idCheck){
		return $this->consumeModel->getListCheckConsumeList($idCheck);
	}

	public function getListCheckConsume($type,$state) {
		return $this->consumeModel->getListCheckConsume($this->idHotel,$type,$state);
	}

	public function deleteCheck($idCheck){
		return $this->consumeModel->deleteCheck($idCheck);
	}

	public function deleteConsume_dd($idConsum){
		return $this->consumeModel->deleteConsume_dd($idConsum);
	}

	/**
	 * @param $idCheck
	 * @param $listRoom
	 * @param $dateOut
	 * @param $dateIn
	 * @param $timeOut
	 * @param $timeIn
	 * @param $idPersonIncumbent
	 * @param $idPersonRecep
	 * @return bool|int|mysqli_result|string
	 */
	public function insertCheckConsume($idCheck, $listRoom, $dateOut, $dateIn, $timeOut, $timeIn, $idPersonIncumbent, $idPersonRecep){
		foreach ($listRoom as $roomType) {//insertar check y consume
			foreach ($roomType as $room) {
				if (isset($room['idRoom'])) {
					$cost = $this->consumeModel->getCostService($room['idCost']);
					if (!empty($cost)) {
						$cost            = $cost[0];
						$totalHourConsum = (strtotime($dateOut) - strtotime($dateIn) + (strtotime($timeOut) - strtotime($timeIn))) / (3600);
						$totalHourCost   = $cost['UNIT_DAY_COST_SERVICE'] * 24 + $cost['UNIT_HOUR_COST_SERVICE'] == 0 ?
							1 : $cost['UNIT_DAY_COST_SERVICE'] * 24 + $cost['UNIT_HOUR_COST_SERVICE'];
						$totalTime       = $totalHourConsum / ($totalHourCost);
						$priceConsum     = $cost['PRICE_COST_SERVICE'] * $totalTime;
						$idCheck         = $this->consumeModel->insertCheckIn($idCheck, $this->idHotel, $idPersonIncumbent, $idPersonRecep, $dateIn, $timeIn, $dateOut, $timeOut, $idState = 7, $observation = '', $idTypeConsum = 3, $room['idCost'], $room['idRoom'], $priceConsum, 0);
					}
				}
			}
		}
		return $idCheck;
	}

	public function getPerson($nameUser){
		return $this->personModel->getPerson($nameUser);
	}

	public function getListDoc($idPerson){
		return $this->documentModel->getListDoc($idPerson);
	}

	public function getListPhone($idPerson){
		return $this->phoneModel->getListPhone($idPerson);
	}
}
