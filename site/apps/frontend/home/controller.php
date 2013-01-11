<?php

class HomeController extends Controller {
	public function IndexAction($params) {
	    $cats = App::getClassArray("category");
	    $articles = App::getClassArray("article");

	    return $this->render(array('cats' => $cats, 'articles' => $articles));
	}
}

?>