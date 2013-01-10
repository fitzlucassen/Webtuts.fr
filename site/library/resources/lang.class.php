<?php


class Lang {

	public function __construct($idLang) {
		$lang = Sql2::create()->from("lang")->where("id_lang", Sql2::$OPE_EQUAL, $idLang)->fetchArray();
		foreach ($lang as $value) {
			$lang = $value["lang"];
			$this->$lang = $value["text"];
		}
	}

	public function get($lang = __lang__) {
		if(isset($this->$lang))
			return $this->$lang;
		else
			return "";
	}

	public function __toString() {
		$lang = __lang__;
		if(isset($this->$lang))
			return $this->$lang;
		else
			return "";
	}

}

?>