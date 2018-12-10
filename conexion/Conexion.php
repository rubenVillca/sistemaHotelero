<?php

class Conexion {
	/*private $host='localhost';
	private $port='3306';
	private $user='id7394648_id7394648_hoteltest';
	private $pass='superPass.91';
	private $nomaBD='id7394648_id7394648_hoteltest';
	/*userFTP:hoteltests
	passFTP:2NaAXMlmCyH1DhKEuJ
	PORTFTP:21
	HOSTFTP:files.000webhost.com
	site:https://hoteltests.000webhostapp.com/*/

	/*private $host='mysql.hostinger.mx';
	private $port='3306';
	private $user='u528310067_hotel';
	private $pass='vi87Z4ijI3';
	private $nomaBD='u528310067_hotel';
	/*userFTP:u528310067
	passFTP:2NaAXMlmCyH1DhKEuJ
	PORTFTP:21
	HOSTFTP:ftp.hoteltesis.esy.es
	site:hoteltesis.esy.es*/

	/*private $host='sql210.epizy.com';
	private $port='3306';
	private $user='epiz_22813597';
	private $pass='OCeBlvDWxIZamD3';
	private $nomaBD='epiz_22813597_hoteltest';
	/*userFTP:epiz_22813597
	passFTP:OCeBlvDWxIZamD3
	PORTFTP:21
	HOSTFTP:ftpupload.net
	site:hoteltest.epizy.com*/

	private $host = '127.0.0.1';
	private $port = '3306';
	private $user = 'root';
	private $pass = '';
	private $nomaBD = 'hotel';
	/*localhost*/
	private $conexion;

	public function __construct() {
	}

	public function getHost() {
		return $this->host;
	}

	public function getPort() {
		return $this->port;
	}

	public function getUser() {
		return $this->user;
	}

	public function getPass() {
		return $this->pass;
	}

	public function conectar() {
		$this->conexion = mysqli_connect($this->host, $this->user, $this->pass, $this->nomaBD, $this->port);
		if(!$this->conexion) {
			die('Se ha presentado el siguiente error: '.mysqli_connect_error());
		}
	}

	public function ping() {
		$res = $this->conexion->ping() ? 1 : -1;

		return $res;
	}

	public function desconectar() {
		mysqli_close($this->conexion);
	}

	public function insert($question) {
		$res = mysqli_query($this->conexion, $question);
		if(!$res) {
			$res = -1;
			//die('no se pudo insertar la imagen: '.$question);
		}
		else {
			$res = mysqli_insert_id($this->conexion);
		}

		return $res;
	}

	public function update($query) {
		$var = mysqli_query($this->conexion, $query);
		if(!$var) {
			die('No se pudo actualizar: '.$query);
		}

		return 1;
	}

	public function delete($query) {
		$var = mysqli_query($this->conexion, $query);
		if(!$var) {
			die('Error de eliminar: '.$query);
		}
	}

	public function consultar($consulta) {
		$resConsul = mysqli_query($this->conexion, $consulta);
		$res = array();
		if($resConsul) {
			if(mysqli_num_rows($resConsul) >= 0) {
				while($row = mysqli_fetch_assoc($resConsul)) {
					$res[] = $row;
				}
			}
		}
		else {
			die('<br>Error de consulta: <br><br>'.$consulta.'<br><br> Descripcion del error: <br>'.mysqli_error($this->conexion));
		}

		return $res;
	}
}