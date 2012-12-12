<?php

	/* ERROR REPORTING */
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

	/* KERNEL */
	require_once('site/kernel/kernel.php');

	/* THEME */
	require_once(__themes_dir__.'default/index.php');
?>