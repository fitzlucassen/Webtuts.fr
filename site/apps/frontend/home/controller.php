<?php

class HomeController extends Controller {
	public function IndexAction($params) {
	    return $this->render(array("user" => null));
/*
	    $cats = App::getClassArray("categorie");
	    $articles = App::getClassArray("articles", array("limit", 5));
*/
		
	    //return $this->render(array('cats' => $cats, 'articles' => $articles));
	}
}

?>