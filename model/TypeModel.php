<?php

class TypeModel extends Consultas {
	private $id;
	private $name;
	private $description;
	private $date;
	private $time;
	private $image;
	private $value;
	private $nameTable;
	private $nameTableLower;

	/**
	 * TypeModel constructor.
	 *
	 * @param $conexion
	 */
	public function __construct($conexion) {
		parent::__construct($conexion);
		$this->id             = 'DEFAULT';
		$this->name           = '';
		$this->description    = '';
		$this->date           = date('Y-m-d');
		$this->time           = date('H:i:s');
		$this->image          = '';
		$this->value          = -5;
		$this->nameTable      = '';
		$this->nameTableLower = '';
	}

	public function syncUp() {
		$listType = $this->select();
		foreach ($listType as $type) {
			$this->id          = $type["ID_TYPE_$this->nameTable"];
			$this->name        = $type["NAME_TYPE_$this->nameTable"];
			$this->description = $type["DESCRIPTION_TYPE_$this->nameTable"];
			$this->date        = $type["DATE_TYPE_$this->nameTable"];
			$this->time        = $type["TIME_TYPE_$this->nameTable"];
			$this->image       = $type["IMAGE_TYPE_$this->nameTable"];
			$this->value       = $type["VALUE_TYPE_$this->nameTable"];
		}
	}

	public function select() {
		$query
			      = "SELECT *
	                FROM type_$this->nameTableLower 
	                WHERE
	                 if('$this->id'>0, ID_TYPE_$this->nameTable='$this->id', ID_TYPE_$this->nameTable>0) AND
	                if('$this->value'=-5, VALUE_TYPE_$this->nameTable>=0, VALUE_TYPE_$this->nameTable='$this->value')";
		$listType = $this->conexion->consultar($query);

		return $listType;
	}

	public function insert() {
		$query
			= "INSERT INTO type_$this->nameTableLower(
					ID_TYPE_$this->nameTable, 
					NAME_TYPE_$this->nameTable, 
					DESCRIPTION_TYPE_$this->nameTable,
					DATE_TYPE_$this->nameTable,
					TIME_TYPE_$this->nameTable, 
					IMAGE_TYPE_$this->nameTable, 
					VALUE_TYPE_$this->nameTable) 
				VALUES(
					DEFAULT ,
					'$this->name', 
					'$this->description',
					'$this->date', 
					'$this->time', 
					'$this->image',
					'$this->value'
				);";

		return $this->conexion->insert($query);
	}

	public function update() {
		$query
			= "UPDATE type_$this->nameTableLower
					SET NAME_TYPE_$this->nameTable = '$this->name', 
					DESCRIPTION_TYPE_$this->nameTable = '$this->description',
					DATE_TYPE_$this->nameTable = '$this->date', 
					TIME_TYPE_$this->nameTable = '$this->time',
					IMAGE_TYPE_$this->nameTable = '$this->image', 
					VALUE_TYPE_$this->nameTable = '$this->value'
                WHERE
                    ID_TYPE_$this->nameTable='$this->id'";

		return $this->conexion->update($query);
	}

	public function delete() {
		$query = "DELETE FROM type_$this->nameTableLower WHERE ID_TYPE_$this->nameTable='$this->id'";
		$this->conexion->delete($query);
	}

	/**
	 * @return mixed
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param mixed $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @return mixed
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param mixed $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @return mixed
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @param mixed $description
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * @return mixed
	 */
	public function getDate() {
		return $this->date;
	}

	/**
	 * @param mixed $date
	 */
	public function setDate($date) {
		$this->date = $date;
	}

	/**
	 * @return mixed
	 */
	public function getTime() {
		return $this->time;
	}

	/**
	 * @param mixed $time
	 */
	public function setTime($time) {
		$this->time = $time;
	}

	/**
	 * @return mixed
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * @param mixed $image
	 */
	public function setImage($image) {
		$this->image = $image;
	}

	/**
	 * @return mixed
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 * @param mixed $value
	 */
	public function setValue($value) {
		$this->value = $value;
	}

	/**
	 * @return string
	 */
	public function getNameTable() {
		return $this->nameTable;
	}

	/**
	 * @param string $nameTable
	 */
	public function setNameTable($nameTable) {
		$this->nameTable      = strtoupper($nameTable);
		$this->nameTableLower = strtolower($nameTable);
	}
}
