<?php namespace controllers;

class Blog extends \core\controller {
    
    public function index() {
        echo \helpers\password::make('user');
    }
}