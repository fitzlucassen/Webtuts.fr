<pre><?php 

	echo "<pre>";
	if(App::getClass("category")->hydrate(array("name" => 35, "description" => 36, "image" => 7))->save())
		echo "did !";
	else
		echo "fail";
	echo "</pre>";


?></pre>