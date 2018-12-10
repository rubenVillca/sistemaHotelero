<?php
require_once 'model/StateModel.php';

/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 11/06/2017
 * Time: 10:24
 */
class StateController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		header('Location: '.Helper::base().'settings/');

		return 'lista de estados de las actividades';
	}

	public function delete_ddAction($idState, $table) {
		if(is_numeric($idState) && $idState>0) {
			$stateModel = new StateModel($this->conexion);
			$stateModel->setId($idState);
			$stateModel->setNameTable($table);
			$stateModel->syncUp();
			$stateModel->setValue(-1);

			if($stateModel->update())
				$this->setMesaje('success', 'Se ha eliminado un elemento de la tabla '.$table.' con id='.$idState);
			else
				$this->setMesaje('danger', 'No se puedo eliminar el elemento de la tabla '.$table.' y con id '.$idState);
		}
		header('Location: '.Helper::base().'state/list/'.$table);

		return 'Registro exitoso';
	}

	public function insertAction($table) {
		$stateModel = new StateModel($this->conexion);
		$stateModel->setName($_POST['nameState']);
		$stateModel->setDescription($_POST['descrState']);
		$stateModel->setValue($_POST['active']);
		$stateModel->setNameTable($table);

		if($stateModel->insert())
			$this->setMesaje('success', 'Ha insertado un nuevo el estado '.$table.' con el nombre '.$stateModel->getName());
		else
			$this->setMesaje('warning', 'No se ha podido insertar el estado '.$stateModel->getName());
		header('Location: '.Helper::base().'state/list/'.$table);

		return 'Registro exitoso';
	}

	public function listAction($table) {
		$title = 'Lista de estados de '.$table;

		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('state/list/'.ucwords($table).'/', 'Lista de estados');

		$stateModel = new StateModel($this->conexion);
		$stateModel->setNameTable($table);
		$listState = $stateModel->select();

		return new View('stateList', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listState', 'table'));
	}

	public function edit_ddAction($idState, $table) {
		if(is_numeric($idState) && $idState>0) {
			$stateModel = new StateModel($this->conexion);
			$stateModel->setId($idState);
			$stateModel->setNameTable($table);
			$stateModel->syncUp();
			$stateModel->setName($_POST['nameState']);
			$stateModel->setDescription($_POST['descrState']);
			$stateModel->setValue($_POST['active']);

			if($stateModel->update())
				$this->setMesaje('success', 'Ha modificado el estado '.$stateModel->getName());
			else
				$this->setMesaje('warning', 'No se ha podido modificar el estado '.$stateModel->getName());
		}
		header('Location: '.Helper::base().'state/list/'.$table);

		return 'Registro exitoso';
	}
}
