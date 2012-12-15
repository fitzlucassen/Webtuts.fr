<?php

class ErrorApp {
	public function IndexController($params) {
		return new Response(array('code' => $params[2]), array("error", "1"));
	}
}

?>