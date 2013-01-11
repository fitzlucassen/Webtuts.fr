<?php

class NodeController extends Controller {
	public function IndexAction($params) {
		return $this->redirect("node/list");
	}

	public function ShowAction($params) {
		$node = App::getClass("node", $params[3]);
		return $this->render(array('node' => $node));
	}

	public function AddAction($params) {
		return $this->render(array('user' => null));
	}

	public function DeleteAction($params) {
		$node = App::getClass("node", $params[3]);
		return $this->render(array('node' => $node));
	}

	public function UpdateAction($params) {
		$method = $this->getRequest();
		if($method->isMethod("post")) {
			return $this->redirect("/node/show/".$params[3]);
		}
		else {
			$node = App::getClass("node", $params[3]);
			return $this->render(array('node' => $node));
		}
	}

	public function ListAction($params) {
		$nodes = App::getClassArray("node");
		return $this->render(array('nodes' => $nodes));
	}
}

?>