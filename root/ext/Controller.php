<?php

//Deny direct access
defined('ACCESS') ? '' : die('No direct access is allowed!');

class Controller{

	public function lockdown(){
		isset($_SESSION['key']) ? '' : redirect('/logout/');
	}

	public function isLoggedin(){
		return isset($_SESSION['key']) ? 1:0;
	}

    public function view($view = '', $data = ''){

        if(file_exists(ABSPATH . '/home/www/'.$view.'.php')){
            include(ABSPATH . '/home/www/'.$view.'.php');
        }else{
            file_exists(ABSPATH . '/home/www/404.php') ? require(ABSPATH . '/home/www/404.php') : require(ABSPATH . '/root/boot/404.php');
        }

    }

    public function model($model = ''){
        include(ABSPATH . '/dev/models/' . $model . '.php');
        return new $model();
    }

}