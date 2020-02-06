<?php namespace models\blog;

class Blog extends \core\model {

    public function getpage($slug){
		return $this->_db->select("
			SELECT 
				".PREFIX."pages.pageID, 
                ".PREFIX."pages.pageTitle, 
                ".PREFIX."pages.pageDesc, 
				".PREFIX."pages.pageSlug, 
				".PREFIX."pages.pageCont, 
				".PREFIX."pages.pageImg
			FROM 
				".PREFIX."pages
			WHERE
				".PREFIX."pages.pageSlug = ?
			",array($slug));
	}

	public function getposts($limit){
		return $this->_db->select("
			SELECT 
				".PREFIX."posts.postID, 
				".PREFIX."posts.postTitle, 
				".PREFIX."posts.postSlug, 
				".PREFIX."posts.postDesc, 
				".PREFIX."posts.postImg, 
				".PREFIX."posts.postDate, 
				".PREFIX."post_cats.catTitle, 
				".PREFIX."post_cats.catSlug 
			FROM 
				".PREFIX."posts, 
				".PREFIX."post_cats 
			WHERE
				".PREFIX."posts.catID = ".PREFIX."post_cats.catID
			ORDER BY 
				postID DESC ".$limit);
	}

	public function getpoststotal(){
		return $this->_db->select("SELECT postID FROM ".PREFIX."posts");
	}

	public function getpost($slug){
		return $this->_db->select("
			SELECT 
				".PREFIX."posts.postID, 
                ".PREFIX."posts.postTitle, 
                ".PREFIX."posts.postDesc, 
				".PREFIX."posts.postSlug, 
				".PREFIX."posts.postCont, 
				".PREFIX."posts.postImg, 
				".PREFIX."posts.postDate, 
				".PREFIX."post_cats.catTitle, 
				".PREFIX."post_cats.catSlug 
			FROM 
				".PREFIX."posts, 
				".PREFIX."post_cats 
			WHERE
				".PREFIX."posts.postSlug = ?
				AND ".PREFIX."posts.catID = ".PREFIX."post_cats.catID
			",array($slug));
	}

	public function getcatposts($slug,$limit){
		return $this->_db->select("
			SELECT 
				".PREFIX."posts.postID, 
				".PREFIX."posts.postTitle, 
				".PREFIX."posts.postSlug, 
				".PREFIX."posts.postDesc, 
				".PREFIX."posts.postImg, 
				".PREFIX."posts.postDate, 
				".PREFIX."post_cats.catTitle, 
				".PREFIX."post_cats.catSlug 
			FROM 
				".PREFIX."posts, 
				".PREFIX."post_cats 
			WHERE
				".PREFIX."post_cats.catSlug = ?
				AND ".PREFIX."posts.catID = ".PREFIX."post_cats.catID
			ORDER BY 
				postID DESC ".$limit,array($slug));
	}

	public function getcatposttotal($slug){
		return $this->_db->select("
			SELECT 
				".PREFIX."posts.postID 
			FROM 
				".PREFIX."posts, 
				".PREFIX."post_cats 
			WHERE
				".PREFIX."post_cats.catSlug = ?
				AND ".PREFIX."posts.catID = ".PREFIX."post_cats.catID
			",array($slug));
	}

	public function getcats(){
		return $this->_db->select("SELECT * FROM ".PREFIX."post_cats ORDER BY catTitle");
	}


}