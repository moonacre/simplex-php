<?php

//Deny direct access
defined('ACCESS') ? '' : die('No direct access is allowed!');

//Check if two variables are equal
function isEqual($var1, $var2){
    return $var1 == $var2 ? 1 : 0;
}
