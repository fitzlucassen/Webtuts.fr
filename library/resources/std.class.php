<?php

/*
	Class Std
	Description : 
		-
		-
*/

class Std {

	var $_class;

	public function setNameClass($class) {
		$this->_class = $class;
	}

	public function exist() {
		if(!empty($this->id)) $bool = true;
		else $bool = false;
		return $bool;
	}

	public function __construct($params=null, $class=null) {
		if($class==null)
			$this->_class=get_class($this);
		else
			$this->_class=$class;
		if($params==null) 
			$this->getConnection();
		else
			$this->hydrate($params);
		return $this;
	}

	static public function n($class) {
		if(class_exists($class)) {
			$tmp = new $class();
			$tmp->setNameClass($class);
			return $tmp;
		}
		else {
			$tmp = new Std();
			$tmp->setNameClass($class);
			return $tmp;
		}
	}

	public function have($attribut) {
		if(is_object($attribut))
			if($attribut>0) $bool = true;
			else $bool = false;
		else {
			if(!empty($attribut)) $bool = true;
			else $bool = false;
		}
		return $bool;
	}

	/* Getter */
	public function get($attribut) {
		if(isset($this->$attribut))
			// Connection Objet non créée
			if(is_array($this->$attribut)) {
				$tmp = $this->$attribut;
				$objectName = $tmp[0];
				if($objectName!="collection") { // Object
					$this->$attribut = new $objectName($tmp[1]);
				}
				else { // Collection of object
					$this->$attribut = new $objectName();
					$this->setCollection($attribut, $tmp[1], $tmp[2]);
				}
				return $this->$attribut;
			} else
				return $this->$attribut;
		else
			return new Error(1);
	}

	/*functions */
	public function create($columns, $values=null) {
		$cpt = 0;
		$result = mysql_query("SHOW COLUMNS FROM ".$this->_class);
		while ($row = mysql_fetch_assoc($result)) {
			//if()


   		}

		$clone = Sql::create()->insert()->into(strtolower($this->_class))->columnsValues($columns, $values)->executeClass();
		// copie des attributs

		// 
		foreach ($clone as $attribut => $valeur)
			$this->$attribut = $valeur;
		return $this;
	}

	public function hydrate($id) {
		if(is_numeric($id)) {
			$clone = Sql::create()->from(strtolower($this->_class))->where("id=".$id)->fetchClass();
			foreach ($clone as $attribut => $valeur)
				$this->$attribut = $valeur;
			$this->getConnection();
			return $this;
		}
		else if(is_array($id)) {
			foreach ($id as $attribut => $valeur)
				$this->$attribut = $valeur;
			$this->getConnection();
			return $this;
		}
		else
			return new Error(1);
	}

	public function set($columns, $values=null) {
		if(!empty($this->id)) {
			Sql::create()->update(strtolower($this->_class))->set($columns, $values)->where("id=".$this->id)->execute(); 
			if($values==null) {
				if(is_object($columns)) {
					foreach ($columns as $attribut => $value)
						$this->$attribut = $value;
				}
				else {
					foreach($columns as $column=>$value)
						$this->$column = $value;
				}
			}
			else {
				if(sizeof($columns) == sizeof($values) && sizeof($values)>0) {
					for($cpt=0;$cpt<sizeof($columns);$cpt++)
						$this->$columns[$cpt] = $values[$cpt];
				}
				else
					return new Error(1);
			}
			return $this;
		}
		else
			return new Error(1);
	}

	private function getConnection() {
		foreach (get_object_vars($this) as $key => $value) {
			if($key!="_class") {
				if($key[0]=="_" && $key[1]!="_") {
					$tmp = explode("_", $key);
					$tmp2 = $tmp[2];
					if($tmp[1]=="collection") {// Si classe spéciale
						$tmp4 = $tmp[4];
						$this->$tmp4 = array($tmp[1], $tmp[2], $tmp[3]);
					} else
						$this->$tmp2 = array($tmp[1], $value);
					unset($this->$key);
				}
				if($key[0]=="_" && $key[1]=="_") // Liaison d'object inverse (OSEF)
					unset($this->$key);
			}
		}
	}

	private function setCollection($attribut, $type, $class) {
		// Recupération de tous les attributs de la classe à retourner
		if($type==1) { 
			$cpt = 0;
			$result = mysql_query("SHOW COLUMNS FROM ".$class);
			while ($row = mysql_fetch_assoc($result)) {
				$select[$cpt] = "R.".$row["Field"];
				$cpt++;
	   		}	
	   		$table = $class."_".strtolower($this->_class);
	   		if(!Sql::table_exist($table))
	   			$table = strtolower($this->_class)."_".$class;
			$this->$attribut = SQL::create()
								->select($select)
								->from($class." R", $table." C")
								->where("R.id=C.id_".$class." AND C.id_".strtolower($this->_class)."=".$this->id)
								->fetchArray();
		} elseif($type==2) {
			$this->$attribut = SQL::create()
								->from($class)
								->where("__link_".strtolower($this->_class)."=".$this->id)
								->fetchArray();
		}
		$this->$attribut->setObject($this);
		$this->$attribut->setTarget($class);
	}

	// public function __toString() {
	// 	return json_encode($this);
	// }

	// destroy toutes ses connections
	public function destroy($parameters) {
		return null;
	}
	
}



?>