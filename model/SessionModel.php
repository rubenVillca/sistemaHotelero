<?php

class SessionModel extends Consultas {
	public function insertSession($idPerson, $actived) {
		$ipCompartida = !empty($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : '';
		$ipProxy = !empty($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : '';
		$ipCliente = $_SERVER["REMOTE_ADDR"];
		$pidConsul = $this->conexion->consultar("SELECT host AS PID FROM information_schema.processlist AS p WHERE p.ID=connection_id();");
		if(!empty($pidConsul))
			$pid = $pidConsul[0]['PID'];
		else
			$pid = 0;
		$navegation = $_SERVER['HTTP_USER_AGENT'];
		if(is_link('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR'])) {
			$meta = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip='.$_SERVER['REMOTE_ADDR']));
			$latitud = isset($meta['geoplugin_latitude']) ? $meta['geoplugin_latitude'] : '';
			$longitud = isset($meta['geoplugin_longitude']) ? $meta['geoplugin_longitude'] : '';
			$city = isset($meta['geoplugin_city']) ? $meta['geoplugin_city'] : '';
			$region = isset($meta['geoplugin_region']) ? $meta['geoplugin_region'] : '';
			$areaCode = isset($meta['geoplugin_areaCode']) ? $meta['geoplugin_areaCode'] : '';
			$country = isset($meta['geoplugin_countryName']) ? $meta['geoplugin_countryName'] : '';
			$regionCode = isset($meta['geoplugin_regionCode']) ? $meta['geoplugin_regionCode'] : '';
			$navegation = $_SERVER['HTTP_USER_AGENT'];
			if($idPerson > 0) {
				$query = "INSERT INTO `session` 
                    VALUES(DEFAULT,'$idPerson','$ipProxy','$ipCompartida','$ipCliente','$pid',
                    CURDATE(),CURDATE(),'$navegation',CURTIME(),CURTIME(),'$actived','$latitud', '$longitud', '$city', '$region', '$areaCode', '$country', '$regionCode')";
			}
			else {
				$query = "INSERT INTO `session` 
                    VALUES(DEFAULT,NULL ,'$ipProxy','$ipCompartida','$ipCliente','$pid',
                    CURDATE(),CURDATE(),'$navegation',CURTIME(),CURTIME(),'$actived','$latitud', '$longitud', '$city', '$region', '$areaCode', '$country', '$regionCode')";
			}
		}
		else {
			$ipCliente = 'localhost';
			if($idPerson > 0) {
				$query = "INSERT INTO `session` 
                    VALUES(DEFAULT,'$idPerson','$ipProxy','$ipCompartida','$ipCliente','$pid',
                    CURDATE(),CURDATE(),'$navegation',CURTIME(),CURTIME(),'$actived','0', '0', '', '', '', '', '')";
			}
			else {
				$query = "INSERT INTO `session` 
                    VALUES(DEFAULT,NULL ,'$ipProxy','$ipCompartida','$ipCliente','$pid',
                    CURDATE(),CURDATE(),'$navegation',CURTIME(),CURTIME(),'$actived','0', '0', '', '', '', '', '')";
			}
		}
		$this->conexion->insert($query);
	}

	public function getTotalVisitor() {
		$query = "SELECT COUNT(DISTINCT s.IP_CLIENT) AS TOTAL FROM `session` AS s";
		$totalCliente = $this->conexion->consultar($query);
		if(!empty($totalCliente))
			$res = $totalCliente[0]['TOTAL'];
		else
			$res = 0;

		return $res;
	}

	public function getTotalSession() {
		$query = "SELECT count(*) AS TOTAL FROM `session` AS s";
		$maxSession = $this->conexion->consultar($query);
		if(!empty($maxSession))
			$res = $maxSession[0]['TOTAL'];
		else
			$res = 0;

		return $res;
	}
}