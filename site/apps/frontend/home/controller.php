<?php

class HomeController extends Controller {
	public function IndexAction($params) {
	    $cats = App::getClassArray("category");
	    
	    $news = App::getClassArray("article", array("where" => array("nothave" => "category"), "limit" => 5));
	    $articles = App::getClassArray("article", array("where" => array("have" => "category"), "limit" => 5));
	    
	    return $this->render(array('cats' => $cats, 'articles' => $articles, 'news' => $news));
	}
}

?>