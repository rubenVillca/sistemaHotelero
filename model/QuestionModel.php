<?php

class QuestionModel extends Consultas {
	//************************************************************************************************ QUESTIONS **/
	public function getQuestion($idInquest) {
		return $this->getQuestions($idInquest, 0);
	}

	public function getQuestionActive($idInquest) {
		return $this->getQuestions($idInquest, 1);
	}

	/**
	 * @param $idInquest : numero de encuesta
	 * @param $idPerson : persona q lleno la encuesta
	 * @return array: lista de preguntas q lleno el usuario
	 */
	public function getQuestionFillUser($idInquest, $idPerson) {
		$query = "SELECT *
                FROM
                    question AS q
                LEFT JOIN response AS r ON q.ID_QUESTION = r.ID_QUESTION
                INNER JOIN inquest AS i ON i.ID_INQUEST = q.ID_INQUEST
                WHERE 
                	q.ID_INQUEST='$idInquest' AND r.ID_PERSON='$idPerson'";
		$res = $this->conexion->consultar($query);
		if(empty($res)) {
			$res = $this->getQuestionActive($idInquest);
		}

		return $res;
	}

	public function getQuestions($idInquest, $active) {
		$query = "SELECT *
                FROM question as q
                INNER JOIN inquest AS i ON i.ID_INQUEST = q.ID_INQUEST
                WHERE q.ID_INQUEST = '$idInquest' AND q.ACTIVE_QUESTION >='$active'";

		return $this->conexion->consultar($query);
	}

	public function getQuestionResponseActive($idQuestion) {
		return $this->getQuestionResponses($idQuestion, 1);
	}

	public function getQuestionResponse($idQuestion) {
		return $this->getQuestionResponses($idQuestion, 1);
	}

	public function getQuestionResponses($idQuestion, $active) {
		$query = "SELECT *
                FROM
                    inquest i
                    INNER JOIN question as q ON i.ID_INQUEST = q.ID_INQUEST
                    INNER JOIN response as r ON q.ID_QUESTION = r.ID_QUESTION
                    INNER JOIN user_hotel as u ON i.ID_PERSON = u.ID_PERSON
                    INNER JOIN user_name as n ON u.ID_PERSON = n.ID_PERSON
                    INNER JOIN person as p ON u.ID_PERSON = p.ID_PERSON
                WHERE
                    q.ID_QUESTION = '$idQuestion'
                AND q.ACTIVE_QUESTION >='$active' 
                GROUP BY r.ID_QUESTION";

		return $this->conexion->consultar($query);
	}

	public function deleteQuestion($idInquest, $idQuestion, $state) {
		$query = "UPDATE question SET ACTIVE_QUESTION='$state' WHERE ID_INQUEST='$idInquest' AND ID_QUESTION='$idQuestion'";
		$this->conexion->update($query);
	}

	public function insertQuestionFrequently($preg, $resp, $idPerson, $stateQuestion) {
		$query0 = "SELECT ID_INQUEST FROM inquest WHERE ID_STATE_INQUEST=5";
		$idInquest = $this->conexion->consultar($query0);
		if(!empty($idInquest)) {
			$idInquest = $idInquest[0]['ID_INQUEST'];
		}
		else {
			$idInquest = $this->insertInquest($idPerson, 5, 'Preguntas frecuentes', 'Preguntas realizadas por los clientes', date('Y-m-d'), date('H:m:s'), '00-00-0000', '00:00:00');
		}
		$query1 = "insert INTO question VALUES (DEFAULT ,'$idInquest','$preg','$stateQuestion')";
		$idQuestion = $this->conexion->insert($query1);
		$query2 = "insert INTO response VALUES('$idPerson', '$idQuestion','$resp',CURDATE(),CURTIME())";

		return $this->conexion->insert($query2);
	}

	public function updateQuestion($idInquest, $idQuestion, $preg, $resp, $state) {
		$query0 = "UPDATE question as q
                 SET q.DESCRIPTION_QUESTION='$preg',q.ACTIVE_QUESTION='$state'
                 WHERE q.ID_INQUEST='$idInquest' AND q.ID_QUESTION='$idQuestion'";
		$this->conexion->update($query0);
		$query1 = "UPDATE response as r
                SET r.DESCRIPTION_RESPONSE='$resp'
                WHERE r.ID_QUESTION='$idQuestion'";
		$this->conexion->update($query1);
	}

	public function insertInquest($idPerson, $stateInquest, $name, $descr, $dateIni, $timeIni, $dateOut, $timeOut) {
		$query = "INSERT INTO inquest (`ID_INQUEST`, `ID_PERSON`, `ID_STATE_INQUEST`, `NAME_INQUEST`, `DESCRIPTION_INQUEST`, `DATE_START_INQUEST`, `TIME_START_INQUEST`, `DATE_END_INQUEST`, `TIME_END_INQUEST`)
					VALUES (DEFAULT , '$idPerson', '$stateInquest', '$name', '$descr', '$dateIni', '$timeIni', '$dateOut', '$timeOut');";

		return $this->conexion->insert($query);
	}

