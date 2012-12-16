<?php


class StdTable extends OrmStdTableAbstract {
	

	public function __construct($name) {
		parent::__construct();
		$this->_name = $name;
	}

}

?>