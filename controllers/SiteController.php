<?php
require_once 'model/SiteTourModel.php';

class SiteController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		$title = 'Lista de sitios turisticos';
		$this->breadCrumbs->insertBread('site/', 'Sitios Tur&iacute;sticos');
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_SITE_TOUR;

		$siteTourModel = new SiteTourModel($this->conexion);
		$contentSiteTour = $siteTourModel->getSiteTourList($this->idHotel);

		return new View('siteList', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('contentSiteTour'));
	}

	public function delete_ddAction($idSite) {
		$siteTourModel = new SiteTourModel($this->conexion);

		$state = -1;//estado de eliminado
		$siteTourModel->updateSiteState($idSite, $state);
		//actializae estadp a -1
		header('Location: '.Helper::base().'site/panel/');

		return 'Registro exitoso';
	}

	public function editAction($idSite) {
		$title = 'Sitio Turistico';
		if(!is_numeric($idSite) || $idSite<1)
			header('Location:'.Helper::base().'site/panel/');

		$siteTourModel = new SiteTourModel($this->conexion);

		$site = $siteTourModel->getSiteTour($idSite);

		if(empty($site))
			header('Location:'.Helper::base().'site/panel/');
		$site = $site[0];
		$imgSite = $siteTourModel->getSiteTourImg($idSite);

		$this->breadCrumbs->insertBread('settings/', 'Configurar Sistema');
		$this->breadCrumbs->insertBread('site/panel/', 'Ver lista de sitios turísticos');
		$this->breadCrumbs->insertBread('site/edit/'.$idSite, 'Editar Sitio '.$site['NAME_SITE_TOUR']);

		return new View('siteEdit', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('site', 'imgSite'));
	}

	public function insertAction() {

		$title = 'Insertar nuevo sitio tur&iacute;stico';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_SITE_TOUR;

		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('site/insert/', 'Insertar Sitio turístico');

		return new View('siteInsert', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact(''));
	}

	public function insert_ddAction() {
		$siteTourModel = new SiteTourModel($this->conexion);
		$idSite=0;
		if(isset($_POST['insert'])) {
			$name = isset($_POST['name']) ? $_POST['name'] : '';
			$descr = isset($_POST['descr']) ? $_POST['descr'] : '';
			$address = isset($_POST['address']) ? $_POST['address'] : '';
			$gpsX = isset($_POST['gpsX']) ? $_POST['gpsX'] : '';
			$gpsY = isset($_POST['gpsY']) ? $_POST['gpsY'] : '';

			$img = Img::uploadImages("img/site/", 'img');
			$urlImg = $img['images'];
			$this->setMesaje('warning', $img['message']);

			$idSite=$siteTourModel->insertSite($this->idHotel, $name, $descr, $address, $gpsX, $gpsY, $urlImg);
		}
		header('Location: '.Helper::base().'site/edit/'.$idSite);

		return 'Registro exitoso';
	}

	public function showAction($idSite) {
		$siteTourModel = new SiteTourModel($this->conexion);

		$title = 'Sitio Turistico sitio';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_SITE_TOUR;

		$siteTour = $siteTourModel->getSiteTour($idSite);

		$this->breadCrumbs->insertBread("site/", 'Sitios Tur&iacute;sticos');
		$this->breadCrumbs->insertBread("site/show/$idSite", $siteTour[0]['NAME_SITE_TOUR']);

		$siteTourImg = $siteTourModel->getSiteTourImg($idSite);

		return new View('site', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('contentImgSite', 'siteTour', 'siteTourImg', 'carouselIndicators'));
	}

	public function panelAction() {
		$title = 'Editar Sitio Turistico';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_SITE_TOUR;

		$this->breadCrumbs->insertBread('settings/', 'Configurar Sistema');
		$this->breadCrumbs->insertBread('site/panel/', 'Ver lista de sitios turísticos');

		$siteTourModel = new SiteTourModel($this->conexion);
		$sites = $siteTourModel->getSiteTourList($this->idHotel);

		return new View('sitePanel', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('sites'));
	}

	public function edit_ddAction($idSite) {
		$siteTourModel = new SiteTourModel($this->conexion);

		if(is_numeric($idSite) && $idSite>0) {
			$nameSite = isset($_POST['nameSite']) ? $_POST['nameSite'] : '';
			$descrSite = isset($_POST['descrSite']) ? $_POST['descrSite'] : '';
			$addressSite = isset($_POST['addressSite']) ? $_POST['addressSite'] : '';
			$gpsX = isset($_POST['gpsX']) ? $_POST['gpsX'] : '';
			$gpsY = isset($_POST['gpsY']) ? $_POST['gpsY'] : '';
			$listImgOld = isset($_POST['imgOld']) ? $_POST['imgOld'] :'';
			$listImgEdit = isset($_POST['imgEditID'])?$_POST['imgEditID']:array();
			$listImageEdit=array();

			$i=0;
			foreach ($listImgEdit as $idImage){
				if (isset($_FILES['imgEdit-'.$idImage])){
					$nameImage=date('Ymdhis').$i.'.jpg';
					$urlImage=Img::uploadIcon('imgEdit-'.$idImage,"img/site/",$nameImage)['urlImg'];
					if (!empty($urlImage)) {
						$listImageEdit[$i]['idImg'] = $idImage;
						$listImageEdit[$i]['urlImg'] = $urlImage;
						$i++;
					}
				}
			}

			$imgUpload = Img::uploadImages("img/site/", 'img');
			$listImgNew = $imgUpload['images'];

			$res = $siteTourModel->updateSite($idSite, $nameSite, $descrSite, $addressSite, $gpsX, $gpsY, $listImgOld, $listImgNew,$listImageEdit);
			if($res>0) {
				$this->setMesaje('success', 'Cambios realizados exitosamente');
			}
			else {
				$this->setMesaje('warning', $imgUpload['message']);
			}
		}
		header('Location: '.Helper::base().'site/panel/');

		return 'Registro exitoso';
	}
}
