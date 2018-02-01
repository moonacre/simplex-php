<?php

//Deny direct access
defined('ACCESS') ? '' : die('No direct access is allowed!');

//External/internal link
function url($url=''){

    if(!empty($var) && !ctype_space($var)){
        print(domain() . $url);
    }else{
        print(domain() . $url = rtrim($url, '/') . '/');
    }

}

//Load resources
function load($file=''){
    echo domain() . $file;
}

//Get user's ip address
function ipAddress(){

    if(filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP) !== false){
        return @$_SERVER['HTTP_CLIENT_IP'];
    }elseif(filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP) !== false){
        return @$_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        return @$_SERVER['REMOTE_ADDR'];
    }

}

//Get user's timezone
function timezone($timezone){
    date_default_timezone_set($timezone);
}

//Page redirect
function redirect($target){
    header('Location: ' . domain() . $target);
}

//Delete a file
function delete($file){
    unlink($file);
}