<?php

/*
 A FAIRE : mettre l'id du message d'erreur lors de l'instanciation
 Et créer une base de tous les message d'erreur (en Json c'est mieux (si pb avec la BDD))

*/

class Error {

	var $msg;

	public function __construct($msg) {
		$this->msg = $msg;
	}

	public function __toString() {
		return "<span class=\"kernel_error_log\">An error was occured : \"".$this->msg."\"</span>";
	}

}

?>