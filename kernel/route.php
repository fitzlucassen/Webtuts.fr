<?php
	/* host url */

	define("_host_", "");
	//define("_host_absolute_", "/");
	define("_host_absolute_", "/webtuts/");

	/* library */
	define("_path_library_", "library/");
	
	/** 
	 *	kernel 
	 */
	
	/* templates du kernel */
	define("_kernel_templates_", _path_library_."kernel_templates/");
	/* Change this path to your own kernel-error page path */
	define("_kernel_templates_error_", _kernel_templates_."error-page.php");

	/* langages */
	define("_path_lang_", _path_library_."lang/");
	define("_kernel_lang_", "en");
	define("_kernel_lang_path_", _path_lang_."en.kernel.lang.json");

	/* site */
	define("_path_site_", _host_."frontend/");


	/* themes */
	define("_path_themes_", _path_site_."themes/");
?>