<?php

//Deny direct access
defined('ACCESS') ? '' : die('No direct access is allowed!');

//System environment

//1 - show errors
//0 - hide errors

define('DEVELOPMENT_ENV', 1);

//If you want to have a different location of your log files, just change this.
define('LOG', ABSPATH.'/root/log/error-log');