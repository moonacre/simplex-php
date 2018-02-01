<?php

//Deny direct access
defined('ACCESS') ? '' : die('No direct access is allowed!');

class IndexController extends Controller{

	public function index(){

		$data['site'] = 'Checkinno';
		$data['page'] = 'Home';

		$this->view('index',$data);
		
	}

}