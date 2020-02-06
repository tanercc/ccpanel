<?php namespace models\admin;

class Auth extends \core\model {

	public function getHash($username){echo "*";
		$data = $this->_db->select("SELECT password FROM ".PREFIX."members WHERE username = ?",array($username));
		return $data[0]->password;
	}

}