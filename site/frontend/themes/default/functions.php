<?php

    function get_title_from_url($controller, $action){
	$title = "";
	if($controller == "home"){
	    if($action == "index"){
		$title = "Page d'accueil Webtuts";
	    }
	} else if($controller == "blog") {
	    if($action == "categories"){
		$title = "Page des catégories de Webtuts";
	    }
	    else if($action == "articles"){
		$title = "Page des articles de Webtuts";
	    } else {
		$title = "Page de Webtuts";
	    }
	} else if($controller == "user") {
	    $title = "Page utilisateur de Webtuts";
	}
	return $title;
    }
    
    function get_url_image($object){
	if($object->get("image")){
	    $url_image = '/' . __upload_dir__ . $object->get("image")->get("name") . "." . $object->get("image")->get("type");
	}
	else {
	    $url_image = '/'. _theme_path_ . 'images/' . 'article-image.png';
	}
	return $url_image;
    }
    
    function format_date($date){
	
	$months = array("fr" => array(	"January" => "janvier",
					"February" => "fevrier",
					"March" => "mars",
					"April" => "avril",
					"May" => "mai",
					"June" => "juin",
					"July" => "juillet",
					"August" => "aout",
					"September" => "septembre",
					"October" => "octobre",
					"November" => "novembre",
					"December" => "décembre"),
			"en" => array(	"January" => "january",
					"February" => "february",
					"March" => "march",
					"April" => "april",
					"May" => "may",
					"June" => "june",
					"July" => "july",
					"August" => "august",
					"September" => "september",
					"October" => "october",
					"November" => "november",
					"December" => "december"));
    
	$date_without_time = current(explode(' ',$date));
	$date_array = explode('-', $date_without_time);
	$date = date("j F Y", mktime(0, 0, 0, $date_array[1], $date_array[2], $date_array[0]));
	
	$date_array = explode(' ', $date);
	$date = implode(' ',  array($date_array[0], $months[Kernel::get("lang")][$date_array[1]], $date_array[2]));
	return $date;
    }
    
    function short_description($description, $size = 280){
	if(strlen($description) > $size){
	    $description = substr($description, 0, $size) . "...";
	}
	return $description;
    }
?>
