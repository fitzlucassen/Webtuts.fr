<?php

	/*

	les variables sont : 

		Kernel::get("app");
		Kernel::get("controller");
		Kernel::get("lang");


		Ensuite vous faites ce que vous voulez ;D


	*/
		$article->get("category")->get("name");
		echo "<pre>";
		print_r($article);
		echo "</pre>";
		echo Kernel::get("app")."<br />";
		echo Kernel::get("controller");


?>