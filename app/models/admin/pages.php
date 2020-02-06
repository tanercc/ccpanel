<?php namespace models\admin;

class Pages extends \core\model {

	public function getpages(){
		return $this->_db->select("
			SELECT 
				".PREFIX."pages.pageID, 
                ".PREFIX."pages.pageTitle, 
				".PREFIX."pages.pageDesc
			FROM 
				".PREFIX."pages
			ORDER BY 
				pageID DESC");
	}

	public function getpage($id){
		return $this->_db->select("SELECT * FROM ".PREFIX."pages WHERE pageID = ?",array($id));
	}

	public function insert_page($data){
		$this->_db->insert(PREFIX."pages",$data);
	}

	public function update_page($data,$where){
		$this->_db->update(PREFIX."pages",$data, $where);
	}

	public function delete_page($where){
		$this->_db->delete(PREFIX."pages",$where);
	}

}