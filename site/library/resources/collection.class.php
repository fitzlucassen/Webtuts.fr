<?php

/*
	Class Collection
	Description : 
		-
		-
*/


class Collection implements Countable, Iterator {

	var $array;
	var $count;
	var $object = array();
	var $target;
	private $position = 0;

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
		$this->object["name"] = $object->getClass();
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

	public function rewind() {
		$this->position=0;
	}
	public function key() {
		return $this->position;
	}
	public function current() {
		return $this->array[$this->position];
	}
	public function next() {
		++$this->position;
	}
	public function valid() {
		return isset($this->array[$this->position]);
	}

}