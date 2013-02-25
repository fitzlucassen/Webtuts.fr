<?php

/*
	Interface des différents types de donnée
*/

interface Type {
	/*
		Vérifie si la ressources correspond au type de donnée demandé
	*/
	public static function check($data, $params);

	/*
		Getter pour permettre des gets spéciaux (avec options)
	*/
	public function get($params);

	/*
		Constructeur
	*/
	public function __construct($data, $params);

	/*
		Save spéciaux avec retour pour la sauvegarde
	*/
	public static function save($data, $params);

	/*
		ToString
	*/
	public function __toString();

	/*
		Compare avec un autre objet de même type
	*/
	public function compareTo($object, $params);

	/*
		Mise à jour des données
	*/
	public static function update($data, $params);
}



?>