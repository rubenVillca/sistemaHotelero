<?php

class SettingsController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		$title = 'Configuracion del sistema';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_SETTINGS;
		$this->breadCrumbs->insertBread('settings/', 'Configurar Sistema');

		return new View('setting', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact(''));
	}
}
	