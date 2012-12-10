<?php session_start();

	/* ERROR REPORTING */
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	// Acces par l'adresse du fichier index directement
	//if(!empty($_GET["url"]) {}
		//echo "test";

	/* KERNEL */
	require('kernel/kernel.php');

	/* THEME */
	require(__themes_dir__.__theme__.'/index.php');

?>