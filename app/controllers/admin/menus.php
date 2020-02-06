<?php namespace controllers\admin;

use \helpers\url,
	\helpers\session,
	\core\view;

class Menus extends \core\controller {

	private $_model;

	function __construct(){
		
		Session::set('template', 'admin');
		
		if(!Session::get('loggedin')){
			Url::redirect('admin/login');
		}
		
		$this->_model = new \models\admin\menus();
	}

	public function index(){
		$data['title'] = 'Menus';
		$data['menus'] = $this->_model->getmenus();
		$data['js'] = "
		<script language='Javascript' type='text/javascript'>
		function delmenu(id,title){
			if(confirm('Are you sure you want to delete the post '+ title)){
				window.location.href = '".DIR."admin/menus/delete/' + id;
			}
		}
		</script>
		";

		View::rendertemplate('header',$data);
		View::render('admin/menus',$data);
		View::rendertemplate('footer',$data);
	}

	public function add(){
	
		$data['section'] = 'Menus';
		$data['sectionlink'] = 'admin/menus';
		$data['title'] = 'Add Menu';

		if(isset($_POST['submit'])){

			$menuTitle = $_POST['menuTitle'];

			if($menuTitle == ''){
				$error[] = 'Title is required';
			}

			if(!$error){

				$data = array(
					'menuTitle' => $menuTitle
				);
				$this->_model->insert_menu($data);

				Session::set('message','Menu added');
				Url::redirect('admin/menus');

			}
		}

		View::rendertemplate('header',$data);
		View::render('admin/addmenu',$data,$error);
		View::rendertemplate('footer',$data);

	}

	public function edit($id){
		
		$data['section'] = 'Menus';
		$data['sectionlink'] = 'admin/menus';
		$data['title'] = 'Edit Menu';
		$data['row'] = $this->_model->getmenu($id);
        $error = array();

		if(isset($_POST['submit'])){

			$menuTitle = $_POST['menuTitle'];

			if($menuTitle == ''){
				$error[] = 'Title is required';
			}

			if(!$error){

				$data = array(
					'menuTitle' => $menuTitle
				);
				$where = array('menuID' => $id);

				$this->_model->update_menu($data,$where);

				Session::set('message','Menu Updated');
				Url::redirect('admin/menus');

			}
		}

		View::rendertemplate('header',$data);
		View::render('admin/editmenu',$data,$error);
		View::rendertemplate('footer',$data);
	}

	public function delete($id){
		$this->_model->delete_menu(array('menuID' => $id));
		Session::set('message','Menu Deleted');
		Url::redirect('admin/menus');
	}


}
