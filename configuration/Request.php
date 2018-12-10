<?php

class Request {
	private static $is_android          = 0 ;
	protected      $user;//identificador unico de usuario
	protected      $controller;//tipo de usuario que ingreso al sistema [diferentes permisos]
	protected      $defaultController   = 'home';               //primer parametro de la url
	protected      $action;//nombre de la pagina  por defecto
	protected      $defaultAction       = 'index';                  //segundo parametro de la url
	protected      $params              = array();//accion por defecto de las clases de cntroladores usadas
	protected      $defaultFile404      = 'controllers/Error404Controller.php';          //tercer parametro de la url
	protected      $defaultClassName404 = 'Error404Controller';//controlador de la pagina no encontrada
	private        $typeUser;//nombre de la clase no encontrada

	/** divide los segmentos de la url que estan entre '/' *
	 *
	 * @param $url :direccion de la pagina
	 */
	public function __construct($url) {
		$segments = explode('/', $url);
		$this->resolveController($segments);//primer    fragemnto de la url ->nombre de la clase
		$this->resolveAction($segments);    //segundo   fragmento de la url ->nombre del metodo
		$this->resolveParams($segments);    //tercer    fregmento de la url
	}

	/**resuelve el momento de ejecutar el controlador**/
	public function execute() {
		$this->resolveTypeUser();
		//concatenar texto del controlador, accion y verificar q existan
		list($controllerClassName, $controllerFileName, $actionMethodName, $params) = $this->resolveFileController();

		//si el usuario tiene permisos
		if (!empty($actionMethodName)) {
			//carga pagina principal de usuario
			if (file_exists($controllerFileName)) {
				require $controllerFileName;
			}

			$controllerName = new $controllerClassName();
			//comprueba que la clase usada sea valida y usa la funcion execute del controllador indicado
			if (!method_exists($controllerName, $actionMethodName)) {
				require $controllerFileName = $this->defaultFile404;//cargar controlador de action404
				list($controllerName, $actionMethodName, $params) = $this->resolveMethod404();
			}
		} else {//si el usuario no tiene permiso
			require $controllerFileName = $this->defaultFile404;//cargar controlador de action404
			list($controllerName, $actionMethodName, $params) = $this->resolveMethod404();
		}
		$response = call_user_func_array([$controllerName, $actionMethodName], $params);
		$this->executeResponse($response);
	}

	/**
	 * @sres verifica que $response sea una instancia de 'response' y luego lo ejecuta la pagina 'view.php'
	 * @param $response : respuesta del controlador
	 */
	public function executeResponse($response) {
		if ($response instanceof Response) {
			$response->execute();
		} elseif (is_string($response)) {
			echo $response;
		} elseif (is_array($response)) {
			json_encode($response);
		} else {
			exit('Respuesta no valida');
		}
	}

	public function getAction() {
		$this->action = Routes::getListFunction($this->controller, $this->action, $this->typeUser);
		if (empty($this->action))
			$this->action = '';

		return $this->action;
	}

	/**
	 * @return string: convierte los nombre de los segundos parametros de la url en convencion de programdor;
	 * empieza con minuscula y los metodos que estan separados por '-' a mayusculas las primeras letras;
	 */
	public function getActionMethodName() {
		$nameAction = Helper::lowerCamel($this->getAction());

		return empty($nameAction) ? '' : $nameAction . 'Action';
	}

	/**
	 * @return string: devuelve el nombre de la clase del controlador
	 **/
	public function getControllerClassName() {
		if ($this->typeUser == 'android') {
			return Helper::camel($this->controller) . 'AndroidController';
		} else {
			return Helper::camel($this->controller) . 'Controller';
		}
	}

	/**
	 * @return string: crea el nombre completo del archivo controladdor que se va usar****
	 **/
	public function getControllerFileName() {
		if ($this->typeUser == 'android') {
			return 'controllersAndroid/' . $this->getControllerClassName() . '.php';
		} else {
			return 'controllers/' . $this->getControllerClassName() . '.php';
		}
	}

