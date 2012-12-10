<?php

/*
	Class Inbox
	Description : 
		-
		-
*/

class Inbox {

	/* Attributs */
	var $id;									// int 					Identifiant
	var $validated;								// bool					Validité
	var $owner;									// int 					Proprietaire
	var $date_create;							// datetime				Date de création
	var $name;									// text					Nom
	var $description;							// text					Description

	/* Connections */
	var $message;

	public function __construct() {
		return $this;
	}

	/* Getter */
	public function get($attribut) {
		if(isset($this->$attribut))
			return $this->$attribut;
		else
			return new Error(1);
	}

}