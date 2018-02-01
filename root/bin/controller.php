<?php

//Deny direct access
defined('ACCESS') ? '' : die('No direct access is allowed!');

class controller{

    public function view($view = '', $data = ''){

        if(file_exists(ABSPATH . '/public_html/www/'.$view.'.php')){
            include(ABSPATH . '/public_html/www/'.$view.'.php');
        }else{
            file_exists(ABSPATH . '/public_html/www/404.php') ? require(ABSPATH . '/public_html/www/404.php') : require(ABSPATH . '/root/etc/welcome.php');
        }

    }

    public function model($model = ''){
        include(ABSPATH . '/dev/bin/models/' . $model . '.php');
        return new $model();
    }

}