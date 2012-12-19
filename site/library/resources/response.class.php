<?php




class Response {

	static public $STATUS_REDIRECT = 1;

	public function __construct($vars, $route=null) {
		if($route!=Response::$STATUS_REDIRECT) {
			if(is_array($vars))
				$this->vars = $vars;
			else
				$this->vars = array("return" => $vars);
			$this->route = $route;
		}
		else 
			header("Location:"._host_absolute_.$vars);
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