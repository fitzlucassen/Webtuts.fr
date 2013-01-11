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
		$articles_all = App::getClassArray("article");
		$articles = array();
		$news = array();
		
		foreach($articles_all as $art){
		    if($art->get("category")){
			$articles[] = $art;
		    } else {
			$news[] = $art;
		    }
		}
		return $this->render(array('articles' => $articles, "news" => $news));
	}

	public function CategoriesAction($params) {
		$cats = App::getClassArray("category");
		
		$articles_all = App::getClassArray("article");
		$news = array();
		
		foreach($articles_all as $art){
		    if(!$art->get("category")){
			$news[] = $art;
		    }
		}
		return $this->render(array('cats' => $cats, "news" => $news));
	}
}

?>