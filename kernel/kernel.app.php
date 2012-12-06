<?php

	session_destroy();

	// URL REWRITING
	if(!empty($_GET['url'])) {
		$url = $_GET['url'];
		$url = explode("/", $url);
		if(!empty($url[0]))
			$lang = $url[0];
		else
			$lang = "fr";
		if(!empty($url[1]))
			$app = $url[1];
		else
			$app = "home";
	}
	else {
		$lang = "fr";
		$app = "home";
	}


?>