<?php

class Kernel {
	public static $CODE_LANG = 0;
	public static $CODE_APP = 1;
	public static $CODE_CONTROLLER = 2;

	public static $APP;
	public static $CONTROLLER;
	public static $LANG;
	public static $SESSION;
	public static $RESPONSE;
	public static $URL;
	public static $CACHE;


	static public function get($attr) {
		if($attr=="app")
			return Kernel::$APP;
		elseif($attr=="controller")
			return Kernel::$CONTROLLER;
		elseif($attr=="session")
			return Kernel::$SESSION;
		elseif($attr=="lang")
			return Kernel::$LANG;
		elseif($attr=="cache")
			return Kernel::$CACHE;
		else
			return new Error(1);
		
	}

	public function __construct($_KERNEL_DEBUG_, $_LANG_ACCEPTED_, $_LANG_DEFAULT_) {
		$this->_KERNEL_DEBUG_ = $_KERNEL_DEBUG_;
		$this->_LANG_ACCEPTED_ = $_LANG_ACCEPTED_;
		$this->_LANG_DEFAULT_ = $_LANG_DEFAULT_;
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
		
		Kernel::$URL = $url;
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
		

		if(!empty($route[Kernel::$CODE_LANG])) {
			// Test la présence d'une langue
			if(!in_array($route[Kernel::$CODE_LANG], $this->_LANG_ACCEPTED_))
				array_unshift($route, $this->_LANG_DEFAULT_);
			else
				Kernel::$LANG = $route[Kernel::$CODE_LANG];
		}
		else
			Kernel::$LANG = $this->_LANG_DEFAULT_;

		// Appel de l'app et du controller
		if(empty($route[Kernel::$CODE_APP]))
			$route[Kernel::$CODE_APP] = "home";
		$bundleName = ucfirst($route[Kernel::$CODE_APP])."Controller";
		$bundle = new $bundleName();
		if(empty($route[Kernel::$CODE_CONTROLLER]) || is_numeric($route[Kernel::$CODE_CONTROLLER])) 
			$route[Kernel::$CODE_CONTROLLER] = "index";
		if(!method_exists($bundle,$route[Kernel::$CODE_CONTROLLER]."Action")) {
			if($this->_KERNEL_DEBUG_)
				return new Error(343);
			else
				header("Location:"._host_.$this->get("lang")."/".$route[Kernel::$CODE_APP]);
		}
		$controllerName = $route[Kernel::$CODE_CONTROLLER]."Action";
		$params = array();
		foreach ($route as $key => $value) {
			$params[] = $value;
		}
		$return = $bundle->$controllerName($tmp);
		Kernel::$RESPONSE = $return;
		
		if($return->hasRoute())
			$appRoute = $return->getRoute();
		else
			$appRoute = array($route[Kernel::$CODE_APP], $route[Kernel::$CODE_CONTROLLER]);

		if(!empty($appRoute[0]))
			Kernel::$APP = $appRoute[0];
		else
			Kernel::$APP =  "home";
		if(!empty($appRoute[1]))
			Kernel::$CONTROLLER = $appRoute[1];
		else
			Kernel::$CONTROLLER = "index";


		return $return;
	}
}

?>