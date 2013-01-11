<?php

class CommentController extends Controller {
		public function IndexAction($params) {
		return $this->redirect("comment/list");
	}

	public function ShowAction($params) {
		$comment = App::getClass("comment", $params[3]);
		return $this->render(array('comment' => $comment));
	}

	public function AddAction($params) {
		return $this->render(array('user' => null));
	}

	public function DeleteAction($params) {
		$comment = App::getClass("comment", $params[3]);
		return $this->render(array('comment' => $comment));
	}

	public function UpdateAction($params) {
		$method = $this->getRequest();
		if($method->isMethod("post")) {
			return $this->redirect("/comment/show/".$params[3]);
		}
		else {
			$comment = App::getClass("comment", $params[3]);
			return $this->render(array('comment' => $comment));
		}
	}

	public function ListAction($params) {
		$comments = App::getClassArray("comment");
		return $this->render(array('comments' => $comments));
	}
}

?>