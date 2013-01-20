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
		$news = App::getClassArray("article", array("where" => array("nothave" => "category")));
		$articles = App::getClassArray("article", array("where" => array("have" => "category")));
		
		return $this->render(array('articles' => $articles, "news" => $news));
	}

	public function CategoriesAction($params) {
		$cats = App::getClassArray("category");
		$news = App::getClassArray("article", array("where" => array("nothave" => "category")));
		
		return $this->render(array('cats' => $cats, "news" => $news));
	}
}

?>