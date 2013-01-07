<?php

class ErrorController extends Controller {
	public function IndexAction($params) {
		return $this->render(array('code' => $params[2]), array("error", "1"));
	}
}

?>