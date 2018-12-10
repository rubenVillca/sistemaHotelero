<?php
	require_once '../conexion/Consultas.php';
	require_once '../util/Helper.phphp';

	class TestUnitario extends \PHPUnit_Framework_TestCase{
		public function testHumano(){
			$t=new Test();
			$t->setNombre('Test funcionales con PHPUnit');
			$t->setDescripcion('Test de prueba con PHPUnit');
			$t->setEstado(1);
			$this->entityManager->persist($t);
			$this->entityManager->flush();
			$this->assertEquals(1,'Test');
		}


		private $consultas;
		private $ok = 0;
		private $no = 0;
		private $vacio = 0;
		private $total = 0;
		private function getOk() { return $this->ok; }
		private function getNo() { return $this->no; }
		private function getVacio() { return $this->vacio; }
		private function getTotal() { return $this->total; }
		private function resolve($list) {
			$this->total += 1;
			if($list == -1) {
				$this->no += 1;
				$res = '<b>no</b>';
			} else {
				if(!empty($list)) {
					$res = 'ok';
					$this->ok += 1;
				} else {
					$res = 'vacio';
					$this->vacio += 1;
				}
			}
			return $res;
		}
		private function getListRolUser() {
			$resQ = $this->resolve($this->consultas->getListRolUser());
			return $this->resolve($resQ);
		}
		private function getListUser() {
			$resQ = $this->consultas->getListUser();
			return $this->resolve($resQ);
		}
		private function getListPerson() {
			$resQ = $this->consultas->getListPerson();
			return $this->resolve($resQ);
		}
		private function getListType($nameType) {
			$resQ = $this->consultas->getListType($nameType);
			return $this->resolve($resQ);
		}
		private function getListState($nameState) {
			$resQ = $this->consultas->getListState($nameState);
			return $this->resolve($resQ);
		}
		private function getListOffer($idHotel) {
			$resQ = $this->consultas->getListOffer($idHotel);
			return $this->resolve($resQ);
		}
		private function getListFood() {
			$resQ = $this->consultas->getListFood();
			return $this->resolve($resQ);
		}
		private function getListServicesComsuption($idHotel) {
			$resQ = $this->consultas->getListServicesComsuption($idHotel);
			return $this->resolve($resQ);
		}
		private function getListReserve($idHotel) {
			$resQ = $this->consultas->getListReserve($idHotel);
			return $this->resolve($resQ);
		}
		private function getQuestionContent() {
			$resQ = $this->consultas->getQuestionContent();
			return $this->resolve($resQ);
		}
		private function getCheck($idHotel) {
			$resQ = $this->consultas->getCheck($idHotel);
			return $this->resolve($resQ);
		}
		private function getListSiteTour($idHotel) {
			$resQ = $this->consultas->getListSiteTour($idHotel);
			return $this->resolve($resQ);
		}
		private function getListServices($idHotel) {
			$resQ = $this->consultas->getListServices($idHotel);
			return $this->resolve($resQ);
		}
		private function getListServicesFree($idHotel) {
			$resQ = $this->consultas->getListServicesFree($idHotel);
			return $this->resolve($resQ);
		}
		private function getListRule($idHotel) {
			$resQ = $this->consultas->getListRule($idHotel);
			return $this->resolve($resQ);
		}
		private function getListArticle() {
			$resQ = $this->consultas->getListArticle();
			return $this->resolve($resQ);
		}
		private function getInfoHotel($idHotel) {
			$resQ = $this->consultas->getInfoHotel($idHotel);
			return $this->resolve($resQ);
		}
		private function getListReserveUser($user, $idHotel) {
			$resQ = $this->consultas->getListReserveUser($user, $idHotel);
			return $this->resolve($resQ);
		}
		private function getListRoomOccupied($dateIn, $dateOut, $idHotel) {
			$resQ = $this->consultas->getListRoomOccupied($dateIn, $dateOut, $idHotel);
			return $this->resolve($resQ);
		}
		private function getListMesajesNoWatch($idUser, $idType) {
			$resQ = $this->consultas->getListMesajesNoWatch($idUser, $idType);
			return $this->resolve($resQ);
		}
		private function getListMesajes($nameUser, $idType) {
			$resQ = $this->consultas->getListMesajes($nameUser, $idType);
			return $this->resolve($resQ);
		}
		private function getState($idState, $nameStateTable) {
			$resQ = $this->consultas->getState($idState, $nameStateTable);
			return $this->resolve($resQ);
		}
		private function getPerson($nameUser) {
			$resQ = $this->consultas->getPerson($nameUser);
			return $this->resolve($resQ);
		}
		private function getListRoomFree($nAdult, $nBoy, $nPet, $dateIn, $dateOut, $idHotel) {
			$resQ = $this->consultas->getListRoomFree($nAdult, $nBoy, $nPet, $dateIn, $dateOut, $idHotel);
			return $this->resolve($resQ);
		}
		private function getOffer($idOffer) {
			$resQ = $this->consultas->getOffer($idOffer);
			return $this->resolve($resQ);
		}
		private function getSiteTour($idSite) {
			$resQ = $this->consultas->getSiteTour($idSite);
			return $this->resolve($resQ);
		}
		private function getListArticleConsum($idCheck) {
			$resQ = $this->consultas->getListArticleConsume($idCheck);
			return $this->resolve($resQ);
		}
		private function getDistribution($dateIn, $dateOut, $idService) {
			$resQ = $this->consultas->getDistribution($dateIn, $dateOut, $idService);
			return $this->resolve($resQ);
		}
		private function getService($idService) {
			$resQ = $this->consultas->getService($idService);
			return $this->resolve($resQ);
		}
		private function getLogin($user, $pass) {
			$resQ = $this->consultas->getLogin($user, $pass);
			return $this->resolve($resQ);
		}
		private function getNameUser($idPerson) {
			$resQ = $this->consultas->getNameUser($idPerson);
			return $this->resolve($resQ);
		}
		private function getEmailUser($id_user) {
			$resQ = $this->consultas->getEmailUser($id_user);
			return $this->resolve($resQ);
		}
		private function getListPhone($idUser) {
			$resQ = $this->consultas->getListPhone($idUser);
			return $this->resolve($resQ);
		}
		private function getListDoc($idPerson) {
			$resQ = $this->consultas->getListDoc($idPerson);
			return $this->resolve($resQ);
		}
		private function getReserve($idReserve) {
			$resQ = $this->consultas->getReserve($idReserve);
			return $this->resolve($resQ);
		}
		private function getListTypeRoom() {
			$resQ = $this->consultas->getListTypeRoom();
			return $this->resolve($resQ);
		}
		private function getListFoodActive() {
			$resQ = $this->consultas->getListFoodActive();
			return $this->resolve($resQ);
		}
		private function getListFoodOffer($idOffer) {
			$resQ = $this->consultas->getListFoodOffer($idOffer);
			return $this->resolve($resQ);
		}
		private function getListOfferActive($idHotel) {
			$resQ = $this->consultas->getListFoodOffer($idHotel);
			return $this->resolve($resQ);
		}
		private function getType($idType, $nameTypeTable) {
			$resQ = $this->consultas->getType($idType, $nameTypeTable);
			return $this->resolve($resQ);
		}
		private $nameUser = 'user1';
		private $date1 = '2015-12-12';
		private $date2 = '2017-12-12';
		private $idHotel = 1;
		private $nAdult = 1;
		private $nBoy = 0;
		private $nPet = 0;
		private $idService = 1;
		private $idPerson = 1;
		private $idOffer = 1;
		private $idSite = 1;
		private $idCheck = 1;
		private $idType = 1;
		private $idConsum = 1;
		private $pass = 'contrasenia';
		private $idState = '1';
		private $nameTypeTable = 'offer';
		private $nameStateTable = 'user';
		private $listType = array('activity',
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
		private $listState = array('activity',
		                           'article',
		                           'check',
		                           'food',
		                           'inquest',
		                           'offer',
		                           'room',
		                           'service',
		                           'user',
		                           'reserve');
		public function show() {
			foreach($this->listType as $type) echo '01.- '.$this->getListType($type)." : getListType($type)<br>";
			foreach($this->listState as $state) echo '02.- '.$this->getListState($state)." : getListState($state)<br>";
			echo '03.- '.$this->getListRolUser()." : getListRolUser()<br>";
			echo '04.- '.$this->getListUser()." : getListUser()<br>";
			echo '05.- '.$this->getListPerson()." : getListPerson()<br>";
			echo '06.- '.$this->getListOffer($this->idHotel)." : getListOffer(idHotel)<br>";
			echo '07.- '.$this->getListFood()." : getListFood()<br>";
			echo '08.- '.$this->getListOfferActive($this->idHotel)." : getListOfferActive(idHotel)<br>";
			echo '09.- '.$this->getListServicesComsuption($this->idHotel)." : getListServicesComsuption(idHotel)<br>";
			echo '10.- '.$this->getListReserve($this->idHotel)." : getListReserve(idHotel)<br>";
			echo '11.- '.$this->getQuestionContent()." : getQuestionContent()<br>";
			echo '12.- '.$this->getCheck($this->idHotel)." : getCheck(idHotel)<br>";
			echo '13.- '.$this->getListFoodOffer($this->idOffer)." : getListFoodOffer(idOffer)<br>";
			echo '14.- '.$this->getListRoomFree($this->nAdult,
			                                    $this->nBoy,
			                                    $this->nPet,
			                                    $this->date1,
			                                    $this->date2,
			                                    $this->idHotel)." : getListRoomFree(nAdult, nBoy, nPet,date1, date2, idHotel)<br>";
			echo '15.- '.$this->getListSiteTour($this->idHotel)." : getListSiteTour(idHotel)<br>";
			echo '16.- '.$this->getListServices($this->idHotel)." : getListServices(idHotel)<br>";
			echo '17.- '.$this->getListServicesFree($this->idHotel)." : getListServicesAvailable(idHotel)<br>";
			echo '18.- '.$this->getListRule($this->idHotel)." : getListRule(idHotel)<br>";
			echo '19.- '.$this->getListArticle()." : getListArticle()<br>";
			echo '20.- '.$this->getInfoHotel($this->idHotel)." : getInfoHotel(idHotel)<br>";
			echo '21.- '.$this->getListReserveUser($this->idPerson,
			                                       $this->idHotel)." : getListReserveUser(idPerson, idHotel)<br>";
			echo '22.- '.$this->getListRoomOccupied($this->date1,
			                                        $this->date2,
			                                        $this->idHotel)." : getListRoomOccupied(date1,date2,idHotel)<br>";
			echo '23.- '.$this->getListMesajesNoWatch($this->idPerson,
			                                          $this->idType)." : getListMesajesNoWatch(idPerson, idType)<br>";
			echo '24.- '.$this->getListTypeRoom()." : getListTypeRoom()<br>";
			echo '25.- '.$this->getListMesajes($this->nameUser, $this->idType)." : getListMesajes(nameUser,idType)<br>";
			echo '26.- '.$this->getListDoc($this->idPerson)." : getListDoc(idPerson)<br>";
			echo '27.- '.$this->getType($this->idType, $this->nameTypeTable)." :getType(idType,nameTypeTable)<br>";
			echo '28.- '.$this->getListFoodActive()." : getListFoodActive()()<br>";
			echo '29.- '.$this->getState($this->idState,
			                             $this->nameStateTable)." : getState(idState,nameStateTable)<br>";
			echo '30.- '.$this->getPerson($this->nameUser)." : getPerson(nameUser)<br>";
			echo '31.- '.$this->getListPhone($this->idPerson)." : getListPhone(idPerson)<br>";
			echo '32.- '.$this->getOffer($this->idOffer)." : getOffer(idOffer)<br>";
			echo '33.- '.$this->getSiteTour($this->idSite)." : getSiteTour(idSite)<br>";
			echo '34.- '.$this->getListArticleConsume($this->idConsum)." : getListArticleConsume(idConsum)<br>";
			echo '35.- '.$this->getDistribution($this->date1,
			                                    $this->date2,
			                                    $this->idService)." : getDistribution(date1, date2, idService)<br>";
			echo '36.- '.$this->getService($this->idService)." : getService(idService)<br>";
			echo '37.- '.$this->getLogin($this->nameUser, $this->pass)." : getLogin(nameUser,pass)<br>";
			echo '38.- '.$this->getNameUser($this->idPerson)." : getNameUser(idPerson)<br>";
			echo '39.- '.$this->getReserve($this->idCheck)." : getReserve(idCheck)<br>";
			echo '40.- '.$this->getEmailUser($this->idPerson)." : getEmailUser(idPerson)<br>";
			echo "<br>";
			echo "Total aprobados:".$this->getOk()."<br>";
			echo "Total reprobados:".$this->getNo()."<br>";
			echo "Total vacios:".$this->getVacio()."<br>";
			echo "Total Consultas:".$this->getTotal()."<br>";
		}
	}

	$p = new Test();
	$p->show();