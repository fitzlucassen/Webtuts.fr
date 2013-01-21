<?php

class ArticleControler extends Controler {
	public function IndexAction($params) {
		return $this->redirect("article/list");
	}

	public function ShowAction($params) {
		$article = App::getClass("article", $params[3]);
		if(!empty($params[4]))
			$lang = $params[4];
		else
			$lang = $params[0];
		return $this->render(array('article' => $article, "lang" => $lang));
	}

	public function AddAction($params) {
		return $this->render(array('user' => null));
	}

	public function DeleteAction($params) {
		$article = App::getClass("article", $params[3]);
		return $this->render(array('article' => $article));
	}

	public function UpdateAction($params) {
		$method = $this->getRequest();
		if($method->isMethod("post")) {
			return $this->redirect("/article/show/".$params[3]);
		}
		else {
			$article = App::getClass("article", $params[3]);
			return $this->render(array('article' => $article));
		}
	}

	public function ListAction($params) {
		/*
		$this->setCache("backend/");
		if(!$articles = $this->cache->read("ArticleListeAction")){
			$articles = App::getClassArray("article");
			$this->cache->read("ArticleListeAction", print_r(App::getClassArray("article")));
		}*/
		$articles = App::getClassArray("article");//, array("where" => "have category"));
		return $this->render(array('articles' => $articles));
	}
}

?>