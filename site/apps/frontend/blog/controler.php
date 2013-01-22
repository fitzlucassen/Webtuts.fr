<?php

class BlogControler extends Controler {
	public function IndexAction($params) {
		$return = App::getClass("article", 1);
		return $this->render(array('article' => $return));
	}

	public function ArticleAction($params) {
		$article = App::getClass("article", $params[3]);
		
		return $this->render(array('article' => $article));
	}

	public function CategoryAction($params) {
		return $this->render(array('cat' => $params[3]));
	}
	public function ArticlesAction($params) {
		$news = App::getClassArray("article", array("where" => "node = 2"));
		$articles = App::getClassArray("article", array("where" => "node = 1"));
		
		return $this->render(array('articles' => $articles, "news" => $news));
	}

	public function CategoriesAction($params) {
		$cats = App::getClassArray("category");
		$news = App::getClassArray("article", array("where" => "node = 2"));
		
		return $this->render(array('cats' => $cats, "news" => $news));
	}
}

?>