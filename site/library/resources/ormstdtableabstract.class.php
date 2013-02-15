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
	public function __construct($name = null) {
		/* Création du cache */
		self::setCache();
			
		/* $_name */
		if(empty($name)) {
			$name = get_class($this);
			$name = strstr($name, 'Table', true);
			$name = mb_strtolower($name);
		}
		$this->_name = $name;
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
	private function getTypes() {
		if(empty($this->_types)) {
			$Cache = self::getCache();
			if(!$types = $Cache->read("ORM_table_".$this->_name)) {
				$types = Sql2::create()->from("orm_columns_types")->where("name_table", Sql2::$OPE_EQUAL, mb_strtolower($this->_name))->fetchArray();
				$Cache->write("ORM_table_".$this->_name, serialize($types));
			} 
			else
				$types = unserialize($types);
			foreach ($types as $value) {
				$this->_types[$value["name_column"]] = $value["type"];
			}
		}
		return $this->_types;
	}

	/*
		Générateur de fonctions génériques
			- getBy
			- 
			- 
	*/
	public function __call($name, $paramsFunction) {
		/* traitement du nom de la fonction */
		$nameArray = str_split($name);
		$function = array();
		$cpt=0;
		$function[$cpt] = "";
		foreach ($nameArray as $key => $value) {
			if(ord($value)>=65 && ord($value)<=90) {
				$cpt++;
				$function[$cpt] = "";
			}
			$function[$cpt] .= $value;
		}



		if($function[0] == "get" && isset($function[1])) {
			if($function[1] == "By") {
				$attribut = strtolower($function[count($function)-1]);
				if($attribut != "id") {
					$type = $this->getTypes();
					$type = $type[$attribut];
					$type = explode(" ", $type);
					$params = $function;
					unset($params[0]);
					unset($params[1]);
					unset($params[count($function)-1]);
					$params = array_values($params);

					$return = new Collection();
				
					foreach ($this->getCollection() as $object) {
						if($type[0]=="type") {
							$typeClass = ucfirst(strtolower($type[1]))."Type";
							if($typeClass::getCompare($object, $attribut, $params)==$paramsFunction[0])
								$return->hydrate($object);
						}
						else {
							return false;
						}
					}
					if($return->count()==0) {
						return false;
					}
					elseif($return->count()==1) {
						return $return->get(0);
					}
					else
						return $return;
				}
				else {
					foreach ($this->getCollection() as $object) {
						if($object->get("id")==$paramsFunction[0])
							return $object;
						else
							return false;
					}
				}
			}
			else
				return false;
		}
		else
			return false;
	}

	/*
		Création d'un objet et sauvegarde en base
	*/
	public function create() {

	}
}

?>