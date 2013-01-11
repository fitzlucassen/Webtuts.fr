<pre><?php 

	//print_r(Sql2::create()->from("article")->where("id", Sql2::$OPE_NOT_IN, "(".Sql2::create()->select("id_article")->from("article_category")->showRequete().")", false)->fetchClassArray());
	print_r(App::getClassArray("article", array("where" => array("nothave" => "category"))));

?></pre>