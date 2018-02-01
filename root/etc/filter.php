<?php

//Deny direct access
defined('ACCESS') ? '' : die('No direct access is allowed!');

function filter($var,$value){

    switch($var){

        case 'string':
            return filter_var($value, FILTER_SANITIZE_STRING);
            break;

        case 'email':
            $value = filter_var($value, FILTER_SANITIZE_EMAIL);
            return filter_var($value, FILTER_VALIDATE_EMAIL) === false ? 0 : $value;
            break;

        case 'encoded':
            return filter_var($value, FILTER_SANITIZE_ENCODED);
            break;

        case 'magic_quotes':
            return filter_var($value, FILTER_SANITIZE_MAGIC_QUOTES);
            break;

        case 'float':
            $value = filter_var($value, FILTER_SANITIZE_NUMBER_FLOAT);
            return filter_var($value, FILTER_VALIDATE_FLOAT) === false ? 0 : $value;
            break;

        case 'int':
            $value = filter_var($value, FILTER_SANITIZE_NUMBER_INT);
            return filter_var($value, FILTER_VALIDATE_INT) === false ? 0 : $value;
            break;

        case 'special_char':
            return filter_var($value, FILTER_SANITIZE_SPECIAL_CHARS);
            break;

        case 'stripped':
            return filter_var($value, FILTER_SANITIZE_STRIPPED);
            break;

        case 'url':
            $value = filter_var($value, FILTER_SANITIZE_URL);
            return filter_var($value, FILTER_VALIDATE_URL) === false ? 0 : $value;
            break;

        case 'unsafe_raw':
            return filter_var($value, FILTER_UNSAFE_RAW);
            break;

        case 'boolean':
            return filter_var($value, FILTER_VALIDATE_BOOLEAN) === false ? 0 : $value;
            break;

        case 'ip';
            return filter_var($value, FILTER_VALIDATE_IP) === false ? 0 : $value;
            break;

        case 'regexp':
            return filter_var($value, FILTER_VALIDATE_REGEXP) === false ? 0 : $value;
            break;

        default:
            return 0;
            break;

    }

}

//Clean input data
function clean($var){
    return isset($var) ? strip_tags($var) : ''; 
}