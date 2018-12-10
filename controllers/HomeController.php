<?php
require_once 'model/SessionModel.php';
require_once 'model/UserModel.php';
require_once 'model/HotelModel.php';
require_once 'model/PersonModel.php';
require_once 'model/ReserveModel.php';
require_once 'model/StatisticalModel.php';

class HomeController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		$hotelModel               = new HotelModel($this->conexion);
		$checkModel               = new ConsumeModel($this->conexion);
		$title                    = 'Bienvenido al hotel';
		$_SESSION['MENU']         = Constants::$MENU_SELECTED_HOME;
		$_SESSION['ID_PERSON']    = isset($_SESSION['ID_PERSON']) ? $_SESSION['ID_PERSON'] : 0;
		$_SESSION['ACTIVE_CHECK'] = $checkModel->isCheckIn($_SESSION['ID_PERSON']);
		$this->insertSession($this->nameUser);
		$hotel        = $hotelModel->getInfoHotel($this->idHotel);
		$serviceModel = new ServiceModel($this->conexion);
		$listServices = $serviceModel->getServiceList($this->idHotel);
		return new View('home', $title, array(), $this->mesaje, compact('hotel', 'listServices'));
	}

	public function indexAdminAction() {
		$personModel      = new PersonModel($this->conexion);
		$userModel        = new UserModel($this->conexion);
		$reserveModel     = new ReserveModel($this->conexion);
		$sessionModel     = new SessionModel($this->conexion);
		$title            = 'Informacion tecnica Hotel';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_HOME;
		$this->insertSession($this->nameUser);
		$profile = $personModel->getPerson($this->nameUser);
		if (!empty($profile))
			$profile = $profile[0];
		$infoHotel           = $this->getInfoHotel();
		$ping                = $this->consultas->ping();
		$totalUser           = $userModel->getTotalUser();
		$totalUserToday      = $userModel->getTotalUserToday();
		$totalReserve        = $reserveModel->getTotalReserveActive($this->idHotel);
		$totalReservePending = $reserveModel->getTotalReservePending($this->idHotel);
		$reserveAdvanced     = ($totalReserve + $totalReservePending) > 0 ?
			($totalReserve * 100 / ($totalReserve + $totalReservePending)) : 0;
		$ultimateUser        = $this->getUltimateUser();
		$totalVisitor        = $sessionModel->getTotalVisitor();
		$totalSession        = $sessionModel->getTotalSession();
		$totalSex            = $userModel->getTotalUserSex();
		$ultimateClient      = $personModel->getUltimateClient();
		$totalNavigator      = $this->getListNavigator();

		$speed = '';
		//$speed = $this->getSpeedServer();
		//$diskSpace = $this->getDiskSpace();
		return new View('homeAdmin', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('speed', 'ping', 'diskSpace', 'profile', 'infoHotel', 'totalUser', 'totalUserToday', 'totalReserve', 'totalReservePending', 'ultimateUser', 'totalVisitor', 'totalSession', 'totalSex', 'ultimateClient', 'totalNavigator', 'reserveAdvanced'));
	}

	public function indexClientAction() {
		$personModel = new PersonModel($this->conexion);

		$title                    = 'Bienvenido al hotel';
		$_SESSION['MENU']         = Constants::$MENU_SELECTED_HOME;
		$checkModel               = new ConsumeModel($this->conexion);
		$_SESSION['ACTIVE_CHECK'] = $checkModel->isCheckIn($_SESSION['ID_PERSON']);
		$this->insertSession($this->nameUser);
		$profile = $personModel->getPerson($this->nameUser)[0];

		return new View('homeClient', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('profile'));
	}

	public function indexCocinaAction() {
		$personModel = new PersonModel($this->conexion);

		$title            = 'Bienvenido al hotel';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_HOME;
		$this->insertSession($this->nameUser);
		$profile = $personModel->getPerson($this->nameUser)[0];

		return new View('homeCocina', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('profile'));
	}

	public function indexReceptionAction() {
		$personModel = new PersonModel($this->conexion);

		$title            = 'Bienvenido al hotel';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_HOME;
		$this->insertSession($this->nameUser);
		$profile = $personModel->getPerson($this->nameUser)[0];

		return new View('homeReception', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('profile'));
	}

	public function indexServiceAction() {
		$personModel      = new PersonModel($this->conexion);
		$title            = 'Bienvenido al hotel';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_HOME;
		$this->insertSession($this->nameUser);
		$profile = $personModel->getPerson($this->nameUser)[0];

		return new View('homeService', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('profile'));
	}

	private function getDiskSpace() {
		@$bytesTotal = disk_total_space("/");
		@$bytesFree = disk_free_space("/");
		$base  = 1024;
		$libre = ($bytesFree / $base) / $base; // en MB
		$total = ($bytesTotal / $base) / $base; // en MB
		@$libre = round($libre * 100 / $total, 2);//en porcentaje
		$busy = 100 - $libre;

		return array('total' => $total,
		             'libre' => $libre,
		             'unit'  => 'MB',
		             'busy'  => $busy);
	}

	private function getInfoHotel() {//porcentaje q tiene lleno los datos de l hotel
		$hotelModel = new HotelModel($this->conexion);

		$info = $hotelModel->getInfoHotel($this->idHotel);
		$res  = 0;
		if (!empty($info)) {
			$list = $info[0];
			$i    = 0;
			foreach ($list as $item) {
				if (!empty($item)) {
					$i++;
				}
			}
			if ($i > 0) {
				$res = round(($i / count($list)) * 100, 2);
			}
		}

		return $res;
	}

	private function getListNavigator() {
		$statisticalModel = new StatisticalModel($this->conexion);

		$browser     = array("IE",
		                     "OPERA",
		                     "MOZILLA",
		                     "NETSCAPE",
		                     "FIREFOX",
		                     "SAFARI",
		                     "CHROME");
		$os          = array("WIN",
		                     "MAC",
		                     "LINUX",
		                     "ANDROID");
		$res         = array('browser' => array("IE"       => array('title' => "IE",
		                                                            'total' => 0,
		                                                            'color' => '356958'),
		                                        "OPERA"    => array('title' => "OPERA",
		                                                            'total' => 0,
		                                                            'color' => '456546'),
		                                        "MOZILLA"  => array('title' => "MOZILLA",
		                                                            'total' => 0,
		                                                            'color' => '055356'),
		                                        "NETSCAPE" => array('title' => "NETSCAPE",
		                                                            'total' => 0,
		                                                            'color' => '356283'),
		                                        "FIREFOX"  => array('title' => "FIREFOX",
		                                                            'total' => 0,
		                                                            'color' => '002265'),
		                                        "SAFARI"   => array('title' => "SAFARI",
		                                                            'total' => 0,
		                                                            'color' => '548935'),
		                                        "CHROME"   => array('title' => "CHROME",
		                                                            'total' => 0,
		                                                            'color' => '569292')),
		                     'os'      => array("WIN"     => array('title' => "WIN",
		                                                           'total' => 0,
		                                                           'color' => '356958'),
		                                        "MAC"     => array('title' => "MAC",
		                                                           'total' => 0,
		                                                           'color' => '456546'),
		                                        "LINUX"   => array('title' => "LINUX",
		                                                           'total' => 0,
		                                                           'color' => '055356'),
		                                        "ANDROID" => array('title' => "ANDROID",
		                                                           'total' => 0,
		                                                           'color' => '356283')));
		$listBrowser = $statisticalModel->getListBrowser();
		foreach ($listBrowser as $nav) {
			//navegador
			foreach ($browser as $b) {
				if (strpos(strtoupper($nav['BROWSER']), $b)) {
					$res['browser']["$b"]['total'] = $res['browser']["$b"]['total'] + $nav['TOTAL'];
				}
			}
			//SO
			foreach ($os as $o) {
				if (strpos(strtoupper($nav['BROWSER']), $o))
					$res['os']["$o"]['total'] = $res['os']["$o"]['total'] + $nav['TOTAL'];
			}
		}

		return $res;
	}

	private function getSpeedServer() {
		//$var = "Old max_execution: ".ini_get('max_execution_time')."s"."\n";
		ini_set('max_execution_time', 300);
		//$var = $var."New max_execution: ".ini_get('max_execution_time')."s"."\n";
		//$var = $var."Old memory_limit: ".ini_get('memory_limit')."M"."\n";
		ini_set("memory_limit", "500M");
		//$var = $var."New memory_limit: ".ini_get('memory_limit')."M"."\n";
		$tamanoArchivo = 100;
		$link          = 'http://cachefly.cachefly.net/' . $tamanoArchivo . 'mb.test';
		$start         = $this->microtime_float();
		//$size = filesize($link);
		@$file = file_get_contents($link);
		$end  = $this->microtime_float();
		$time = round($end - $start, 3);
		//$size = $size / $cantBytes;
		$size  = $tamanoArchivo;
		$speed = round($size / $time, 3);
		$var   = $speed . " MB/s";// (tiempo: ".$time."s; Size:".$size."mb)";

		return $var;
	}

	private function getUltimateUser() {
		$personModel = new PersonModel($this->conexion);
		$userModel   = new UserModel($this->conexion);
		$nameUser    = $userModel->getNameUltimateUser();

		return $personModel->getPerson($nameUser);
	}

	private function insertSession($nameUser) {
		$sessionModel = new SessionModel($this->conexion);
		$personModel  = new PersonModel($this->conexion);
		$person       = $personModel->getPerson($nameUser);
		if (!empty($person)) {
			$idPerson = $person[0]['ID_PERSON'];
			$actived  = $idPerson > 0 ? TRUE : FALSE;
			$sessionModel->insertSession($idPerson, $actived);
		}
	}

	private function microtime_float() {
		list($useg, $seg) = explode(" ", microtime());

		return (float)$useg + (float)$seg;
	}
}
