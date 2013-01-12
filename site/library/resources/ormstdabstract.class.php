<?php

/*
	Class Std
	Description : 
		-
		-
*/

abstract class OrmStdAbstract {

	private $_class;
	private $_attributes = array();
	private $_types = array();


	public function setNameClass($class) {
		$this->_class = $class;
	}

	public function __get($name) {
		if($name[0]=="_" && $name[1]=="_")
			return $this->_types[strtok($name, "__")];
		elseif($name[0]=="_")
			return $this->$name;
		else
			return $this->_attributes[$name];
	}

	public function __set($name, $value) {
		if($name[0]=="_" && $name[1]=="_")
			$this->_types[strtok($name, "__")] = $value;
		elseif($name[0]=="_")
			$this->$name = $value;
		else
			$this->_attributes[$name] = $value;
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
		if($params==null) {} 
		else
			$this->hydrate($params);
		return $this;
	}

	public function setTypage($typages) {
		if(empty($this->_types)) {
			foreach ($typages as $value) {
				$nomAttribut = "__".$value["name_column"];
				$this->$nomAttribut = $value["type"];
			}
			foreach ($typages as $value) {
				$nomAttribut = $value["name_column"];
				if(empty($this->$nomAttribut))
					$this->$nomAttribut = NULL;
			}
		}
	}

	static public function n($class) {
		if(class_exists($class)) {
			$tmp = new $class();
			$tmp->setNameClass($class);
			return $tmp;
		}
		else {
			$tmp = new Std($class);
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

	public function getClass() {
		return $this->_class;
	}

	/* Getter */
	public function get($attribut, $params = null) {
		if($attribut == "id")
			return $this->id;
		$typeAttribut = "__".$attribut;
		$typeAttribut = $this->$typeAttribut;
		if(!empty($typeAttribut) && !is_object($this->$attribut)) {	// Pas prendre en compte $this->id et $this->_class
			$tmp = explode(" ", $typeAttribut);
			if(!is_object($this->$attribut) && ($tmp[0]=="class" || $tmp[0]=="collection")) {
				$typeLink = $tmp[0];
				if($typeLink=="class") { // Object
					$objectName = $tmp[1];
					$this->$attribut = Sql2::create()->from($objectName)->where("id", Sql2::$OPE_EQUAL, $this->$attribut)->fetchClass();
				}
				elseif($typeLink=="collection") { // Collection of object
					$this->setCollection($attribut, $tmp[1]);
				}
				return $this->$attribut;
			} 
			elseif(!is_object($this->$attribut) && ($tmp[0]=="type")) {
				/*
					Gestion des type particulier.
				*/
				if($tmp[1]=="lang") {
					$this->$attribut = new Lang($this->$attribut, $params);
				}			

				return $this->$attribut;
			} 
			else{
				return $this->$attribut;
			}
		}
		else {
			if(!empty($typeAttribut)) { // get() spéciaux avec params
				$tmp = explode(" ", $typeAttribut);
				if($tmp[0]=="type") {
					if($tmp[1] == "lang") {
						if($params!=null)
							$this->$attribut->setLang($params);
						else {
							$this->$attribut->setLang(Kernel::get("lang"));
						}
					}
				}
			}
			return $this->$attribut;
		}			
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

	public function hydrate($id, $types = null) {
		if($types==null)
			$types = Sql2::create()->from("ORM_columns_types")->where("name_table", Sql2::$OPE_EQUAL, mb_strtolower($this->_class))->fetchArray();
		$this->setTypage($types);
		if(is_numeric($id)) {
			$clone = Sql2::create()->from(strtolower($this->_class))->where("id", Sql2::$OPE_EQUAL, $id)->fetchClass();
			foreach ($clone as $attribut => $valeur)
				$this->$attribut = $valeur;
			return $this;
		}
		else if(is_array($id)) {
			foreach ($id as $attribut => $valeur)
				$this->$attribut = $valeur;
			return $this;
		}
		else
			return new Error(1);
	}

	public function checkData() {
		if(empty($this->id)) {


			return true;
		}
		else
			return false;
	}

	public function save() {
		if(empty($this->id)) {
			if($this->checkData()) {
				// enregistrement des langues
				foreach ($this->_types as $key => $value) {
					if($value == "type lang") {
						$id_lang = Sql2::create()->select("COUNT(DISTINCT id_lang)")->from("lang")->fetch();
						$id_lang++;
						foreach ($this->$key as $key2 => $value2) { // différentes langues
							Sql2::create()->insert("lang")->columnsValues(array("id_lang" => $id_lang, "lang" => $key2, "text" => $value2))->execute();
						}
						$this->$key = $id_lang;
					}
				}

				if(Sql2::create()->insert($this->_class)->columnsValues($this->_attributes)->execute())
					return true;//Sql2::create()->from($this->_class)->where("id", Sql2::$OPE_EQUAL, mysql_insert_id()->fetchClass());
				else
					return false;
			}
			else
				return false;
		}
		else
			return false;
	}

	public function getTypages() {
		if(empty($this->_types))
			$this->setTypage($types = Sql2::create()->from("ORM_columns_types")->where("name_table", Sql2::$OPE_EQUAL, mb_strtolower($this->_class))->fetchArray());
		return $this->_types;
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
/*
	private function getConnection() {
		foreach (get_object_vars($this) as $key => $value) {
			if($key!="_class") {
				if($key[0]=="_" && $key[1]="_") {
					$keyAttribut = strtok($key, "__");
					$type = explode($value, " ");
					if($type[0]=="collection")
						$this->$keyAttribut = array($type[0], $type[1], $this->$keyAttribut);
					elseif($type[0]=="class")
						$this->$keyAttribut = array($type[0], $type[1], $this->$keyAttribut);
					//...
					
				}
			}
		}
	}
*/
	private function setCollection($attribut, $class) {
		$this->$attribut = new Collection();
		// Recupération de tous les attributs de la classe à retourner 
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