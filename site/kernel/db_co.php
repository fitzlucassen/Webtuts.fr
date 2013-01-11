<?php
	
	/*
	
		Création de la liaison SQL

	*/

	mysql_connect($_CONFIG_sql_hostname, $_CONFIG_sql_user,$_CONFIG_sql_password);
	mysql_select_db(__SQL_db__);
	mysql_set_charset("utf8");

	$_CONFIG_sql_hostname = "";
	$_CONFIG_sql_user = "";
	$_CONFIG_sql_password = "";

?>