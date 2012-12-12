<?php

class HomeApp {
	public function IndexController($params) {
		//$return = App::getClass("user", 2);
		return new Response(array("home", "post"), array('user' => null));
	}
}

?>