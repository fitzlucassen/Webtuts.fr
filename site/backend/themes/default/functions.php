<?php
	//include(__library_dir__ . "lang/" . Kernel::get("lang") . ".php");
	function partial($page) {
		include(_theme_path_."partials/".$page.".php");
	}
	function img($name) {
		echo '/'._theme_path_ . 'images/'.$name;
	}
	function lang($lang){
		if($lang != "")
			echo $lang;
		else
			echo "This text does'nt has this traduction !";
	}
?>