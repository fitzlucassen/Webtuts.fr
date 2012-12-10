<?php
	/*
		Fichier de configuration : 
		Contient toutes les informations necessaires a fournir par l'administrateur et à écrire en dur.
	*/
	/* host url */
	define("__host__", "site internet absolu");
	define("__root__", "lien sur le disque serveur en absolue");

	define("__theme__", "default");

	/* DEBUG MODE du kernel (affiche ou non une page d'erreur) */
	$_KERNEL_DEBUG_ = true;

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
	$_CONFIG_sql_password = "";
	/* Prefix tables */
	define("__SQL_prefix__", "");
	/* Database */
	define("__SQL_db__", "site");

?>