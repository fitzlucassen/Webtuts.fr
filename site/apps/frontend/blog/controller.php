<?php

class BlogController extends Controller {
	public function IndexAction($params) {
		$return = App::getClass("article", 1);
		return $this->render(array('article' => $return));
	}

	public function ArticleAction($params) {
		return $this->generateUrl("blog/");
	}

	public function CategoryAction($params) {
		return $this->render(array('cat' => $params[3]));
	}
	public function ArticlesAction($params) {
		return $this->render(array('article' => null));
	}

	public function CategoriesAction($params) {
		return $this->render(array('article' => null));
	}
}

?>