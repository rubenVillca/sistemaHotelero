<?php
require_once 'model/UserModel.php';
require_once 'util/Phpmailer.php';

class MessageModel extends Consultas {
	public static $TYPE_MESSAGE_MESSAGE = "1";
	public static $TYPE_MESSAGE_CHECK_IN = "2";
	public static $TYPE_MESSAGE_CHECK_OUT = "3";
	public static $TYPE_MESSAGE_ALERT = "4";
	public static $TYPE_MESSAGE_ALERT_IMPORTANT = "5";
	public static $TYPE_MESSAGE_NOTIFY = "6";
	public static $TYPE_MESSAGE_RESERVE_CONFIRM = "7";
	public static $TYPE_MESSAGE_USER_NEW = "8";
	public static $TYPE_MESSAGE_ALERT_RESERVE = "9";
	public static $TYPE_MESSAGE_OBSERVE = "10";
	public static $TYPE_MESSAGE_SUGGESTION = "11";
	public static $TYPE_MESSAGE_NOTE = "12";
	public static $TYPE_MESSAGE_COMPLAINTS = "13";
	public static $TYPE_MESSAGE_USER_NEW_FREE = "14";
	public static $TYPE_MESSAGE_RESPONSE_QUESTION = "15";
	public static $TYPE_MESSAGE_CHAT = "16";
	private $userModel;

	public function __construct($conexion) {
		parent::__construct($conexion);
		$this->userModel = new UserModel($this->conexion);
	}

	//************************************************************************************************** MESAJES **/
	public function getListMessages($nameUser, $idType) {
		$query = "SELECT *
					FROM
						message AS m,
						user_name AS u,
						type_message AS t
					WHERE
						u.NAME_USER = '$nameUser'
					AND u.ID_PERSON = m.RECEIVER_MESSAGE
					AND m.ID_TYPE_MESSAGE = t.ID_TYPE_MESSAGE
					AND t.ID_TYPE_MESSAGE= $idType
					AND m.STATE_MESSAGE<>-1
					ORDER BY
						m.ID_MESSAGE DESC;";
		$resQuery = $this->conexion->consultar($query);

		return $resQuery;
	}

	public function getListMessagesChat($nameUserReception, $nameserSender, $idType) {
		$query = "SELECT m.*,t.*,u1.*,p.*
					FROM
						message AS m
						INNER JOIN type_message AS t ON m.ID_TYPE_MESSAGE = t.ID_TYPE_MESSAGE
						INNER JOIN user_name as u1 ON u1.ID_PERSON=m.SENDER_MESSAGE
						INNER JOIN user_name as u2 ON u2.ID_PERSON=m.RECEIVER_MESSAGE
						INNER JOIN person as p ON m.SENDER_MESSAGE=p.ID_PERSON
					WHERE
						t.ID_TYPE_MESSAGE= $idType
					AND m.STATE_MESSAGE<>-1
					GROUP BY m.ID_MESSAGE
					ORDER BY m.ID_MESSAGE DESC
					LIMIT 100;";
		$resQuery = $this->conexion->consultar($query);

		return $resQuery;
	}

	public function getListMessagesNoWatch($idUser, $idType) {
		$query = "SELECT
                    COUNT(m.ID_TYPE_MESSAGE) as TOTAL
                FROM
                    message m,
                    user_name u,
                    type_message t
                WHERE
                    u.NAME_USER = '$idUser'
                AND u.ID_PERSON = m.RECEIVER_MESSAGE
                AND m.ID_TYPE_MESSAGE = t.ID_TYPE_MESSAGE
                AND t.ID_TYPE_MESSAGE = '$idType'
                AND m.STATE_MESSAGE = 1
                ORDER BY
                    m.DATE_MESSAGE DESC;";
		$resQuery = $this->conexion->consultar($query);

		return $resQuery;
	}

