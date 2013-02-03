<?php



class Session {

	private $tmp_user_register;
	private $user;
	private $session;

	public function __construct() {
	    $this->session = $_SESSION;
	    
	    if(!empty($this->session)) {
		if($user = App::getClass("user", $this->session["user"]["id"])) {
		    if($user->get("password") == $this->session["user"]["pwd"])
			$this->user = $user;
		    else
			$this->user = false;
		}
		    else
			$this->user = false;
	    }
	    else
		$this->user = false;
	}

	public function getUser() {
		return $this->user;
	}

	public function connect($user) {
		$_SESSION["user"] = array();
		$_SESSION["user"]["id"] = $user->get("id");
		$_SESSION["user"]["pwd"] = $user->get("password");
		$_SESSION["user"]["pseudo"] = $user->get("pseudo");

		$this->user = $user;
		return true;
	}

	public function disconnect() {
		if(!empty($this->user)) {	
			unset($_SESSION["user"]);
			$this->user = false;
			$this->session = "";
			return true;
		}
		else
			return false;
	}
	public function set($key, $value){
	    $_SESSION[$key] = $value;
	}
	public function get($key){
	    return $this->$key;
	}
}




?>