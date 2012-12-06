<?php
	/* Routes */
	require('route.php');
	
	/* Données de session */
	require(_path_library_.'resources/session.class.php');
	
	/* Fichier config */
	require('config.php');

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
	
	/* Class de mailing */
	require(_path_library_.'resources/mail.class.php');
	
	require('kernel.app.php');

	/* Langage */
	if(!empty($lang))
		require(_path_lang_.$lang.".php");
	else
		require(_path_lang_.$Session->read('langue').".php");

	

	/* 
		Modele
	*/
	require(_path_library_.'modele/index.php');

?>