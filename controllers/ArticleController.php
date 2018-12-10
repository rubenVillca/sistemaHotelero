<?php
require_once 'model/ArticleModel.php';
require_once 'model/ArticleConsumeModel.php';
require_once 'model/StateModel.php';

class ArticleController extends Controller {
	public function __construct() {
		parent::__construct();
	}

	public function indexAction() {
		$title = 'Listade articulos disponibles';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_SETTINGS;
		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('article/', 'Lista de articulos');

		$articleModel = new ArticleModel($this->conexion);
		$listArticle = $articleModel->select();

		return new View('articlePanel', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('listArticle'));
	}

	public function delete_ddAction($idArticle) {
		if(is_numeric($idArticle) && $idArticle>0) {
			$articleModel = new ArticleModel($this->conexion);
			$articleModel->setId($idArticle);
			$articleModel->syncUp();
			$articleModel->setState(-1);
			if($articleModel->update())
				$this->setMesaje('success', 'Articulo aliminado satisfactoriamente');
			else
				$this->setMesaje('warning', 'El articulo '.$articleModel->getName().' no se pudo eliminar');
		}
		header('Location: '.Helper::base().'article/');

		return 'Registro exitoso';
	}

	public function editAction($idArticle) {
		$title = 'Editar articulo';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_SETTINGS;

		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('article/edit/', 'Editar articulo');

		$articleModel = new ArticleModel($this->conexion);
		$articleModel->setId($idArticle);
		$article = $articleModel->select();
		if(!empty($article))
			$article = $article[0];

		return new View('articleEdit', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact('article'));
	}

	public function insertAction() {
		$title = 'Configurar estado de los registros de clientes';
		$_SESSION['MENU'] = Constants::$MENU_SELECTED_SETTINGS;

		$this->breadCrumbs->insertBread('settings/', 'Configurar sistema');
		$this->breadCrumbs->insertBread('article/insert/', 'Registrar articulo nuevo');

		return new View('articleInsert', $title, $this->breadCrumbs->getBreads(), $this->mesaje, compact(''));
	}

	public function insert_ddAction() {
		$articleModel = new ArticleModel($this->conexion);
		$articleModel->setName(isset($_POST['nameArticle']) ? $_POST['nameArticle'] : '');
		$articleModel->setDescription(isset($_POST['descrArticle']) ? $_POST['descrArticle'] : '');
		$articleModel->setState(isset($_POST['stateArticle']) ? $_POST['stateArticle'] : 0);
		$articleModel->setUnit(isset($_POST['nArticle']) ? $_POST['nArticle'] : 0);
		if($articleModel->insert())
			$this->setMesaje('success', 'Articulo insertado satisfactoriamente');
		else
			$this->setMesaje('danger', 'El articulo no pudo ser insertado');

		header('Location: '.Helper::base().'article/');

		return 'Registro exitoso';
	}

	public function edit_ddAction($idArticle) {
		$articleModel = new ArticleModel($this->conexion);
		$articleModel->setId($idArticle);
		$articleModel->syncUp();
		$articleModel->setName(isset($_POST['nameArticle']) ? $_POST['nameArticle'] : '');
		$articleModel->setDescription(isset($_POST['descrArticle']) ? $_POST['descrArticle'] : '');
		$articleModel->setState(isset($_POST['stateArticle']) ? $_POST['stateArticle'] : 0);
		$articleModel->setUnit(isset($_POST['nArticle']) ? $_POST['nArticle'] : 0);
		if($articleModel->update())
			$this->setMesaje('success', 'Articulo actualizado satisfactoriamente');
		else
			$this->setMesaje('danger', 'No se pudo actualizar el articulo '.$articleModel->getName());
		header('Location: '.Helper::base().'article/');

		return 'Registro exitoso';
	}
}
