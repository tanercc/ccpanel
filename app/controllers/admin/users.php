<?php namespace controllers\admin;

use \helpers\url,
	\helpers\session,
	\core\view;

class Users extends \core\controller{

	private $_model;

	public function __construct(){
		
		Session::set('template', 'admin');

		if(!Session::get('loggedin')){
			Url::redirect('admin/login');
		}
		
		$this->_model = new \models\admin\users();
	}

	public function index(){

		$data['title'] = 'Users';
		$data['users'] = $this->_model->getusers();

		View::rendertemplate('header',$data);
		View::render('admin/users',$data);
		View::rendertemplate('footer',$data);
	}

	public function add(){
		
		$data['section'] = 'Users';
		$data['sectionlink'] = 'admin/users';
		$data['title'] = 'Add User';
        $error = array();

		if(isset($_POST['submit'])){

			$username = $_POST['username'];
			$password = $_POST['password'];
			$email = $_POST['email'];

			if($username == ''){
				$error[] = 'Username is required';
			}

			if($password == ''){
				$error[] = 'Password is required';
			}

			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			    $error[] = 'Email is not valid';
			}

			if(!$error){

				$postdata = array(
					'username' => $username,
					'password' => \helpers\password::make($password),
					'email' => $email
				);
				$this->_model->insert_user($postdata);

				Session::set('message','User Added');
				Url::redirect('admin/users');

			}

		}

		View::rendertemplate('header',$data);
		View::render('admin/adduser',$data,$error);
		View::rendertemplate('footer',$data);

	}

	public function edit($id){
		
		$data['section'] = 'Users';
		$data['sectionlink'] = 'admin/users';
		$data['title'] = 'Edit User';
		$data['row'] = $this->_model->getuser($id);
        $error = array();

		if(isset($_POST['submit'])){

			$username = $_POST['username'];
			$password = $_POST['password'];
			$email = $_POST['email'];

			if($username == ''){
				$error[] = 'Username is required';
			}

			if($password == ''){
				$error[] = 'Password is required';
			}

			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			    $error[] = 'Email is not valid';
			}

			if(!$error){

				$postdata = array(
					'username' => $username,
					'password' => \helpers\password::make($password),
					'email' => $email
				);
				$where = array('memberID' => $id);
				$this->_model->update_user($postdata,$where);

				Session::set('message','User Updated');
				Url::redirect('admin/users');

			}

		}

		View::rendertemplate('header',$data);
		View::render('admin/edituser',$data,$error);
		View::rendertemplate('footer',$data);

	}

}