	public function getParams() {
		return $this->params;
	}

	/**
	 * resuelve la tercera seccion de la url
	 * resuelve el nombre de la accion[metodo] a ejecutar del controlador;
	 * si la accion valida es vacia usa la el metodo por defecto
	 *
	 * @param $segments :fragemento de la url
	 **/
	public function resolveAction(&$segments) {
		$this->action = array_shift($segments);
		if (empty($this->action)) {
			$this->action = $this->defaultAction;
		}
	}

	/**
	 * resuelve el nombre del controlador a ejecutar; de la primera seccion de la url
	 * sino hay controlador valido usa el controlador por defecto
	 *
	 * @param $segments :fragemento de la url
	 */
	public function resolveController(&$segments) {
		$this->controller = array_shift($segments);
		if (empty($this->controller)) {
			$this->controller = $this->defaultController;
		}
	}

	/**
	 * resuelve si la url tiene un tercer parametro o si tiene mas
	 *
	 * @param $segments :fragemento de la url
	 **/
	public function resolveParams(&$segments) {
		$this->params = $segments;
		if (empty($this->params)) {
			$this->params = array('');
		}
	}

	/**
	 * @return array: si no existe el archivo cargar el controlador 404
	 */
	private function resolveController404() {
		$controllerFileName  = $this->defaultFile404;
		$controllerClassName = 'Error404Controller';
		$actionMethodName    = $this->defaultAction . 'Action';
		$params              = array();

		return array($controllerFileName,
		             $controllerClassName,
		             $actionMethodName,
		             $params);
	}

	/**
	 * verifica si existe el controldor indicado
	 *
	 * @return array
	 */
	private function resolveFileController() {
		$actionMethodName    = $this->getActionMethodName();
		$controllerClassName = $this->getControllerClassName();
		$controllerFileName  = $this->getControllerFileName();
		$params              = $this->getParams();
		//si no existe el archivo de la pagina elegida en la url
		if (!file_exists($controllerFileName)) {
			list($controllerFileName, $controllerClassName, $actionMethodName, $params) = $this->resolveController404();
		}

		return array($controllerClassName,
		             $controllerFileName,
		             $actionMethodName,
		             $params);
	}

	/**
	 * @return array: si no existe el metodo(accion) en el controlador para cargar el metodo 404
	 */
	private function resolveMethod404() {
		$controllerName   = new Error404Controller();
		$actionMethodName = $this->defaultAction . 'Action';
		$params           = array();

		return array($controllerName,
		             $actionMethodName,
		             $params);
	}

	/**
	 * asignar user free si no tiene un tipo de usuario definido
	 **/
	private function resolveTypeUser() {
		/*controlar si ha iniciado sesion */
		if (Request::$is_android) {//probando app android
			$this->typeUser       = Constants::$TYPE_USER_ANDROID;
			$_SESSION['TYPE_USER'] = Constants::$TYPE_USER_ANDROID;//usuario para hacer pruebas
			$_SESSION['NAME_USER'] = '';//usuario para hacer pruebas
		} else {
			if (isset($_SESSION['TYPE_USER'])) {//si es un usuario del sistema desde una web
				$this->user     = $_SESSION['NAME_USER'];
				$this->typeUser = $_SESSION['TYPE_USER'];
			} elseif (isset($_POST['android'])) {//se es un usuario de la aplicacion
				$this->typeUser       = Constants::$TYPE_USER_ANDROID;
				$_SESSION['TYPE_USER'] = '';
				$_SESSION['NAME_USER'] = isset($_POST['nameUser']) ? $_POST['nameUser'] : '';
			} else {//si no es un usuario no registrdo o validado
				$this->typeUser       = Constants::$TYPE_USER_FREE;
				$_SESSION['TYPE_USER'] = Constants::$TYPE_USER_FREE;
				$_SESSION['NAME_USER'] = '-1';
			}
		}
	}
}
