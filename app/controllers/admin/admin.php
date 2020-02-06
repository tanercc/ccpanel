<?php namespace controllers\admin;

use \helpers\session,
    \helpers\url,
	\core\view;

class Admin extends \core\controller {
	
	public function __construct(){
        parent::__construct();
        
		$this->language->load('admin');

		Session::set('template', 'admin');
	
		if(!Session::get('loggedin')){
			Url::redirect('admin/login');
        }
	}

	public function index(){
		
        $data['lang'] = $this->language->get('index'); //'Admin';

		View::rendertemplate('header',$data);
		View::render('admin/admin',$data);
		View::rendertemplate('footer',$data);

	}

}