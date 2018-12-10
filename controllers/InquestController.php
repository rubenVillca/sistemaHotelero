<?php

require_once 'model/QuestionModel.php';
require_once 'model/PersonModel.php';

class InquestController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	/**mostrar lista de encuestas*/
	public function indexAction() {
		$questionModel = new QuestionModel($this->conexion);

		$title = 'Lista de encuestas';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_HOME;
		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('inquest/', 'Lista de encuestas');
		$listInquest = $questionModel->getInquestListActive();

		return new View('inquestList', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listInquest'));
	}

	/**eliminar encuestas
	 * @param $idInquest
	 * @return string
	 */
	public function delete_ddAction($idInquest) {
		$questionModel = new QuestionModel($this->conexion);

		if(is_numeric($idInquest) && $idInquest>0)
			$questionModel->deleteInquest($idInquest);
		header('Location: '.Helper::base().'inquest/panel/');

		return 'Registro exitoso';
	}

	/**editar encuesta
	 * @param $idInquest
	 * @return View
	 */
	public function editAction($idInquest) {
		$questionModel = new QuestionModel($this->conexion);

		$title = 'Editar encuestas';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_HOME;
		$inquest = array();
		if(is_numeric($idInquest) && $idInquest>0)
			$inquest = $questionModel->getInquest($idInquest)[0];
		if(empty($inquest)) {
			$this->setMesaje('warning', 'Encuesta no encontrada');
			header('Location: '.Helper::base().'inquest/panel/');
		}

		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('inquest/panel/', 'Lista de encuestas');
		$this->breadCrumbs->insertBread('inquest/edit/'.$idInquest, $inquest['NAME_INQUEST']);

		$stateModel = new StateModel($this->conexion);
		$stateModel->setNameTable('inquest');
		$listState = $stateModel->select();

		$listQuestionActive = $questionModel->getQuestion($idInquest);

		return new View('inquestEdit', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('inquest', 'listState', 'listQuestionActive'));
	}

	/**llenar encuesta
	 * @param $idInquest
	 * @return View
	 */
	public function fillInquestAction($idInquest) {
		$questionModel = new QuestionModel($this->conexion);

		$title = 'Lista de preguntas de la encuesta';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_HOME;
		$this->breadCrumbs->insertBread('inquest/', 'Lista de encuestas');
		$this->breadCrumbs->insertBread('inquest/fillInquest/'.$idInquest, 'Lista Cuestionario');

		$listQuestionInquest = $questionModel->getQuestionFillUser($idInquest, $_SESSION['ID_PERSON']);

		return new View('questionFill', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listQuestionInquest'));
	}

	/**insertar encuesta*/
	public function insertAction() {
		$title = 'Insertar encuestas';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_HOME;
		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('inquest/', 'Lista de encuestas');

		$stateModel = new StateModel($this->conexion);
		$stateModel->setNameTable('inquest');
		$listState = $stateModel->select();

		return new View('inquestEdit', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listState'));
	}

	/**lista de preguntas
	 * @param $idInquest
	 * @return View
	 */
	public function questionListAction($idInquest) {
		$questionModel = new QuestionModel($this->conexion);

		$title = 'Lista de preguntas de la encuesta';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_HOME;
		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('inquest/', 'Lista de encuestas');
		$this->breadCrumbs->insertBread('inquest/questionList/', 'Lista de preguntas');

		$listQuestionResponse = $questionModel->getQuestionActive($idInquest);

		return new View('questionList', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listQuestionResponse'));
	}

	/**lista de respuestas
	 * @param $idQuest
	 * @return View
	 */
	public function responseListAction($idQuest) {
		$questionModel = new QuestionModel($this->conexion);

		$title = 'Respuestas de los huespedes';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_HOME;

		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('inquest/', 'Lista de encuestas');
		$this->breadCrumbs->insertBread('inquest/questionList/', 'Lista de preguntas');
		$this->breadCrumbs->insertBread('inquest/responseList/', 'Lista de respuestas');

		$listResponse = $questionModel->getQuestionResponseActive($idQuest);

		return new View('inquestListResponse', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listResponse'));
	}

	public function insert_ddAction() {
		$questionModel = new QuestionModel($this->conexion);
		$personModel = new PersonModel($this->conexion);

		$name = isset($_POST['nameInquest']) ? $_POST['nameInquest'] : '';
		$idState = isset($_POST['stateInquest']) ? $_POST['stateInquest'] : '';
		$description = isset($_POST['descr']) ? $_POST['descr'] : '';
		$dateIni = isset($_POST['dateIni']) ? $_POST['dateIni'] : date('Y-m-d');
		$timeIni = isset($_POST['timeIni']) ? $_POST['timeIni'] : '00:00:00';
		$dateFin = isset($_POST['dateFin']) ? $_POST['dateFin'] : date('Y-m-d');
		$timeFin = isset($_POST['timeFin']) ? $_POST['timeFin'] : '00:00:00';
		$idPerson = $personModel->getPerson($_SESSION['NAME_USER'])[0]['ID_PERSON'];
		$idInquest = $questionModel->insertInquest($idPerson, $idState, $name, $description, $dateIni, $timeIni, $dateFin, $timeFin);
		$questions = isset($_POST['question']) ? $_POST['question'] : '';
		$questionModel->updateQuestionList($idInquest, $name, $idState, $description, $dateIni, $timeIni, $dateFin, $timeFin, $questions);
		header('Location: '.Helper::base().'inquest/panel/');

		return 'Registro exitoso';
	}

	public function saveFillAction() {
		$questionModel = new QuestionModel($this->conexion);

		if(isset($_POST['save'])) {
			$listResponse = isset($_POST['response']) ? $_POST['response'] : array();
			$idPerson = $_SESSION['ID_PERSON'];
			$questionModel->insertResponseList($idPerson, $listResponse);
			$this->setMesaje('success', 'Questionario llenado, Gracias por su apoyo!!!');
		}
		header('Location: '.Helper::base().'inquest/');

		return 'Registro exitoso';
	}

	public function panelAction() {
		$questionModel = new QuestionModel($this->conexion);

		$title = 'Editar lista de encuestas';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_SETTINGS;

		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('inquest/', 'Lista de encuestas');

		$listInquest = $questionModel->getInquestList();

		return new View('inquestPanel', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listInquest'));
	}

	public function edit_ddAction($idInquest) {
		$questionModel = new QuestionModel($this->conexion);

		$name = isset($_POST['nameInquest']) ? $_POST['nameInquest'] : '';
		$state = isset($_POST['stateInquest']) ? $_POST['stateInquest'] : 1;
		$descr = isset($_POST['descr']) ? $_POST['descr'] : '';
		$dateIni = isset($_POST['dateIni']) ? $_POST['dateIni'] : '';
		$timeIni = isset($_POST['timeIni']) ? $_POST['timeIni'] : '';
		$dateFin = isset($_POST['dateFin']) ? $_POST['dateFin'] : '';
		$timeFin = isset($_POST['timeFin']) ? $_POST['timeFin'] : '';
		$questions = isset($_POST['question']) ? $_POST['question'] : '';
		$questionModel->updateQuestionList($idInquest, $name, $state, $descr, $dateIni, $timeIni, $dateFin, $timeFin, $questions);
		$this->setMesaje('success', 'Cambios guardados');
		header('Location: '.Helper::base().'inquest/panel/');

		return 'Registro exitoso';
	}
}