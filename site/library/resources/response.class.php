<?php




class Response {

	public function __construct($templates, $vars) {
		$this->vars = $vars;
		$this->templates = $templates;
	}

	public function getVars() {
		return $this->vars;
	}

	public function getRoute() {
		return $this->templates;
	}



}


?>