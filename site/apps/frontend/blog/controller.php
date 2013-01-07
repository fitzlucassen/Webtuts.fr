<?php

class BlogController extends Controller {
	public function IndexAction($params) {
		$return = App::getClass("article", 1);
		return $this->render(array('article' => $return));
	}

	public function ArticleAction($params) {
		return $this->generateUrl("blog/");
	}

	public function CategorieAction($params) {
		return $this->render(array('cat' => $params[3]));
	}
}

?>