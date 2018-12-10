<?php
require_once "model/UserModel.php";
require_once "model/HotelModel.php";

abstract class Controller {
    protected $idHotel;
    protected $mesaje;
    protected $nameUser;

    protected $conexion;
    protected $consultas;
    protected $menu;
    protected $titles;
    protected $view;
    protected $breadCrumbs;

    public function __construct(){
        $this->menu=0;
        $this->nameUser=isset($_SESSION['NAME_USER'])?$_SESSION['NAME_USER']:'';
        $this->setMesaje('','');
        $this->titles=array();
        $this->conexion=new Conexion();
        $this->conexion->conectar();
        $this->consultas=new Consultas($this->conexion);
		$this->isExistHotel();
		$this->isExistUser();
		$this->breadCrumbs=new BreadCrumbs();
	}
    public abstract function indexAction();

	/**
	 * si el mensaje existe se lo mostrara en la vista como un alert
	 * @param $type: tipo del mensaje pueden ser: success, primary, info danger, warning
	 * @param $mesaje: contenido del mensaje
	 */
	protected function setMesaje($type,$mesaje){
    	//si no hay mensajes
        if(empty($type)&&empty($mesaje)){
            if(isset($_SESSION['MESSAGE_ALERT'],$_SESSION['TYPE_MESSAGE'],$_SESSION['STATE_MESSAGE'])){
                //la primera vez recuperar el valor del cookies
                if($_SESSION['STATE_MESSAGE']==0||$_SESSION['STATE_MESSAGE']==1){//
                    $type=$_SESSION['TYPE_MESSAGE'];
                    $mesaje=$_SESSION['MESSAGE_ALERT'];
                }
                $_SESSION['STATE_MESSAGE']=$_SESSION['STATE_MESSAGE']+1;
            }
        }
        //si existen mensajes validos para mostrar
        elseif(!empty($type)&&!empty($mesaje)){
            $_SESSION['TYPE_MESSAGE']=$type;
            $_SESSION['MESSAGE_ALERT']=$mesaje;
            $_SESSION['STATE_MESSAGE']=0;
        }
        $this->mesaje=array('type'=>$type,'mesaje'=>$mesaje);
    }

	/**
	 *verifica que exista al menos un hotel registrado
	 */
	private function isExistHotel(){
		$hotelModel=new HotelModel($this->conexion);
		$this->idHotel=$hotelModel->getIdHotel();
		if($this->idHotel<1&&isset($_SESSION['TYPE_USER'])&&$_SESSION['TYPE_USER']=='admin')
			$this->setMesaje('danger','Registre los datos del hotel <a href="hotel/edit/">Aqui</a>');
	}

	/**
	 * verifica q exista sesiones de usuario
	 * si no existen sesiones va a crear una sesion con credenciales free
	 *
	 * comprueba que exista al menos un usuario administrador
	 * si no existe administrador redirecciona a la pagina de registro de administrador
	 */
	private function isExistUser(){
        if(isset($_SESSION['ACTIVE'])){
            if($_SESSION['ACTIVE']==0){
                $this->setMesaje('warning','Registre al usuario Administrador');
                $_SESSION['TYPE_USER']=Constants::$TYPE_USER_FREE;
				header('Location: ' . Helper::base() . 'registerAdmin/');
            }
        }
        else{
            $userModel=new UserModel($this->conexion);
            $existAdmin=$userModel->existTypeUser($typeUser='1');//admin
            if(!$existAdmin){//cuando no existen admins activos
                $_SESSION['ACTIVE']=0;
                $this->setMesaje('warning','Registre al usuario Administrador');
				header('Location: ' . Helper::base() . 'registerAdmin/');
            }
            elseif($this->idHotel<=0&&$_SESSION['TYPE_USER']==Constants::$TYPE_USER_ADMIN)
                $this->setMesaje('danger','Rellene los datos del hotel <a href="hotel/edit/">Aqui</a>');
        }
    }
}
