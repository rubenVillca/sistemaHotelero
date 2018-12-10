<?php
require_once 'model/DocumentModel.php';
require_once 'model/PhoneModel.php';
require_once 'model/UserModel.php';

class PersonModel extends Consultas {
	private $id;
	private $name;
	private $lastName;
	private $lastName2;
	private $sex;
	private $dateBorn;
	private $email;
	private $city;
	private $country;
	private $address;
	private $dateRegister;
	private $image;
	private $point;
	private $password;
	private $stateUser;
	private $idRol;
	//models
	private $docModel;
	private $phoneModel;
	private $userModel;

	public function __construct($conexion) {
		parent::__construct($conexion);
		//modelos
		$this->docModel = new DocumentModel($this->conexion);
		$this->phoneModel = new PhoneModel($this->conexion);
		$this->userModel = new UserModel($this->conexion);
		//atributos
		$this->id = 0;
		$this->name = '';
		$this->lastName = '';
		$this->lastName2 = '';
		$this->sex = '-1';
		$this->dateBorn = '0000-00-00';
		$this->email = '';
		$this->city = '';
		$this->country = '';
		$this->address = '';
		$this->dateRegister = date('Y-m-d');
		$this->image = '';
		$this->point = 0;
		$this->setPassword('default');
		$this->stateUser = 1;//activo
		$this->idRol=0;
	}

	/**
	 * @return int
	 */
	public function getIdRol() {
		return $this->idRol;
	}

	/**
	 * @param int $idRol
	 */
	public function setIdRol($idRol) {
		$this->idRol = $idRol;
	}

	/**
	 * @return int
	 */
	public function getStateUser() {
		return $this->stateUser;
	}

	/**
	 * @param int $stateUser
	 */
	public function setStateUser($stateUser) {
		$this->stateUser = $stateUser;
	}

	/**
	 * @return string
	 */
	public function getPassword() {
		return $this->password;
	}

