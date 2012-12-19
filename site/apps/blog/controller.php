<?php

class BlogApp {
	public function IndexController($params) {
		$return = App::getClass("article", 1);
		return new Response(array('article' => $return));
	}

	public function ArticleController($params) {
		return new Response("blog/", Response::$STATUS_REDIRECT);
	}
}

?>