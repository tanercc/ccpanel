<?php namespace controllers\admin;

use \helpers\session,
	\helpers\url,
	\core\view;

class Admin extends \core\controller {

	public function __construct(){
		
		if(!Session::get('loggedin')){
			Url::redirect('admin/login');
		}

	}

	public function index(){
		
		$data['title'] = 'Admin';
		
		Session::set('template', 'admin');
		View::rendertemplate('header',$data);
		View::render('admin/login',$data);
		View::rendertemplate('footer',$data);

	}

}