	public function insertMessage($sender, $receiver, $tittle, $container, $typeMesaje) {
		$res = '-1';
		$idPersonReciver = array();
		if($receiver == 'admin') {//obtener administradores y eviar a todos ellos
			$admins = $this->userModel->getListIdUser('1');
			foreach($admins as $admin) {
				$query = "INSERT INTO message(ID_MESSAGE, SENDER_MESSAGE, RECEIVER_MESSAGE, ID_TYPE_MESSAGE, DATE_MESSAGE, TIME_MESSAGE, STATE_MESSAGE, TITTLE_MESSAGE, CONTAINER_MESSAGE, IMAGE_MESSAGE)
 							VALUES(DEFAULT,'$sender',$admin[ID_PERSON],'$typeMesaje',CURDATE(),CURTIME(),1,'$tittle','$container',NULL)";
				$res = $this->conexion->insert($query);
				$idPersonReciver[] = $admin['ID_PERSON'];
			}
		}
		elseif($receiver == 'recepcion') {//obtener administradores y eviar a todos ellos
			$receps = $this->userModel->getListIdUser('2');
			foreach(is_array($receps) ? $receps : [] as $recep) {
				$query = "INSERT INTO message VALUES(DEFAULT,'$sender','$recep[ID_PERSON]','$typeMesaje',CURDATE(),CURTIME(),1,'$tittle','$container',NULL)";
				$res = $this->conexion->insert($query);
				$idPersonReciver[] = $recep['ID_PERSON'];
			}
		}
		elseif($receiver >0) {
			$query = "INSERT INTO message VALUES(DEFAULT,'$sender','$receiver','$typeMesaje',CURDATE(),CURTIME(),1,'$tittle','$container',NULL)";
			$res = $this->conexion->insert($query);
			$idPersonReciver[] = $receiver;
		}

		//$this->insert_dd($idPersonReciver,$tittle,$container);//enviar a correo electronico el mensaje
		return $res;
	}

	public function updateMessageWatch($idMesaje, $state) {
		$query = "UPDATE message SET state_message='$state' WHERE ID_MESSAGE='$idMesaje'";
		$this->conexion->update($query);
	}

	/**
	 * obtener la lista de todos los mensajes recibidos del usuario con $idPerson
	 *
	 * @param $idPerson : identificador unico del usuario
	 * @return array: lista de mesajes recividos al usuario idPerson
	 */
	public function getListMessagesAll($idPerson) {
		$query = "SELECT
                        m.*, p.*,t.*
                    FROM
                        message AS m
                    INNER JOIN user_hotel AS u ON m.RECEIVER_MESSAGE = u.ID_PERSON
                    INNER JOIN person AS p ON p.ID_PERSON = u.ID_PERSON
                    INNER JOIN type_message t ON m.ID_TYPE_MESSAGE = t.ID_TYPE_MESSAGE
                    WHERE
                        m.RECEIVER_MESSAGE = '$idPerson'
                    GROUP BY m.ID_MESSAGE
                    ORDER BY m.ID_MESSAGE DESC ";

		return $this->conexion->consultar($query);
	}

	/**
	 * enviar mnesaje al servidor de correos elecotrinicos
	 *
	 * @param $listIdPerson
	 * @param $title : typo de mensaje
	 * @param $mesaje : contenido del mansaje
	 * @return string $res: mensaje
	 * @internal param $email : email del receptor
	 * @throws phpmailerException
	 */
	private function insert_dd($listIdPerson, $title, $mesaje) {
		$res = '';
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->CharSet = "UTF-8";
		$mail->SMTPSecure = 'tls';
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 587;
		$mail->Username = 'user.nuevo.kamisama.911@gmail.com';
		$mail->Password = 'password918-.-';
		$mail->SMTPAuth = true;
		$mail->From = 'user.nuevo.kamisama.911@gmail.com';
		$mail->FromName = 'sistema hotelero';
		foreach($listIdPerson as $idPerson) {
			$emailReception = $this->userModel->getEmailUser($idPerson);
			if(!empty($emailReception)) {
				$email = $emailReception[0]['EMAIL_PERSON'];
				$mail->AddAddress($email);
				$mail->AddReplyTo($email, 'Information');
				$mail->IsHTML(true);
				$mail->Subject = $title;
				$mail->AltBody = "To view the message, please use an HTML compatible email viewer!";
				$mail->Body = $mesaje;
				if(!$mail->Send()) {
					$res = "Mailer Error: ".$mail->ErrorInfo;
				}
				else {
					$res = "Message sent!";
				}
			}
		}

		return $res;
	}
}