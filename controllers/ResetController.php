<?php
/**
 * Created by PhpStorm.
 * User: genshiken
 * Date: 14 sep 2018
 * Time: 13:46
 */

class ResetController extends Controller {

	public function indexAction() {
		//$this->deleteData();
		$this->insertData();
		return '';
	}
	public function deleteData(){
		$query="
		USE master;
		GO
		DROP DATABASE hotel;
		GO
		";
		$this->conexion->delete($query);
	}
	public function insertData(){
		$query="
				
		
		";
		$this->conexion->insert($query);
	}
}