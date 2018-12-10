<?php
require_once 'model/UserModel.php';
require_once 'model/MessageModel.php';

class MessagesController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		return $this->showAction(0, 0, 1);
	}

	public function insertAction() {
		$this->breadCrumbs->insertBread("messages/", 'Mensajes');
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_HOME;
		$userModel        = new UserModel($this->conexion);
		$title            = 'Enviar mensaje';

		$listUser  = $userModel->getListNameUser();
		$typeModel = new TypeModel($this->conexion);
		$typeModel->setNameTable('message');
		$listTypeMessage = $typeModel->select();

		$messageModel = new MessageModel($this->conexion);
		$m1           = $messageModel->getListMessages($this->nameUser, 1);
		$m2           = $messageModel->getListMessages($this->nameUser, 2);
		$m3           = $messageModel->getListMessages($this->nameUser, 3);
		$m4           = $messageModel->getListMessages($this->nameUser, 4);
		$m5           = $messageModel->getListMessages($this->nameUser, 5);
		$m6           = $messageModel->getListMessages($this->nameUser, 6);
		$m7           = $messageModel->getListMessages($this->nameUser, 7);
		$m8           = $messageModel->getListMessages($this->nameUser, 8);
		$m9           = $messageModel->getListMessages($this->nameUser, 9);
		$m10          = $messageModel->getListMessages($this->nameUser, 10);
		$m11          = $messageModel->getListMessages($this->nameUser, 11);
		$m12          = $messageModel->getListMessages($this->nameUser, 12);
		$m13          = $messageModel->getListMessages($this->nameUser, 13);
		$m14          = $messageModel->getListMessages($this->nameUser, 14);
		$m15          = $messageModel->getListMessages($this->nameUser, 15);
		//cantidad de mensajes de cada tipo
		$typeMesaje1 = count($m4) + count($m5); //alertas
		$typeMesaje2 = count($m8) + count($m14); //registro usuario
		$typeMesaje3 = count($m2) + count($m3); //registro clientes ckeck in y chek out
		$typeMesaje4 = count($m6) + count($m7) + count($m9); //reservs
		$typeMesaje5 = count($m11); //sugerencias
		$typeMesaje6 = count($m13); //quejas
		$typeMesaje7 = count($m1); //mensajes
		$typeMesaje8 = count($m12) + count($m10); //recordatorios
		$typeMesaje9 = count($m15);
		$menuType='0';
		return new View('message_insert', $title, $this->breadCrumbs->getBreads(), $this->mesaje,
		                compact('listUser',
		                        'listTypeMessage',
		                        'menuType',
		                        'tittle',
		                        'nButtonToolBar',
	                              'typeMesaje1',
	                              'typeMesaje2',
	                              'typeMesaje3',
	                              'typeMesaje4',
	                              'typeMesaje5',
	                              'typeMesaje6',
	                              'typeMesaje7',
	                              'typeMesaje8',
	                              'typeMesaje9', 'stateMesaje', 'idMesaje', 'menuMesajes', 'idListMesaje', 'message'));
	}

	public function insert_ddAction() {
		$messageModel = new MessageModel($this->conexion);

		if (isset($_POST['enviar'])) {
			$userModel        = new UserModel($this->conexion);
			$nameUserReceptor = isset($_POST['idPersonReceptor']) ? $_POST['idPersonReceptor'] : 0;
			$user             = $userModel->getLogin($nameUserReceptor);
			$idPersonRecive   = empty($user) ? 0 : $user[0]['ID_PERSON'];
			$asunto           = isset($_POST['asunto']) ? $_POST['asunto'] : '';
			$mensaje          = isset($_POST['mensaje']) ? $_POST['mensaje'] : '';
			$this->setMesaje('success', 'Mensaje Enviado');
			$messageModel->insertMessage($_SESSION['ID_PERSON'], $idPersonRecive, $asunto, $mensaje, 1);
		}
		header('Location: ' . Helper::base() . 'messages/');

		return 'Registro exitoso';
	}

	public function showAction($menuType, $idMessage, $idListMesaje) {
		$messageModel = new MessageModel($this->conexion);

		if ($idListMesaje < 1)
			$idListMesaje = 1;
		$title            = 'Mensajes';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_HOME;

		$this->breadCrumbs->insertBread("messages/", 'Mensajes');
		$messageModel->updateMessageWatch($idMessage, 0);
		//obtener mensajes por tipo
		$m1  = $messageModel->getListMessages($this->nameUser, 1);
		$m2  = $messageModel->getListMessages($this->nameUser, 2);
		$m3  = $messageModel->getListMessages($this->nameUser, 3);
		$m4  = $messageModel->getListMessages($this->nameUser, 4);
		$m5  = $messageModel->getListMessages($this->nameUser, 5);
		$m6  = $messageModel->getListMessages($this->nameUser, 6);
		$m7  = $messageModel->getListMessages($this->nameUser, 7);
		$m8  = $messageModel->getListMessages($this->nameUser, 8);
		$m9  = $messageModel->getListMessages($this->nameUser, 9);
		$m10 = $messageModel->getListMessages($this->nameUser, 10);
		$m11 = $messageModel->getListMessages($this->nameUser, 11);
		$m12 = $messageModel->getListMessages($this->nameUser, 12);
		$m13 = $messageModel->getListMessages($this->nameUser, 13);
		$m14 = $messageModel->getListMessages($this->nameUser, 14);
		$m15 = $messageModel->getListMessages($this->nameUser, 15);
		//cantidad de mensajes de cada tipo
		$typeMesaje1 = count($m4) + count($m5); //alertas
		$typeMesaje2 = count($m8) + count($m14); //registro usuario
		$typeMesaje3 = count($m2) + count($m3); //registro clientes ckeck in y chek out
		$typeMesaje4 = count($m6) + count($m7) + count($m9); //reservs
		$typeMesaje5 = count($m11); //sugerencias
		$typeMesaje6 = count($m13); //quejas
		$typeMesaje7 = count($m1); //mensajes
		$typeMesaje8 = count($m12) + count($m10); //recordatorios
		$typeMesaje9 = count($m15);
		if ($menuType < 1)
			$menuType = 3;
		switch ($menuType) {
			case 1:
				$nButtonToolBar = array_merge($m4, $m5);
				$menuMesajes    = $this->getMenuMessages($nButtonToolBar, $idListMesaje);
				$tittle         = 'Alertas';
				break;
			case 2:
				$nButtonToolBar = array_merge($m8, $m14);
				$menuMesajes    = $this->getMenuMessages($nButtonToolBar, $idListMesaje);
				$tittle         = 'Registro de usuarios';
				break;
			case 3:
				$nButtonToolBar = array_merge($m2, $m3);
				$menuMesajes    = $this->getMenuMessages($nButtonToolBar, $idListMesaje);
				$tittle         = 'Registro de clientes';
				break;
			case 4:
				$nButtonToolBar = array_merge($m6, $m7, $m9);
				$menuMesajes    = $this->getMenuMessages($nButtonToolBar, $idListMesaje);
				$tittle         = 'Reservas';
				break;
			case 5:
				$nButtonToolBar = $m11;
				$menuMesajes    = $this->getMenuMessages($nButtonToolBar, $idListMesaje);
				$tittle         = 'Sugerencias';
				break;
			case 6:
				$nButtonToolBar = $m13;
				$menuMesajes    = $this->getMenuMessages($nButtonToolBar, $idListMesaje);
				$tittle         = 'Quejas';
				break;
			case 7:
				$nButtonToolBar = $m1;
				$menuMesajes    = $this->getMenuMessages($nButtonToolBar, $idListMesaje);
				$tittle         = 'Mensajes';
				break;
			case 8:
				$nButtonToolBar = array_merge($m12, $m10);
				$menuMesajes    = $this->getMenuMessages($nButtonToolBar, $idListMesaje);
				$tittle         = 'Recordatorios';
				break;
			case 9:
				$nButtonToolBar = $m15;
				$menuMesajes    = $this->getMenuMessages($nButtonToolBar, $idListMesaje);
				$tittle         = 'Preguntas de los Usuarios';
				break;
			default:
				$nButtonToolBar = array_merge($m2, $m3);
				$menuMesajes    = $this->getMenuMessages($nButtonToolBar, $idListMesaje);
				$tittle         = 'Clientes registrados';
				$menuType       = '3';
				break;
		}
		$message = array();
		if ($idMessage > 0) {//mostrar el mensaje seleccionado
			foreach ($nButtonToolBar as $item) {//obtener el contenido del mensaje seleccionado
				if ($item['ID_MESSAGE'] == $idMessage) {
					$message = $item;
					break;
				}
			}
		}
		//$menuType = 0;
		return new View('message_show', $title, $this->breadCrumbs->getBreads(), $this->mesaje,
		                compact('menuType', 'tittle', 'nButtonToolBar',
		                        'typeMesaje1',
		                        'typeMesaje2',
		                        'typeMesaje3',
		                        'typeMesaje4',
		                        'typeMesaje5',
		                        'typeMesaje6',
		                        'typeMesaje7',
		                        'typeMesaje8',
		                        'typeMesaje9',
		                        'stateMesaje',
		                        'idMesaje',
		                        'menuMesajes',
		                        'idListMesaje',
		                        'message'));
	}

	/**obtener lista de mensajes a mostrar en el menu a mostrar
	 * @param $listMesajes
	 * @param $idListMesaje
	 * @return array
	 */
	private function getMenuMessages($listMesajes, $idListMesaje) {
		$res = array();
		if (sizeof($listMesajes) > 0) {
			$min = ($idListMesaje - 1) * 10;
			$max = ($idListMesaje) * 10;
			if ($max > sizeof($listMesajes)) {
				$max = sizeof($listMesajes);
			}
			for ($i = $min; $i < $max; $i++) {
				$res[] = $listMesajes[$i];
			}
		}

		return $res;
	}
}
