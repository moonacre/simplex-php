<?php

//Deny direct access
defined('ACCESS') ? '' : die('No direct access is allowed!');

//External/internal link
function url($url=''){
    isEmpty($url) ? print(domain() . $url = rtrim($url, '/') . '/') : print(domain() . $url);
}

//Load resources
function load($file=''){
    echo domain() . $file;
}

//Get user's ip address
function ipAddress(){

    if(filter('ip',@$_SERVER['HTTP_CLIENT_IP']) !== false){
        return @$_SERVER['HTTP_CLIENT_IP'];
    }elseif(filterIP(@$_SERVER['HTTP_X_FORWARDED_FOR']) !== false){
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

//Load custom-coded system session
function load_session(){

    ini_set('session.gc_maxlifetime', 604800);
    ini_set('session.gc_probability', 1);
    ini_set('session.gc_divisor', 100);
    session_save_path(ABSPATH . '/session');
    session_start();
    
}

//Load header
function get_header($data = ''){

    !isset($data['site']) ? $data['site'] = '%SITE%' : '';
    !isset($data['page']) ? $data['page'] = '%PAGE%' : '';

    ob_start();
    include(ABSPATH . '/home/www/_includes/header.php');
    $contents = ob_get_contents();
    ob_end_clean();

    $contents = str_replace('%SITE%',$data['site'],$contents);
    $contents = str_replace('%PAGE%',$data['page'],$contents);

    echo $contents;

}

//Load footer
function get_footer($data = ''){
    include(ABSPATH . '/home/www/_includes/footer.php');
}
