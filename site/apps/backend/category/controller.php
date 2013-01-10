<?php

class CategoryController extends Controller {
	public function IndexAction($params) {
		return $this->redirect("category/list");
	}

	public function ShowAction($params) {
		$category = App::getClass("category", $params[3]);
		return $this->render(array('category' => $category));
	}

	public function AddAction($params) {
		return $this->render(array('user' => null));
	}

	public function DeleteAction($params) {
		$category = App::getClass("category", $params[3]);
		return $this->render(array('category' => $category));
	}

	public function UpdateAction($params) {
		$method = $this->getRequest();
		if($method->isMethod("post")) {
			return $this->redirect("/category/show/".$params[3]);
		}
		else {
			$category = App::getClass("category", $params[3]);
			return $this->render(array('category' => $category));
		}
	}

	public function ListAction($params) {
		$categories = App::getClassArray("category");
		return $this->render(array('categories' => $categories));
	}
}

?>