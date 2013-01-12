<?php


class Lang {

	private $langForced;

	public function __construct($idLang, $langForced = null) {
		$lang = Sql2::create()->from("lang")->where("id_lang", Sql2::$OPE_EQUAL, $idLang)->fetchArray();
		foreach ($lang as $value) {
			$lang = $value["lang"];
			$this->$lang = $value["text"];
		}
		$this->langForced = $langForced;
	}

	public function get($lang = __lang__) {
		if(isset($this->$lang))
			return $this->$lang;
		else
			return "";
	}

	public function setLang($langForced) {
		$this->langForced = $langForced;
	}

	public function __toString() {
		if($this->langForced !=null)
			$lang = $this->langForced;
		else
			$lang = __lang__;
		if(isset($this->$lang))
			return $this->$lang;
		else
			return "";
	}

}

?>