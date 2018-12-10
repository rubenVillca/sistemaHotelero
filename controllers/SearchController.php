<?php

class SearchController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		$title = 'Buscar Usuario';

		return new View('profileSearch', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact(''));
	}
}