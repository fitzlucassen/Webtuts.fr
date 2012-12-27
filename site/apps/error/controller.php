<?php

class ErrorController extends Controller {
	public function IndexAction($params) {
		return new Response(array('code' => $params[2]), array("error", "1"));
	}
}

?>