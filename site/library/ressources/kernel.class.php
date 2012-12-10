<?php

class Kernel {
	public static $CODE_LANG = 0;
	public static $CODE_APP = 1;
	public static $CODE_CONTROLLER = 2;



	static public function get($attr) {
		if($attr=="app")
			return $this->app;
		elseif($attr=="controller")
			return $this->controller;
		elseif($attr=="lang")
			return $this->lang;
		elseif($attr=="session")
			return $this->session;
		else
			return new Error(1);
		
	}

	public function __construct($_KERNEL_DEBUG_, $_LANG_ACCEPTED_, $_LANG_DEFAULT_) {
		$this->_KERNEL_DEBUG_ = $_KERNEL_DEBUG_;
		$this->_LANG_ACCEPTED_ = $_LANG_ACCEPTED_;
		$this->_LANG_DEFAULT_ = $_LANG_DEFAULT_;
	}


	public function startSession() {
		$this->session = new Session();
	}

	private function set($attr, $value) {
		$this->$attr = $value;
	}

	public function setKernel($url, $path_type) {
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
				$this->set("lang", $route[Kernel::$CODE_LANG]);
		}
		else
			$this->set("lang", $this->_LANG_DEFAULT_);

		// Appel de l'app et du controller
		if(empty($route[Kernel::$CODE_APP]))
			$route[Kernel::$CODE_APP] = "home";
		$bundleName = ucfirst($route[Kernel::$CODE_APP])."App";
		if(file_exists(__apps_dir__.$route[Kernel::$CODE_APP].'/index.php'))
			require(__apps_dir__.$route[Kernel::$CODE_APP].'/index.php');
		else return new Error(342);
		$bundle = new $bundleName();
		if(empty($route[Kernel::$CODE_CONTROLLER]) || is_numeric($route[Kernel::$CODE_CONTROLLER])) 
			$route[Kernel::$CODE_CONTROLLER] = "index";
		if(!method_exists($bundle,$route[Kernel::$CODE_CONTROLLER]."Controller")) {
			if($this->_KERNEL_DEBUG_)
				return new Error(343);
			else
				header("Location:".__host__.$this->get("lang")."/".$route[Kernel::$CODE_APP]);
		}
		$controllerName = $route[Kernel::$CODE_CONTROLLER]."Controller";
		$params = array();
		foreach ($route as $key => $value) {
			$params[] = $value;
		}
		$return = $bundle->$controllerName($tmp);
		
		$appRoute = $return->getRoute();

		if(!empty($appRoute[0]))
			$this->set("app", $appRoute[0]);
		else
			$this->set("app", "home");
		if(!empty($appRoute[1]))
			$this->set("controller", $appRoute[1]);
		else
			$this->set("controller", "index");


		return $return;
	}
}

?>