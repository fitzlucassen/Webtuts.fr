<?php

class BlogApp {
	public function IndexController($params) {
		$return = App::getClass("article", 1);
		return new Response(array('article' => $return));
	}

	public function ArticleController($params) {
		return new Response(array('category' => $params[2], 'article' => $params[3]));
	}
}

?>