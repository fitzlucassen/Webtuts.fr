<?php

class Kernel {
	public static $CODE_LANG = 0;
	public static $CODE_CONTROLER = 1;
	public static $CODE_ACTION = 2;
	public static $CODE_PARAM = 3;

	public static $CONTROLER_WITHOUT_NEEDS = array("404");

	public static $PDO;
	public static $APP;
	public static $CONTROLER;
	public static $ACTION;
	public static $LANG;
	public static $LANGS;
	public static $LANG_DEFAULT;
	public static $SESSION;
	public static $RESPONSE;
	public static $URL;
	public static $CACHE;
	public static $PARAMS;


	static public function get($attr) {
		if($attr=="app")
			return __app__;
		elseif($attr=="controler")
			return Kernel::$CONTROLER;
		elseif($attr=="action")
			return Kernel::$ACTION;
		elseif($attr=="session")
			return Kernel::$SESSION;
		elseif($attr=="lang")
			return Kernel::$LANG;
		elseif($attr=="url")
			return Kernel::$URL;
		elseif($attr=="langs")
			return Kernel::$LANGS;
		elseif($attr=="langdefault")
			return Kernel::$LANG_DEFAULT;
		elseif($attr=="params")
			return Kernel::$PARAMS;
		elseif($attr=="cache")
			return Kernel::$CACHE;
		elseif($attr=="user")
			return Kernel::$SESSION->getUser();
		else
			return new Error(1);
		
	}

