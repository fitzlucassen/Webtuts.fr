<?php
echo "<pre>";/*
foreach(Kernel::$PDO->query("SELECT * FROM category WHERE id=1") as $key => $cats) {
	print_r($cats);
}*/
/*
print_r(Kernel::$PDO->query("SELECT * FROM category WHERE id=1")->fetchObject("Article"));*/
echo "</pre>";

	/*echo "<pre>";*/
	/*if(App::getClass("category")->hydrate(array("name" => 35, "description" => 36, "image" => 7))->save())
		echo "did !";
	else
		echo "fail";*/
/*
	print_r(App::getClass("category")->hydrate(array(
		"name" => array(
			"fr" => "TitleFr",
			"en" => "TitleEn"
		), 
		"description" => array(
			"fr" => "DescriptionFr"
		),
		"image" => 7,
		"deleted" => 0
	)));
*/	echo "<pre>";
	print_r(App::getClassArray("article", array(
		"limit" => 5,
		"where" => array(
				"have" => "category"
		)
	)));
	echo "</pre>";
/*
	print_r(App::getClassArray("category", array(
			"limit" => 5,
			"where" => array(
				"where" => array(
					"nothave" => "category"
				),
				"andwhere" => array(
					"where" => "date >= 10/02/21",
					"andwhere" => "date <= 13/03/21"
				)
			)
		)));*/


?></pre>