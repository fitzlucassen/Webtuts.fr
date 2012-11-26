<?php 

$GLOBALS["SQL_existing_table"] = array();

/*
	Class User
	Description : 
		-
		-
*/


class Sql2 {

	public static $TYPE_SELECT = "_SELECT";
	public static $TYPE_INSERT = "_INSERT";
	public static $TYPE_UPDATE = "_UPDATE";

	public static $OPE_DEFAULT = "=";
	public static $OPE_EQUAL = "=";
	public static $OPE_NOT_EQUAL = "!=";
	public static $OPE_UPPER_EQUAL = ">=";
	public static $OPE_LOWER_EQUAL = "<=";
	public static $OPE_UPPER = ">";
	public static $OPE_LOWER = "<";
	

	var $type;

	var $select;
	var $from;
	var $where;
	var $columns;
	var $values;
	var $orderby;
	var $limit;

	public function __construct() {
	}

	static public function create() {
		return new Sql2();
	}

	public function select($select = null) {
		$this->type = Sql2::$TYPE_SELECT;
		for($cpt=0;$cpt<func_num_args();$cpt++)
			$this->select[] = func_get_arg($cpt);
		return $this;
	}

	public function insert($into) {
		$this->type = Sql2::$TYPE_INSERT;
		$this->from = ucfirst($into);
		return $this;
	}

	public function update($table) {
		$this->type = Sql::$TYPE_UPDATE;
		$this->from = $table;
		return $this;
	}

	public function columns($columns) {
		$this->columns = $columns;
		return $this;
	}

	public function values($values) {
		$this->values = $values;
		return $this;
	}

	public function value($column, $value) {
		$this->columns[] = $column;
		$this->values[] = $value;
		return $this;
	}

	public function from($from) {
		$this->type = Sql2::$TYPE_SELECT;
		for($cpt=0;$cpt<func_num_args();$cpt++)
			$this->from[] = func_get_arg($cpt);
		return $this;
	}

	public static function n($class) {
		return new $class();
	}

	public function where($attribut, $condition=null, $param=null) {
		$this->where[] = array("where", $attribut, $condition, $param);
		return $this;
	}

	public function andWhere($attribut, $condition=null, $param=null) {
		$this->where[] = array("andwhere", $attribut, $condition, $param);
		return $this;
	}
	public function orWhere($attribut, $condition=null, $param=null) {
		$this->where[] = array("orwhere", $attribut, $condition, $param);
		return $this;
	}
	public function orderBy($column, $way) {
		$this->orderby = array($column, $way);
		return $this;
	}
	public function limit($start=0, $end=null) {
		$this->limit = array($start, $end);
		return $this;
	}

	private function getRequete() {
		$requete = "";
		if($this->type == $Sql2::$TYPE_SELECT)
			$requete = $this->getSelectRequete();
		elseif($this->type == $Sql2::$TYPE_INSERT)
			$requete = $this->getInsertRequete();
		elseif($this->type == $Sql2::$TYPE_UPDATE)
			$requete = $this->getUpdateRequete();
		else
			return new Error(1);
		return $requete;
	}

	private function getSelectRequete() {
		$requete = "SELECT ";
		// SELECT
		if(empty($this->select))
			$requete .= "*";
		elseif(is_array($this->select)) {
			$cpt = 0;
			foreach($this->select as $value) {
				if($cpt!=0) $requete .= ", ";
				$requete .= $value;
	    		$cpt++;
	    	}
		}
		else {
			$requete .= $this->select;
		}
		return $requete; 
	}

	
	public function fetchClass() {
		if(!class_exists($this->class))
			$class = "Std";
		else $class = $this->class;
		$requete = $this->getRequete();
		$return = mysql_fetch_object(mysql_query($requete), $class);
		$return->setNameClass($this->class);
		return $return;
	}


	public function fetchOne($rang = 0) {
		return mysql_result(mysql_query($this->requete), $rang);
	}
	public function fetch() {
		return mysql_query($this->requete);
	}
	public function fetchArray() {
		$class = ucfirst($this->class);
		$collection = new Collection();
		$sql = mysql_query($this->requete);
		while($result = mysql_fetch_assoc($sql))
			$collection->hydrate(Std::n($class)->hydrate($result));
		return $collection;
	}
	public function execute() {
		if($this->type == Sql::$_INSERT)
			$this->insertCreateRequete();
		else if($this->type == Sql::$_UPDATE && $this->action)
			$this->insertInsertRequete();
		mysql_query($this->requete);
		return mysql_insert_id();
	}
	public function executeClass() {
		mysql_query($this->requete);
		return Sql::create()->from(mb_strtolower($this->class))->where("id=".mysql_insert_id())->fetchClass();
	}

	public function showRequete() {
		return $this->getRequete();
	}
	public function getClassAttribut() {
		return $this->class;
	}

	public static function table_exist($table){
		return SQL_table_exist($table);
	}

}


?>