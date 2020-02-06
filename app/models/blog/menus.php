<?php namespace models\blog;

class Menus extends \core\model {

	public function getmenus(){
		return $this->_db->select("SELECT * FROM ".PREFIX."menus ORDER BY menuID ASC");
    }
    
}