<?php

//Deny direct access
defined('ACCESS') ? '' : die('No direct access is allowed!');

//Database connection

//Live connection
//define('DB_HOST','52.232.85.254');
//define('DB_USERNAME','cerberus');

//Local connection
define('DB_HOST','localhost'); //Host
define('DB_USERNAME','root'); //Database username

define('DB_NAME','db_checkinno'); //Database name
define('DB_PASSWORD','!mth3ct0b!tch3$!'); //Database password

//System environment
define('DEVELOPMENT_ENV', 1);
define('LOG', ABSPATH.'/log/error-log.txt');

//PHPMailer
define('MAIL_CHARSET', 'UTF-8');
define('MAIL_ENCODING', 'base64');
define('MAIL_HOST', 'smtp.sendgrid.net');
define('MAIL_PORT', 587);
define('MAIL_SMTPAuth', TRUE);
define('MAIL_USERNAME', 'azure_dda2b8cbabc1eaa339ef18998d44ad17@azure.com');
define('MAIL_PASSWORD', 'Vanessa Cabag 143');
define('MAIL_SMTPSecure', 'tls');