	/**
	 * @param string $password
	 */
	public function setPassword($password) {
		if (!empty($password))
			$this->password = password_hash($password, PASSWORD_DEFAULT);//encriptar contrasena
		else
			$this->password='';
	}

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param int $id
	 */
	public function setId($id) {
		$this->id = $id;
		if ($this->id>0)
			$this->password='';
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getLastName() {
		return $this->lastName;
	}

	/**
	 * @param string $lastName
	 */
	public function setLastName($lastName) {
		$this->lastName = $lastName;
	}

	/**
	 * @return string
	 */
	public function getLastName2() {
		return $this->lastName2;
	}

	/**
	 * @param string $lastName2
	 */
	public function setLastName2($lastName2) {
		$this->lastName2 = $lastName2;
	}

	/**
	 * @return string
	 */
	public function getSex() {
		return $this->sex;
	}

	/**
	 * @param string $sex
	 */
	public function setSex($sex) {
		$this->sex = $sex;
	}

	/**
	 * @return string
	 */
	public function getDateBorn() {
		return $this->dateBorn;
	}

	/**
	 * @param string $dateBorn
	 */
	public function setDateBorn($dateBorn) {
		$this->dateBorn = $dateBorn;
	}

	/**
	 * @return string
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param string $email
	 */
	public function setEmail($email) {
		$this->email = $email;
	}

	/**
	 * @return string
	 */
	public function getCity() {
		return $this->city;
	}

	/**
	 * @param string $city
	 */
	public function setCity($city) {
		$this->city = $city;
	}

	/**
	 * @return string
	 */
	public function getCountry() {
		return $this->country;
	}

	/**
	 * @param string $country
	 */
	public function setCountry($country) {
		$this->country = $country;
	}

	/**
	 * @return string
	 */
	public function getAddress() {
		return $this->address;
	}

	/**
	 * @param string $address
	 */
	public function setAddress($address) {
		$this->address = $address;
	}

	/**
	 * @return string
	 */
	public function getDateRegister() {
		return $this->dateRegister;
	}

	/**
	 * @param string $dateRegister
	 */
	public function setDateRegister($dateRegister) {
		$this->dateRegister = $dateRegister;
	}

	/**
	 * @return string
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * @param string $image
	 */
	public function setImage($image) {
		if(!empty($image))
			$this->image = $image;
	}

	/**
	 * @return int
	 */
	public function getPoint() {
		return $this->point;
	}

	/**
	 * @param int $point
	 */
	public function setPoint($point) {
		$this->point = $point;
	}

	/**
	 * @return DocumentModel
	 */
	public function getDocModel() {
		return $this->docModel;
	}

	/**
	 * @param DocumentModel $docModel
	 */
	public function setDocModel($docModel) {
		$this->docModel = $docModel;
	}

	/**
	 * @return PhoneModel
	 */
	public function getPhoneModel() {
		return $this->phoneModel;
	}

	/**
	 * @param PhoneModel $phoneModel
	 */
	public function setPhoneModel($phoneModel) {
		$this->phoneModel = $phoneModel;
	}

	/**
	 * @return UserModel
	 */
	public function getUserModel() {
		return $this->userModel;
	}

	/**
	 * @param UserModel $userModel
	 */
	public function setUserModel($userModel) {
		$this->userModel = $userModel;
	}

	public function syncUp() {
		$listPerson = $this->select();
		foreach($listPerson as $person) {
			$this->id = $person['ID_PERSON'];
			$this->name = $person['NAME_PERSON'];
			$this->lastName = $person['LAST_NAME_PERSON'];
			$this->lastName2 = $person['LAST_NAME_PERSON2'];
			$this->sex = $person['SEX_PERSON'];
			$this->dateBorn = $person['DATE_BORN_PERSON'];
			$this->email = $person['EMAIL_PERSON'];
			$this->city = $person['CITY_PERSON'];
			$this->country = $person['COUNTRY_PERSON'];
			$this->address = $person['ADDRESS_PERSON'];
			$this->dateRegister = $person['DATE_REGISTER_PERSON'];
			$this->image = $person['IMAGE_PROFILE'];
			$this->point = $person['POINT_PERSON'];
		}

		$this->docModel = new DocumentModel($this->conexion);
		$this->docModel->setIdPerson($this->id);
		$this->docModel->syncUp();

		$this->phoneModel = new PhoneModel($this->conexion);
		$this->phoneModel->setIdPerson($this->id);
		$this->phoneModel->syncUp();
	}

	public function select() {
		$query = "SELECT *
	              FROM person
	              WHERE
	                 person.ID_PERSON='$this->id'";

		return $this->conexion->consultar($query);
	}

	public function insert() {
		$query2 = "SELECT u.ID_PERSON FROM user_name u WHERE u.NAME_USER='$this->email';";
		$resQuery2 = $this->conexion->consultar($query2);
		if(empty($resQuery2)) {//si el usuario no existe
			$query = "INSERT INTO person(ID_PERSON, NAME_PERSON, LAST_NAME_PERSON, LAST_NAME_PERSON2, SEX_PERSON, DATE_BORN_PERSON, EMAIL_PERSON, CITY_PERSON, COUNTRY_PERSON, ADDRESS_PERSON, DATE_REGISTER_PERSON, IMAGE_PROFILE, POINT_PERSON) 
			VALUES(DEFAULT,
				'$this->name',
				'$this->lastName',
				'$this->lastName2',
				'$this->sex',
				'$this->dateBorn',
				'$this->email',
				'$this->city',
				'$this->country',
				'$this->address',
				curdate(),
				'$this->image',
				'$this->point');";
			$this->id = $this->conexion->insert($query);

			$this->userModel = new UserModel($this->conexion);
			$this->userModel->insertUser($this->id, $this->password, $this->stateUser);
			$this->userModel->insertUserName($this->id, $this->email,$this->stateUser);
			$this->userModel->insertUserRol($this->id, $this->idRol);
		}
		else {//si el correo ya existe
			$this->id = -2;
		}

		return $this->id;
	}

	public function update() {
		if($this->id>0) {
			$query = "UPDATE person SET 
							NAME_PERSON='$this->name',
							LAST_NAME_PERSON='$this->lastName',
							LAST_NAME_PERSON2='$this->lastName2',
							SEX_PERSON='$this->sex',
							DATE_BORN_PERSON='$this->dateBorn',
							EMAIL_PERSON='$this->email',
							CITY_PERSON='$this->city',
							COUNTRY_PERSON='$this->country',
							ADDRESS_PERSON='$this->address',
							DATE_BORN_PERSON='$this->dateRegister',
							IMAGE_PROFILE='$this->image',
							POINT_PERSON=POINT_PERSON+'$this->point'
                WHERE
                	ID_PERSON='$this->id'";

			$this->conexion->update($query);

			$this->userModel = new UserModel($this->conexion);
			if (!empty($this->password)) {
				$this->userModel->updatePassUser($this->id, $this->password);
			}
			$this->userModel->updateUserName($this->id, $this->email,$this->stateUser);
			$this->userModel->updateRol($this->id, $this->idRol);

			return $this->id;
		}
		else {
			$this->id = $this->insert();
		}

		return $this->id;
	}

	public function delete() {
		$query = "UPDATE user_hotel set ID_STATE_USER=3 WHERE ID_PERSON='$this->id'";
		$this->conexion->update($query);
	}

	//*************************************************************************************************** PERSON **/

	public function getListPersonRol($idRol) {
		$query = "SELECT *
                FROM
                    person AS p,
                    user_hotel AS u,
                    rol AS r,
                    user_rol AS ur,
                    state_user AS s,
                    user_name AS n
                WHERE
                    p.ID_PERSON = u.ID_PERSON
                AND u.ID_PERSON = ur.ID_PERSON
                AND ur.ID_ROL = r.ID_ROL
                AND u.ID_STATE_USER = s.ID_STATE_USER
                AND u.ID_PERSON = n.ID_PERSON
                AND ur.ID_ROL='$idRol'
                AND s.VALUE_STATE_USER >= 0
                AND n.ACTIVE_USER >= 0
                GROUP BY
                    p.ID_PERSON";

		return $this->conexion->consultar($query);
	}

	public function updatePerson($idPerson, $name, $app, $apm, $sex, $dateNac, $email, $address, $city, $pais, $img, $point, $personDoc, $personPhone) {
		$where = '';
		if(!empty($img))
			$where = "IMAGE_PROFILE='$img',";
		if(!empty($email))
			$where = $where." EMAIL_PERSON='$email',";
		$query6 = "UPDATE person
                 SET
                    NAME_PERSON='$name',
                     LAST_NAME_PERSON='$app',
                     LAST_NAME_PERSON2='$apm',
                     SEX_PERSON='$sex',
                     DATE_BORN_PERSON='$dateNac',
                     CITY_PERSON='$city',
                     COUNTRY_PERSON='$pais',
                     ADDRESS_PERSON='$address',
                     $where
                     POINT_PERSON=POINT_PERSON+'$point'
                 WHERE ID_PERSON='$idPerson';";
		$this->conexion->update($query6);

		foreach($personPhone as $phone) {
			$this->phoneModel = new PhoneModel($this->conexion);
			$this->phoneModel->setIdPerson($idPerson);
			$this->phoneModel->setNumber($phone['nPhoneOld']);
			$this->phoneModel->syncUp();
			$this->phoneModel->delete();//eliminar el telefono anterior
			$this->phoneModel->setNumber($phone['nPhone']);
			$this->phoneModel->setIdType(1);//celular
			$this->phoneModel->insert();//insertar el numero de telefono actualizado
		}

		foreach($personDoc as $doc) {
			$this->docModel = new PhoneModel($this->conexion);
			$this->docModel->setIdPerson($idPerson);
			$this->docModel->setNumber($doc['nDocOld']);
			$this->docModel->syncUp();
			$this->docModel->delete();//eliminar el numero del documento anterior
			$this->docModel->setNumber($doc['nDoc']);
			$this->docModel->setIdType($doc['idType']);//celular
			$this->docModel->insert();//insertar el numero de documento actualizado
		}
	}

	public function getUltimateClient() {
		$query = "SELECT p.EMAIL_PERSON 
                FROM
                    check_person AS c
                INNER JOIN type_check AS t ON c.ID_TYPE_CHECK = t.ID_TYPE_CHECK
                INNER JOIN state_check AS s ON c.ID_STATE_CHECK = s.ID_STATE_CHECK
                INNER JOIN person AS p ON c.ID_PERSON_TITULAR = p.ID_PERSON
                WHERE
                    t.ID_TYPE_CHECK = 2
                ORDER BY DATE_REGISTER_PERSON DESC";
		$team = $this->conexion->consultar($query);
		$id = -1;
		if(!empty($team))
			$id = $team[0]['EMAIL_PERSON'];
		$res = $this->getPerson($id);

		return $res;
	}

	public function getPerson($nameUser) {
		//lista de personas con cuentas de usuario
		$question = "SELECT *
                    FROM
                        user_hotel AS u
                        INNER JOIN person AS p ON u.ID_PERSON = p.ID_PERSON
                        INNER JOIN state_user AS e ON u.ID_STATE_USER = e.ID_STATE_USER
                        INNER JOIN user_name AS n ON u.ID_PERSON = n.ID_PERSON
                        INNER JOIN user_rol AS ur ON u.ID_PERSON = ur.ID_PERSON
                        INNER JOIN rol AS r ON ur.ID_ROL = r.ID_ROL
                    WHERE
                        n.NAME_USER = '$nameUser'
                    GROUP BY p.ID_PERSON";
		return $this->conexion->consultar($question);
	}

	public function getPersonForId($idPerson) {
		if(!empty($idPerson)) {
			$question = "SELECT *
                        FROM
                            user_hotel AS u,
                            person AS p,
                            state_user AS e,
                            user_name AS n,
                            user_rol AS ur,
                            rol AS r
                        WHERE
                            u.ID_PERSON = p.ID_PERSON
                        AND u.ID_PERSON = n.ID_PERSON
                        AND p.ID_PERSON=$idPerson
                        AND e.ID_STATE_USER = u.ID_STATE_USER
                        AND u.ID_PERSON=ur.ID_PERSON
                        AND ur.ID_ROL=r.ID_ROL
                        GROUP BY p.ID_PERSON";
			$listUser = $this->conexion->consultar($question);
		}
		else {
			$question = "SELECT *
                        FROM
                            user_hotel AS u,
                            person AS p,
                            state_user AS e,
                            user_rol AS ur,
                            rol AS r
                        WHERE
                            u.ID_PERSON = p.ID_PERSON
                        AND p.ID_PERSON=$idPerson
                        AND e.ID_STATE_USER = u.ID_STATE_USER
                        AND u.ID_PERSON=ur.ID_PERSON
                        AND ur.ID_ROL=r.ID_ROL
                        GROUP BY p.ID_PERSON";
			$listUser = $this->conexion->consultar($question);
		}

		return $listUser;
	}
}