<?php

//Deny direct access
defined('ACCESS') ? '' : die('No direct access is allowed!');

class About extends Controller{

	public function index(){

		$data['site'] = 'Checkinno';
		$data['page'] = 'About';

		$this->view('about',$data);

	}

}