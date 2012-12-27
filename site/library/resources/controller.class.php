<?php

abstract class Controller {

	public function generateUrl($url) {
		return new Response($url, Response::$STATUS_REDIRECT);
	}

	public function render($vars, $route=null) {
		return new Response($vars, $route);
	}

	public function redirect($url) {
		header("Location:".$url);
	}

}

?>