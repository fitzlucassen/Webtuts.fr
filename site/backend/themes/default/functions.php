<?php

	function text($text) {
		$lang = file_get_contents(_theme_path_."lang/".__lang__.".json");
		$lang = json_decode($lang);
		foreach ($lang as $value) {
			if(!empty($value->$text)) {
				return $value->$text;
			}
		}
		return "This text does'nt has its traduction !";
	}

	function createLink($link) {
		if(Kernel::get("langdefault")!=Kernel::get("lang"))
			return "/".Kernel::get("lang").$link;
		else
			return $link;
	}

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