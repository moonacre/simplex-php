<?php

//Deny direct access
defined('ACCESS') ? '' : die('No direct access is allowed!');

class Database{

	protected function connect(){
		return new PDO('mysql:host='.DB_HOST.';dbname='.DB_NAME,DB_USERNAME,DB_PASSWORD);
	}

}