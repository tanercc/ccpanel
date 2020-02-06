<?php
error_reporting(E_ALL);
ini_set("display_errors","1");

if(file_exists('vendor/autoload.php')){
	require 'vendor/autoload.php';
} else {
	echo "<h1>Please install via composer.json</h1>";
	echo "<p>Install Composer instructions: <a href='https://getcomposer.org/doc/00-intro.md#globally'>https://getcomposer.org/doc/00-intro.md#globally</a></p>";
	echo "<p>Once composer is installed navigate to the working directory in your terminal/command promt and enter 'composer install'</p>";
	exit;
}

if (!is_readable('app/core/config.php')) {
	die('No config.php found, configure and rename config.example.php to config.php in app/core.');
}

/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     production
 *
 * NOTE: If you change these, also change the error_reporting() code below
 *
 */
	define('ENVIRONMENT', 'development');
/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but production will hide them.
 */

if (defined('ENVIRONMENT')){

	switch (ENVIRONMENT){
		case 'development':
			error_reporting(E_ALL);
		break;

		case 'production':
			error_reporting(0);
		break;

		default:
			exit('The application environment is not set correctly.');
	}

}

//initiate config
new \core\config();

//create alias for Router
use \core\router,
    \helpers\url;

//define routes
Router::any('admin', '\controllers\admin\admin@index');
Router::any('admin/index', '\controllers\admin\admin@index');
Router::any('admin/login', '\controllers\admin\auth@login');
Router::any('admin/logout', '\controllers\admin\auth@logout');

Router::any('admin/users', '\controllers\admin\users@index');
Router::any('admin/users/add', '\controllers\admin\users@add');
Router::any('admin/users/edit/(:num)', '\controllers\admin\users@edit');

Router::any('admin/pages', '\controllers\admin\pages@index');
Router::any('admin/pages/add', '\controllers\admin\pages@add');
Router::any('admin/pages/edit/(:num)', '\controllers\admin\pages@edit');
Router::any('admin/pages/delete/(:num)', '\controllers\admin\pages@delete');


Router::any('admin/posts', '\controllers\admin\posts@index');
Router::any('admin/posts/add', '\controllers\admin\posts@add');
Router::any('admin/posts/edit/(:num)', '\controllers\admin\posts@edit');
Router::any('admin/posts/delete/(:num)', '\controllers\admin\posts@delete');

Router::any('admin/cats', '\controllers\admin\cats@index');
Router::any('admin/cats/add', '\controllers\admin\cats@add');
Router::any('admin/cats/edit/(:num)', '\controllers\admin\cats@edit');
Router::any('admin/cats/delete/(:num)', '\controllers\admin\cats@delete');

Router::any('admin/menus', '\controllers\admin\menus@index');
Router::any('admin/menus/add', '\controllers\admin\menus@add');
Router::any('admin/menus/edit/(:num)', '\controllers\admin\menus@edit');
Router::any('admin/menus/delete/(:num)', '\controllers\admin\menus@delete');

Router::any('', '\controllers\blog@index');
Router::any('category/(:any)', '\controllers\blog@cat');
Router::any('post/(:any)', '\controllers\blog@post');
Router::any('(:any)', '\controllers\blog@page');

//if no route found
Router::error('\core\error@index');

//turn on old style routing
Router::$fallback = false;

//execute matched routes
Router::dispatch();
