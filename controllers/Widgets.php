<?php
require_once 'model/MessageModel.php';
require_once 'model/ActivityModel.php';
require_once 'model/QuestionModel.php';
require_once 'model/ConsumeModel.php';
require_once 'model/ConsumeFoodModel.php';

class Widgets extends Controller {
	private $totalMessages;

	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		return 'Ruta invalida';
	}

	public function getListActivity() {
		$activityModel = new ActivityModel($this->conexion);
		$activityModel->setIdState(Constants::$STATE_ACTIVITY_ACTIVE);

		return $activityModel->select();
	}

	public function getListCheckActive() {
		$consumeModel = new ConsumeModel($this->conexion);
		$idPerson=0;
		if ($_SESSION['TYPE_USER']==Constants::$TYPE_USER_CLIENT){
			$idPerson=$_SESSION['ID_PERSON'];
		}
		$total=count($consumeModel->getListCheck($this->idHotel, Constants::$STATE_CHECK_ACTIVE, Constants::$TYPE_CHECK_IN,$idPerson));
		$total+=count($consumeModel->getListCheck($this->idHotel, Constants::$STATE_CHECK_PROCESS_WITH_INCUMBENT, Constants::$TYPE_CHECK_IN,$idPerson));
		$total+=count($consumeModel->getListCheck($this->idHotel, Constants::$STATE_CHECK_PROCESS_WITHOUT_INCUMBENT, Constants::$TYPE_CHECK_IN,$idPerson));
		$total+=count($consumeModel->getListCheck($this->idHotel, Constants::$STATE_CHECK_PENDING, Constants::$TYPE_CHECK_IN,$idPerson));
		return $total;
	}

	public function getListCheckOut() {
		$consumeModel = new ConsumeModel($this->conexion);

		return count($consumeModel->getListCheckOut($this->idHotel, 1, 2, date('Y-m-d')));
	}

	public function getListCheckReserveActive() {
		$consumeModel = new ConsumeModel($this->conexion);
		$idPerson=0;
		if ($_SESSION['TYPE_USER']==Constants::$TYPE_USER_CLIENT){
			$idPerson=$_SESSION['ID_PERSON'];
		}
		$total=count($consumeModel->getListCheck($this->idHotel, Constants::$STATE_CHECK_ACTIVE, Constants::$TYPE_CHECK_RESERVE,$idPerson));
		$total+=count($consumeModel->getListCheck($this->idHotel, Constants::$STATE_CHECK_PROCESS_WITH_INCUMBENT, Constants::$TYPE_CHECK_RESERVE,$idPerson));
		$total+=count($consumeModel->getListCheck($this->idHotel, Constants::$STATE_CHECK_PROCESS_WITHOUT_INCUMBENT, Constants::$TYPE_CHECK_RESERVE,$idPerson));
		$total+=count($consumeModel->getListCheck($this->idHotel, Constants::$STATE_CHECK_PENDING, Constants::$TYPE_CHECK_RESERVE,$idPerson));
		return $total;
	}

	public function getListInquest() {
		$questionModel = new QuestionModel($this->conexion);

		return $questionModel->getInquestListActive();
	}

	public function getListOrder() {
		$consumeFoodModel = new ConsumeFoodModel($this->conexion);

		return count($consumeFoodModel->getListConsumeFoodPending($this->idHotel, 0));
	}

	public function getListTypeMesaje() {
		$mesajeModel = new MessageModel($this->conexion);
		$m1          = $mesajeModel->getListMessagesNoWatch($this->nameUser, 1)[0]['TOTAL'];
		$m2          = $mesajeModel->getListMessagesNoWatch($this->nameUser, 2)[0]['TOTAL'];
		$m3          = $mesajeModel->getListMessagesNoWatch($this->nameUser, 3)[0]['TOTAL'];
		$m4          = $mesajeModel->getListMessagesNoWatch($this->nameUser, 4)[0]['TOTAL'];
		$m5          = $mesajeModel->getListMessagesNoWatch($this->nameUser, 5)[0]['TOTAL'];
		$m6          = $mesajeModel->getListMessagesNoWatch($this->nameUser, 6)[0]['TOTAL'];
		$m7          = $mesajeModel->getListMessagesNoWatch($this->nameUser, 7)[0]['TOTAL'];
		$m8          = $mesajeModel->getListMessagesNoWatch($this->nameUser, 8)[0]['TOTAL'];
		$m9          = $mesajeModel->getListMessagesNoWatch($this->nameUser, 9)[0]['TOTAL'];
		$m10         = $mesajeModel->getListMessagesNoWatch($this->nameUser, 10)[0]['TOTAL'];
		$m11         = $mesajeModel->getListMessagesNoWatch($this->nameUser, 11)[0]['TOTAL'];
		$m12         = $mesajeModel->getListMessagesNoWatch($this->nameUser, 12)[0]['TOTAL'];
		$m13         = $mesajeModel->getListMessagesNoWatch($this->nameUser, 13)[0]['TOTAL'];
		$m14         = $mesajeModel->getListMessagesNoWatch($this->nameUser, 14)[0]['TOTAL'];
		$m15         = $mesajeModel->getListMessagesNoWatch($this->nameUser, 15)[0]['TOTAL'];
		//cantidad de mensajes de cada tipo
		$typeMesaje1         = $m4 + $m5; //alertas
		$typeMesaje2         = $m8 + $m14; //registro usuario
		$typeMesaje3         = $m2 + $m3; //registro clientes ckeck in y chek out
		$typeMesaje4         = $m6 + $m7 + $m9; //reservs
		$typeMesaje5         = $m11; //sugerencias
		$typeMesaje6         = $m13; //quejas
		$typeMesaje7         = $m1; //mensajes
		$typeMesaje8         = $m12 + $m10; //recordatorios
		$typeMesaje9         = $m15; //preguntas del usuario
		$this->totalMessages = $m1 + $m2 + $m3 + $m4 + $m5 + $m6 + $m7 + $m8 + $m9 + $m10 + $m11 + $m12 + $m13 + $m14 + $m15;

		$listTypeMesajes = [$typeMesaje1,
		                    $typeMesaje2,
		                    $typeMesaje3,
		                    $typeMesaje4,
		                    $typeMesaje5,
		                    $typeMesaje6,
		                    $typeMesaje7,
		                    $typeMesaje8,
		                    $typeMesaje9];

		return $listTypeMesajes;
	}

	public function getNumberCheckInRegister() {
		$consumeModel = new ConsumeModel($this->conexion);

		return count($consumeModel->getListCheckPending($this->idHotel, 1, 1, date('Y-m-d')));
	}

	public function getTotalMesajes() {
		return $this->totalMessages;
	}
}