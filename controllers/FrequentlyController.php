<?php
require_once 'model/HotelModel.php';
require_once 'model/RuleModel.php';
require_once 'model/PersonModel.php';
require_once 'model/MessageModel.php';
require_once 'model/QuestionModel.php';
require_once "util/Phpmailer.php";
require_once "util/Smtp.php";

class FrequentlyController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		$questionModel = new QuestionModel($this->conexion);

		$title = 'Lista de preguntas precuentes';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_HELP;

		$this->breadCrumbs->insertBread('', 'Ayuda');
		$this->breadCrumbs->insertBread('frequently/', 'Preguntas Frecuentes');

		$questionContainer = $questionModel->getInquestFrequently(1);
		if(empty($questionContainer))
			$this->setMesaje('warning', 'No tiene preguntas frecuentes activas agregue <a href="frequently/panel/">Aqui</a>');

		return new View('frequentlyList', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('questionContainer'));
	}

	public function delete_ddAction($idInquest, $idQuestion) {
		$questionModel = new QuestionModel($this->conexion);

		$state = -1;
		$questionModel->deleteQuestion($idInquest, $idQuestion, $state);
		$this->setMesaje('danger', 'Pregunta eliminada');
		header('Location: '.Helper::base().'frequently/panel/');

		return 'Registro exitoso';
	}

	public function editAction($idInquest, $idQuestion) {
		$questionModel = new QuestionModel($this->conexion);

		if($idInquest>0 && $idQuestion>0) {
			$preg = $_POST['pregunta'];
			$resp = $_POST['respuesta'];
			$state = $_POST['stateQuestion'];
			$questionModel->updateQuestion($idInquest, $idQuestion, $preg, $resp, $state);
			$this->setMesaje('success', 'Pregunta editada');
		}
		header('Location: '.Helper::base().'frequently/panel/');

		return 'Registro exitoso';
	}

	public function insertAction() {
		$personModel = new PersonModel($this->conexion);
		$questionModel = new QuestionModel($this->conexion);

		if(isset($_POST['btnAddQuestion'])) {
			$preg = $_POST['pregunta'];
			$resp = $_POST['respuesta'];
			$stateQuestion = isset($_POST['stateQuestion']) ? 1 : 0;
			$idPerson = $personModel->getPerson($this->nameUser)[0]['ID_PERSON'];
			$questionModel->insertQuestionFrequently($preg, $resp, $idPerson, $stateQuestion);
			$this->setMesaje('success', 'Pregunta insertada');
		}
		header('Location: '.Helper::base().'frequently/panel/');

		return 'Registro exitoso';
	}

	public function panelAction() {
		$questionModel = new QuestionModel($this->conexion);
		$title = 'Preguntas frecuentes';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_HELP;

		$this->breadCrumbs->insertBread('', 'Ayuda');
		$this->breadCrumbs->insertBread('frequently/panel/', 'Preguntas Frecuentes');

		$questionContainer = $questionModel->getInquestFrequently(0);

		return new View('frequently', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('questionContainer'));
	}
}
