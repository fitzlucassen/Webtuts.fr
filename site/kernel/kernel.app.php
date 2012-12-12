<?php

	$_kernel = new Kernel($_KERNEL_DEBUG_, $_LANG_ACCEPTED_, $_LANG_DEFAULT_);

	// Gestion de l'utilisateur
	/*
		Commente this line if you don't want to use session
	*/
	$_kernel->startSession();

	// ROUTING
	$response = $_kernel->setKernel($_GET["url"], array(Kernel::$CODE_LANG, Kernel::$CODE_APP, Kernel::$CODE_CONTROLLER));

	

	if(get_class($response)!="Error") {

		define("__lang__", $_kernel->get("lang"));

		// Création des variables pour le theme
		foreach ($response->getVars() as $key => $value) {
			$$key = $value;
		}
		$response = null;

	}
	else {
		if($_KERNEL_DEBUG_)
			header("Location:"._host_.$_LANG_DEFAULT_."/error/".$response->get("code"));
		else
			header("Location:"._host_.$_LANG_DEFAULT_);
	}
		
	$_kernel = null;
	$response = null;
	

?>