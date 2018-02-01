<?php

//Deny direct access
defined('ACCESS') ? '' : die('No direct access is allowed!');

//Check if a variable is empty
function isEmpty($var){

    if(isset($var)){

        if(!empty($var) && !ctype_space($var)){
            return false;
        }else{
            return true;
        }

    }else{
        return true;
    }

}
