<?php

class CategoryController extends Controller {
	public function IndexAction($params) {
		//$return = App::getClass("user", 2);
		return $this->render(array('user' => null));
	}

	public function ShowAction($params) {
		//$return = App::getClass("user", 2);
		return $this->render(array('user' => null));
	}

	public function AddAction($params) {
		//$return = App::getClass("user", 2);
		return $this->render(array('user' => null));
	}

	public function DeleteAction($params) {
		//$return = App::getClass("user", 2);
		return $this->render(array('user' => null));
	}

	public function UpdateAction($params) {
		//$return = App::getClass("user", 2);
		return $this->render(array('user' => null));
	}

	public function ListAction($params) {
		$categories = App::getClassArray("category");
		return $this->render(array('categories' => $categories));
	}
}

?>