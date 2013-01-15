<?php
	
	
	spl_autoload_register(function ($class) {
	    if (strstr($class, "Controler")) { // Autoloader des controller
		    if(file_exists(__apps_dir__.__app__.'/'.str_replace("controler", "",mb_strtolower($class)).'/index.php')) // Debug for class_exists()
				require_once(__apps_dir__.__app__.'/'.str_replace("controler", "",mb_strtolower($class)).'/index.php');
			else
				header("Location:/404");
		} 
		else { // Autoloader du modele
			 if(file_exists(__library_dir__.'modele/'.mb_strtolower($class).'.class.php')) // Debug for class_exists()
				require_once(__library_dir__.'modele/'.mb_strtolower($class).'.class.php');
		}
	});



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
	$response = $_kernel->setKernel($url, array(Kernel::$CODE_LANG, Kernel::$CODE_CONTROLER, Kernel::$CODE_ACTION, Kernel::$CODE_PARAM));
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