	public function __construct($_KERNEL_DEBUG_, $_LANG_ACCEPTED_, $_LANG_DEFAULT_) {
		$this->_KERNEL_DEBUG_ = $_KERNEL_DEBUG_;
		$this->_LANG_ACCEPTED_ = $_LANG_ACCEPTED_;
		$this->_LANG_DEFAULT_ = $_LANG_DEFAULT_;
		Kernel::$LANG = $_LANG_DEFAULT_;
		Kernel::$LANG_DEFAULT = $_LANG_DEFAULT_;
		Kernel::$LANGS = $this->_LANG_ACCEPTED_;

		try { 
		    $conn = new PDO('mysql:host='.__SQL_hostname__.';dbname='.__SQL_db__, __SQL_user__,  __SQL_password__, array(PDO::ATTR_PERSISTENT => true, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
		    Kernel::$PDO = $conn;
		} catch(PDOException $e) {
		    echo 'ERREUR: ' . $e->getMessage(); 
		}

		// Paramêtres du site
		$params = Sql2::create()->from("cms_site_params")->fetchArray();
		Kernel::$PARAMS = $params[0];
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

		$url = $this->setUrl($url);

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

		// Appel de l'app et du controler
		if(!empty($route[Kernel::$CODE_CONTROLER]) && in_array($route[Kernel::$CODE_CONTROLER], Kernel::$CONTROLER_WITHOUT_NEEDS)) {
			$return = new Response();
			Kernel::$RESPONSE = $return;
			$appRoute = array($route[Kernel::$CODE_CONTROLER], "index");
		}
		else {
			if(empty($route[Kernel::$CODE_CONTROLER]))
				$route[Kernel::$CODE_CONTROLER] = "home";
			$bundleName = ucfirst($route[Kernel::$CODE_CONTROLER])."Controler";
			$bundle = new $bundleName();
			if(empty($route[Kernel::$CODE_ACTION]) || is_numeric($route[Kernel::$CODE_ACTION])) 
				$route[Kernel::$CODE_ACTION] = "index";
			if(!method_exists($bundle,$route[Kernel::$CODE_ACTION]."Action")) {
				if($this->_KERNEL_DEBUG_)
					return new Error(343);
				else
					header("Location:"._host_.$this->get("lang")."/".$route[Kernel::$CODE_CONTROLER]);
			}
			$controlerName = $route[Kernel::$CODE_ACTION]."Action";
			$params = array();
			foreach ($route as $key => $value) {
				$params[] = $value;
			}
			$controlerName = ucfirst($controlerName);
			$return = $bundle->$controlerName($route);
			Kernel::$RESPONSE = $return;
			if($return->hasRoute())
				$appRoute = $return->getRoute();
			else
				$appRoute = array($route[Kernel::$CODE_CONTROLER], $route[Kernel::$CODE_ACTION]);
		}

		if(!empty($appRoute[0]))
			Kernel::$CONTROLER = $appRoute[0];
		else
			Kernel::$CONTROLER =  "home";
		if(!empty($appRoute[1]))
			Kernel::$ACTION = $appRoute[1];
		else
			Kernel::$ACTION = "index";
		return $return;
	}

	public static function getUrl($url) {
		$urlExplode = explode("/", $url);
		$controler = $urlExplode[0];
		$action = $urlExplode[1];
		$data = Sql2::create()->select("matchurl")
				      ->from("urlrewriting")
				      ->where("app = '".__app__."'")
				      ->andWhere("controler", "=", $controler)
				      ->andWhere("route_order", "=", 0)
				      ->andWhere("action", "=", $action)->fetch();
		
		$route_order_max = Sql2::create()->select("MAX(route_order)")
						 ->from("urlrewriting")->fetch();
		
		$i = 1;
		while(!$data && $i <= $route_order_max){
		    $data = Sql2::create()->select("matchurl")
					->from("urlrewriting")
					->where("app = '".__app__."'")
					->andWhere("controler", "=", $controler)
					->andWhere("route_order", "=", $i)
					->andWhere("action", "=", $action)->fetch();
		    $i++;
		}
		
		if($data) {
			$url = $data;
			$params = $urlExplode;
			unset($params[0]);
			unset($params[1]);
			$params = array_values($params);
			foreach ($params as $key => $value) {
				$url = str_replace("{".($key+1)."}", $value, $url);
			}
		}
		return $url;
	}

	public function setUrl($url) {
		$data = Sql2::create()->from("urlrewriting")
				      ->where("app = '".__app__."'")
				      ->orderBy("route_order", "ASC")
				      ->fetchArray();
		
		foreach ($data as $key => $value) {
			foreach ($value as $key2 => $value2) {
				if(is_integer($key2) || $key2 == "id")
					unset($data[$key][$key2]);
			}
			$pattern = $value["matchurl"];
			$bool = true;
			$cpt = 1;
			do {
				$search = "{".$cpt."}";
				if(strpos($pattern, $search)) {
					$pattern = str_replace($search, "(.*)", $pattern);
				}
				else
					$bool = false;
				$cpt++;
			} while($bool);
			$data[$key]["regex"] = "/".addcslashes($pattern, "/")."/i";
			$data[$key]["nbparams"] = $cpt-2; 
		}

		$found_array = array();
		$found = null;
		foreach ($data as $key => $value) {
			if(preg_match($data[$key]["regex"], $url))
				$found_array[] = $data[$key];
		}
		if(count($found_array) == 0) {
			return $url;
		}
		reset($found_array);
		$found = current($found_array);
		
		$paramsName = array();
		$tmp = explode("{", $found["matchurl"]);
		foreach ($tmp as $key => $value) {
			if($key != 0) {
				$rang = strpos($value, "}");
				$search = strtok($value, "}");
				$paramsName[] = $search;
				$search .= "}";
				$tmp[$key] = str_replace($search, "", $value);
			}
		}
		foreach ($tmp as $key => $value) {
			$url = str_replace($value, "/", $url);
		}
		$params = explode("/", $url);
		foreach ($params as $key => $value) {
			if($value == "")
				unset($params[$key]);
		}
		$params = array_values($params);
		$newUrl = $found["controler"]."/".$found["action"];
		foreach ($paramsName as $value) {
			$newUrl .= "/".$params[$value-1];
		}
		return $newUrl;
	}
}

?>