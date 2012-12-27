<?php
class HomeController extends Controller {
	public function IndexAction($params) {
		//$return = App::getClass("user", 2);
		return new Response(array('user' => null), array("homelesse", "postesse"));
	}
}

?>