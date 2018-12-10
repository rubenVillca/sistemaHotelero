<?php
require_once 'model/QuestionModel.php';

class FrequentlyAndroidController extends Controller {
	private $questionModel;

	public function __construct() {
		parent::__construct();
		$this->questionModel = new QuestionModel($this->conexion);
	}

	public function indexAction() {
		$frequently = $this->questionModel->getInquestQuestionActive();
		$dataAndroid = compact('frequently');
		header('Content-Type: application/json');

		return json_encode($dataAndroid, JSON_PRETTY_PRINT);
	}
}