<?php

/*
	Class Collection
	Description : 
		-
		-
*/


class Collection {

	var $array;
	var $count;
	var $object = array();
	var $target;

	public function __construct() {
		$this->array = array();
		$this->count = 0;
	}

	public function hydrate($add) {
		$this->array[] = $add;
		$this->count++;
	}

	public function setObject($object) {
		$this->object["id"] = $object->get("id");
		$this->object["name"] = $object->get("_class");
	}
	public function setTarget($class) {
		$this->target = $class;
	}

	/*
		Ajoute un objet a une collection
	*/
	public function add() {
		if(count($this->object)>0) {


		}
		else
			return new Error(1);
	}
	
	public function remove() {
		if(count($this->object)>0) {


		}
		else
			return new Error(1);
	}

	public function get($rang=0) {
		if($rang>=0 && $rang <= $this->count)
			return $this->array[$rang];
		else
			return new Error(1);
	}

	public function count() {
		return $this->count;
	}

}