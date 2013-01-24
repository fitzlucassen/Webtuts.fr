<?php

class HomeControler extends Controler {
	public function IndexAction($params) {
	    $cats = App::getClassArray("category", array("limit" => 6));
	    
	    $news = App::getClassArray("article", array("where" => "node = " . __NODE_NEWS__, "limit" => 5));
	    $articles = App::getClassArray("article", array("where" => "node = " . __NODE_ARTICLE__, "limit" => 5));
	    
	    return $this->render(array('cats' => $cats, 'articles' => $articles, 'news' => $news));
	}
}

?>