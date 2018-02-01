<?php

//Deny direct access
defined('ACCESS') ? '' : die('No direct access is allowed!');

//Global error reporting
error_reporting(E_ALL);
DEVELOPMENT_ENV === 1 ? ini_set('display_errors','On') : ini_set('display_errors','Off');
ini_set('log_errors', 'On');
ini_set('error_log', LOG);

//Specific error reporting
function elog($error){
    ini_set($error,LOG);
}
