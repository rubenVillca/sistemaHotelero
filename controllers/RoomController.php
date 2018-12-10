<?php
require_once 'model/StateModel.php';
require_once 'model/TypeModel.php';
require_once 'model/ModelRoomModel.php';
require_once 'model/RoomModel.php';
require_once 'model/ConsumeModel.php';

class RoomController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		$roomModel = new RoomModel($this->conexion);

		$_SESSION['MENU'] = Constants::$MENU_SELECTED_ROOM;

		$title = 'Lista de habitaciones';

		$this->breadCrumbs->insertBread('settings/', 'Configurar');
		$this->breadCrumbs->insertBread('room/', 'Insertar Habitac&iacute;on');

		$listRoom = $roomModel->getListRoom($this->idHotel);
		$vars=array();
		$vars['listRoom']=$listRoom;
		return new View('roomList', $title, $this->breadCrumbs->getBreads(), $this->mesaje, $vars);
	}

	/**
	 * mostrar lista ocupacionn de habitaciones y reserca de habitaciones en un calendario
	 *
	 * @return View: calendario de actividades
	 */
	public function calendarAction() {
		$consumeModel = new ConsumeModel($this->conexion);

		$_SESSION['MENU'] = Constants::$MENU_SELECTED_ROOM;
		$title = 'Lista de habitaciones en calendario';

		$this->breadCrumbs->insertBread('settings/', 'Configurar');
		$this->breadCrumbs->insertBread('room/calendar/', $title);

		$listOcupationRoom = $consumeModel->getListOcupationRoom();

		return new View('roomCalendar', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listOcupationRoom'));
	}

	/**
	 * eliminar room
	 *
	 * @param $idRoom : id de la habitacion
	 * @return string: mensaje
	 */
	public function delete_ddAction($idRoom) {
		$roomModel = new RoomModel($this->conexion);

		if(is_numeric($idRoom) && $idRoom>0) {
			$state = -1;//estado eliminado
			$roomModel->updateStateRoom($idRoom, $state);
			$this->setMesaje('danger', 'Habitacion '.$idRoom.' Eliminada');
		}
		header('Location: '.Helper::base().'room/panel/');

		return 'Registro exitoso';
	}

	/**
	 * vista editar room
	 *
	 * @param $idRoom : codigo de identificacion de la habitacion
	 * @return View : lista de habitaciones a editar
	 */
	public function editAction($idRoom) {
		$typeRoomModel = new ModelRoomModel($this->conexion);
		$roomModel = new RoomModel($this->conexion);

		$_SESSION['MENU'] = Constants::$MENU_SELECTED_ROOM;
		$title = 'Editar habitacion';
		$room = $roomModel->getRoom($idRoom)[0];
		if(!is_numeric($idRoom) || $idRoom<1 || $room['ID_ROOM'] == '-1' || $room['STATE_ROOM']<0) {
			header('Location: '.Helper::base().'room/');
		}

		$this->breadCrumbs->insertBread('settings/', 'Configurar');
		$this->breadCrumbs->insertBread('room/panel/', 'Insertar Habitac&iacute;n');

		$listTypeRoom1 = $typeRoomModel->getListTypeRoomHab();
		$listTypeRoom2 = $typeRoomModel->getListTypeRoomAmb();

		return new View('roomEdit', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listTypeRoom1', 'listTypeRoom2', 'room'));
	}

	/**vista para insertar room**/
	public function insertAction() {
		$typeRoomModel = new ModelRoomModel($this->conexion);

		$_SESSION['MENU'] = Constants::$MENU_SELECTED_ROOM;
		$title = 'insertar nueva habitacion';

		$this->breadCrumbs->insertBread('settings/', 'Configurar');
		$this->breadCrumbs->insertBread('room/panel/', 'Insertar Habitac&iacute;on');

		$listTypeRoom1 = $typeRoomModel->getListTypeRoomHab();
		$listTypeRoom2 = $typeRoomModel->getListTypeRoomAmb();
		if(empty($listTypeRoom1) && empty($listTypeRoom2))
			$this->setMesaje('danger', "Primero debe crear los tipos de habitacioens habitaciones <a href=\"typeRoom\">Aqui</a>");

		return new View('roomInsert', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listTypeRoom1', 'listTypeRoom2'));
	}

	/**
	 * insertar un nuevo room
	 *
	 * @return string: mensaje de notficacion
	 */
	public function insert_ddAction() {
		$roomModel = new RoomModel($this->conexion);

		$room = isset($_POST['room']) ? $_POST['room'] : array();
		$urlImg = Img::uploadImg('img/room/')['urlImg'];
		$idRoom = $roomModel->insertRoom($room, $urlImg, $this->idHotel);
		if($idRoom>0) {
			$this->setMesaje('success', 'Habitacion creada');
		}
		else {
			$this->setMesaje('danger', 'No se ha podido crear una habitacion nueva, Rellene la informacion del hotel <a href="hotel/edit/">aqui</a>');
		}
		header('Location: '.Helper::base().'room/panel/');

		return 'Registro exitoso';
	}

	/**
	 * lista de habitaciones
	 *
	 * @return View: lista de habitaciones a editar
	 */
	public function panelAction() {
		$roomModel = new RoomModel($this->conexion);

		$_SESSION['MENU'] = Constants::$MENU_SELECTED_ROOM;
		$title = 'Lista de habitaciones';

		$this->breadCrumbs->insertBread('settings/', 'Configurar');
		$this->breadCrumbs->insertBread('room/panel/', 'Insertar Habitac&iacute;on');

		$listRoom = $roomModel->getListRoom($this->idHotel);

		return new View('roomPanel', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listRoom'));
	}

	/**actualizar un nuevo room*
	 *
	 * @param $idRoom : id de la habitacion
	 * @return string: mensaje
	 */
	public function edit_ddAction($idRoom) {
		$roomModel = new RoomModel($this->conexion);

		$nameRoom = isset($_POST['nameRoom']) ? $_POST['nameRoom'] : '';
		$idTypeRoom = isset($_POST['idTypeRoom']) ? $_POST['idTypeRoom'] : '-1';
		$urlImg = Img::uploadImg('img/room/')['urlImg'];
		$state = isset($_POST['state']) ? $_POST['state'] : '';
		if($nameRoom != '' && $idTypeRoom>0 && is_numeric($idRoom) && $idRoom>0) {
			$idRoom = $roomModel->updateRoom($idRoom, $nameRoom, $this->idHotel, $idTypeRoom, $urlImg, $state);
			if($idRoom>0) {
				$this->setMesaje('success', 'Habitacion creada');
			}
			header('Location: '.Helper::base().'room/panel/');
		}

		return 'Registro exitoso';
	}
}
