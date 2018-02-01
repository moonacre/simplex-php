<?php

//Deny direct access
defined('ACCESS') ? '' : die('No direct access is allowed!');

class Service extends Controller{

	public function index(){
		redirect('/service/generate-instagram-access-token/');
	}

	public function generate_instagram_access_token(){

		$data['site'] = 'Checkinno';
		$data['page'] = 'Generate Instagram Access Token';

		$this->view('access-token',$data);
	}

}