	//obtener el id de la encuesta con preguntas frecuentes
	public function getInquestFrequently($stateMin) {
		$query = "SELECT *
                FROM
                    inquest i,
                    question q,
                    response r
                WHERE
                    i.ID_INQUEST = q.ID_INQUEST
                AND r.ID_QUESTION = q.ID_QUESTION
				AND i.ID_STATE_INQUEST=5
                AND q.ACTIVE_QUESTION >='$stateMin'";

		return $this->conexion->consultar($query);
	}

	public function getInquestList() {
		return $this->getInquestLists(0);
	}

	public function getInquestListActive() {
		return $this->getInquestLists(1);
	}

	public function getInquestLists($limit) {
		$query0 = "SELECT *
                FROM
                    inquest AS inq
                INNER JOIN state_inquest AS sin ON inq.ID_STATE_INQUEST = sin.ID_STATE_INQUEST
                WHERE
                    sin.VALUE_STATE_INQUEST >= '$limit'";

		return $this->conexion->consultar($query0);
	}

	public function deleteInquest($idInquest) {
		$query = "UPDATE inquest SET ID_STATE_INQUEST='6' WHERE ID_INQUEST='$idInquest'";
		$this->conexion->update($query);
	}

	public function getInquest($idInquest) {
		$query = "SELECT *
					FROM
						inquest AS inq
					WHERE
						inq.ID_INQUEST = '$idInquest'";

		return $this->conexion->consultar($query);
	}

	public function updateQuestionList($idInquest, $name, $state, $descr, $dateIni, $timeIni, $dateFin, $timeFin, $questions) {
		$query0 = "UPDATE inquest as q
                        SET q.NAME_INQUEST='$name',q.ID_STATE_INQUEST='$state',q.DESCRIPTION_INQUEST='$descr',
                        	q.DATE_START_INQUEST='$dateIni',q.TIME_START_INQUEST='$timeIni',q.DATE_END_INQUEST='$dateFin',q.TIME_END_INQUEST='$timeFin'
                        WHERE q.ID_INQUEST='$idInquest'";
		$this->conexion->update($query0);
		$query1 = "UPDATE question as q SET q.ACTIVE_QUESTION='-1' WHERE q.ID_INQUEST='$idInquest'";
		$this->conexion->update($query1);
		foreach($questions as $question) {
			if(!empty($question['id'])) {
				$query1 = "UPDATE question as q
	                        SET q.DESCRIPTION_QUESTION='$question[name]',q.ACTIVE_QUESTION='$question[state]'
	                        WHERE q.ID_INQUEST='$idInquest' AND q.ID_QUESTION='$question[id]'";
				$this->conexion->update($query1);
			}
			else {
				$query2 = "insert INTO question VALUES (DEFAULT ,'$idInquest','$question[name]','$question[state]')";
				$this->conexion->insert($query2);
			}
		}
	}

	public function insertResponseList($idPerson, $listResponse) {
		if(is_numeric($idPerson) && $idPerson > 0 && !empty($listResponse)) {
			foreach($listResponse as $response) {
				$idQuestion = isset($response['idQuestion']) ? $response['idQuestion'] : '';
				$dataResponse = isset($response['response']) ? $response['response'] : '';
				if(!empty($idQuestion) && !empty($dataResponse)) {
					$query = "INSERT INTO response VALUES ('$idPerson','$idQuestion','$dataResponse',curdate(),curtime())";
					$res = $this->conexion->insert($query);
					if($res < 1) {
						$query2 = "UPDATE response as r
                                SET r.DESCRIPTION_RESPONSE='$dataResponse', r.DATE_RESPONSE=curdate(), r.TIME_RESPONSE=curtime()
                                 WHERE (`ID_PERSON`='$idPerson') AND (`ID_QUESTION`='$idQuestion')";
						$this->conexion->update($query2);
					}
				}
			}
		}
	}

	public function getInquestQuestionActive() {
		$query = "SELECT
                    *
                FROM
                    inquest AS i
                INNER JOIN question AS q ON q.ID_INQUEST = i.ID_INQUEST
                INNER JOIN state_inquest AS s ON i.ID_STATE_INQUEST = s.ID_STATE_INQUEST
                INNER JOIN response AS r ON r.ID_QUESTION = q.ID_QUESTION
                WHERE q.ACTIVE_QUESTION=TRUE
                GROUP BY
                    q.ID_QUESTION
                ORDER BY
                    q.ID_QUESTION";

		return $this->conexion->consultar($query);
	}
}