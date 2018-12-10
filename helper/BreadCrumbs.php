<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 03/09/2017
 * Time: 10:42
 */

class BreadCrumbs {
	private $breads;

	/**
	 * BreadCrumbs constructor.
	 */
	public function __construct() {
		$this->breads = array(array('home/','Inicio'));
	}

	public function insertBread($url,$title){
		$this->breads[]=array($url,$title);
	}

	/**
	 * @return array
	 */
	public function getBreads() {
		if (count($this->breads)<=1){
			$this->breads=array();
		}
		return $this->breads;
	}

}