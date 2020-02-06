<?php namespace core;
use core\view,
	core\language;

/*
 * controller - base controller
 *
 */

abstract class Controller {
	
	/**
	 * view variable to use the view class
	 * @var string
	 */
	public $view;
	public $language;

	/**
	 * on run make an instance of the config class and view class
	 */
	public function __construct(){
		
		//initialise the views object
		$this->view = new View();
		
		//initialise the language object
		$this->language = new Language();
	}

}
