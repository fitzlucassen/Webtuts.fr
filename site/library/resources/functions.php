<?php

	/*
		Autoloader des applications
	*/
	spl_autoload_register("loadClass");
	function loadClass($class) {
		require(__apps_dir__. strtok(mb_strtolower($class), "app").'/index.php');
	}

	function create_link($string) {
		return __host__.Kernel::get("lang")."/".$string;
	}
	
	function is_assoc($arr) { return (array_values($arr) !== $arr); }
	
?>