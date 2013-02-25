<?php


abstract class OrmStdTableAbstract {
	
	/*
		Cache pour les tables
	*/
	public static $CACHE;

	/*
		Nom de la classe des objets qui constituent la collection
	*/
	public $_name;

	/*
		Collection des objets
	*/
	public $_collection;

	/*
		Types de la classe
	*/
	public $_types;


	/*
		Constructeur
	*/
	public function __construct($param = null) {
		/* Création du cache */
		self::setCache();
			
		/* $_name */
		if($param===null) {
			$param = get_class($this);
			$param = strstr($param, 'Table', true);
			$param = mb_strtolower($param);
		}
		if(is_object($param))
			$param = $param->_class;
		$this->_name = $param;
	}

	/*
		Création de la classe du cache
	*/
	private static function setCache() {
		if(OrmStdTableAbstract::$CACHE==null)
			OrmStdTableAbstract::$CACHE = new Cache(Cache::getDir()."orm", 5);
	}

	/*
		Getter du cache
	*/
	private static function getCache() {
		return OrmStdTableAbstract::$CACHE;
	}

	/*
		Récupère toutes les données de la table avec systeme de cache
	*/
	public function getCollection() {
		if(empty($this->_collection)) {
			$Cache = self::getCache();
			if(!$array = $Cache->read("ORM_collection_".$this->_name)) {
				$array = Sql2::create()->from($this->_name)->fetchArray();
				$Cache->write("ORM_collection_".$this->_name, serialize($array));
			} 
			else
				$array = unserialize($array);
			
			$collection = new Collection();
			foreach ($array as $value) {
				$collection->hydrate(App::getClass($this->_name)->hydrate($value));
			}
			$this->_collection = $collection;
		}
		return $this->_collection;
	}

	/*
		Récupère les types des champs de la classe avec systeme de cache
	*/
	public function getTypes() {
		if(empty($this->_types)) {
			$Cache = self::getCache();
			if(!$types = $Cache->read("ORM_table_".$this->_name)) {
				$types = Sql2::create()->from("_orm_column_type")->where("name_table", Sql2::$OPE_EQUAL, mb_strtolower($this->_name))->fetchArray();
				$Cache->write("ORM_table_".$this->_name, serialize($types));
			} 
			else
				$types = unserialize($types);
			foreach ($types as $value) {
				$this->_types[$value["name_column"]] = $value;
			}
		}
		return $this->_types;
	}

	/*
		Générateur de fonctions génériques
	*/
	public function __call($name, $paramsFunction) {
		return $this->getCollection()->$name($paramsFunction);
		
	}

	/*
		Création d'un objet et sauvegarde en base
	*/
	public function create($value) {
		$valueVerified = array();
		foreach ($this->getTypes() as $key => $types) {
			if(in_array($key, $value)) {
				$attr = $value[$key];
				if(!$types["null"] && !empty($attr)) {
					$nameTypeClass = $types["class"]."Type";
					if($attr = $nameTypeClass::check($attr))
						$valueVerified[$key] = $attr;
					else
						return false;
				}
				elseif($types["null"])
					$valueVerified[$key] = $attr;
				else
					return false;
			}
		}
		if($new = $this->save($valueVerified))
			return $new;
		else
			return false;
	}

	/*
		Sauvegarde un objet de la table avec les attributs en arguments
	*/
	private function save($attributs) {
		return Sql2::create()
			->insert()
			->into($this->_name)
			->columnsValues($attributs)
			->execute();
	}

	public function addAttribut($name, $type, $class, $null = false) {
		return false;
	}

	public function setAttribut($name, $params) {
		return false;
	}

	public function removeAttribut($name) {
		return false;
	}
}

?>