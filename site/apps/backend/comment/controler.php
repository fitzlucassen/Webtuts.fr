<?php

class CommentControler extends Controler {
		public function IndexAction($params) {
		return $this->redirect("comment/list");
	}

	public function DeleteAction($params) {
		$form = $this->getRequest();
		if($form->isMethod("post")){
			$data = $form->getData();
			$id = $data["id"];
			
			App::getClass("comment", $id)->set("deleted", 1);
		}
		return $this->redirect(_host_."comment/list");
	}

	public function ListAction($params) {
		$comments = App::getClassArray("comment");
		return $this->render(array('comments' => $comments));
	}
}

?>