<?php

	/*

	les variables sont : 

		Kernel::get("app");
		Kernel::get("controller");
		Kernel::get("lang");


		Ensuite vous faites ce que vous voulez ;D


	*/
	/*
		$table = App::getTable("user");
		echo $table->count();
		echo "<pre>";
		print_r($table);
		echo "</pre>";

		*/
		echo "<pre>";
		$result = App::getClass("category", 1);
		print_r($result->get("articles"));
		echo "</pre>";



		//print_r(SqlTerms::where("id", Sql2::$OPE_EQUAL, 3));
		//echo "<pre>";
		//print_r(App::getClass("user", 1));
		//echo "</pre>";
		//echo Sql2::create()->from("user")->where(SqlTerms::where(SqlTerms::where("id", Sql2::$OPE_EQUAL, 3)->andWhere("id2", Sql2::$OPE_EQUAL, 3))->andWhere("id3", Sql2::$OPE_EQUAL, 3))->andWhere("id4", Sql2::$OPE_EQUAL, 3)->showRequete();

/*

		$article->get("category")->get("name");
		echo "<pre>";
		print_r($article);
		echo "</pre>";
		echo Kernel::get("app")."<br />";
		echo Kernel::get("controller");

		echo $article->get("category")->get("name")->get("fr");*/

?>