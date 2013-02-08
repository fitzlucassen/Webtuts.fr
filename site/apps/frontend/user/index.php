<?php
	function upload_image($files, $name, $error){
	    if(!empty($files[$name]['name'])) {
		// Si une erreur s'est produite => On arrête
		if ($files[$name]['error'] > 0) {
		    $error["image_unknown"] = "Erreur lors du transfert";
		    return false;
		} else {
		    // Si l'image fait plus d'5 Mo => On arrête
		    if ($files[$name]['size'] > 5048576) {
			$error["image_weight"] = "Erreur le fichier est trop gros";
			return false;
		    } else {
			$image_sizes = getimagesize($files[$name]['tmp_name']);

			// Si l'image fais plus de 4096 de large ou plus de 4096 de haut => On arrête
			if ($image_sizes[0] > 4096 OR $image_sizes[1] > 4096) {
			    $error["image_size"] = "Image trop grande";
			    return false;
			} else {
			    $extensions_valides = array( 'jpg' , 'jpeg' , 'gif' , 'png' );

			    //1. strrchr renvoie l'extension avec le point
			    //2. substr(chaine,1) ignore le premier caractère de chaine.
			    //3. strtolower met l'extension en minuscules.
			    $extension_upload = strtolower(  substr(  strrchr($files[$name]['name'], '.')  ,1)  );

			    if (in_array($extension_upload,$extensions_valides)) {
				//Créer un identifiant difficile à  deviner
				$id_img = md5(uniqid(rand(), true));
				$image_dir = __upload_dir__ . $id_img . "." . $extension_upload;
				$resultat = move_uploaded_file($files[$name]['tmp_name'],$image_dir);

				return $image_dir;
			    } else {
				$error["image_extension"] = "Extension non supportée";
				return false;
			    }
			}
		    }
		}
	    } else
		return "unknown";
	}
	require("controler.php");
?>