<?php

	function create_link($string) {
		return __host__.__lang__."/".$string;
	}
	
	function is_assoc($arr) { return (array_values($arr) !== $arr); }
	
?>