<?php

class HistoryAndroidController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		$dataAndroid = compact('nameUser');
		header('Content-Type: application/json');

		return json_encode($dataAndroid, JSON_PRETTY_PRINT);
	}
}