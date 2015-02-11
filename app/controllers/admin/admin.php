<?php namespace controllers\admin;

use \helpers\session,
	\helpers\url,
	\core\view,
	\helpers\twigcontainer;

class Admin extends \core\controller {

	public function __construct(){
		
		if(!Session::get('loggedin')){
			//Url::redirect('admin/login');
		}

	}

	public function index(){
		
		$data['title'] = 'Admin';
		
		//Session::set('template', 'admin');
		//View::rendertemplate('header',$data);
		//View::render('admin/login',$data);
		//View::rendertemplate('footer',$data);
		
		$item = array('href'=>'link', 'caption'=>'aaaa');
		$data = array('navigation' => array('item'=>$item), 'a_variable'=>'hadt');print_r($data);
		
		echo TwigContainer::Render('admin/index.html', $data);
	}

}