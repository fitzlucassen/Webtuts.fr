<?php

class HomeController extends Controller {
	public function IndexAction($params) {
		//$return = App::getClass("user", 2);
		return $this->render(array('user' => null), array("homelesse", "postesse"));
	}
}

?>