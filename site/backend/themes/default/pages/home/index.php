<pre><?php 

	echo "<pre>";
	/*if(App::getClass("category")->hydrate(array("name" => 35, "description" => 36, "image" => 7))->save())
		echo "did !";
	else
		echo "fail";*/


		print_r(App::getClassArray("article", array(
			"limit" => 5,
			"where" => array(
					"nothave" => "category"
			)
		)));
	echo "</pre>";

	/*print_r(App::getClassArray("category", array(
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