<?php



class Session {

	private $tmp_user_register;
	private $user;
	private $session;

	public function __construct() {
		$this->session = $_SESSION;
		if(!empty($this->session)) {
			if($user = App::getClass("user", $this->session["id"])) {
				if($user->get("password") == $this->session["pwd"])
					$this->user=$user;
				else
					$this->user=false;
			}
			else
				$this->user=false;
		}
		else
			$this->user=false;
	}

	public function getUser() {
		return $this->user;
	}

	public function connect($user) {
		$_SESSION["id"] = $user->get("id");
		$_SESSION["pwd"] = $user->get("password");
		$this->user = $user;
		return true;
	}

	public function disconnect() {
		if(!empty($this->user)) {	
			unset($_SESSION["id"]);
			unset($_SESSION["pwd"]);
			$this->user = false;
			$this->session = "";
			return true;
		}
		else
			return false;
	}
}




?>