<?php

/*
	Class User
	Description : 
		-
		-
*/

class Article extends Std {

	

	public function view() {
		$this->set(array("views" => $this->get("views")+1));
	}
	

}



?>