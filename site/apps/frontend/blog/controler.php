<?php

class BlogControler extends Controler {
	public function IndexAction($params) {
	    $return = App::getClass("article", 1);
	    
	    return $this->render(array('article' => $return));
	}
	public function ArticleAction($params) {
	    $article = App::getTable("article")->getBySanitizeTitle($params[3]);
	    
	    return $this->render(array('article' => $article));
	}
	public function CategoryAction($params) {
	    $category = App::getTable("category")->getBySanitizeName($params[3]);
	    
	    return $this->render(array('cat' => $category));
	}
	public function ArticlesAction($params) {
	    $news = App::getClassArray("article", array("where" => "node = " . __NODE_NEWS__));
	    $articles = App::getClassArray("article", array("where" => "node = " . __NODE_ARTICLE__));

	    return $this->render(array('articles' => $articles, "news" => $news));
	}
	public function CategoriesAction($params) {
	    $cats = App::getClassArray("category");
	    $news = App::getClassArray("article", array("where" => "node = " . __NODE_NEWS__));

	    return $this->render(array('cats' => $cats, "news" => $news));
	}
	public function ActualitesAction($params){
	    $news = App::getClassArray("article", array("where" => "node = " . __NODE_NEWS__));
	    $articles = App::getClassArray("article", array("where" => "node = " . __NODE_ARTICLE__, "limit" => 5));

	    return $this->render(array("news" => $news, "articles" => $articles));
	}
	public function ActualiteAction($params){
	    $news = App::getTable("article")->getBySanitizeTitle($params[3]);

	    return $this->render(array("news" => $news));
	}
	public function TagsAction($params){
	    $tags = App::getClassArray("tag");

	    return $this->render(array("tags" => $tags));
	}
	public function TagAction($params){
	    $tag_target = App::getTable("tag")->getBySanitizeName($params[3]);
	    $tags = App::getClassArray("tag");
	    
	    return $this->render(array("tag_target" => $tag_target, "tags" => $tags));
	}
}

?>