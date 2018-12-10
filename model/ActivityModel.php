<?php
require_once 'model/TypeModel.php';
require_once 'model/StateModel.php';

class ActivityModel extends Consultas {
	private $id;
	private $idType;
	private $idState;
	private $name;
	private $description;
	private $dateStart;
	private $timeStart;
	private $dateEnd;
	private $timeEnd;
	private $image;
	private $typeModel;
	private $stateModel;

	public function __construct($conexion) {
		parent::__construct($conexion);
		$this->id          = 0;
		$this->idType      = 0;
		$this->idState     = 0;
		$this->name        = '';
		$this->description = '';
		$this->dateStart   = '';
		$this->timeStart   = '';
		$this->dateEnd     = '';
		$this->timeEnd     = '';
		$this->image       = '';
		$this->typeModel   = new TypeModel($this->conexion);
		$this->stateModel  = new StateModel($this->conexion);
	}

	/**
	 * @return TypeModel
	 */
	public function getTypeModel() {
		return $this->typeModel;
	}

	/**
	 * @param TypeModel $typeModel
	 */
	public function setTypeModel($typeModel) {
		$this->typeModel = $typeModel;
	}

	/**
	 * @return StateModel
	 */
	public function getStateModel() {
		return $this->stateModel;
	}

	/**
	 * @param StateModel $stateModel
	 */
	public function setStateModel($stateModel) {
		$this->stateModel = $stateModel;
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
	 * @return int
	 */
	public function getIdType() {
		return $this->idType;
	}

	/**
	 * @param int $idType
	 */
	public function setIdType($idType) {
		$this->idType = $idType;
	}

	/**
	 * @return int
	 */
	public function getIdState() {
		return $this->idState;
	}

	/**
	 * @param int $idState
	 */
	public function setIdState($idState) {
		$this->idState = $idState;
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
	 * @return string
	 */
	public function getDateStart() {
		return $this->dateStart;
	}

	/**
	 * @param string $dateStart
	 */
	public function setDateStart($dateStart) {
		$this->dateStart = $dateStart;
	}

	/**
	 * @return string
	 */
	public function getTimeStart() {
		return $this->timeStart;
	}

	/**
	 * @param string $timeStart
	 */
	public function setTimeStart($timeStart) {
		$this->timeStart = $timeStart;
	}

	/**
	 * @return string
	 */
	public function getDateEnd() {
		return $this->dateEnd;
	}

	/**
	 * @param string $dateEnd
	 */
	public function setDateEnd($dateEnd) {
		$this->dateEnd = $dateEnd;
	}

	/**
	 * @return string
	 */
	public function getTimeEnd() {
		return $this->timeEnd;
	}

	/**
	 * @param string $timeEnd
	 */
	public function setTimeEnd($timeEnd) {
		$this->timeEnd = $timeEnd;
	}

	/**
	 * @return string
	 */
	public function getImage() {
		return $this->image;
	}

	/**
	 * @param string $image
	 */
	public function setImage($image) {
		$this->image = $image;
	}

	public function syncUp() {
		//SinconizarActivityModel
		$listActivity = $this->select();
		foreach ($listActivity as $activity) {
			$this->id          = $activity['ID_ACTIVITY'];
			$this->idType      = $activity['ID_TYPE_ACTIVITY'];
			$this->idState     = $activity['ID_STATE_ACTIVITY'];
			$this->name        = $activity['NAME_ACTIVITY'];
			$this->description = $activity['DESCRIPTION_ACTIVITY'];
			$this->dateStart   = $activity['DATE_START_ACTIVITY'];
			$this->timeStart   = $activity['TIME_START_ACTIVITY'];
			$this->dateEnd     = $activity['DATE_END_ACTIVITY'];
			$this->timeEnd     = $activity['TIME_END_ACTIVITY'];
			$this->image       = $activity['IMAGE_ACTIVITY'];
			$this->typeModel   = $activity['NAME_TYPE_ACTIVITY'];
			$this->stateModel  = $activity['NAME_STATE_ACTIVITY'];
		}
		//sincronizar typeActivityModel
		$this->typeModel = new TypeModel($this->conexion);
		$this->typeModel->setId($this->id);
		$this->typeModel->setNameTable('ACTIVITY');
		$this->typeModel->syncUp();
		//sincronizar stateActivityModel
		$this->stateModel = new StateModel($this->conexion);
		$this->stateModel->setId($this->id);
		$this->stateModel->setNameTable('ACTIVITY');
		$this->stateModel->syncUp();
	}

	public function select() {
		$query
			= "SELECT *
	                FROM activity as a
	                INNER JOIN type_activity as t ON a.ID_TYPE_ACTIVITY = t.ID_TYPE_ACTIVITY
	                INNER JOIN state_activity as s ON a.ID_STATE_ACTIVITY = s.ID_STATE_ACTIVITY
	                WHERE
	                 if('$this->id'>0,ID_ACTIVITY='$this->id',a.ID_ACTIVITY>0)
	                AND if('$this->idType'>0,a.ID_TYPE_ACTIVITY='$this->idType',a.ID_TYPE_ACTIVITY>0)
	                AND if('$this->idState'>0,a.ID_STATE_ACTIVITY='$this->idState',a.ID_STATE_ACTIVITY>0)
	                AND (a.DATE_START_ACTIVITY>=curdate() OR a.DATE_START_ACTIVITY=curdate() AND a.TIME_START_ACTIVITY>=curtime())";

		return $this->conexion->consultar($query);
	}

	public function update() {
		if ($this->id) {
			$query
				= "UPDATE activity as a SET 
						ID_ACTIVITY='$this->id',
						ID_TYPE_ACTIVITY='$this->idType',
						ID_STATE_ACTIVITY='$this->idState',
						NAME_ACTIVITY='$this->name',
						DESCRIPTION_ACTIVITY='$this->description',
						DATE_START_ACTIVITY='$this->dateStart',
						TIME_START_ACTIVITY='$this->timeStart',
						DATE_END_ACTIVITY='$this->dateEnd',
						TIME_END_ACTIVITY='$this->timeEnd',
						IMAGE_ACTIVITY='$this->image'	
		            WHERE
		                if('$this->id'>0,ID_ACTIVITY='$this->id',true)";
			//refactorizado ya no se toma encuenta los estados y tipo para actualizar
			//AND if('$this->idType'>0,a.ID_TYPE_ACTIVITY='$this->idType',a.ID_TYPE_ACTIVITY>0)
			//AND if('$this->idState'>0,a.ID_STATE_ACTIVITY='$this->idState',a.ID_STATE_ACTIVITY>0)";
			return $this->conexion->update($query);
		} else {
			return $this->insert();
		}
	}

	public function insert() {
		$query
			= "INSERT INTO activity(ID_ACTIVITY, ID_TYPE_ACTIVITY, ID_STATE_ACTIVITY, NAME_ACTIVITY, DESCRIPTION_ACTIVITY, DATE_START_ACTIVITY, TIME_START_ACTIVITY, DATE_END_ACTIVITY, TIME_END_ACTIVITY, IMAGE_ACTIVITY) 
			VALUES(DEFAULT,
			'$this->idType',
			'$this->idState',
			'$this->name',
			'$this->description',
			'$this->dateStart',
			'$this->timeStart',
			'$this->dateEnd',
			'$this->timeEnd',
			'$this->image'
			);";

		return $this->conexion->insert($query);
	}

	public function delete() {
		$query = "DELETE FROM activity WHERE ID_ACTIVITY='$this->id'";
		$this->conexion->delete($query);
	}
}
