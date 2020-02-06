<?php namespace controllers\admin;

use \helpers\url,
	\helpers\session,
	\core\view;

class Pages extends \core\controller {

	private $_model;

	function __construct(){
		
		Session::set('template', 'admin');
		
		if(!Session::get('loggedin')){
			Url::redirect('admin/login');
		}
		
		$this->_model = new \models\admin\pages();
	}

	public function index(){
	
		$data['title'] = 'Pages';
		$data['sectionlink'] = 'admin/pages';
		$data['pages'] = $this->_model->getpages();
		$data['js'] = "
		<script language='Javascript' type='text/javascript'>
		function delpage(id,title){
			if(confirm('Are you sure you want to delete the page '+ title)){
				window.location.href = '".DIR."admin/pages/delete/' + id;
			}
		}
		</script>
		";

		View::rendertemplate('header',$data);
		View::render('admin/pages',$data);
		View::rendertemplate('footer',$data);
	}

	public function add(){
	
		$data['section'] = 'Pages';
		$data['sectionlink'] = 'admin/pages';
		$data['title'] = 'Add Page';
        $error = array();

		if(isset($_POST['submit'])){

			$pageTitle = $_POST['pageTitle'];
			$pageDesc = $_POST['pageDesc'];
			$pageCont = $_POST['pageCont'];

			if($pageTitle == ''){
				$error[] = 'Title is required';
			}

			if($pageDesc == ''){
				$error[] = 'Description is required';
			}

			if($pageCont == ''){
				$error[] = 'Content is required';
			}

			if(!$error){

				$slug = Url::generateSafeSlug($pageTitle);

				$data = array(
					'pageTitle' => $pageTitle,
					'pageSlug' => $slug,
					'pageDesc' => $pageDesc,
					'pageCont' => $pageCont
				);

				if($_FILES['image']['size'] > 0){
					$file = 'upload/'.$_FILES['image']['name'];
					move_uploaded_file($_FILES['image']['tmp_name'], $file);
					$data['pageImg'] = $file;
				}

				$this->_model->insert_page($data);

				Session::set('message','Page added');
				Url::redirect('admin/pages');

			}
		}

		View::rendertemplate('header',$data);
		View::render('admin/addpage',$data,$error);
		View::rendertemplate('footer',$data);

	}

	public function edit($id){
		
		$data['section'] = 'Pages';
		$data['title'] = 'Edit Page';
		$data['row'] = $this->_model->getpage($id);
        $error = array();

		if(isset($_POST['submit'])){

			$pageTitle = $_POST['pageTitle'];
			$pageDesc = $_POST['pageDesc'];
			$pageCont = $_POST['pageCont'];

			if($pageTitle == ''){
				$error[] = 'Title is required';
			}

			if($pageDesc == ''){
				$error[] = 'Description is required';
			}

			if($pageCont == ''){
				$error[] = 'Content is required';
			}

			if(!$error){

				$slug = Url::generateSafeSlug($pageTitle);

				$data = array(
					'pageTitle' => $pageTitle,
					'pageSlug' => $slug,
					'pageDesc' => $pageDesc,
					'pageCont' => $pageCont
				);

				if($_FILES['image']['size'] > 0){
					$file = 'images/'.$_FILES['image']['name'];
					move_uploaded_file($_FILES['image']['tmp_name'], $file);
					$data['pageImg'] = $file;
				}

				$where = array('pageID' => $id);

				$this->_model->update_page($data,$where);

				Session::set('message','Page Updated');
				Url::redirect('admin/pages');

			}
		}
		
		View::rendertemplate('header',$data);
		View::render('admin/editpage',$data,$error);
		View::rendertemplate('footer',$data);
	}

	public function delete($id){
		$this->_model->delete_page(array('pageID' => $id));
		Session::set('message','Page Deleted');
		Url::redirect('admin/pages');
	}

}
