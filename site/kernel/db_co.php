<?php

	mysql_connect($_CONFIG_sql_hostname, $_CONFIG_sql_user,$_CONFIG_sql_password);
	mysql_select_db(__SQL_db__);

	$_CONFIG_sql_hostname = "";
	$_CONFIG_sql_user = "";
	$_CONFIG_sql_password = "";

?>