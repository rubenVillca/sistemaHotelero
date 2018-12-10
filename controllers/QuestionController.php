<?php
require_once "model/PersonModel.php";
require_once "model/MessageModel.php";

class QuestionController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	/**
	 * @return View: enviar pregunta al admin desde usuario no registrado
	 */
	public function indexAction() {
		$title = 'Realizar Preguntas';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_HELP;

		$this->breadCrumbs->insertBread('', 'Ayuda');
		$this->breadCrumbs->insertBread('question/contact/', 'Preguntenos');

		return new View('questionQuestion', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact(''));
	}

	/**
	 * @return View: enviar queja
	 */
	public function complaintAction() {
		$personModel = new PersonModel($this->conexion);
		$messageModel = new MessageModel($this->conexion);

		$title = 'Registrar Reclamos';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_HELP;

		$this->breadCrumbs->insertBread('', 'Ayuda');
		$this->breadCrumbs->insertBread('help/complaints/', 'Reclamos');

		if(isset($_POST['enviar'])) {
			$complaints = $_POST['complaints'];
			$idPerson = $personModel->getPerson($this->nameUser)[0]['ID_PERSON'];
			$tittle = "Nueva Reclamo";
			$typeMesaje = 13;//quejas
			$receiver = "admin";
			$messageModel->insertMessage($idPerson, $receiver, $tittle, $complaints, $typeMesaje);
			$this->setMesaje('success', 'Mensaje enviado exitosamente');
		}

		return new View('questionComplaint', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact(''));
	}

	public function contactAction() {
		$hotelModel = new HotelModel($this->conexion);

		$title = "Contactenos";
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_HELP;

		$this->breadCrumbs->insertBread('', 'Ayuda');
		$this->breadCrumbs->insertBread('question/contact/', 'Contactenos');

		$infoHotel = $hotelModel->getInfoHotel($this->idHotel);

		return new View('questionContact', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('infoHotel'));
	}

	public function insertQuestionAction() {
		$personModel = new PersonModel($this->conexion);
		$messageModel = new MessageModel($this->conexion);

		if(isset($_POST['enviar'])) {
			$complaints = $_POST['pregunta'];
			$idPerson = $personModel->getPerson($this->nameUser)[0]['ID_PERSON'];
			$tittle = "Pregunta";
			$typeMesaje = 15;//quejas
			$receiver = Constants::$TYPE_USER_ADMIN;
			$messageModel->insertMessage($idPerson, $receiver, $tittle, $complaints, $typeMesaje);
			$this->setMesaje('success', 'Mensaje enviado exitosamente');
		}
		header('Location: '.Helper::base().'help/');

		return 'Mensaje enviado';
	}

	/**
	 * @return string: enviar una pregunta al administrador desde cliente
	 */
	public function insert_ddAction() {
		if(isset($_POST['btnSend']) || isset($_POST['enviar'])) {
			$this->sendMesaje($this->nameUser);
			$this->setMesaje('success', 'Mensaje Enviado');
			//$this->enviar();
		}
		header('Location: '.Helper::base().'help/');

		return 'Mensaje enviado exitosamente';
	}

	public function suggestionAction() {
		$personModel = new PersonModel($this->conexion);
		$messageModel = new MessageModel($this->conexion);

		$title = 'Sugerencias';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_HELP;

		$this->breadCrumbs->insertBread('', 'Ayuda');
		$this->breadCrumbs->insertBread('suggestion/', 'Sugerencias');

		if(isset($_POST['enviar'])) {
			$title = 'Sugerencias';
			$complaints = $_POST['suggestion'];
			$idPerson = $personModel->getPerson($this->nameUser)[0]['ID_PERSON'];
			$tittle = "Sugerencia";
			$typeMesaje = 11;//sugerencias
			$receiver = "admin";
			$messageModel->insertMessage($idPerson, $receiver, $tittle, $complaints, $typeMesaje);
			$this->setMesaje('success', 'Mensaje enviado exitosamente');
		}

		return new View('questionSuggestion', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact(''));
	}

	private function enviar() {
		$para = $_POST['email'];
		$asunto = $_POST['asunto'];
		$mensaje = $_POST['mensaje'];
		//Este bloque es importante
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "ssl";
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 465;
		//Nuestra cuenta
		$mail->Username = 'ponertumail@gmail.com';
		$mail->Password = '**********';
		//Agregar destinatario
		$mail->AddAddress($para);
		$mail->Subject = $asunto;
		$mail->Body = $mensaje;
		//Para adjuntar archivo
		$mail->MsgHTML($mensaje);
		//Avisar si fue enviado o no y dirigir al index
		if($mail->Send()) {
			echo '<script type="text/javascript">
                    alert("Enviado Correctamente");
                 </script>';
		}
		else {
			echo '<script type="text/javascript">
                    alert("NO ENVIADO, intentar de nuevo");
                 </script>';
		}
	}

	private function sendMesaje($nameUser) {
		$personModel = new PersonModel($this->conexion);
		$messageModel = new MessageModel($this->conexion);

		$title = isset($_POST['title']) ? $_POST['title'] : 'ocurrio un error';
		$mesajeMail = isset($_POST['message']) ? $_POST['message'] : 'ocurrio un error';
		if($nameUser == -1) {
			$name = '';
			$idPerson = '1';
			$email = $_POST['email'];
			$mesajeMail = "Enviado por: ".$name." con correo: ".$email." con el siguiente mensaje <br>".$mesajeMail;
		}
		else {
			$person = $personModel->getPerson($nameUser);
			$idPerson = $person['0']['ID_PERSON'];
		}
		$messageModel->insertMessage($idPerson, Constants::$TYPE_USER_ADMIN, $title, $mesajeMail, MessageModel::$TYPE_MESSAGE_MESSAGE);
	}
}
