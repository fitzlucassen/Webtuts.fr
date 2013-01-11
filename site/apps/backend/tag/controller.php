<?php

class TagController extends Controller {
	public function IndexAction($params) {
		return $this->redirect("tag/list");
	}

	public function ShowAction($params) {
		$tag = App::getClass("tag", $params[3]);
		return $this->render(array('tag' => $tag));
	}

	public function AddAction($params) {
		return $this->render(array('user' => null));
	}

	public function DeleteAction($params) {
		$tag = App::getClass("tag", $params[3]);
		return $this->render(array('tag' => $tag));
	}

	public function UpdateAction($params) {
		$method = $this->getRequest();
		if($method->isMethod("post")) {
			return $this->redirect("/tag/show/".$params[3]);
		}
		else {
			$tag = App::getClass("tag", $params[3]);
			return $this->render(array('tag' => $tag));
		}
	}

	public function ListAction($params) {
		$tags = App::getClassArray("tag");
		return $this->render(array('tags' => $tags));
	}
}

?>