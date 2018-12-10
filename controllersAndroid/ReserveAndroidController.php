<?php
require_once 'model/DocumentModel.php';
require_once 'model/PhoneModel.php';
require_once 'model/PersonModel.php';
require_once 'model/ReserveModel.php';
require_once 'model/RoomModel.php';
require_once 'model/ServiceModel.php';
require_once 'model/ConsumeModel.php';

class ReserveAndroidController extends Controller {
	private $docModel;
	private $phoneModel;
	private $personModel;
	private $reserveModel;
	private $roomModel;
	private $serviceModel;
	private $consumeModel;

	public function __construct() {
		parent::__construct();
		$this->docModel = new DocumentModel($this->conexion);
		$this->phoneModel = new PhoneModel($this->conexion);
		$this->personModel = new PersonModel($this->conexion);
		$this->reserveModel = new ReserveModel($this->conexion);
		$this->roomModel = new RoomModel($this->conexion);
		$this->serviceModel = new ServiceModel($this->conexion);
		$this->consumeModel = new ConsumeModel($this->conexion);
	}

	public function indexAction() {
		$nAdult = isset($_POST['nAdult']) ? $_POST['nAdult'] : 1;
		$nBoys = isset($_POST['nBoys']) ? $_POST['nBoys'] : 0;
		$nPet = isset($_POST['nPet']) ? $_POST['nPet'] : 0;
		$dateIn = isset($_POST['dateIn']) ? $_POST['dateIn'] : '0000-00-00';
		$timeIn = isset($_POST['timeIn']) ? $_POST['timeIn'] : "00:00:00";
		$dateOut = isset($_POST['dateOut']) ? $_POST['dateOut'] : "0000-00-00";
		$timeOut = isset($_POST['timeOut']) ? $_POST['timeOut'] : '00:00:00';
		$roomAvailable = $this->getListRoomFreeModel($nAdult, $nBoys, $nPet, $dateIn, $timeIn, $dateOut, $timeOut);
		$dataAndroid = compact('roomAvailable');
		header('Content-Type: application/json');

		return json_encode($dataAndroid, JSON_PRETTY_PRINT);
	}

	private function getListRoomFreeModel($nAdult, $nBoys, $nPet, $dateIn, $timeIn, $dateOut, $timeOut) {
		$listReservable = array();
		if(strtotime($dateOut) > strtotime($dateIn) && strtotime($dateIn) >= strtotime(date('Y-m-d'))) {
			$listTypeRoom = $res = $this->roomModel->getListModelRoomFree($dateIn, $dateOut, $nAdult, $nBoys, $this->idHotel);
			$typeRoomFree = array();
			$i = 0;
			foreach($listTypeRoom as $typeRoom) {
				$listCost = $this->serviceModel->getServiceCostList($typeRoom['ID_SERVICE']);
				$auxListCost = array();
				$j = 0;
				foreach($listCost as $cost) {
					$totalHourConsum = (strtotime($dateOut)-strtotime($dateIn)+(strtotime($timeOut)-strtotime($timeIn)))/(3600);
					$totalHourCost = ($cost['UNIT_DAY_COST_SERVICE']*24+$cost['UNIT_HOUR_COST_SERVICE']) == 0 ? 1 : $cost['UNIT_DAY_COST_SERVICE']*24+$cost['UNIT_HOUR_COST_SERVICE'];
					$totalTime = (($totalHourConsum%$totalHourCost) == 0) ? $totalHourConsum/$totalHourCost : 0;
					$priceConsum = $cost['PRICE_COST_SERVICE']*$totalTime;
					if($priceConsum > 0) {
						$cost['PRICE_TOTAL'] = $priceConsum;
						$auxListCost[$j++] = $cost;
					}
				}
				$listReservedAux = $this->consumeModel->getListConsumeTypeRoom($typeRoom['ID_ROOM_MODEL'], $dateIn, $timeIn, $dateOut, $timeOut);
				$nReseved = 0;
				foreach($listReservedAux as $reserved) {
					$nReseved += $reserved['UNIT_RESERVED'];
				}
				$typeRoomFree[$i] = $typeRoom;
				$typeRoomFree[$i]['n_reserved'] = $nReseved;
				$typeRoomFree[$i]['list_cost'] = $auxListCost;
				$i++;
			}
			$listReservable = $typeRoomFree;
		}

		return $listReservable;
	}

