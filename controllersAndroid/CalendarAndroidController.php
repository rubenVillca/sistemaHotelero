<?php
require_once 'model/ActivityModel.php';

class CalendarAndroidController extends Controller {
	private $activityModel;

	public function __construct() {
		parent::__construct();
		$this->activityModel = new ActivityModel($this->conexion);
	}

	public function indexAction() {
		$this->activityModel=new ActivityModel($this->conexion);
		$this->activityModel->setIdState(Constants::$STATE_ACTIVITY_ACTIVE);
		$calendar=$this->activityModel->select();

		$dataAndroid = compact('calendar');
		header('Content-Type: application/json');

		return json_encode($dataAndroid, JSON_PRETTY_PRINT);
	}
}