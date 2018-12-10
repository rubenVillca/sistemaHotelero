<?php
require_once 'model/ModelRoomModel.php';
require_once 'model/TypeModel.php';

/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 11/06/2017
 * Time: 10:33
 */
class TypeRoomController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		$typeRoomModel = new ModelRoomModel($this->conexion);
		$title = 'Lista de tipo de habitaci&oacute;n';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_ROOM;
		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('typeRoom/', 'Lista de tipos de habitacion');

		$listTypeRoom1 = $typeRoomModel->getListTypeRoomHab();
		$listTypeRoom2 = $typeRoomModel->getListTypeRoomAmb();
		$listType = array_merge($listTypeRoom1, $listTypeRoom2);

		return new View('roomTypeList', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listType'));
	}

	public function delete_ddAction($idType) {
		$typeRoomModel = new ModelRoomModel($this->conexion);
		if(is_numeric($idType) && $idType>0) {
			$typeRoomModel->deleteTypeRoom($idType);
		}
		header('Location: '.Helper::base().'typeRoom/');

		return 'Registro exitoso';
	}

	public function editAction($idType) {
		$typeRoomModel = new ModelRoomModel($this->conexion);
		$title = 'Editar habitaciones';

		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('typeRoom/', 'Lista de tipos de habitacion');
		$this->breadCrumbs->insertBread('typeRoom/edit/'.$idType, 'Editar tipos de habitacion');

		if(is_numeric($idType) && $idType>0) {
			$type = $typeRoomModel->getTypeRoom($idType)[0];
		}
		else {
			header('Location: '.Helper::base().'typeRoom/');
		}

		return new View('roomTypeEdit', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('type'));
	}

	public function insertAction() {
		$typeRoomModel = new ModelRoomModel($this->conexion);
		list($name, $descr, $nAdult, $nBoy, $nPet, $state, $urlImg) = $this->getPost();
		$typeRoomModel->insertTypeRoom($name, $descr, $nAdult, $nBoy, $nPet, $state, $urlImg);
		header('Location: '.Helper::base().'typeRoom/');

		return 'Registro exitoso';
	}

	public function edit_ddAction($idType) {
		$typeRoomModel = new ModelRoomModel($this->conexion);
		if(is_numeric($idType) && $idType>0) {
			list($name, $descr, $nAdult, $nBoy, $nPet, $state, $urlImg) = $this->getPost();
			$typeRoomModel->updateTypeRoom($idType, $name, $descr, $nAdult, $nBoy, $nPet, $state, $urlImg);
		}
		header('Location: '.Helper::base().'typeRoom/');

		return 'Registro exitoso';
	}

	/**
	 * @return array
	 */
	private function getPost() {
		$name = $_POST['nameTypeTable'];
		$descr = $_POST['descrType'];
		$nAdult = $_POST['nAdult'];
		$nBoy = $_POST['nBoy'];
		$nPet = 0;
		$state = $_POST['active'];
		$img = Img::uploadImg('img/room/');
		$this->setMesaje('warning', $img['mesaje']);
		$urlImg = $img['urlImg'];

		return array($name, $descr, $nAdult, $nBoy, $nPet, $state, $urlImg);
	}
}
