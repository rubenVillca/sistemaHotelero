<?php
require_once 'model/RuleModel.php';

class RuleController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		$ruleModel = new RuleModel($this->conexion);
		$title = 'Lista de reglas';

		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('rule/', 'Lista de reglas');

		$listRule = $ruleModel->getListRule($this->idHotel);

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('rule');
		$listType = $typeModel->select();

		return new View('ruleList', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listRule', 'listType'));
	}

	public function delete_ddAction($nameRule) {
		$ruleModel = new RuleModel($this->conexion);
		if($nameRule != '') {
			$ruleModel->updateStateRule($this->idHotel, $nameRule);
		}
		header('Location: '.Helper::base().'rule/');

		return 'Registro exitoso';
	}

	public function insert_ddAction() {
		$ruleModel = new RuleModel($this->conexion);
		$nameRule = isset($_POST['name']) ? $_POST['name'] : '';
		$idTypeRule = isset($_POST['idType']) ? $_POST['idType'] : '-1';
		$descrRule = isset($_POST['descr']) ? $_POST['descr'] : '';
		$stateRule = isset($_POST['state']) ? $_POST['state'] : 0;
		if($nameRule != '' && $idTypeRule>0 && $descrRule != '') {
			$ruleModel->insertRule($this->idHotel, $nameRule, $idTypeRule, $descrRule, $stateRule);
			$this->setMesaje('success', 'Se ha insertado una nueva regla');
		}
		header('Location: '.Helper::base().'rule/');

		return 'Registro exitoso';
	}

	public function edit_ddAction($nameLast) {
		$ruleModel = new RuleModel($this->conexion);

		$nameRule = isset($_POST['name']) ? $_POST['name'] : '';
		$idTypeRule = isset($_POST['idType']) ? $_POST['idType'] : '-1';
		$descrRule = isset($_POST['descr']) ? $_POST['descr'] : '';
		$stateRule = isset($_POST['state']) ? $_POST['state'] : 0;
		if($nameRule != '' && $idTypeRule>0 && $descrRule != '') {
			$ruleModel->updateRule($nameLast, $this->idHotel, $nameRule, $idTypeRule, $descrRule, $stateRule);
		}
		header('Location: '.Helper::base().'rule/');

		return 'Registro exitoso';
	}
}