<?php

class HotelModel extends Consultas {
	//*********************************************************************************************** INFO HOTEL **/
	public function getInfoHotel($idHotel) {
		$query = "SELECT *
                FROM hotel as h
                INNER JOIN type_hotel as t ON h.ID_TYPE_HOTEL = t.ID_TYPE_HOTEL
                WHERE h.ID_HOTEL = '$idHotel'";

		return $this->conexion->consultar($query);
	}

	public function updateInfoHotel($idHotel, $nameHotel, $mision, $vision, $address, $dateFund, $dominio, $history, $idTypeHotel, $addressLogo, $addressGPSX, $addressGPSY, $addressImg, $scope, $objetive, $watchWord, $description, $email, $phone) {
		if($idHotel > 0) {
			$query = "UPDATE hotel
					SET NAME_HOTEL = '$nameHotel',
						DOMINIO_HOTEL = '$dominio',
						ID_TYPE_HOTEL = '$idTypeHotel',
						DATE_FOUNDATION_HOTEL='$dateFund',
						LOGO_HOTEL='$addressLogo',
						ADDRESS_HOTEL='$address',
						ADDRESS_GPS_X_HOTEL='$addressGPSX',
						ADDRESS_GPS_Y_HOTEL='$addressGPSY',
						ADDRESS_IMAGE_HOTEL='$addressImg',
						HISTORY_HOTEL='$history',
						MISSION_HOTEL='$mision',
						VISION_HOTEL='$vision',
						SCOPE_HOTEL='$scope',
						OBJECTIVE_HOTEL='$objetive',
						WATCHWORD_HOTEL='$watchWord',
						DESCRIPTION_HOTEL='$description',
						EMAIL_HOTEL='$email',
						PHONE_HOTEL='$phone'
					WHERE
						ID_HOTEL = '$idHotel'";
			$this->conexion->update($query);
		}
		else {
			$this->insertInfoHotel($nameHotel, $mision, $vision, $address, $dateFund, $dominio, $history, $idTypeHotel, $addressLogo, $addressGPSX, $addressGPSY, $addressImg, $scope, $objetive, $watchWord, $description, $email, $phone);
		}
	}

	public function getIdHotel() {
		$query = "SELECT h.ID_HOTEL FROM hotel AS h WHERE h.NAME_HOTEL!='' GROUP BY h.ID_HOTEL";
		$res = $this->conexion->consultar($query);
		if(!empty($res))
			$res = $res[0]['ID_HOTEL'];
		else
			$res = -1;

		return $res;
	}

	public function insertInfoHotel($nameHotel, $mision, $vision, $address, $dateFund, $dominio, $history, $idTypeHotel, $addressLogo, $addressGPSX, $addressGPSY, $addressImg, $scope, $objetive, $watchWord, $description, $email, $phone) {
		$query = "INSERT INTO hotel (ID_HOTEL, ID_TYPE_HOTEL, 
							NAME_HOTEL, DOMINIO_HOTEL, DATE_FOUNDATION_HOTEL, 
							LOGO_HOTEL, ADDRESS_HOTEL, ADDRESS_GPS_X_HOTEL,ADDRESS_GPS_Y_HOTEL,
							 ADDRESS_IMAGE_HOTEL, HISTORY_HOTEL, MISSION_HOTEL, 
							VISION_HOTEL, SCOPE_HOTEL, OBJECTIVE_HOTEL, WATCHWORD_HOTEL, DESCRIPTION_HOTEL, EMAIL_HOTEL, PHONE_HOTEL) 
				VALUES (DEFAULT , 
								'$idTypeHotel',
								'$nameHotel',
								'$dominio',
								'$dateFund',
								'$addressLogo',
								'$address',
								'$addressGPSX',
								'$addressGPSY',
								'$addressImg',
								'$history',
								'$mision',
								'$vision',
								'$scope',
								'$objetive',
								'$watchWord',
								'$description',
								'$email',
								'$phone')";

		return $this->conexion->insert($query);
	}
}
