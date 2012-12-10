<?php

	/* Fichier config */
	require('config.php');

	/* Routes */
	require('route.php');

	/* Spyc for YML */
	require(__library_dir__.'ressources/spyc.php');

	/* Connexion a la bd */
	require(__library_dir__.'ressources/error.class.php');

	/* Collection */
	require(__library_dir__.'ressources/collection.class.php');

	/* STD Class */
	require(__library_dir__.'ressources/std.class.php');

	/* Connexion a la bd */
	require('db_co.php');
	require(__library_dir__.'ressources/sql.class.php');
	require(__library_dir__.'ressources/sql2.class.php');
	
	/* Données de session */
	require(__library_dir__.'ressources/session.class.php');
	
	/* Langage */
	require(__library_dir__.'ressources/lang.class.php');

	/* Response */
	require(__library_dir__.'ressources/response.class.php');

	/* Kernel */
	require(__library_dir__.'ressources/kernel.class.php');

	/* Model */
	require(__library_dir__.'modele/index.php');

	/* Fonctions diverses */
	require(__library_dir__.'ressources/functions.php');

	/* Fonctions du kernel  */
	require("kernel.app.php");

	

	






?>