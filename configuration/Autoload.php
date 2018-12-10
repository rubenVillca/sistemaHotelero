<?php
class Autoload{
    // el frontend controller se encarga de configura la aplicacion
    public function __construct(){
	    //configuracion
	    require_once 'configuration/Configuration.php';
        //conexion
        require_once 'conexion/Conexion.php';
        require_once 'conexion/Consultas.php';
        //rutas
        require_once 'routes/Routes.php';
        //controllers
        require_once 'configuration/Controller.php';
        require_once 'configuration/Service.php';
        //util
        require_once 'helper/Helper.php';
	    require_once 'helper/Constants.php';
        require_once 'helper/Img.php';
        require_once 'helper/BreadCrumbs.php';
        //library
        require_once 'configuration/Response.php';
        require_once 'configuration/Request.php';
        require_once 'configuration/View.php';
    }
}