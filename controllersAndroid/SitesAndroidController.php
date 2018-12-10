<?php
require_once 'model/SiteTourModel.php';

class SitesAndroidController extends Controller {
	private $siteTourModel;

	public function __construct() {
		parent::__construct();
		$this->siteTourModel = new SiteTourModel($this->conexion);
	}

	public function indexAction() {
		$sitesTour   = $this->getSites();
		$dataAndroid = compact('sitesTour');
		header('Content-Type: application/json');
		return json_encode($dataAndroid, JSON_PRETTY_PRINT);
	}

	private function getSites() {//lista de servicios tipo ofertas
		$list  = $this->siteTourModel->getSiteTourList($this->idHotel);
		$sites = array();
		$i=0;
		foreach ($list as $item) {
			$listImg = $this->siteTourModel->getSiteTourImg($item['ID_SITE_TOUR']);
			$aux     = array('id'          => $item['ID_SITE_TOUR'],
			                 'state'       => utf8_encode(1),
			                 'name'        => utf8_encode($item['NAME_SITE_TOUR']),
			                 'description' => utf8_encode(strip_tags($item['DESCRIPTION_SITE_TOUR'])),
			                 'address'     => utf8_encode($item['ADDRESS_SITE_TOUR']),
			                 'gpsX'        => utf8_encode($item['ADDRESS_GPS_X_SITE_TOUR']),
			                 'gpsY'        => utf8_encode($item['ADDRESS_GPS_Y_SITE_TOUR']),
			                 'images'      => $listImg);
			$sites[$i++]=$aux;
		}
		return $sites;
	}
}