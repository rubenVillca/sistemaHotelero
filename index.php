<?php
require_once 'configuration/Autoload.php';
$autoload=new Autoload();

function dd($var) {
	if (!is_array($var))
		echo $var;
	echo '<br>';

	echo "<pre>";
	var_dump($var);
	echo "</pre>";
	die(0);
}
//llamar al controlador indicado segun la url de get['url'] y verificar q no el estado de la url
$url=empty($_GET['url'])?'':$_GET['url'];
session_start();
$request=new Request($url);
$request->execute();