<?php

class ArticleController extends Controller {
	public function IndexAction($params) {
		return $this->redirect("article/list");
	}

	public function ShowAction($params) {
		$article = App::getClass("article", $params[3]);
		return $this->render(array('article' => $article));
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
		$articles = App::getClassArray("article");
		return $this->render(array('articles' => $articles));
	}
}

?>