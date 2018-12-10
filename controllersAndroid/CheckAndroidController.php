<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 18/05/2017
 * Time: 12:59
 */
require_once "model/ConsumeModel.php";
require_once "model/ArticleModel.php";
require_once "model/ArticleConsumeModel.php";
require_once "model/CardModel.php";
require_once "model/ReserveModel.php";
require_once "model/PhoneModel.php";
require_once "model/DocumentModel.php";

class CheckAndroidController extends Controller {
	private $consumeModel;
	private $articleModel;
	private $reserveModel;
	private $documentModel;
	private $phoneModel;

	/**
	 * CheckAndroidController constructor.
	 */
	public function __construct() {
		parent::__construct();
		$this->consumeModel = new ConsumeModel($this->conexion);
		$this->articleModel = new ArticleModel($this->conexion);

		$this->reserveModel = new ReserveModel($this->conexion);
		$this->documentModel = new DocumentModel($this->conexion);
		$this->phoneModel = new PhoneModel($this->conexion);
	}

	public function indexAction() {
		$idPerson = isset($_POST['idPerson']) ? $_POST['idPerson'] : 3;
		$checks = $this->getCheck($idPerson);
		$dataAndroid = compact('checks');
		header('Content-Type: application/json');

		return json_encode($dataAndroid, JSON_PRETTY_PRINT);
	}

	private function getCheck($idPerson) {

		$listCheck = $this->consumeModel->getCheckPerson($idPerson,0);
		$res = array();
		$i = 0;
		foreach($listCheck as $check) {
			$checkRes = array();
			$j = 0;
			$consumeList = $this->consumeModel->getListConsume($check['ID_CHECK']);
			foreach($consumeList as $consume) {
				$articleConsumeModel=new ArticleConsumeModel($this->conexion);
				$articleConsumeModel->setIdConsume($consume['ID_CONSUME_SERVICE']);
				$articleConsume = $articleConsumeModel->select();

				$checkRes[$j] = $consume;
				$checkRes[$j]['reserve'] = $this->reserveModel->getListReserveConsume($consume['ID_CONSUME_SERVICE']);
				//dd($checkRes[$j]['reserve']);
				$checkRes[$j]['occupation'] = $this->consumeModel->getConsumeOccupation($consume['ID_CONSUME_SERVICE']);
				$checkRes[$j]['articles'] = $articleConsume;
				$members = $this->consumeModel->getListConsumeMember($consume['ID_CONSUME_SERVICE']);
				$memberRes = array();
				$k = 0;
				foreach($members as $member) {
					$memberRes[$k] = $member;
					$document = $this->documentModel->getListDoc($member['ID_PERSON']);
					$memberRes[$k]['NUMBER_DOCUMENT'] = empty($document) ? '0' : $document[0]['NUMBER_DOCUMENT'];
					$memberRes[$k]['NAME_TYPE_DOCUMENT'] = empty($document) ? '' : $document[0]['NAME_TYPE_DOCUMENT'];
					$phone = $this->phoneModel->getListPhone($member['ID_PERSON']);
					$memberRes[$k]['NUMBER_PHONE'] = empty($phone) ? '0' : $phone[0]['NUMBER_PHONE'];
					$memberRes[$k]['NAME_TYPE_PHONE'] = empty($phone) ? '' : $phone[0]['NAME_TYPE_PHONE'];
					$k++;
				}
				$checkRes[$j++]['members'] = $memberRes;
			}
			$res[$i] = $check;
			$res[$i]['consumeFood'] = $this->consumeModel->getListConsumeFood($check['ID_CHECK']);
			$cardModel = new CardModel($this->conexion);
			$cardModel->setIdCheck($check['ID_CHECK']);
			$cardModel->syncUp();
			$res[$i]['cards'] = $cardModel->select();
			$res[$i++]['consum'] = $checkRes;
		}

		return $res;
	}
}