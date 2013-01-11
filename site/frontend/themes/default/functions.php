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
    
    function format_date($date){
	$date_without_time = current(explode(' ',$date));
	$date_array = explode('-', $date_without_time);
	$date = $date_array[2] . '-' . $date_array[1] . '-' .$date_array[0];
	
	return $date;
    }
?>
