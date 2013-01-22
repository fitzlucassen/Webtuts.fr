<?php

class HomeControler extends Controler {
	public function IndexAction($params) {
		$notifications = App::getClassArray("article", array("where" => "node = 3", "orderBy" => array("date", "DESC")));
		return $this->render(array('notifications' => $notifications));
	}
}

?>