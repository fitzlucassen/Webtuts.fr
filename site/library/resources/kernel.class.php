<?php

class Kernel {
	public static $CODE_LANG = 0;
	public static $CODE_CONTROLLER = 1;
	public static $CODE_ACTION = 2;
	public static $CODE_PARAM = 3;

	public static $CONTROLLER_WITHOUT_NEEDS = array("404");

	public static $APP;
	public static $CONTROLLER;
	public static $ACTION;
	public static $LANG;
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
		if(!in_array($route[Kernel::$CODE_CONTROLLER], Kernel::$CONTROLLER_WITHOUT_NEEDS)) {
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
			$return = $bundle->$controllerName($route);
			Kernel::$RESPONSE = $return;
			
			if($return->hasRoute())
				$appRoute = $return->getRoute();
			else
				$appRoute = array($route[Kernel::$CODE_CONTROLLER], $route[Kernel::$CODE_ACTION]);
		}
		else {
			$return = new Response();
			Kernel::$RESPONSE = $return;
			$appRoute = array($route[Kernel::$CODE_CONTROLLER], "index");
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
}

?>