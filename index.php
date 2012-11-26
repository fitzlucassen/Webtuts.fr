<?php session_start();

	/* ERROR REPORTING */
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	/* KERNEL */
	require_once('kernel/kernel.php');

	/* THEME */
	require_once(_path_themes_.'default/index.php');

?>