<?php

	/*
		Autoloader des applications
	*/
	spl_autoload_register("loadClass");
	function loadClass($class) {
		if(file_exists(__apps_dir__.__app__.'/'.str_replace("controller", "",mb_strtolower($class)).'/index.php')) // Debug for class_exists()
			require(__apps_dir__.__app__.'/'.str_replace("controller", "",mb_strtolower($class)).'/index.php');
	}

	function create_link($string) {
		return _host_.Kernel::get("lang")."/".$string;
	}
	
	function is_assoc($arr) { return (array_values($arr) !== $arr); }
	
?>