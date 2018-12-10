<?php
require_once 'model/TypeModel.php';

/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 11/06/2017
 * Time: 10:33
 */
class TypeController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		header('Location: '.Helper::base().'settings/');

		return 'lista de estados de las actividades';
	}

	public function delete_ddAction($idType, $table) {
		$typeModel = new TypeModel($this->conexion);
		$typeModel->setId($idType);
		$typeModel->setNameTable($table);
		$typeModel->syncUp();
		$typeModel->setValue(-1);
		$isDelete = $typeModel->update();
		if($isDelete)
			$this->setMesaje('danger', "Tipo $table eliminado");
		else
			$this->setMesaje('danger', "No se pudo eliminar la  el tipo de $table");
		header('Location: '.Helper::base().'type/list/'.$table);

		return 'Registro exitoso';
	}

	public function deleteOfferAction($idType) {
		$typeModel = new TypeModel($this->conexion);
		$typeModel->setId($idType);
		$typeModel->setNameTable('service');
		$typeModel->syncUp();
		$typeModel->setValue(-1);
		$typeModel->update();
		header('Location: '.Helper::base().'type/listOffer/');

		return 'Registro exitoso';
	}

	public function editAction($idType, $table) {
		$title = 'Editar tipo de '.$table;

		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('type/list/'.$table.'/', 'Lista de estados');
		$this->breadCrumbs->insertBread('type/edit/'.$idType.'/'.$table, $title);

		$_SESSION['MENU'] = Constants::$MENU_SELECTED_ACTIVITY;
		if(is_numeric($idType) && $idType>0) {
			$typeModel = new TypeModel($this->conexion);
			$typeModel->setId($idType);
			$typeModel->setNameTable($table);
			$type = $typeModel->select()[0];
		}
		else {
			header('Location: '.Helper::base().'type/list/'.$table);
		}

		return new View('typeEdit', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('type', 'table'));
	}

	public function editOfferAction($idType) {
		$table = 'service';
		if(!is_numeric($idType) || $idType<1)
			header('Location: '.Helper::base().'type/listOffer/');
		$title = 'Configurar tipo de oferta';

		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('type/listOffer', 'Lista de estados');
		$this->breadCrumbs->insertBread('offer/typeEdit/'.$idType, $title);

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setId($idType);
		$typeModel->setNameTable($table);
		$type = $typeModel->select();
		if(!empty($typeModel))
			$type = $type[0];

		return new View('typeEditOffer', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('type'));
	}

	public function insertAction($table) {
		$img = Img::uploadImg('img'."/".$table."/");

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setName($_POST['nameType']);
		$typeModel->setDescription($_POST['descrType']);
		$typeModel->setValue($_POST['active']);
		$typeModel->setImage($img['urlImg']);
		$typeModel->setNameTable($table);
		$idType = $typeModel->insert();

		if($idType>0)
			$this->setMesaje('success', 'Tipo $table con '.$typeModel->getName().' insertado correctamente');
		else
			$this->setMesaje('success', $img['mesaje']);
		header('Location: '.Helper::base().'type/list/'.$table);

		return 'Registro exitoso';
	}

	public function insertOfferAction() {
		$img = Img::uploadImg('img/service/');

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setName($_POST['nameType']);
		$typeModel->setDescription($_POST['descrType']);
		$typeModel->setValue(-2);//offer
		$typeModel->setImage($img['urlImg']);
		$typeModel->setNameTable('service');
		$typeModel->insert();

		empty($img['mesaje']) ?: $this->setMesaje('warning', $img['mesaje']);
		header('Location: '.Helper::base().'type/listOffer/');

		return 'Registro exitoso';
	}

	public function listAction($table) {
		$title = 'Lista de tipos de '.$table;
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_ACTIVITY;

		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('type/list/'.$table, $title);

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable($table);
		$listType = $typeModel->select();

		return new View('typeList', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listType', 'table'));
	}

	public function listOfferAction() {
		$title = 'Lista de tipo de oferta';

		$this->breadCrumbs->insertBread('settings/', 'Configurar Sistema');
		$this->breadCrumbs->insertBread('type/listOffer/', $title);

		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('service');
		$typeModel->setValue(-2);//ofertas
		$listType = $typeModel->select();

		return new View('typeListOffer', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listType'));
	}

	public function edit_ddAction($idType, $table) {
		if(is_numeric($idType) && $idType>0) {
			$img = Img::uploadImg('img'."/".$table."/");

			$typeModel = new TypeModel($this->conexion);
			$typeModel->setId($idType);
			$typeModel->setNameTable($table);
			$typeModel->syncUp();
			$typeModel->setName($_POST['nameType']);
			$typeModel->setDescription($_POST['descrType']);
			$typeModel->setValue($_POST['active']);
			$typeModel->setImage($img['urlImg']);
			$typeModel->update();

			if($idType)
				$this->setMesaje('success', 'Tipo '.$typeModel->getName().' modificado correctamente');
			else
				$this->setMesaje('warning', $img['mesaje']);
		}
		header('Location: '.Helper::base().'type/list/'.$table);

		return 'Registro exitoso';
	}

	public function updateOfferAction($idType) {
		if(is_numeric($idType) && $idType>0) {
			$img = Img::uploadImg('img'."/service/");

			$typeModel = new TypeModel($this->conexion);
			$typeModel->setId($idType);
			$typeModel->setNameTable('service');
			$typeModel->syncUp();
			$typeModel->setName($_POST['nameType']);
			$typeModel->setDescription($_POST['descrType']);
			$typeModel->setValue(-2);//offer
			$typeModel->setImage($img['urlImg']);
			$idType = $typeModel->update();

			if($idType>0)
				$this->setMesaje('success', 'Tipo $table con '.$typeModel->getName().' insertado correctamente');
			else
				$this->setMesaje('success', $img['mesaje']);
		}
		header('Location: '.Helper::base().'type/listOffer/');

		return 'Registro exitoso';
	}
}
