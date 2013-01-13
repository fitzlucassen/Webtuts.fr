<?php

class HomeController extends Controller {
	public function IndexAction($params) {
		$notifications = App::getClassArray("article", array("where" => "node = 2"));
		return $this->render(array('notifications' => $notifications));
	}
}

?>