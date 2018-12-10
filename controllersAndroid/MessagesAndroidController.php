<?php
require_once "model/MessageModel.php";

/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 14/05/2017
 * Time: 21:07
 */
class MessagesAndroidController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		$idPerson = isset($_POST['idPerson']) ? $_POST['idPerson'] : 1;
		$messages = $this->getMessages($idPerson);
		$dataAndroid = compact('messages');
		header('Content-Type: application/json');

		return json_encode($dataAndroid, JSON_PRETTY_PRINT);
	}

	private function getMessages($idPerson) {
		$message = new MessageModel($this);
		$listMessages = $message->getListMessagesAll($idPerson);

		return $listMessages;
	}
}