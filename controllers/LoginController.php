<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 03/09/2017
 * Time: 15:20
 */

class LoginController extends Controller {
	public function indexAction() {
		$title = 'Iniciar sesion';
		//$this->breadCrumbs->insertBread('login/', 'Iniciar sesion');
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_LOGIN;

		return new View('login', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact(''));
	}

	public function loginAction() {
		if(!empty($_POST['user']) && !empty($_POST['pass'])) {
			$user = $_POST['user'];
			$pass = $_POST['pass'];
			if($this->iniciarSession($user, $pass)) {
				header('Location: '.Helper::base());
				return 'registro exitoso';
			}else{
				$this->setMesaje('warning', 'Usuario o contraseña incorrectos');
			}
		}
		else {
			$this->setMesaje('warning', 'Rellene los campos debidamente');
		}

		header('Location: '.Helper::base().'login/');
		return 'Registro fallido';
	}

	public function logoutAction() {
		$title = 'Cerrando session';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_HOME;
		//cerrar conexion
		$conexion = new Conexion();
		$conexion->conectar();
		$conexion->desconectar();
		//eliminar sesiones abiertas
		unset($_SESSION['TYPE_USER']);
		unset($_SESSION['NAME_USER']);
		unset($_SESSION['ID_PERSON']);
		unset($_SESSION['REGISTER_GUEST']);
		unset($_SESSION['ACTIVE_CHECK']);
		session_unset();
		//session_destroy();
		header('Location: '.Helper::base());

		return new View('home', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact(''));
	}

	private function iniciarSession($user, $pass) {
		$userModel = new UserModel($this->conexion);
		$typeUser=Constants::$TYPE_USER_FREE;
		$user = $userModel->getLogin($user);
		if(empty($user)) {////si el usuario o contrasenia son incorrectos
			$this->setMesaje('warning', 'Nombre de usuario incorrectos');
		}
		else {//si el usaurio esta en la base de datos.
			foreach($user as $u) {
				//si el nombre de usuario esta activo
				if(!empty($u['NAME_USER']) && $u['ACTIVE_USER'] && $u['VALUE_STATE_USER']) {
					if(password_verify($pass, $u['PASSWORD'])) {
						$typeUser = $u['NAME_ROL'];
						$_SESSION['ID_PERSON'] = $u['ID_PERSON'];
						$_SESSION['NAME_USER'] = $u['NAME_USER'];
						$_SESSION['REGISTER_GUEST']=0;
						break;
					}
					else {
						$this->setMesaje('warning', 'Contraseña incorrecta');
					}
				}
				else {
					$this->setMesaje('danger', 'Cuenta de usuario no activo');
				}
			}
		}
		$_SESSION['TYPE_USER'] = $typeUser;
		return Constants::$TYPE_USER_FREE!=$_SESSION['TYPE_USER'];
	}
}
