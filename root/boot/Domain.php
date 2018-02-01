<?php

//Deny direct access
defined('ACCESS') ? '' : die('No direct access is allowed!');

//Check if domain is running on port 443
function isHTTPS(){

    if(!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off'){
        return true;
    }elseif(isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https'){
        return true;
    }elseif(!empty($_SERVER['HTTP_FRONT_END_HTTPS']) && strtolower($_SERVER['HTTP_FRONT_END_HTTPS']) !== 'off'){
        return true;
    }else{
        return false;
    }

}

//Return the domain
function domain(){

    if(isset($_SERVER['HTTP_HOST']) && preg_match('/^((\[[0-9a-f:]+\])|(\d{1,3}(\.\d{1,3}){3})|[a-z0-9\-\.]+)(:\d+)?$/i', $_SERVER['HTTP_HOST'])){
        $baseUrl = (isHTTPS() ? 'https' : 'http').'://'.$_SERVER['HTTP_HOST'] . substr($_SERVER['SCRIPT_NAME'], 0, strpos($_SERVER['SCRIPT_NAME'], basename($_SERVER['SCRIPT_FILENAME'])));
    }else{
        $baseUrl = 'http://localhost/';
    }

    return dirname($baseUrl);

}
