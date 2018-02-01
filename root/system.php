<?php

//Deny direct access
defined('ACCESS') ? '' : die('No direct access is allowed!');

//Define absolute path
define('ABSPATH', str_replace('\\', '/', dirname(dirname(__FILE__))));

//Include certain files if needed by the user
function inc($package){
	require_once(ABSPATH . '/root/etc/'.$package.'.php');
}

//PHPExcel library
function use_phpexcel(){
	require_once(ABSPATH . '/root/lib/PHPExcelMaster/PHPExcel.php');
}

//PHPMailer library
function use_phpmailer(){
	require_once(ABSPATH . '/root/lib/PHPMailer/PHPMailerAutoload.php');
}

//Load user configuration files file
require_once(ABSPATH.'/dev/config/db.php');
require_once(ABSPATH.'/dev/config/dev_env.php');
require_once(ABSPATH.'/dev/config/extra.php');
require_once(ABSPATH.'/dev/config/load.php');


//Load primary boot files
require_once(ABSPATH.'/root/boot/domain.php');
require_once(ABSPATH.'/root/boot/env.php');
require_once(ABSPATH.'/root/boot/reserves.php');

//Load bin files
require_once(ABSPATH.'/root/bin/database.php');
require_once(ABSPATH.'/root/bin/model.php');
require_once(ABSPATH.'/root/bin/controller.php');

//Initiate router file
require_once(ABSPATH.'/root/boot/router.php');