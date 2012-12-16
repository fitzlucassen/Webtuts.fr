<?php


abstract class OrmStdTableAbstract {
	
	public $_name;

	public function __construct($name) {
		$this->_name = $name;
	}

	public function count() {
		return Sql2::create()->select("count(*)")->from($this->_name)->fetch(0);
	}
}

?>