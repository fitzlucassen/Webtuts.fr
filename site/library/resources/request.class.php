<?php 


Class Request {

	public function isMethod($type) {
		$type = strtolower($type);
		if(!empty($_POST) && $type=="post")
			return true;
		elseif(count($_GET)>1 && $type=="get") // >0 car urlrewriting
			return true;
		else
			return false;
	}

	public function getData() {
		return $_REQUEST;
	}

}



?>