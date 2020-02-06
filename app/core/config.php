<?php namespace core;

/*
 * config - an example for setting up system settings
 * When you are done editing, rename this file to 'config.php'
 *
 */
class Config {

	public function __construct() {

		//turn on output buffering
		ob_start();

		//site address
		define('DIR', 'http://' . $_SERVER['HTTP_HOST'] . '/');

		//set default controller and method for legacy calls
		define('DEFAULT_CONTROLLER', 'welcome');
		define('DEFAULT_METHOD' , 'index');

		//set a default language
		define('LANGUAGE_CODE', 'tr');

		//database details ONLY NEEDED IF USING A DATABASE
		define('DB_TYPE', 'mysql');
		define('DB_HOST', 'localhost');
		define('DB_NAME', 'ccpanel_db');
		define('DB_USER', 'root');
		define('DB_PASS', '');
		define('PREFIX', 'cc_');

		//set prefix for sessions
		define('SESSION_PREFIX', 'ws_');

		//optionall create a constant for the name of the site
		define('SITETITLE', 'Website Şablon');
		define('SITEDESCRIPTION', 'Website Şablon');
		define('SITECONTENT', 'Website Şablon');
		
		//turn on custom error handling
		//set_exception_handler('core\logger::exception_handler');
		//set_error_handler('core\logger::error_handler');

		//set timezone
		date_default_timezone_set('Europe/Istanbul');

		//start sessions
		\helpers\session::init();

		//set the default template
		\helpers\session::set('template', 'default');
	}

}
