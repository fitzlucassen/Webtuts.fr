<?php
	/**
		Fichier de configuration : 
		Contient toutes les informations necessaires a fournir par l'administrateur et à écrire en dur.
	*/

	/** 
		SQL parameters
	*/

	/* Host name */
	//$_CONFIG_sql_hostname = "mysql.webtuts.fr";
	$_CONFIG_sql_hostname = "localhost";
	
	/* User */
	//$_CONFIG_sql_user = "webtuts";
	$_CONFIG_sql_user = "root";
	
	/* Password */
	//$_CONFIG_sql_password = "webtuts2013";
	$_CONFIG_sql_password = "";
	
	/* Prefix tables */
	define("_sql_prefix_", "");
	/* Database */
	define("_sql_db_", "webtuts");
	
	/* Start the session */
	$Session = new Session();
	// Test si la session a déjà été initialisée
	if($Session->read('langue') === null){
	    // En cas de non existance , création de la variable session en FR
	    $Session->write('langue','fr');
	}
	
	// Récupération du nom de la page
	$page = isset($_GET['page'])?htmlspecialchars($_GET['page']):'home';
	
?>