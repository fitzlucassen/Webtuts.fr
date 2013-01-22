<?php


abstract class OrmStdTableAbstract {
	
	public $_name;
	public $_collection;
	public $_types;

	public function __construct($name = null) {
		if(empty($name)) {
			$name = get_class($this);
			$name = strstr($name, 'Table', true);
			$name = mb_strtolower($name);
		}
		$this->_name = $name;
	}

	public function count() {
		return $this->_collection->count();
	}

	public function getCollection() {
		if(empty($this->_collection))
			$this->_collection = Sql2::create()->from($this->_name)->fetchClassArray();
		return $this->_collection;
	}

	public function getTypes() {
		return null;
	}

	public function __call($name, $params) {
		if(strstr($name, "getBy")) {
			$return = new Collection();
			$attribut = strtolower(substr($name, 5));
			foreach ($this->getCollection() as $object) {
				if($object->get($attribut)==$params[0])
					$return->hydrate($object);
			}
			return $return;
		}
		else
			return false;
	}
}

?>