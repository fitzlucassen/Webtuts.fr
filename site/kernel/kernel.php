<?php
	
	define("time_start", microtime(TRUE));

	/* Fichier config */
	require('config.php');

	/* Routes */
	require('route.php');

	/* Cache */
	require(__library_dir__.'resources/cache.class.php');

	/* Request */
	require(__library_dir__.'resources/request.class.php');

	/* Connexion a la bd */
	require(__library_dir__.'resources/controler.class.php');

	/* Error class */
	require(__library_dir__.'resources/error.class.php');
	
	/* Données de session */
	require(__library_dir__.'resources/session.class.php');

	/* ORM */
	require(__library_dir__.'orm/index.php');
	
	/* Response */
	require(__library_dir__.'resources/response.class.php');

	/* Kernel */
	require(__library_dir__.'resources/kernel.class.php');

	/* Fonctions diverses */
	require(__library_dir__.'resources/functions.php');

	

	/* Fonctions du kernel  */
	require("kernel.app.php");

	

	






?>