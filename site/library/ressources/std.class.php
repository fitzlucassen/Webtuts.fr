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

		$clone = Sql2::create()->insert(strtolower($this->_class))->columnsValues($columns, $values)->executeClass();
		// copie des attributs

		// 
		foreach ($clone as $attribut => $valeur)
			$this->$attribut = $valeur;
		return $this;
	}

	public function hydrate($id) {
		if(is_numeric($id)) {
			$clone = Sql2::create()->from(strtolower($this->_class))->where("id", Sql2::$OPE_EQUAL, $id)->fetchClass();
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

	/*
		Peut prendre 3 types de syntaxe en parametres

		set("collonne", "value"); // valeurs String
		set(array("collonne1", "collonne2"), array("value1", "value2")); // Deux tableaux
		set(array("collonne1" => "value1", "collonne2" => "value2")); // Tableau associatif

	*/
	public function set($columns, $values=null) {
		if(!empty($this->id) && !empty($columns)) {

			if(!Sql2::create()->update(strtolower($this->_class))->columnsValues($columns, $values)->where("id", Sql2::$OPE_EQUAL, $this->id)->execute())
				return new Error(10); 
			
			$novalues = false;	// Variable pour forcer le faite de ne pas prendre en compte $values
			if(!is_array($columns))
				$columns = array($columns);
			else {
				if(is_assoc($columns)) {
					$novalues = true;
					$tmpTab = $columns;
					$columns = array();
					foreach ($tmpTab as $key => $value) {
						$columns[] = $key;
						$values[] = $value;
					}
				}
				else {
					if($values == null && sizeof($columns) == sizeof($values) && sizeof($values)>0)
						return new Error(7);
				}
			}
			if(!$novalues) {
				if($values!=null) {
					if(!is_array($values))
						$values = array($values);
					else {
						if(is_assoc($values))
							return new Error(8);
					}
				}
				else
					return new Eror(5);
			}

			// On met a jour les attributs
			$cpt = 0;
			foreach ($columns as $column) {
				$this->$column = $values[$cpt];
				$cpt++;
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
				$select[$cpt] = "A.".$row["Field"];
				$cpt++;
	   		}	
	   		$table = $class."_".strtolower($this->_class);
	   		if(!Sql2::table_exist($table))
	   			$table = strtolower($this->_class)."_".$class;
			$this->$attribut = Sql2::create()
								->select($select)
								->from($class, $table)
								->where("A.id", Sql2::$OPE_EQUAL ,"B.id_".$class, Sql2::$TYPE_NO_QUOTE)
								->andWhere("B.id_".strtolower($this->_class), Sql2::$OPE_EQUAL, $this->id)
								->fetchClassArray();
		} elseif($type==2) {
			$this->$attribut = Sql2::create()
								->from($class)
								->where("__link_".strtolower($this->_class), Sql2::$OPE_EQUAL, $this->id)
								->fetchClassArray();
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