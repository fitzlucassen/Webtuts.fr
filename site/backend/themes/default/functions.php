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
			return $lang;
		else
			return "This text does'nt has its traduction !";
	}
	
	function printDate($date){
		$dateExpl = explode(' ', $date);
		$day = explode('-', $dateExpl[0]);
		
		$month = array(	"01"=>lang(text("january")),
						"02"=>lang(text("february")),
						"03"=>lang(text("march")),
						"04"=>lang(text("april")),
						"05"=>lang(text("may")),
						"06"=>lang(text("june")),
						"07"=>lang(text("july")),
						"08"=>lang(text("august")),
						"09"=>lang(text("september")),
						"10"=>lang(text("october")),
						"11"=>lang(text("november")),
						"12"=>lang(text("december"))					
					);
		
		return $day[2]." ".$month[$day[1]]." ".$day[0]." ".$dateExpl[1];
	}
	
	function minifyTitle($title, $size_max = 25){	
		if(strlen($title) > $size_max){
			return substr($title, 0, $size_max)."...";
		}
		else{
			return $title;
		}
	}
?>