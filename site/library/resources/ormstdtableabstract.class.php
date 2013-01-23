<?php


abstract class OrmStdTableAbstract {
	
	public $_name;
	public $_collection;
	public $_types;
	public static $CACHE;

	public function __construct($name = null) {
		if(empty($name)) {
			$name = get_class($this);
			$name = strstr($name, 'Table', true);
			$name = mb_strtolower($name);
		}
		$this->_name = $name;
	}

	public function getCache() {
		if(OrmStdTableAbstract::$CACHE==null)
			OrmStdTableAbstract::$CACHE = new Cache(Cache::getDir()."orm", 60);
		return OrmStdTableAbstract::$CACHE;
	}

	public function count() {
		return $this->_collection->count();
	}

	public function get() {
		if(empty($this->_collection))
			$this->_collection = Sql2::create()->from($this->_name)->fetchClassArray();
		return $this->_collection;
	}

	public function getTypes() {
		if(empty($this->_types)) {
			$Cache = $this->getCache();
			if(!$types = $Cache->read("ORM_table_".$this->_name)) {
				$types = Sql2::create()->from("ORM_columns_types")->where("name_table", Sql2::$OPE_EQUAL, mb_strtolower($this->_name))->fetchArray();
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

	public function __call($name, $params) {
		if(strstr($name, "getBy")) {
			$return = new Collection();
			$attribut = strtolower(substr($name, 5));
			if(!strstr($name, "Sanitize")) {
				foreach ($this->getCollection() as $object) {
					if($object->get($attribut)==$params[0])
						$return->hydrate($object);
				}
			}
			else {
				
			}
			return $return;
		}
		else
			return false;
	}
}

?>