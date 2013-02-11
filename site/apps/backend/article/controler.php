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
		$categories = App::getClassArray("category");
		$nodes = App::getClassArray("node");
	
		$form = $this->getRequest();
		if($form->isMethod("post")) {
			$data = $form->getData();
			$title = array("fr" => $data["titlefr"], "en" => $data["titleen"]);
			$text = array("fr" => $data["textfr"], "en" => $data["texten"]);
			
			$attr["category"] = $data['category'];
			$attr["node"] = $data["node"];
			$attr["tags"] = 0;
			//$attr["image"] = 0;
			$attr["author"] = Kernel::get("user")->get("id");
			$attr["date"] = date("Y-m-d H:i:s");
			$attr["title"] = $title;
			$attr["text"] = $text;
			if($article = App::getClass("article")->hydrate($attr)->save())
				return $this->redirect("article/show/".$article->get("id"));
			else
				return $this->render(array("error" => "Vous n'avez pas bien rempli le formulaire"));
		}
		else {
			return $this->render(array('categories' => $categories, 'nodes' => $nodes));
		}
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
		if(!empty($params[3]))
			$lang = $params[3];
		else
			$lang = $params[0];
		$articles = App::getClassArray("article", array("where" => "node != 4"));//, array("where" => "have category"));
		return $this->render(array('articles' => $articles, "lang" => $lang));
	}
}

?>