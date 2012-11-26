<?php

	/* Fichier config */
	require('config.php');

	/* Routes */
	require('route.php');

	/* Connexion a la bd */
	require(_path_library_.'resources/error.class.php');

	/* Collection */
	require(_path_library_.'resources/collection.class.php');

	/* STD Class */
	require(_path_library_.'resources/std.class.php');

	/* Connexion a la bd */
	require('db_co.php');
	require(_path_library_.'resources/sql.class.php');
	require(_path_library_.'resources/sql2.class.php');
	
	/* Données de session */
	require(_path_library_.'resources/session.class.php');
	
	/* Langage */
	require(_kernel_lang_path_);

	/* 
		Modele
	*/
	require(_path_library_.'modele/index.php');

?>