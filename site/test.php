<?php session_start();

	/* ERROR REPORTING */
	error_reporting(E_ALL);
	ini_set("display_errors", 1);

?>

<?php require("kernel/api.php"); ?>



<?php

$url = "article/news";

Kernel::run($url);


?>