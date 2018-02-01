<?php

//Deny direct access
defined('ACCESS') ? '' : die('No direct access is allowed!');

//Disabled uri array
$disabled_uri = array('public_html','home','dev','lib','root','controller','module','boot','ext','index');
$_uri = clean($_SERVER['REQUEST_URI']);

//Check if uri is on disabled list
foreach($disabled_uri as $uri){
    if(strpos($_uri, $uri) !== false){
        redirect('/');
    }
}
