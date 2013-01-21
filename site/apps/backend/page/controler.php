<?php

class PageControler extends Controler {
	public function IndexAction($params) {
		return $this->redirect("page/list");
	}

	public function ShowAction($params) {
		$page = App::getClass("page", $params[3]);
		return $this->render(array('page' => $page));
	}

	public function AddAction($params) {
		return $this->render(array('user' => null));
	}

	public function DeleteAction($params) {
		$page = App::getClass("page", $params[3]);
		return $this->render(array('page' => $page));
	}

	public function UpdateAction($params) {
		$method = $this->getRequest();
		if($method->isMethod("post")) {
			return $this->redirect("/page/show/".$params[3]);
		}
		else {
			$page = App::getClass("page", $params[3]);
			return $this->render(array('page' => $page));
		}
	}

	public function ListAction($params) {
		$pages = App::getClassArray("page");
		return $this->render(array('pages' => $pages));
	}
}

?>