<?php

class ErrorApp {
	public function IndexController($params) {
		return new Response(array("error", "1"), array('id' => $params[2]));
	}
}

?>