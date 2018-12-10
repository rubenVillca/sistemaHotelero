<?php
	require_once '../conexion/Consultas.php';
	require_once '../util/Helper.phphp';

	class Insert {
		private $consultas;
		private $ok = 0;
		private $no = 0;
		private $total = 0;
		public function __construct() {
			$this->consultas = new Consultas();
		}
		private function getOk() { return $this->ok; }
		private function getNo() { return $this->no; }
		private function getTotal() { return $this->total; }
		private function resolve($list) {
			$this->total += 1;
			if($list == -1) {
				$this->no += 1;
				$res = '<b>no    .</b>';
			}
			else {
				$res = 'ok   .';
				$this->ok += 1;
			}
			return $res;
		}
		private function insertType($name, $descr, $value, $img, $nameTypeTable) {
			return $this->resolve($this->consultas->insertType($name, $descr, $value, $img, $nameTypeTable));
		}
		private function insertState($name, $descr, $value, $nameStateTable) {
			return $this->resolve($this->consultas->insertState($name, $descr, $value, $nameStateTable));
		}
		private function insertTypeRoom($name, $descr, $nAdult, $nBoy, $nPet, $value, $img) {
			return $this->resolve($this->consultas->insertTypeRoom($name, $descr, $nAdult, $nBoy, $nPet, $value, $img));
		}
		private function insertService($name, $descr, $idState, $idType, $imgService, $hotel) {
			return $this->resolve($this->consultas->insertService($name,
			                                                      $descr,
			                                                      $idState,
			                                                      $idType,
			                                                      $imgService,
			                                                      $hotel));
		}
		private function insertPerson($idRol, $pass, $name, $appP, $appM, $EMAIL_PERSON, $sex, $direction, $city, $pais, $dataNac, $docUser, $phoneUser, $state, $imgPerfil, $point) {
			return $this->resolve($this->consultas->insertPerson($idRol,
			                                                     $pass,
			                                                     $name,
			                                                     $appP,
			                                                     $appM,
			                                                     $EMAIL_PERSON,
			                                                     $sex,
			                                                     $direction,
			                                                     $city,
			                                                     $pais,
			                                                     $dataNac,
			                                                     $docUser,
			                                                     $phoneUser,
			                                                     $state,
			                                                     $imgPerfil,
			                                                     $point));
		}
		private function insertQuestion($idInquest, $preg, $resp, $idPerson) {
			return $this->resolve($this->consultas->insertQuestion($idInquest, $preg, $resp, $idPerson));
		}
		private function insertOffer($name, $descr, $dateIni, $timeIni, $dateFin, $timeFin, $idState, $idType, $addressImg, $percent, $discount, $idTypeMoney, $nDay, $nHour, $idServices, $point) {
			return $this->resolve($this->consultas->insertOffer($name,
			                                                    $descr,
			                                                    $dateIni,
			                                                    $timeIni,
			                                                    $dateFin,
			                                                    $timeFin,
			                                                    $idState,
			                                                    $idType,
			                                                    $addressImg,
			                                                    $percent,
			                                                    $discount,
			                                                    $idTypeMoney,
			                                                    $nDay,
			                                                    $nHour,
			                                                    $idServices,
			                                                    $point));
		}
		private function insertSite($idHotel, $name, $descr, $address, $gpsX, $gpsY, $img) {
			return $this->resolve($this->consultas->insertSite($idHotel, $name, $descr, $address, $gpsX, $gpsY, $img));
		}
		private function insertReserve($idPerson, $nameUser, $namePerson, $appPerson, $dateNac, $dni, $phone, $EMAIL_PERSON, $typeRoom, $dateIn, $dateOut, $nPerson, $address, $city, $pais, $ccv, $nRoom, $nCard, $sex) {
			return $this->resolve($this->consultas->insertReserve($idPerson,
			                                                      $nameUser,
			                                                      $namePerson,
			                                                      $appPerson,
			                                                      $dateNac,
			                                                      $dni,
			                                                      $phone,
			                                                      $EMAIL_PERSON,
			                                                      $typeRoom,
			                                                      $dateIn,
			                                                      $dateOut,
			                                                      $nPerson,
			                                                      $address,
			                                                      $city,
			                                                      $pais,
			                                                      $ccv,
			                                                      $nRoom,
			                                                      $nCard,
			                                                      $sex));
		}
		private function insertConsum($idPersonConsum, $idServiceConsum, $idTypeConsum, $dateInConsum, $timeInConsum, $dateOutConsum, $timeOutConsum, $costConsum, $idCheckIn, $detailConsum) {
			return $this->resolve($this->consultas->insertConsum($idPersonConsum,
			                                                     $idServiceConsum,
			                                                     $idTypeConsum,
			                                                     $dateInConsum,
			                                                     $timeInConsum,
			                                                     $dateOutConsum,
			                                                     $timeOutConsum,
			                                                     $costConsum,
			                                                     $idCheckIn,
			                                                     $detailConsum));
		}
		private function insertCheckOut($id_user, $id_checkIn, $listArticle, $pay) {
			return $this->resolve($this->consultas->insertCheckOut($id_user, $id_checkIn, $listArticle, $pay));
		}
		private function insertMesaje($sender, $receiver, $tittle, $container, $typeMesaje) {
			return $this->resolve($this->consultas->insertMesaje($sender, $receiver, $tittle, $container, $typeMesaje));
		}
		private function insertCheckIn($idPerson, $idPersonRecep, $idHotel, $comentario, $nCard, $ccv, $monthExp, $yearExp, $nameCard, $listMember, $costTotal, $listArticle, $listRoom, $dateIn, $dateOut, $idReserve) {
			return $this->resolve($this->consultas->insertCheckIn($idPerson,
			                                                      $idPersonRecep,
			                                                      $idHotel,
			                                                      $comentario,
			                                                      $nCard,
			                                                      $ccv,
			                                                      $monthExp,
			                                                      $yearExp,
			                                                      $nameCard,
			                                                      $listMember,
			                                                      $costTotal,
			                                                      $listArticle,
			                                                      $listRoom,
			                                                      $dateIn,
			                                                      $dateOut,
			                                                      $idReserve));
		}
		public function run() {
			$name = 'nombre prueba';
			$descr = 'descrp prueba';
			$value = 1;
			$img = "img/system/hotel.png";
			$nAdult = 1;
			$nBoy = 0;
			$nPet = 0;
			$listType = array('activity',
			                  'consum',
			                  'doc',
			                  'food',
			                  'hotel',
			                  'log',
			                  'mesaje',
			                  'money',
			                  'offer',
			                  'phone',
			                  'reserve',
			                  'rule',
			                  'service',
			                  'target');
			$listState = array('activity',
			                   'article',
			                   'check',
			                   'food',
			                   'inquest',
			                   'offer',
			                   'room',
			                   'service',
			                   'user',
			                   'reserve');
			$idHotel = 1;
			$comentario = 'esto es un comentario de prueba';
			$appP = 'apellido paterno';
			$appM = 'apellido materno';
			$idType = 1;
			$idState = 1;
			$pass = 'contrasenia';
			$city = 'Cochabamba';
			$pais = 'Bolivia';
			$dataNac = '2000-01-01';
			$point = 1;
			$idRol = 1;
			$idInquest = 1;
			$idPerson = 1;
			$dateIni = '2009-10-10';
			$timeIni = '12:12:12';
			$dateFin = '2016-10-10';
			$timeFin = '12:12:12';
			$EMAIL_PERSON = date('H:r:s')."  EMAIL_PERSON@gmail.com";
			$sex = 1;
			$preg = 'esto es una preguna';
			$resp = 'esto es una respuesta';
			$address = 'av simpre viva';
			$gpsX = '1';
			$gpsY = 1;
			$dni = date("dHms1");
			$nCard = date("dHms2");
			$cost = 12;
			$idCheckIn = 1;
			$idService = 1;
			$idReserve = 1;
			$ccv = '133';
			$nRoom = 3;
			$nPerson = 4;
			$phone = '123456';
			$docUser = array();
			$phoneUser = array();
			$listArticle = array();
			$listMember = array();
			$listRoom = array();
			$imgSite = array();
			$idDetailRoom = 1;
			foreach($listType as $item)
				echo '01.- '.$this->insertType($name,
				                               $descr,
				                               $value,
				                               $img,
				                               $item)."  insertType(name, descr, value,img,$item)<br>";
			foreach($listState as $item)
				echo '02.- '.$this->insertState($name,
				                                $descr,
				                                $value,
				                                $item)."  insertState(name, descr, value,$item) <br>";
			echo '03.- '.$this->insertTypeRoom($name,
			                                   $descr,
			                                   $nAdult,
			                                   $nBoy,
			                                   $nPet,
			                                   $value,
			                                   $img)."  insertTypeRoom(name, descr, nAdult,nBoy, nPet,value, img) <br>";
			echo '04.- '.$this->insertService($name,
			                                  $descr,
			                                  $idState,
			                                  $idType,
			                                  $img,
			                                  $idHotel)."  insertService(name,descr,idState,idType,imgService,hotel)<br>";
			echo '05.- '.$this->insertPerson($idRol,
			                                 $pass,
			                                 $name,
			                                 $appP,
			                                 $appM,
			                                 $EMAIL_PERSON,
			                                 $sex,
			                                 $address,
			                                 $city,
			                                 $pais,
			                                 $dataNac,
			                                 $docUser,
			                                 $phoneUser,
			                                 $idState,
			                                 $img,
			                                 $point)."  insertPerson(idRol,pass,name, appP, appM, EMAIL_PERSON, sex, direction, city, pais, dataNac, docUser, phoneUser, state, imgPerfil, point)<br>";
			echo '06.- '.$this->insertQuestion($idInquest,
			                                   $preg,
			                                   $resp,
			                                   $idPerson)."  insertQuestion(idInquest, preg, resp,idPerson)<br>";
			echo '07.- '.$this->insertCheckIn($idPerson,
			                                  $idPerson,
			                                  $idHotel,
			                                  $comentario,
			                                  $nCard,
			                                  $ccv,
			                                  $dateFin,
			                                  $name,
			                                  $listMember,
			                                  $cost,
			                                  $listArticle,
			                                  $listRoom,
			                                  $dateIni,
			                                  $dateFin,
			                                  $idReserve)."  insertCheckIn(idPerson,idPersonRecep,idHotel,comentario,nCard,ccv,dateExp,nameCard,listMember,costTotal,listArticle,listRoom,dateIn,dateOut,idReserve)<br>";
			$percent = 0;
			$discount = 200;
			$nDay = 1;
			$nHour = 0;
			$idServices = array();
			$idFoods = array();
			echo '08.- '.$this->insertOffer($name,
			                                $descr,
			                                $dateIni,
			                                $timeIni,
			                                $dateFin,
			                                $timeFin,
			                                $idState,
			                                $idType,
			                                $img,
			                                $percent,
			                                $discount,
			                                $idType,
			                                $nDay,
			                                $nHour,
			                                $idServices,
			                                $idFoods,
			                                $point)."  insertOffer(name, descr, dateIni, timeIni, dateFin, timeFin, idState, idType,addressImg, percent,discount,idTypeMoney,nDay,nHour,idServices, idFoods,point)<br>";
			echo '09.- '.$this->insertSite($idHotel,
			                               $name,
			                               $descr,
			                               $address,
			                               $gpsX,
			                               $gpsY,
			                               $imgSite)."  insertSite(idHotel,name,descr,address,gpsX,gpsY, img)<br>";
			echo '10.- '.$this->insertReserve($idPerson,
			                                  $name,
			                                  $name,
			                                  $appP,
			                                  $dateIni,
			                                  $dni,
			                                  $phone,
			                                  $EMAIL_PERSON,
			                                  $idDetailRoom,
			                                  $dateIni,
			                                  $dateFin,
			                                  $nPerson,
			                                  $address,
			                                  $city,
			                                  $pais,
			                                  $ccv,
			                                  $nRoom,
			                                  $nCard,
			                                  $sex)."  insertReserve(idPerson,nameUser,namePerson,appPerson,dateNac,dni,phone,EMAIL_PERSON, typeRoom,dateIn,dateOut,nPerson,address,city,pais,ccv,nRoom,nCard,sex)<br>";
			echo '11.- '.$this->insertConsum($idPerson,
			                                 $idService,
			                                 $idType,
			                                 $dateIni,
			                                 $timeIni,
			                                 $dateFin,
			                                 $timeFin,
			                                 $cost,
			                                 $idCheckIn,
			                                 $descr)."  insertConsum(idPersonConsum ,idServiceConsum,idTypeConsum,dateInConsum,timeInConsum,dateOutConsum ,timeOutConsum ,costConsum ,idCheckIn,detailConsum )<br>";
			echo '12.- '.$this->insertCheckOut($idPerson,
			                                   $idCheckIn,
			                                   $listArticle,
			                                   $cost)."  insertCheckOut(id_user,id_checkIn,listArticle,pay)<br>";
			echo '13.- '.$this->insertMesaje($idPerson,
			                                 $idPerson,
			                                 $name,
			                                 $descr,
			                                 $idType)."  insertMesaje(sender,receiver,tittle,container,typeMesaje) <br>";
			echo "<br>";
			echo "Total aprobados:".$this->getOk()."  <br>";
			echo "Total reprobados:".$this->getNo()."  <br>";
			echo "Total Consultas:".$this->getTotal()."  <br>";
		}
	}

	$prueba = new Insert();
	$prueba->run();