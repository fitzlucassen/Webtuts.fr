<?php

class BlogApp {
	public function IndexController($params) {
		$return = App::getClassArray("article");
		return new Response(array("blog", "index"), array('articles' => $return));
	}

	public function ArticleController($params) {
		$return = App::getClass("article", $params[3]);
		return new Response(array("blog", "article"), array('article' => $return));
	}
}

?>