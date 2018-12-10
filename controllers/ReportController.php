<?php
require_once 'model/ServiceModel.php';
require_once 'model/StatisticalModel.php';

class ReportController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		$serviceModel = new ServiceModel($this->conexion);
		$statisticalModel = new StatisticalModel($this->conexion);

		$title = 'Usuario Administrador informes';
		$this->breadCrumbs->insertBread('report/', 'Informes');
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_REPORT;
		$dateIn = isset($_POST['dateIn']) ? $_POST['dateIn'] : Helper::getLastDay(-1000);
		$dateOut = isset($_POST['dateOut']) ? $_POST['dateOut'] : Helper::getLastDay(0);
		$idService = isset($_POST['idService']) ? $_POST['idService'] : '0';
		$listService = $serviceModel->getServiceList($this->idHotel);//servicios son habitacion
		$distribution = $statisticalModel->getDistribution($dateIn, $dateOut, $idService, $this->idHotel);

		if(count($distribution)>62)
			$distribution = $statisticalModel->getDistributionMonth($dateIn, $dateOut, $idService, $this->idHotel);

		return new View('report', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('distribution', 'listService', 'typeGraphics', 'listTypeGraphics', 'idService', 'dateIn', 'dateOut'));
	}

	public function inquestAction() {
		$statisticalModel = new StatisticalModel($this->conexion);

		$title = 'Encuestas resultados';

		$this->breadCrumbs->insertBread('', 'Informes');
		$this->breadCrumbs->insertBread('report/inquest/', 'Informe de preguntas de questionarios');

		$_SESSION['MENU'] = Constants::$MENU_SELECTED_REPORT;

		$listStatisticalInquest = $statisticalModel->getStatisticalQuestion();

		return new View('reportInquest', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listStatisticalInquest'));
	}
}
