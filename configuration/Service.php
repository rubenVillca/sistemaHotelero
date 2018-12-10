<?php
/**
 * Created by PhpStorm.
 * User: genshiken
 * Date: 9 sep 2018
 * Time: 19:09
 */

abstract class Service {
	protected $conexion;
	protected $idHotel;

	/**
	 * Service constructor.
	 * @param $conexion
	 * @param $idHotel
	 */
	public function __construct($conexion, $idHotel) {
		$this->conexion = $conexion;
		$this->idHotel  = $idHotel;
	}


}