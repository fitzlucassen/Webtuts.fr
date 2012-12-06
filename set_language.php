<?php
require_once 'kernel/route.php';
require_once _path_library_ . 'resources/session.class.php';

// récupération de la langue voulue
$langue = isset($_GET['lang'])?htmlspecialchars($_GET['lang']):'fr';
// création de l'objet de session 
$Session = new Session();

// construction du référent 
$referer = $_SERVER['HTTP_REFERER'];

$referer = str_replace("/". $Session->read("langue") ."/", "/".$langue."/", $referer);
// Stockage de la langue voulue dans la session
$Session->write('langue', $langue);

// Renvoie sur la page d'où le choix de la langue a été demandé
header('Location:' . $referer);

