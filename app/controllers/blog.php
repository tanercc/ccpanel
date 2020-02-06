<?php namespace controllers;

use \core\view,
	\helpers\paginator;

class Blog extends \core\controller {

	private $_model;

	public function __construct(){
        $this->_model = new \models\blog\blog();
        $this->_menus = new \models\blog\menus();
	}

	public function index(){

		$data['title'] = 'Welcome to the blog';
        $data['menus'] = $this->_menus->getmenus();
		$pages = new Paginator('10','page');
		$pages->set_total(count($this->_model->getpoststotal()));
		$data['posts'] = $this->_model->getposts($pages->get_limit());
		$data['page_links'] = $pages->page_links();
		$data['cats'] = $this->_model->getcats();

		View::rendertemplate('header',$data);
		View::render('blog/index',$data);
		View::rendertemplate('footer',$data);
	}

    public function page($slug){
        
        $data['menus'] = $this->_menus->getmenus();
		$data['page'] = $this->_model->getpage($slug);
		$data['title'] = $data['page'][0]->pageTitle;

		View::rendertemplate('header',$data);
		View::render('blog/page',$data);
		View::rendertemplate('footer',$data);

	}

	public function post($slug){
        
        $data['menus'] = $this->_menus->getmenus();
		$data['post'] = $this->_model->getpost($slug);
		$data['title'] = $data['post'][0]->postTitle;
		$data['cats'] = $this->_model->getcats();

		View::rendertemplate('header',$data);
		View::render('blog/post',$data);
		View::rendertemplate('footer',$data);

	}

	public function cat($slug){

        $data['menus'] = $this->_menus->getmenus();
		$pages = new Paginator('10','page');
		$pages->set_total(count($this->_model->getcatposttotal($slug)));
		$data['posts'] = $this->_model->getcatposts($slug, $pages->get_limit());
		$data['page_links'] = $pages->page_links();
		$data['cats'] = $this->_model->getcats();

		$data['title'] = (isset($data['posts'][0])) ? $data['posts'][0]->catTitle : SITETITLE;

		View::rendertemplate('header',$data);
		View::render('blog/cats',$data);
		View::rendertemplate('footer',$data);
	}
}