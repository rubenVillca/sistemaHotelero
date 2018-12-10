<?php

class UserModel extends Consultas {
	//***************************************************************************************************** USER **/
	public function getLogin($nameUser) {
		$question = "SELECT *
                    FROM
                        user_hotel as u,
                        user_name as n,
                        user_rol as ur,
                        rol as r,
                        state_user as s
                    WHERE
                        n.NAME_USER = '$nameUser'
                    AND n.ID_PERSON = u.ID_PERSON
                    AND u.ID_PERSON = ur.ID_PERSON
                    AND ur.ID_ROL = r.ID_ROL
                    AND u.ID_STATE_USER = s.ID_STATE_USER";

		return $this->conexion->consultar($question);
	}

	public function getEmailUser($id_person) {
		$question = " SELECT p.EMAIL_PERSON
                        FROM person p
                        WHERE p.ID_PERSON = '$id_person'";

		return $this->conexion->consultar($question);
	}

	//************************************************************************************************* USER ROL **/
	public function getListRolUser() {
		$query = "SELECT * FROM rol";

		return $this->conexion->consultar($query);
	}

	public function insertUserName($id, $email, $stateUser) {
		if (!empty($email)) {
			$query5 = "INSERT INTO user_name VALUES ('$id','$email','$stateUser',curdate(),curtime());";
			return $this->conexion->insert($query5);
		}else
			return -1;
	}

	public function updateRol($idPerson, $idRol) {
		if($idRol > 0) {
			$query0 = "UPDATE user_rol SET ID_ROL='$idRol',DATE_CREATED_ROL=curdate(),TIME_CREATED_ROL=curtime() WHERE ID_PERSON='$idPerson'";
			$this->conexion->update($query0);
		}
	}

	public function deleteUserName($id,$name){
		$query="DELETE FROM user_name where ID_PERSON='$id' and NAME_USER='$name'";
		$this->conexion->delete($query);
	}

	//************************************************************************************************ USER NAME **/
	public function getNameUser($idPerson) {
		$question = "SELECT * 
                        FROM
                            user_name u,
                            person p
                        WHERE
                            u.ID_PERSON='$idPerson'
                        AND
                            u.ID_PERSON = p.ID_PERSON";

		return $this->conexion->consultar($question);
	}

	public function getTotalUser() {
		$query = "SELECT
						COUNT(*) AS TOTAL
					FROM
						user_hotel AS u,
						state_user AS s
					WHERE
						u.ID_STATE_USER = s.ID_STATE_USER
					AND s.VALUE_STATE_USER > 0";
		$total = $this->conexion->consultar($query);

		return !empty($total) ? $total[0]['TOTAL'] : 0;
	}

	public function getTotalUserToday() {
		$query = "SELECT
						Count(DISTINCT u.ID_PERSON) AS TOTAL
					FROM
						user_hotel AS u
					INNER JOIN user_name AS n ON n.ID_PERSON = u.ID_PERSON
					INNER JOIN state_user AS s ON u.ID_STATE_USER = s.ID_STATE_USER
					WHERE
						s.VALUE_STATE_USER > 0
					AND n.DATE_REGISTER_NAME_USER = CURDATE()";
		$total = $this->conexion->consultar($query);

		return !empty($total) ? $total[0]['TOTAL'] : 0;
	}

	public function getNameUltimateUser() {
		$query = "SELECT
						u1.NAME_USER
					FROM
						user_name AS u1,
						(
							SELECT
								MAX(u.ID_PERSON) AS id
							FROM
								user_name AS u
							WHERE
								u.ACTIVE_USER > 0
						) AS u2
					WHERE
						u1.ID_PERSON = u2.id";
		$total = $this->conexion->consultar($query);

		return !empty($total) ? $total[0]['NAME_USER'] : 0;
	}

	public function getTotalUserSex() {
		$query = "SELECT
						p.SEX_PERSON,
						COUNT(DISTINCT p.ID_PERSON) AS TOTAL
					FROM
						person AS p
					INNER JOIN user_hotel AS u ON u.ID_PERSON = p.ID_PERSON
					INNER JOIN user_name AS n ON n.ID_PERSON = u.ID_PERSON
					GROUP BY p.SEX_PERSON";
		$list = $this->conexion->consultar($query);
		$res = [];
		if(!empty($list)) {
			foreach($list as $item) {
				$aux = ['SEX_PERSON' => $item['SEX_PERSON'], 'TOTAL' => "$item[TOTAL]"];
				array_push($res, $aux);
			}
			if(count($list) == 1) {
				$aux = ['SEX_PERSON' => !$res[0]['SEX_PERSON'], 'TOTAL' => "0"];
				array_push($res, $aux);
			}
		}
		else {
			$aux = ['SEX_PERSON' => '0', 'TOTAL' => "0"];
			array_push($res, $aux);
			$aux = ['SEX_PERSON' => '1', 'TOTAL' => "0"];
			array_push($res, $aux);
		}

		return $res;
	}

	//***************************************************************************************************** USER **/
	public function getListIdUser($idTypeUser) {
		$query = "SELECT    DISTINCT(u.ID_PERSON), u.NAME_USER
                FROM     user_name u, user_rol r
                WHERE    u.ID_PERSON = r.ID_PERSON  AND r.ID_ROL = '$idTypeUser'";

		return $this->conexion->consultar($query);
	}

	public function existTypeUser($typeUser) {
		$query = "SELECT u.*
					FROM
						user_hotel AS u,
						rol AS r,
						user_rol AS ur,
						user_name AS n,
						state_user AS s
					WHERE
						u.ID_PERSON = n.ID_PERSON
					AND u.ID_PERSON = ur.ID_PERSON
					AND ur.ID_ROL = r.ID_ROL
					AND u.ID_STATE_USER = s.ID_STATE_USER
					AND s.VALUE_STATE_USER > 0
					AND n.ACTIVE_USER > 0 
					AND r.ID_ROL=$typeUser";
		$res = $this->conexion->consultar($query);
		if(!empty($res))
			return 1;
		else
			return 0;
	}

	public function insertUserRol($idPerson, $idRol) {
		$query5 = "INSERT INTO user_rol VALUES ('$idPerson','$idRol',curdate(),curtime());";
		$this->conexion->insert($query5);
	}

	public function updatePassUser($idPersonHuesp, $pass) {
		//$pass = password_hash($pass, PASSWORD_DEFAULT);//encriptar contrasena
		$query0 = "UPDATE user_hotel as u SET u.PASSWORD='$pass'  WHERE id_person='$idPersonHuesp'";
		$this->conexion->update($query0);
	}

	public function getListNameUser() {
		$query0 = "SELECT * FROM user_name WHERE user_name.ACTIVE_USER>0";

		return $this->conexion->consultar($query0);
	}

	public function getRolUser($idRol) {
		$query = "SELECT * FROM rol WHERE ID_ROL='$idRol'";

		return $this->conexion->consultar($query);
	}

	public function insertUser($idPerson, $password, $state) {
		$query = "INSERT INTO user_hotel VALUES ('$idPerson','$password','$state');";
		return $this->conexion->insert($query);
	}

	public function updateUserName($id, $email, $stateUser) {
		$this->deleteUserName($id,$email);
		$this->insertUserName($id,$email,$stateUser);
	}
}
