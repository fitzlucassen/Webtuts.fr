<?php

class Kernel {
	public static $CODE_LANG = 0;
	public static $CODE_CONTROLLER = 1;
	public static $CODE_ACTION = 2;
	public static $CODE_PARAM = 3;

	public static $CONTROLLER_WITHOUT_NEEDS = array("404");

	public static $PDO;
	public static $APP;
	public static $CONTROLLER;
	public static $ACTION;
	public static $LANG;
	public static $LANG_DEFAULT;
	public static $SESSION;
	public static $RESPONSE;
	public static $URL;
	public static $CACHE;


	static public function get($attr) {
		if($attr=="app")
			return __app__;
		elseif($attr=="controller")
			return Kernel::$CONTROLLER;
		elseif($attr=="action")
			return Kernel::$ACTION;
		elseif($attr=="session")
			return Kernel::$SESSION;
		elseif($attr=="lang")
			return Kernel::$LANG;
		elseif($attr=="langdefault")
			return Kernel::$LANG_DEFAULT;
		elseif($attr=="cache")
			return Kernel::$CACHE;
		else
			return new Error(1);
		
	}

	public function __construct($_KERNEL_DEBUG_, $_LANG_ACCEPTED_, $_LANG_DEFAULT_) {
		$this->_KERNEL_DEBUG_ = $_KERNEL_DEBUG_;
		$this->_LANG_ACCEPTED_ = $_LANG_ACCEPTED_;
		$this->_LANG_DEFAULT_ = $_LANG_DEFAULT_;
		Kernel::$LANG = $_LANG_DEFAULT_;
		Kernel::$LANG_DEFAULT = $_LANG_DEFAULT_;

		try { 
		    $conn = new PDO('mysql:host='.__SQL_hostname__.';dbname='.__SQL_db__, __SQL_user__,  __SQL_password__, array(PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		    Kernel::$PDO = $conn;
		} catch(PDOException $e) {
		    echo 'ERREUR: ' . $e->getMessage(); 
		}
	}


	public function startSession() {
		Kernel::$SESSION = new Session();
	}

	public function startCache($folder, $time = null) {
		if($time == null)
			$time = 10;
		Kernel::$CACHE = new Cache($folder, $time);
	}

	private function set($attr, $value) {
		$this->$attr = $value;
	}

	public function setKernel($url, $path_type) {
		spl_autoload_register(function ($class) {
		    if (strstr($class, "Controller")) {
			    if(file_exists(__apps_dir__.__app__.'/'.str_replace("controller", "",mb_strtolower($class)).'/index.php')) // Debug for class_exists()
					require_once(__apps_dir__.__app__.'/'.str_replace("controller", "",mb_strtolower($class)).'/index.php');
				else
					header("Location:/404");
			}
		});

		/*
		///categorie-nom/article-nom/

		///categorie-{%1}/article-{%2}/

		///blog/tags/mes-fesses/

		$resultatSQL = mysql_query("SELECT * FROM rewritingurl A, routeurl B WHERE A.idroute=B.id");
		while($ligne = mysql_fetch_array($resultatSQL))  { 
		 	echo "Exp : ";
		 	$expression = $ligne["matchurl"];
		 	$found = true;
		 	$cpt = 1;
		 	$var = "{%".$cpt."}";
		 	echo "[".$var." : ".$expression."]";
		 	while(preg_match($var, $expression)!==false) {
		 		echo "lol";
		 		str_replace($var, "(.*)",$expression);
		 		$cpt++;
		 		$var = "\{\%".$cpt."\}";
		 	}
		 	echo $expression."<br />";
		} */

		if($newUrl = Sql2::create()->select("replaceurl")->from("rewritingurl")->where("app", Sql2::$OPE_EQUAL, __app__)->andWhere("matchurl", Sql2::$OPE_EQUAL, $url)->fetch()) {
			$url = $newUrl;
		}

		Kernel::$URL = $url;




		if(!empty($url))
			$tmp = explode("/", $url);
		else
			$tmp = array($this->_LANG_DEFAULT_);


		$cpt = 0;
		foreach ($path_type as $key => $value) {
			if(!empty($tmp[$cpt]))
				$route[$value] = $tmp[$cpt];
			$cpt++;
		}

		// Ajout du reste des params
		for($cpt=$cpt-1;$cpt<count($tmp);$cpt++) {
			if(!empty($tmp[$cpt]))
				$route[$cpt] = $tmp[$cpt];
		}



		if(!empty($route[Kernel::$CODE_LANG])) {
			// Test la présence d'une langue
			if(!in_array($route[Kernel::$CODE_LANG], $this->_LANG_ACCEPTED_))
				array_unshift($route, $this->_LANG_DEFAULT_);
			else
				Kernel::$LANG = $route[Kernel::$CODE_LANG];
		}
		else
			Kernel::$LANG = $this->_LANG_DEFAULT_;

		define("__lang__", Kernel::$LANG);

		// Appel de l'app et du controller
		if(!empty($route[Kernel::$CODE_CONTROLLER]) && in_array($route[Kernel::$CODE_CONTROLLER], Kernel::$CONTROLLER_WITHOUT_NEEDS)) {
			$return = new Response();
			Kernel::$RESPONSE = $return;
			$appRoute = array($route[Kernel::$CODE_CONTROLLER], "index");
		}
		else {
			if(empty($route[Kernel::$CODE_CONTROLLER]))
				$route[Kernel::$CODE_CONTROLLER] = "home";
			$bundleName = ucfirst($route[Kernel::$CODE_CONTROLLER])."Controller";
			$bundle = new $bundleName();
			if(empty($route[Kernel::$CODE_ACTION]) || is_numeric($route[Kernel::$CODE_ACTION])) 
				$route[Kernel::$CODE_ACTION] = "index";
			if(!method_exists($bundle,$route[Kernel::$CODE_ACTION]."Action")) {
				if($this->_KERNEL_DEBUG_)
					return new Error(343);
				else
					header("Location:"._host_.$this->get("lang")."/".$route[Kernel::$CODE_CONTROLLER]);
			}
			$controllerName = $route[Kernel::$CODE_ACTION]."Action";
			$params = array();
			foreach ($route as $key => $value) {
				$params[] = $value;
			}
			$controllerName = ucfirst($controllerName);
			$return = $bundle->$controllerName($route);
			Kernel::$RESPONSE = $return;
			if($return->hasRoute())
				$appRoute = $return->getRoute();
			else
				$appRoute = array($route[Kernel::$CODE_CONTROLLER], $route[Kernel::$CODE_ACTION]);
		}

		if(!empty($appRoute[0]))
			Kernel::$CONTROLLER = $appRoute[0];
		else
			Kernel::$CONTROLLER =  "home";
		if(!empty($appRoute[1]))
			Kernel::$ACTION = $appRoute[1];
		else
			Kernel::$ACTION = "index";
		return $return;
	}

	public static function getUrl($url) {
		if($newUrl = Sql2::create()->select("matchurl")->from("rewritingurl")->where("app", Sql2::$OPE_EQUAL, __app__)->andWhere("replaceurl", Sql2::$OPE_EQUAL, $url)->fetch()) {
			return $newUrl;
		}
		else
			return $url;
	}
}

?>