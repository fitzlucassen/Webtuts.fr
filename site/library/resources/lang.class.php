<?php


class LangType implements Type {

	private $langForced;

	public function __construct($idLang, $langForced = null) {
		$lang = Sql2::create()->from("lang")->where("id_lang", Sql2::$OPE_EQUAL, $idLang)->fetchArray();
		foreach ($lang as $value) {
			$lang = $value["lang"];
			$this->$lang = $value["text"];
		}
		$this->langForced = $langForced;
	}

	public function get($params = __lang__) {
		if($params!=null)
			$this->setLang($params);
		else {
			$this->setLang(Kernel::get("lang"));
		}
		return $this;
	}

	public static function getCompare($data, $params = true) {
		if($params)
			return Kernel::sanitize($data);
		else
			return $data;
	}

	public function setLang($langForced) {
		$this->langForced = $langForced;
	}

	public static function check($data) {
		$valid = true;
		if(!is_array($data))
			$valid = false;
		foreach ($data as $key => $value) {
			if(empty($value))
				$valid = false;
		}
		return $valid;
	}

	public static function save($data) {
		$id_lang = Sql2::create()->select("COUNT(DISTINCT id_lang)")->from("lang")->fetch();
		$id_lang++;
		foreach ($data as $key2 => $value2) { // différentes langues
			Sql2::create()->insert("lang")->columnsValues(array("id_lang" => $id_lang, "lang" => $key2, "text" => $value2))->execute();
		}
		return $id_lang;
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