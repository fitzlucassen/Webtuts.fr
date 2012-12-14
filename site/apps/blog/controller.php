<?php

class BlogApp {
	public function IndexController($params) {
		$return = null;//App::getClassArray("article");
		return new Response(array("blog", "index"), array('articles' => $return));
	}

	public function ArticleController($params) {
		return new Response(array("blog", "article"), array('category' => $params[2], 'article' => $params[3]));
	}
}

?>