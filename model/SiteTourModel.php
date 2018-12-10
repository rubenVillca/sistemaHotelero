<?php

class SiteTourModel extends Consultas {
	//************************************************************************************************ SITE TOUR **/
	public function getSiteTour($idSite) {
		$query = "SELECT *
	                FROM
	                    site_tour AS s
	                WHERE
	                    s.ID_SITE_TOUR='$idSite' AND s.STATE_SITE_TOUR>=0";

		return $this->conexion->consultar($query);
	}

	public function getSiteTourImg($idSite) {
		$stateEnable=Constants::$STATE_IMAGE_SITE_TOUR_ENABLED;
		$query = "SELECT *
                  FROM image_site_tour AS i
                  WHERE i.ID_SITE_TOUR='$idSite' AND i.STATE_IMAGE_SITE='$stateEnable'";

		return $this->conexion->consultar($query);
	}

	public function getSiteTourList($idHotel) {
		$query = "SELECT * 
                        FROM site_tour AS s,image_site_tour as i
                        WHERE s.ID_HOTEL = '$idHotel' 
                        AND s.STATE_SITE_TOUR>=0 
                        AND i.ID_SITE_TOUR=s.ID_SITE_TOUR
                        AND i.STATE_IMAGE_SITE=1
                        AND i.IMAGE_SITE!=''
                        GROUP BY i.ID_SITE_TOUR
                        ORDER BY s.ID_SITE_TOUR";

		return $this->conexion->consultar($query);
	}

	public function insertSite($idHotel, $name, $descr, $address, $gpsX, $gpsY, $img) {
		$query1 = "INSERT INTO site_tour VALUES(DEFAULT,'$gpsX','$gpsY','$idHotel','$name','$descr','$address',1)";
		$idSite = $this->conexion->insert($query1);

		$this->insertSiteImg($idSite, $img);
		return $idSite;
	}

	public function updateSiteState($idSite, $state) {
		if($idSite > 0) {
			$query = "UPDATE site_tour as s 
                    SET s.STATE_SITE_TOUR = '$state'
                    WHERE ID_SITE_TOUR = '$idSite'";
			$this->conexion->update($query);
		}
	}

	private function insertSiteImg($idSite, $listImg) {
		$res = '-1';
		foreach($listImg as $item) {
			$query = "INSERT INTO image_site_tour VALUES (DEFAULT ,'$idSite','$item','','','{${Constants::$STATE_IMAGE_SITE_TOUR_ENABLED}}')";
			$res = $this->conexion->insert($query);
		}

		return $res;
	}

	public function updateSite($idSite, $nameSite, $descrSite, $addressSite, $gpsX, $gpsY, $listImgOld, $listImg,$listImageEdit) {
		$res = $this->updateSites($idSite, $nameSite, $descrSite, $addressSite, $gpsX, $gpsY);
		$this->updateSiteImgState($idSite, Constants::$STATE_IMAGE_SITE_TOUR_DISABLED);
		$this->updateSiteImg($idSite, $listImgOld);//volve a activar imagens q no fueron eliminadas
		$this->updateSiteImgUrl($listImageEdit);
		$this->insertSiteImg($idSite, $listImg);//inseertar nuevas imagens

		return $res;
	}

	private function updateSiteImgState($idSite, $state) {
		if($idSite > 0) {
			$query = "UPDATE image_site_tour as i 
                    SET i.STATE_IMAGE_SITE = '$state'
                    WHERE i.ID_SITE_TOUR = '$idSite'";
			$this->conexion->update($query);
		}
	}

	private function updateSiteImgUrl($listImageEdit) {
		foreach($listImageEdit as $item) {
			$query = "UPDATE image_site_tour as i 
					  SET i.IMAGE_SITE='$item[urlImg]' 
					  WHERE i.ID_IMAGE_SITE='$item[idImg]'";
			$this->conexion->update($query);
		}
	}

	private function updateSites($idSite, $nameSite, $descrSite, $addressSite, $gpsX, $gpsY) {
		$query = "UPDATE site_tour as s 
					SET s.NAME_SITE_TOUR='$nameSite',s.DESCRIPTION_SITE_TOUR='$descrSite',s.ADDRESS_SITE_TOUR='$addressSite',s.ADDRESS_GPS_X_SITE_TOUR='$gpsX',s.ADDRESS_GPS_Y_SITE_TOUR='$gpsY' 
					WHERE s.ID_SITE_TOUR='$idSite'";
		$this->conexion->update($query);

		return 1;
	}

	private function updateSiteImg($idSite, $listImgOld) {
		$stateEnabled=Constants::$STATE_IMAGE_SITE_TOUR_ENABLED;
		foreach($listImgOld as $item) {
			$query = "UPDATE image_site_tour as i 
						  SET i.NAME_IMAGE_SITE='$item[nameImg]',i.DESCRIPTION_IMAGE_SITE='$item[descrImg]',i.STATE_IMAGE_SITE='$stateEnabled' 
						  WHERE i.ID_SITE_TOUR='$idSite' AND i.ID_IMAGE_SITE='$item[idImg]'";
			$this->conexion->update($query);
		}
	}
}