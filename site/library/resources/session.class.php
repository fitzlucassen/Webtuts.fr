<?php



class Session {

	var $tmp_user_register;

	public function __construct() {
		if(!empty($_SESSION["tmp_user_register"]))
			$this->tmp_user_register = $_SESSION["tmp_user_register"];
		else
			$this->tmp_user_register = null;
	}

	public function get($index) {
		return $_SESSION[$index];
	}

	public function verif($hash) {
		$hash = md5($hash);
		if($hash==$this->tmp_user_register)
			return true;
		else
			return false;
	}

	public function connect() {
		$r = '';
    	for($i=0; $i<25; $i++)
       		$r .= chr(rand(0, 25) + ord('a'));
		$hash = md5($r);
		$this->tmp_user_register = $hash;
		return $r;
	}

	public function disconnect() {
		$this->tmp_user_register = null;
	}
}




?>