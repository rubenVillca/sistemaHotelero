<?php
require_once 'model/HotelModel.php';
require_once 'model/RuleModel.php';
require_once 'model/PersonModel.php';
require_once 'model/MessageModel.php';
require_once 'model/QuestionModel.php';
require_once "util/Phpmailer.php";
require_once "util/Smtp.php";

class HelpController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		return $this->aboutAction();
	}

	/**
	 * @return View: acerca de nosotros
	 */
	public function aboutAction() {
		$hotelModel = new HotelModel($this->conexion);
		$ruleModel = new RuleModel($this->conexion);
		$personModel = new PersonModel($this->conexion);

		$title = 'Acerca de nosotros';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_HELP;

		$this->breadCrumbs->insertBread('', 'Ayuda');
		$this->breadCrumbs->insertBread('help/about/', 'Acerca de nosotros');

		$infoHotel = $hotelModel->getInfoHotel($this->idHotel);//envio el numero de hotel a ver
		$politicas = $query = $ruleModel->getListRule($this->idHotel);
		$receps = $personModel->getListPersonRol(2);////lista de recepcionistas
		$admins = $personModel->getListPersonRol(1);//lista de administradores
		$team = array_merge($admins,$receps);

		return new View('about', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('infoHotel', 'politicas', 'team'));
	}

	/**
	 * @return View: manual de usuario cliente
	 */
	public function manualUserClientAction() {
		$title = 'Manual de usuario';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_HELP;
		$this->breadCrumbs->insertBread('', 'Ayuda');
		$this->breadCrumbs->insertBread('help/manualUser/', 'Manual de usuario');

		$this->view = new View('manualUserClient/userClient', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact(''));
		$this->view->setTypeUser('manual');

		return $this->view;
	}

	/**
	 * @return View: manual de usuario cocinero
	 */
	public function manualUserCocinaAction() {
		$title = 'Manual de usuario';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_HELP;
		$this->breadCrumbs->insertBread('', 'Ayuda');
		$this->breadCrumbs->insertBread('help/manualUser/', 'Manual de usuario');

		$this->view = new View('manualUserRecepcion/userRecepcion', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact(''));
		$this->view->setTypeUser('manual');

		return $this->view;
	}

	/**
	 * @return View: manual de usuario servicios
	 */
	public function manualUserServiceAction() {
		$title = 'Manual de usuario';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_HELP;
		$this->breadCrumbs->insertBread('', 'Ayuda');
		$this->breadCrumbs->insertBread('help/manualUser/', 'Manual de usuario');

		$this->view = new View('manualUserRecepcion/userRecepcion', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact(''));
		$this->view->setTypeUser('manual');

		return $this->view;
	}

	/**
	 * @return View: manual de usuario recepcion
	 */
	public function manualUserReceptionAction() {
		$title = 'Manual de usuario';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_HELP;
		$this->breadCrumbs->insertBread('', 'Ayuda');
		$this->breadCrumbs->insertBread('help/manualUser/', 'Manual de usuario');

		$this->view = new View('manualUserRecepcion/userRecepcion', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact(''));
		$this->view->setTypeUser('manual');

		return $this->view;
	}

	/**
	 * @return View: manual de usuario admin
	 */
	public function manualUserAdminAction() {
		$title = 'Manual de usuario';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_HELP;
		$this->breadCrumbs->insertBread('', 'Ayuda');
		$this->breadCrumbs->insertBread('help/manualUser/', 'Manual de usuario');

		$this->view = new View('manualUserAdmin/userAdmin', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact(''));
		$this->view->setTypeUser('manual');

		return $this->view;
	}

	/**
	 * @return View: manual de usuario android
	 */
	public function manualUserAndroidAction() {
		$title = 'Manual de usuario';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_HELP;
		$this->breadCrumbs->insertBread('', 'Ayuda');
		$this->breadCrumbs->insertBread('help/manualUser/', 'Manual de usuario');

		$this->view = new View('manualUserAdmin/userAdmin', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact(''));
		$this->view->setTypeUser('manual');

		return $this->view;
	}

	/**
	 * @return View: manual de usuario Free
	 */
	public function manualUserFreeAction() {
		$title = 'Manual de usuario';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_HELP;
		$this->breadCrumbs->insertBread('help/manualUser/', 'Manual de usuario');

		$this->view = new View('manualUserFree/userFree', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact(''));
		$this->view->setTypeUser('manual');

		return $this->view;
	}
}