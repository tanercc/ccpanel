<?php namespace models\admin;

class Menus extends \core\model {

	public function getmenus(){
		return $this->_db->select("SELECT * FROM ".PREFIX."menus ORDER BY menuID ASC");
	}

	public function getmenu($id){
		return $this->_db->select("SELECT * FROM ".PREFIX."menus WHERE menuID = ?",array($id));
	}

	public function insert_menu($data){
		$this->_db->insert(PREFIX."menus",$data);
	}

	public function update_menu($data,$where){
		$this->_db->update(PREFIX."menus",$data, $where);
	}

	public function delete_menu($where){
		$this->_db->delete(PREFIX."menus",$where);
	}

}