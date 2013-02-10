<?php

class PageControler extends Controler {
	public function IndexAction($params) {
		return $this->redirect("page/list");
	}

	public function ShowAction($params) {
		if(!empty($params[4]))
			$lang = $params[4];
		else
			$lang = $params[0];
		$page = App::getClass("article", $params[3]);
		return $this->render(array('page' => $page, 'lang' => $lang));
	}

	public function AddAction($params) {
		return $this->render(array('user' => null));
	}

	public function DeleteAction($params) {
		$page = App::getClass("article", $params[3]);
		return $this->render(array('page' => $page));
	}

	public function UpdateAction($params) {
		$method = $this->getRequest();
		if($method->isMethod("post")) {
			return $this->redirect("/page/show/".$params[3]);
		}
		else {
			$page = App::getClass("article", $params[3]);
			return $this->render(array('page' => $page));
		}
	}

	public function ListAction($params) {
		if(!empty($params[3]))
			$lang = $params[3];
		else
			$lang = $params[0];
		$pages = App::getClassArray("article", array("where" => "node = 4"));
		return $this->render(array('pages' => $pages, 'lang' => $lang));
	}
}

?>