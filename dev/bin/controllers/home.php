<?php

//Deny direct access
defined('ACCESS') ? '' : die('No direct access is allowed!');

class home extends controller{

	public function index(){
		$this->view('index');
	}

}