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
		if($function[0] == "get" && $function[1] == "By") {
			$attribut = strtolower($function[count($function)-1]);
			$type = $this->getTypes();
			$type = $type[$attribut];
			$type = explode(" ", $type);
			$params = $function;
			unset($params[0]);
			unset($params[1]);
			unset($params[count($function)-1]);
			$params = array_values($params);

			$return = new Collection();
			foreach ($this->get() as $object) {
				if($type[0]=="type") {
					$typeClass = ucfirst(strtolower($type[1]))."Type";
					if($typeClass::getCompare($object, $attribut, $params)==$params[0])
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
		else
			return false;
	}
}

?>