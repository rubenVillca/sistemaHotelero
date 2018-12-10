<?php

class HomeAndroidController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {

		$dataAndroid = compact('');
		header('Content-Type: application/json');

		return json_encode($dataAndroid, JSON_PRETTY_PRINT);
	}
}