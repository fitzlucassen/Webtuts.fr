<?php

	function create_link($string) {
		return __host__.Kernel::get("lang")."/".$string;
	}
	
	function is_assoc($arr) { return (array_values($arr) !== $arr); }
	
?>