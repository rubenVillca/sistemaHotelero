<?php
require_once 'model/MessageModel.php';
require_once 'model/PersonModel.php';

/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 20/08/2017
 * Time: 2:54
 */
class ChatController extends Controller {
	private $messageModel;
	private $personModel;

	public function __construct() {
		parent::__construct();
		$this->messageModel = new MessageModel($this->conexion);
		$this->personModel = new PersonModel($this->conexion);
	}

	public function indexAction() {
		$title = 'Ver lista de usuario';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_HOME;
		$this->breadCrumbs->insertBread('', 'Usuario');
		$this->breadCrumbs->insertBread('chat/', 'Conversar con ...');

		$listPerson0 = $this->personModel->getListPersonRol(1);//admin
		$listPerson1 = $this->personModel->getListPersonRol(2);//recepcion
		$listPerson2 = $this->personModel->getListPersonRol(4);//cliente
		$listPerson3 = $this->personModel->getListPersonRol(5);//cocina
		$listPerson4 = $this->personModel->getListPersonRol(3);//servicios
		$listPerson = array_merge(array(), $listPerson0, $listPerson1, $listPerson2, $listPerson3, $listPerson4);

		return new View('chatList', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listPerson'));
	}

	/**
	 * insertar mensajes de lchat en la base de datos
	 *
	 * @param $nameUser : usuario con quien se esta chateando
	 * @return string
	 */
	public function insertAction($nameUser) {
		$message = isset($_POST['message']) ? $_POST['message'] : '';
		//$idPersonReceiver = $this->personModel->getPerson($nameUser)[0]['ID_PERSON'];
		$this->messageModel->insertMessage($_SESSION['ID_PERSON'], $_SESSION['ID_PERSON'], 'chat', $message, MessageModel::$TYPE_MESSAGE_CHAT);

		return "mensaje registrado";
	}

	/**
	 * @param $nameUser :nombre de usuario con quien se esta chateando
	 * @return View: vista de chat
	 */
	public function profileAction($nameUser) {
		$title = "Conversar con ".$nameUser;
		$this->breadCrumbs->insertBread('chat/', 'Conversar');
		$this->breadCrumbs->insertBread('chat/user/'.$nameUser, $title);

		return new View('chatShow', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('nameUser'));
	}

	/**
	 * cargar lista de mensajes del chat con el usuario $nameUser
	 *
	 * @param $nameUser : nombre de usuario
	 * @return string: lista de mensajes en formato json
	 */
	public function insert_ddAction($nameUser) {
		$listMessage = $this->messageModel->getListMessagesChat($nameUser, $_SESSION['NAME_USER'], MessageModel::$TYPE_MESSAGE_CHAT);
		$messages = '';
		foreach($listMessage as $message) {
			$name=empty($message['EMAIL_PERSON'])?$message['NAME_USER']:$message['EMAIL_PERSON'];

			$messages = "<p><b>".$name."</b>:<br> ".$message['CONTAINER_MESSAGE']."</p>".$messages;
		}

		return $messages;
	}
}
