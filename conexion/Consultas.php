<?php

class Consultas {
	protected $conexion;

	public function __construct($conexion) {
		if(is_a($conexion, 'Conexion'))
			$this->conexion = $conexion;
		else {
			$this->conexion = new Conexion();
			$this->conexion->conectar();
		}
	}

	public function ping() {
		return $this->conexion->ping();
	}
}
