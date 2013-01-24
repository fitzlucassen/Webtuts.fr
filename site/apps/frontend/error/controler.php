<?php

class ErrorControler extends Controler {
	public function IndexAction($params) {
		return $this->render(array('code' => $params[2]), array("error", "1"));
	}
	public function BadRouteAction($params) {
		return $this->render(array('code' => $params[2]));
	}
}

?>