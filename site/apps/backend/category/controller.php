<?php

class CategoryController extends Controller {
	public function IndexAction($params) {
		return $this->redirect("category/list");
	}

	public function ShowAction($params) {
		$category = App::getClass("category", $params[3]);
		if(!empty($params[3]))
			$lang = $params[3];
		else
			$lang = $params[0];
		return $this->render(array('category' => $category, "lang" => $lang));
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
		if(!empty($params[3]))
			$lang = $params[3];
		else
			$lang = $params[0];
		$categories = App::getClassArray("category");//, array("where" => "deleted = 0"));
		return $this->render(array('categories' => $categories, 'lang' => $lang));
	}
}

?>