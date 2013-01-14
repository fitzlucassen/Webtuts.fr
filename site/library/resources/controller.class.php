<?php

abstract class Controller {

	private $cache;

	public function generateUrl($url) {
		return new Response($url, Response::$STATUS_REDIRECT);
	}

	public function setCache($dirname, $duration = 60) { // Cache de 60 minutes par défault
		$this->cache = new Cache("/site/cache/controllers/".$dirname, $duration);
	}

	public function render($vars, $route=null) {
		return new Response($vars, $route);
	}

	public function renderJson($array) {
		return new Response($vars, $route);
	}

	public function renderXML($array, $params) {
		return new Response($vars, $route);
	}

	public function redirect($url) {
		header("Location:".$url);
	}

	public function getRequest() {
		return new Request();
	}

}

?>