<?php

/*
	Class User
	Description : 
		-
		-
*/


class App {

	static public function getClass($class, $param=0) {
		if(!empty($param)) {
			if(is_array($param)) {
				return App::requete($class, $param)->fetchClass();
			}
			else if(is_numeric($param))
				return Sql2::create()->from($class)->where("id", Sql2::$OPE_EQUAL, $param)->fetchClass();
			else
				return Error(1);
		}
		else {
			if(class_exists($class))
				return new $class();
			else
				return new Std($class);
		}	
	}

	static public function getClassArray($class, $param=null) {
		if(!empty($param))
			return App::requete($class, $param)->fetchClassArray();
		else
			return Sql2::create()->from($class)->fetchClassArray();
	}

	static public function createClass($class, $params) {
		return Sql2::create()
					->insert($class)
					->columnsValues($params)
					->execute();
	}

	static public function getTable($table) {
		$tableName = ucfirst($table)."Table";
		if(!class_exists($tableName))
			return new StdTable($table);
		else 
			return new $tableName();
	}

/*
	public function setClassArray($value) {
		$this->classArray = $value;
	}
	static public function getClassArray($class) {
		$return = new App();
		$return->setClassArray(Sql::create()->from($class));//->orderBy("id", "DESC")->limit($start, $limit)->fetchArray();
		return $return;
	}
	public function orderBy($column = "id", $way = "DESC") {
		$this->classArray->orderBy($column, $way);
		return $this;
	}
	public function limit($start=0, $limit=null) {
		$this->classArray->limit($start, $limit);
		return $this;
	}
	public function fetch() {
		return $this->classArray->fetchArray();
	}*/
/*
	private static function requete($class, $param) {
		$return = Sql::create()->from($class);
		if(array_key_exists("where", $param)) {
			if(!is_array($param["where"]))
				return new Error(1);
			$tab = $param["where"];
			$where = "";
			$cpt = 0;
			foreach ($tab as $key => $value) {
				if($cpt!=0) $where .= " AND ";
				$where .= $key;
					if(is_array($value)) {
						$where .= " ".$value[0];
						$where .= " ".$value[1];
					}
					else {
						$where .= " ".SQL::$DEFAULT;
						$where .= " ".$value;
					}
				$cpt++;
			}

			$return->where($where);
		}
		if(array_key_exists("orderBy", $param)) {
			if(is_array($param["orderBy"]))	{
				$start = $param["orderBy"][0];
				if(!isset($param["orderBy"][1]))
					$stop = "ASC";
				else $stop = $param["orderBy"][1];
			} 
			else {
				$start = $param["orderBy"];
				$stop = "ASC";
			}
			$return->orderBy($start, $stop);
		}
		if(array_key_exists("limit", $param)) {
			if(is_array($param["limit"])) {
				$start = $param["limit"][0];
				$nb = $param["limit"][1];
			} 
			else {
				$start = 0;
				$nb = $param["limit"];
			}
			$return->limit($start, $nb);
		}
		return $return;
	}
*/


}