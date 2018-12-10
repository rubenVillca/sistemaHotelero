<?php

//para cargar las imagenes en aplicacion android
class ImageController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		return '';
	}

	public function urlAction($urlImg) {
		$title = 'android';
		$this->typeUser = 'android';

		$image = str_replace("---", "/", $urlImg);
		$images = "../../".$image;

		//$images="../../img/404/error-404.jpg";
		return new View('images', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('images'));
	}
}
