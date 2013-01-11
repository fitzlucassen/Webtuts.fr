<?php
	/*
		Fichier de configuration : 
		Contient toutes les informations necessaires à fournir par l'administrateur et à écrire en dur.
	*/


	/* 
		Définition du theme par défaut
	*/
	define("__theme__", "default");

	/* 
		Définition de l'application
	*/
	//define("__app__", "frontend");
	define("__app__", "backend");


	/* 
		DEBUG MODE 
		Commentaires :
			- Permet de passer le kernel en mode débug ou non : affichage de page d'erreurs.
		Possibilités :
			true		active le mode débug
			false		désative le mode débug
	*/
	$_KERNEL_DEBUG_ = true;

	/*
		Langues
	*/
	$_LANG_DEFAULT_ = "fr";
	$_LANG_ACCEPTED_ = array("fr", "en");

	/* 
		SQL parameters
	*/
	/* Host name */
	$_CONFIG_sql_hostname = "localhost";
	/* User */
	$_CONFIG_sql_user = "root";
	/* Password */
	$_CONFIG_sql_password = "root";
	/* Prefix tables */
	define("__SQL_prefix__", "");
	/* Database */
	define("__SQL_db__", "webtuts");

?>