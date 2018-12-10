<?php
require_once "controllers/Widgets.php";

class View extends Response {
	protected $template;
	protected $cabecera;
	protected $title;
	protected $vars;
	protected $mesaje;
	protected $typeUser;

	public function __construct($template, $title, $cabecera, $mesaje, $vars = array()) {
		$this->template = $template;
		$this->title = $title;
		$this->cabecera = $cabecera;
		$this->vars = $vars;
		$this->mesaje = $mesaje;
		$this->typeUser = isset($_SESSION['TYPE_USER'])?$_SESSION['TYPE_USER']:Constants::$TYPE_USER_FREE;
	}

	/**
	 * @param string $typeUser
	 */
	public function setTypeUser($typeUser) {
		$this->typeUser = $typeUser;
	}

	public function execute() {
		$template = $this->template;
		$vars = $this->vars;
		$cabecera = $this->cabecera;
		$title = $this->title;
		$typeUser = $this->typeUser;
		$mesaje = $this->mesaje;

		call_user_func(function () use ($template, $vars, $cabecera, $title, $typeUser, $mesaje) {
			//funcion que convierte las varialbles del array en variables individuales
			extract($vars);
			$nameFileTemplate = $this->getNameFileTemplate();
			$nameFileLayout = $this->getNameFileLayout();
			if (!file_exists($nameFileTemplate)) { //si no existe la pagina cargar error 404
				$nameFileTemplate = "views/fragment/error/errorPlantilla.blade.php";
				$nameFileLayout = "views/layout/layout_404.blade.php";
			}

			if (file_exists($nameFileTemplate)) {//si la plantilla existe
				ob_start();

				if ($this->typeUser!=Constants::$TYPE_USER_FREE) {
					$widgets = new Widgets();
					$listTypeMesajes = $widgets->getListTypeMesaje();//
					$totalMesajes = $widgets->getTotalMesajes();//
					$listActivityWidget = $widgets->getListActivity();//
					$listInquest = $widgets->getListInquest();//
					$_SESSION['nFoodPending'] = $widgets->getListOrder();
					$_SESSION['nReserveTotal']=$nCheckTotal=$widgets->getListCheckReserveActive();
					$_SESSION['nCheckTotal']=$nCheckTotal=$widgets->getListCheckActive()+$_SESSION['nReserveTotal'];
				}

				require $nameFileTemplate;
				$tpl_content = ob_get_clean();
				$tpl_content = $this->eliminarComentarios($tpl_content);
				require $nameFileLayout;
			}
		});
	}

	/*** Generador de la pagina de usuario solicitada***/
	private function getNameFileTemplate() {
		$template = $this->template;
		$urlFile = 'views/' . $template . ".blade.php";
		return $urlFile;
	}

	private function getNameFileLayout() {

		if (!empty($this->typeUser)) {
			$urlFile = "views/layout/layout_$this->typeUser.blade.php";
		} else {
			$urlFile = "views/layout/layout_404.blade.php";
		}
		return $urlFile;
	}

	private function eliminarComentarios($tpl_content) {
		return preg_replace('/<!--(.|\s)*?-->/', '', $tpl_content);
	}
}
