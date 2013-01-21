<?php

class HomeControler extends Controler {
	public function IndexAction($params) {
	    $cats = App::getClassArray("category");
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
	    return $this->render(array('cats' => $cats, 'articles' => $articles, 'news' => $news));
	}
}

?>