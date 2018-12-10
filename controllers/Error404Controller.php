<?php

class Error404Controller extends Controller {
	public function __construct() {
		parent::__construct();
	}

	function indexAction() {
		$title = 'Error 404';
		header("HTTP/1.0 404 Not Found");
		return new View('fragment/error/error404', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact(''));
	}
}
