<?php
require_once 'model/TypeModel.php';
require_once 'model/StateModel.php';
require_once 'model/ActivityModel.php';

class ActivityController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		$title = 'Lista de actividades';

		$_SESSION['MENU'] = Constants::$MENU_SELECTED_ACTIVITY;
		$this->breadCrumbs->insertBread('activity/', 'Actividades');

		$activityModel = new ActivityModel($this->conexion);
		$activityModel->setIdState(Constants::$STATE_ACTIVITY_ACTIVE);
		$listActivity = $activityModel->select();

		return new View('activityList', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listActivity'));
	}

	public function calendarAction() {
		$title = 'Configurar calendario';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_ACTIVITY;

		$this->breadCrumbs->insertBread('activity/calendar/', 'Calendario');

		$activityModel = new ActivityModel($this->conexion);
		$activityModel->setIdState(Constants::$STATE_ACTIVITY_ACTIVE);
		$listActivity = $activityModel->select();

		return new View('activityCalendar', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listActivity'));
	}

	public function delete_ddAction($idActivity) {
		if(is_numeric($idActivity) && $idActivity>0) {
			$activityModel = new ActivityModel($this->conexion);
			$activityModel->setId($idActivity);
			$activityModel->syncUp();
			$activityModel->setIdState(Constants::$STATE_ACTIVITY_DELETE);
			$activityModel->update();

			$this->setMesaje('warning', 'actividad eliminadaa');
		}
		header('Location: '.Helper::base().'activity/panel/');

		return 'Registro exitoso';
	}

	public function editAction($idActivity) {
		if(!is_numeric($idActivity) || $idActivity<=0) {
			$idActivity = -1;
		}
		$title = 'Editar Actividad seleccionada';

		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('activity/edit/', $title);

		$_SESSION['MENU'] = Constants::$MENU_SELECTED_ACTIVITY;
		$activityModel = new ActivityModel($this->conexion);
		$activityModel->setId($idActivity);
		$activity=$activityModel->select();

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('activity');
		$listType = $typeModel->select();

		$stateModel = new StateModel($this->conexion);
		$stateModel->setNameTable('activity');
		$listState = $stateModel->select();

		if(!empty($activity))
			$activity = $activity[0];

		return new View('activityEdit', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('activity', 'listType', 'listState'));
	}

	public function insertAction() {
		$title = 'Insertar nuevas Actividad';
		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('activity/insert/', 'Insertar nueva actividad');

		$_SESSION['MENU'] = Constants::$MENU_SELECTED_ACTIVITY;
		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('activity');
		$listType = $typeModel->select();

		$stateModel = new StateModel($this->conexion);
		$stateModel->setNameTable('activity');
		$listState = $stateModel->select();

		return new View('activityInsert', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listType', 'listState'));
	}

	public function insert_ddAction() {
		if(isset($_POST['insert'])) {

			$img = Img::uploadImg('img/activity/');
			$imgAddress = $img['urlImg'];
			$this->setMesaje('danger', $img['mesaje']);

			$activityModel = new ActivityModel($this->conexion);
			$activityModel->setName(isset($_POST['nameActivity']) ? $_POST['nameActivity'] : '');
			$activityModel->setDescription(isset($_POST['descrActivity']) ? $_POST['descrActivity'] : '');
			$activityModel->setIdType(isset($_POST['idTypeActivity']) ? $_POST['idTypeActivity'] : '');
			$activityModel->setIdState(isset($_POST['idStateActivity']) ? $_POST['idStateActivity'] : '');
			$activityModel->setDateStart(isset($_POST['dateActivityIni']) ? $_POST['dateActivityIni'] : date('Y-m-d'));
			$activityModel->setDateEnd(isset($_POST['dateActivityFin']) ? $_POST['dateActivityFin'] : date('Y-m-d'));
			$activityModel->setTimeStart(isset($_POST['timeActivityIni']) ? $_POST['timeActivityIni'] : '00:00:00');
			$activityModel->setTimeEnd(isset($_POST['timeActivityFin']) ? $_POST['timeActivityFin'] : '00:00:00');
			$activityModel->setImage($imgAddress);
			$activityModel->insert();

			if(empty($this->mesaje))
				$this->setMesaje('success', 'Actividad insertada exitosamente');
		}
		header('Location: '.Helper::base().'activity/panel/');

		return 'Registro exitoso';
	}

	public function showAction($idActivity) {
		if(!is_numeric($idActivity) || $idActivity<1)
			header('Location: '.Helper::base().'activity/');

		$activityModel = new ActivityModel($this->conexion);
		$activityModel->setId($idActivity);
		$activity = $activityModel->select();

		if(!empty($activity))
			$activity = $activity[0];
		$title = 'Actividad: '.$activity['NAME_ACTIVITY'];
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_ACTIVITY;

		$this->breadCrumbs->insertBread('activity/', 'Actividades');
		$this->breadCrumbs->insertBread('activity/show/'.$activityModel->getId(), $title);

		return new View('activityShow', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('activity'));
	}

	public function panelAction() {
		$title = 'Lista de actividades';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_ACTIVITY;
		$this->breadCrumbs->insertBread('activity/', 'Actividades');
		$this->breadCrumbs->insertBread('activity/panel/', 'Lista de actividades');

		$activityModel = new ActivityModel($this->conexion);
		$activityModel->setIdState(Constants::$STATE_ACTIVITY_ACTIVE);
		$listActivity = $activityModel->select();

		return new View('activityPanel', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listActivity'));
	}

	public function edit_ddAction($idActivity) {
		if(isset($_POST['nameActivity']) && is_numeric($idActivity) && $idActivity>0) {

			$img = Img::uploadImg('img/activity/');
			$imgAddress = $img['urlImg'];
			if(empty($addressImg))
				$this->setMesaje('danger', $img['mesaje']);

			$activityModel = new ActivityModel($this->conexion);
			$activityModel->setId($idActivity);
			$activityModel->syncUp();
			$activityModel->setName(isset($_POST['nameActivity']) ? $_POST['nameActivity'] : '');
			$activityModel->setDescription(isset($_POST['descrActivity']) ? $_POST['descrActivity'] : '');
			$activityModel->setIdType(isset($_POST['idTypeActivity']) ? $_POST['idTypeActivity'] : '');
			$activityModel->setIdState(isset($_POST['idStateActivity']) ? $_POST['idStateActivity'] : '');
			$activityModel->setDateStart(isset($_POST['dateActivityIni']) ? $_POST['dateActivityIni'] : date('Y-m-d'));
			$activityModel->setDateEnd(isset($_POST['dateActivityFin']) ? $_POST['dateActivityFin'] : date('Y-m-d'));
			$activityModel->setTimeStart(isset($_POST['timeActivityIni']) ? $_POST['timeActivityIni'] : '00:00:00');
			$activityModel->setTimeEnd(isset($_POST['timeActivityFin']) ? $_POST['timeActivityFin'] : '00:00:00');
			if(!empty($imgAddress))
				$activityModel->setImage($imgAddress);
			$activityModel->update();
		}
		header('Location: '.Helper::base().'activity/panel/');

		return 'Registro exitoso';
	}
}
