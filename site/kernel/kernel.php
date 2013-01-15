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

	/* Collection */
	require(__library_dir__.'resources/collection.class.php');

	/* ORMSTDAbstract Class */
	require(__library_dir__.'resources/ormstdtableabstract.class.php');

	/* STD Class */
	require(__library_dir__.'resources/stdtable.class.php');

	/* ORMSTDAbstract Class */
	require(__library_dir__.'resources/ormstdabstract.class.php');

	/* STD Class */
	require(__library_dir__.'resources/std.class.php');

	/* Connexion a la bd */
	require(__library_dir__.'resources/sql.class.php');
	require(__library_dir__.'resources/sql2.class.php');
	require(__library_dir__.'resources/sql3.class.php');
	
	/* Données de session */
	require(__library_dir__.'resources/session.class.php');
	
	/* Langage */
	require(__library_dir__.'resources/lang.class.php');

	/* Response */
	require(__library_dir__.'resources/response.class.php');

	/* Kernel */
	require(__library_dir__.'resources/kernel.class.php');

	/* Fonctions diverses */
	require(__library_dir__.'resources/functions.php');

	/* Fonctions du kernel  */
	require("kernel.app.php");

	

	






?>