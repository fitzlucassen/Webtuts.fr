<?php

class BlogControler extends Controler {
	
	public static $ID_NODE_ARTICLE = 1;
	public static $ID_NODE_NEWS = 2;
	public static $ID_NODE_NOTIFBO = 3;

	public function IndexAction($params) {
	    $return = App::getClass("article", 1);

	    return $this->render(array('article' => $return));
	}
	public function ArticleAction($params) {
	    $article = App::getTable("article")->getBySanitizeTitle($params[4]);
	    $link = array(
	    	"en" => Kernel::getUrl("en/".$params[1]."/".$params[2]."/".Kernel::sanitize($article->get("category")->get("name", "en"))."/".Kernel::sanitize($article->get("title", "en"))),
	    	"fr" => Kernel::getUrl("fr/".$params[1]."/".$params[2]."/".Kernel::sanitize($article->get("category")->get("name", "fr"))."/".Kernel::sanitize($article->get("title", "fr")))
	    );
	    return $this->render(array('article' => $article, 'link' => $link));
	}
	public function CategoryAction($params) {
	    $category = App::getTable("category")->getBySanitizeName($params[3]);
	    $link = array(
	    	"en" => Kernel::getUrl("en/".$params[1]."/".$params[2]."/".Kernel::sanitize($category->get("name", "en"))),
	    	"fr" => Kernel::getUrl("fr/".$params[1]."/".$params[2]."/".Kernel::sanitize($category->get("name", "fr")))
	    );
	    return $this->render(array('cat' => $category, 'link' => $link));
	}
	public function ArticlesAction($params) {
	    $news = App::getClassArray("article", array("where" => "node = " . self::$ID_NODE_NEWS));
	    $articles = App::getClassArray("article", array("where" => "node = " . self::$ID_NODE_ARTICLE));

	    return $this->render(array('articles' => $articles, "news" => $news));
	}
	public function CategoriesAction($params) {
	    $cats = App::getClassArray("category");
	    $news = App::getClassArray("article", array("where" => "node = " . self::$ID_NODE_NEWS));

	    return $this->render(array('cats' => $cats, "news" => $news));
	}
	public function ActualitesAction($params){
	    $news = App::getClassArray("article", array("where" => "node = " . self::$ID_NODE_NEWS));
	    $articles = App::getClassArray("article", array("where" => "node = " . self::$ID_NODE_ARTICLE, "limit" => 5));

	    return $this->render(array("news" => $news, "articles" => $articles));
	}
	public function ActualiteAction($params){
	    $news = App::getTable("article")->getBySanitizeTitle($params[3]);
	    $link = array(
	    	"en" => Kernel::getUrl("en/".$params[1]."/".$params[2]."/".Kernel::sanitize($news->get("title", "en"))),
	    	"fr" => Kernel::getUrl("fr/".$params[1]."/".$params[2]."/".Kernel::sanitize($news->get("title", "fr")))
	    );
	    return $this->render(array("news" => $news));
	}
	public function TagsAction($params){
	    $tags = App::getClassArray("tag");
	    
	    return $this->render(array("tags" => $tags));
	}
	public function TagAction($params){
	    $tag_target = App::getTable("tag")->getBySanitizeName($params[3]);
	    $tags = App::getClassArray("tag");
	    $link = array(
	    	"en" => Kernel::getUrl("en/".$params[1]."/".$params[2]."/".Kernel::sanitize($tag_target->get("name", "en"))),
	    	"fr" => Kernel::getUrl("fr/".$params[1]."/".$params[2]."/".Kernel::sanitize($tag_target->get("name", "fr")))
	    );
	    return $this->render(array("tag_target" => $tag_target, "tags" => $tags));
	}
}

?>