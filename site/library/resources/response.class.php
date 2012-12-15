<?php




class Response {

	public function __construct($vars, $route=null) {
		if(is_array($vars))
			$this->vars = $vars;
		else
			$this->vars = array("return" => $vars);
		$this->route = $route;
	}

	public function getVars() {
		return $this->vars;
	}

	public function getRoute() {
		return $this->route;
	}

	public function hasRoute() {
		if($this->route==null)
			return false;
		else
			return true;
	}



}


?>