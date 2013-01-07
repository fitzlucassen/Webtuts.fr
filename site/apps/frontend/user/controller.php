<?php

class UserController extends Controller {
	public function IndexAction($params) {
		/*
			if($user = Kernel->get("session")) {
				return $this->render(array('user' => $user), array("user", "profil"));
			}
			else {
				return $this->redirect(....);
			}

		*/

		return $this->render(array('user' => null), array("user", "profil"));
	}
	public function ProfilAction($params) {
		return $this->render(array('user' => null));
	}
	public function SubscriptionAction($params) {
		return $this->render(array('user' => null));
	}
}

?>