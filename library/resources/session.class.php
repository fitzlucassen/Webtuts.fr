<?php
    /** 
     * Class Session 
     * Manage sessions 
     */
    class Session{
	private $timeout = 0;
	private $sessionName = NULL;
	private static $isStarted = false ;  
	private $cookieParams = array();

	/** 
	 * constructor 
	 * @param type $sessionName
	 * @param type $cookieParams
	 * @param type $timeout 
	 */
	public function __construct($sessionName = 'anonyme',$cookieParams = array(), $timeout = 3600){
	    $this->timeout = (int) $timeout;    
	    $this->sessionName = (string) $sessionName;

	    $this->cookieParams = array_merge(session_get_cookie_params(), $cookieParams);
	    
	    session_set_cookie_params(
		$this->cookieParams['lifetime'], 
		$this->cookieParams['path'],
		$this->cookieParams['domain'],
		$this->cookieParams['secure'],
		$this->cookieParams['httponly']
	    );
	    if(!isset($_SESSION['started']) || $_SESSION['started'] !== true){
		session_name($this->sessionName);
		session_start();
		session_regenerate_id(true);

		$this->write('started', true);//$_SESSION['started'] = true;
		self::$isStarted = true;

		if($this->read('started_time',false)){
		    $this->write('started_time', time()); //$_SESSION['started_time'] = time();
		}
	    }
	}
	/** 
	 * isExpired
	 * Testing expiration time session
	 * @return boolean 
	 */
	public function isExpired(){
	    if(time() - $this->read('started_time') < $this->timeout){
		return true;
	    } else {
		return false;
	    }
	}
	/**
	 * write
	 * create the sessions
	 * @param type $key
	 * @param type $value
	 * @return \Session 
	 */
	public function write($key, $value){
	    $_SESSION[$key] = $value;
	    return $this;
	}
	/**
	 * Read
	 * read the sessions 
	 * @param type $key
	 * @param type $default
	 * @return  session value
	 */
	public function read($key, $default = NULL){
	    return (isset($_SESSION[$key]))? $_SESSION[$key] : $default;
	}
	/**
	 * close 
	 * destroy sessions 
	 */
	public function close(){
	    $_SESSION = array();
	    unset($_SESSION);
	    session_destroy();
	}
    }
?>