	public function saveAction() {
		$consumeModel=new ConsumeModel($this->conexion);
		$reserveModel=new ReserveModel($this->conexion);
		$cardModel=new CardModel($this->conexion);

		$idCheck = isset($_POST['idCheck']) ? $_POST['idCheck'] : 0;
		$isMember = isset($_POST['isMember']) ? $_POST['isMember'] : 0;
		$idCost = isset($_POST['idCost']) ? $_POST['idCost'] : 0;
		$idPerson = isset($_POST['idPerson']) ? $_POST['idPerson'] : 3;
		$nRoom = isset($_POST['nRoom']) ? $_POST['nRoom'] : 0;
		$idTypeRoom = isset($_POST['idTypeRoom']) ? $_POST['idTypeRoom'] : 0;
		$nAdult = isset($_POST['nAdult']) ? $_POST['nAdult'] : 1;
		$nBoy = isset($_POST['nBoy']) ? $_POST['nBoy'] : 0;
		$dateIn = isset($_POST['dateIn']) ? $_POST['dateIn'] : '2018-10-11';
		$timeIn = isset($_POST['timeIn']) ? $_POST['timeIn'] : '06:00';
		$dateOut = isset($_POST['dateOut']) ? $_POST['dateOut'] : '2018-10-12';
		$timeOut = isset($_POST['timeOut']) ? $_POST['timeOut'] : '06:00';
		$numberTarget = isset($_POST['numberTarget']) ? $_POST['numberTarget'] : 0;
		$ccvTarget = isset($_POST['ccvTarget']) ? $_POST['ccvTarget'] : 0;
		$yearTarget = isset($_POST['yearTarget']) ? $_POST['yearTarget'] : 0;
		$monthTarget = isset($_POST['monthTarget']) ? $_POST['monthTarget'] : 0;
		$typeTarget = isset($_POST['typeTarget']) ? $_POST['typeTarget'] : 0;
		$priceEstimated = isset($_POST['priceEstimated']) ? $_POST['priceEstimated'] : 0;

		$cost=$consumeModel->getCostService($idCost);
		if ($priceEstimated<=0) {
			$priceEstimated = empty($cost) ? 0 : $cost[0]['PRICE_COST_SERVICE'];
		}else{
			$priceEstimated=$nRoom>0?$priceEstimated/$nRoom:$priceEstimated;
		}
		$payConsume     = $priceEstimated * Constants::$PERCENTAGE_PAY_RESERVE;

		if($idCheck<1) {
			$idCheck = $consumeModel->insertCheckPerson($this->idHotel, $idPerson, $idPerson, Constants::$STATE_CHECK_PROCESS_WITHOUT_INCUMBENT, $dateIn, $timeIn, $dateOut, $timeOut, '', Constants::$TYPE_CHECK_RESERVE);
		}

		$cardModel->setNumber($numberTarget);
		$cardModel->setYear($yearTarget);
		$cardModel->setCcv($ccvTarget);
		$cardModel->setMonth($monthTarget);
		$cardModel->setIdType($typeTarget);
		$cardModel->setIdCheck($idCheck);
		$cardModel->setDeposit($payConsume);
		$cardModel->insert();

		do {
			$idConsume = $consumeModel->insertConsumeRoom($idCheck, Constants::$TYPE_CONSUME_RESERVE, $idCost, $dateIn, $timeIn, $dateOut, $timeOut,
				$payConsume, $priceEstimated, '',  1,  -1, 1,'',Constants::$TYPE_PAY_CARD);

			$consumeModel->insertCheckMember($idCheck, $idPerson);
			$idPerson=0;
			$reserveModel->insertReserve($idConsume, $idTypeRoom, 1);
			$nRoom--;
		} while($nRoom > 0);
		$isReserve = $idCheck;
		$dataAndroid = compact('isReserve');
		header('Content-Type: application/json');

		return json_encode($dataAndroid, JSON_PRETTY_PRINT);
	}

	public function cancelAction(){
		$idCheck=isset($_POST['idCheck'])?$_POST['idCheck']:0;
		$isCancel=$this->consumeModel->deleteCheck($idCheck);

		$dataAndroid = compact('isCancel');
		header('Content-Type: application/json');

		return json_encode($dataAndroid, JSON_PRETTY_PRINT);
	}
}
