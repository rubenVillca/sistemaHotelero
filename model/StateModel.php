<?php

class StateModel extends Consultas {
	private $id;
	private $name;
	private $description;
	private $value;
	private $nameTable;
	private $nameTableLower;

	public function __construct($conexion) {
		parent::__construct($conexion);
		$this->id = 0;
		$this->name = '';
		$this->description = '';
		$this->value = -5;//iniciado
		$this->nameTable='';
		$this->nameTableLower='';
	}

	/**
	 * @return int
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param int $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @return string
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * @param string $name
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * @return string
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @param string $description
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * @return int
	 */
	public function getValue() {
		return $this->value;
	}

	/**
	 * @param int $value
	 */
	public function setValue($value) {
		$this->value = $value;
	}

	/**
	 * @return mixed
	 */
	public function getNameTable() {
		return $this->nameTable;
	}

	/**
	 * @param mixed $nameTable
	 */
	public function setNameTable($nameTable) {
		$this->nameTable = strtoupper($nameTable);
		$this->nameTableLower=strtolower($nameTable);
	}

	public function syncUp(){
		$listState=$this->select();
		foreach($listState as $state) {
			$this->id = $state["ID_STATE_$this->nameTable"];
			$this->name = $state["NAME_STATE_$this->nameTable"];
			$this->description = $state["DESCRIPTION_STATE_$this->nameTable"];
			$this->value = $state["VALUE_STATE_$this->nameTable"];
		}
	}

	public function select() {
		$query = "SELECT *
	                FROM state_$this->nameTableLower 
	                WHERE
	                 if('$this->id'>0, ID_STATE_$this->nameTable='$this->id', ID_STATE_$this->nameTable>0) AND
	                if('$this->value'=-5, VALUE_STATE_$this->nameTable>=0, VALUE_STATE_$this->nameTable='$this->value')";
		$listType = $this->conexion->consultar($query);

		return $listType;
	}

	public function insert() {
		$query = "INSERT INTO state_$this->nameTableLower(
					ID_STATE_$this->nameTable, 
					NAME_STATE_$this->nameTable, 
					DESCRIPTION_STATE_$this->nameTable, 
					VALUE_STATE_$this->nameTable) 
				VALUES(
					DEFAULT ,
					'$this->name', 
					'$this->description',
					'$this->value'
				);";

		return $this->conexion->insert($query);
	}

	public function update() {
		$query = "UPDATE state_$this->nameTableLower
					SET NAME_STATE_$this->nameTable = '$this->name', 
					DESCRIPTION_STATE_$this->nameTable = '$this->description', 
					VALUE_STATE_$this->nameTable = '$this->value'
                WHERE
                    ID_STATE_$this->nameTable='$this->id'";

		return $this->conexion->update($query);
	}

	public function delete() {
		$query = "DELETE FROM state_$this->nameTableLower WHERE ID_STATE_$this->nameTable='$this->id'";
		$this->conexion->delete($query);
	}
}