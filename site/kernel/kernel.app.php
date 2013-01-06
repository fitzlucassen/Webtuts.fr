<?php
	
	/*
		Mise en route du kernel
	*/

	/* Création du kernel */
	$_kernel = new Kernel($_KERNEL_DEBUG_, $_LANG_ACCEPTED_, $_LANG_DEFAULT_);

	/*
		Gestion de l'utilisateur
		Commentaires :
			- Commente this line if you don't want to use session
	*/
	$_kernel->startSession();

	/*
		Gestion du cache pour les themes
	*/
	$_kernel->startCache("/cache/themes");

	/*
		Appel de l'application et du controller par routing
	*/
	if(!empty($_GET["url"]))
		$url = $_GET["url"];
	else $url = "";
	$response = $_kernel->setKernel($url, array(Kernel::$CODE_LANG, Kernel::$CODE_CONTROLLER, Kernel::$CODE_ACTION));
	$url = "";
	/*
		Mise à disposition des variables pour le thème et gestion des erreurs.
	*/
	if(get_class($response)!="Error") {

		// Création des variables pour le thème
		extract($response->getVars());
		$response = null;

	}
		
	$_kernel = null;
	$response = null;
	

?>