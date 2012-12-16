<?php


abstract class OrmStdTableAbstract {
	
	public $_name;

	public function __construct() {
		 $name = get_class($this);
		 $name = strstr($name, 'Table', true);
		 $name = mb_strtolower($name);
		 $this->_name = $name;
	}

	public function count() {
		return Sql2::create()->select("count(*)")->from($this->_name)->fetch(0);
	}
}

?>