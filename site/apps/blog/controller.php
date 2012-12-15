<?php

class BlogApp {
	public function IndexController($params) {
		$return = null;//App::getClassArray("article");
		return new Response(array('articles' => $return));
	}

	public function ArticleController($params) {
		return new Response(array('category' => $params[2], 'article' => $params[3]));
	}
}

?>