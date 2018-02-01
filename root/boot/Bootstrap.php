<?php

//Deny direct access
defined('ACCESS') ? '' : die('No direct access is allowed!');

//Define absolute path
define('ABSPATH', str_replace('\\', '/', dirname(dirname(dirname(__FILE__)))));

//Load user config file
require(ABSPATH.'/dev/Config.php');

//Load boot files
require(ABSPATH.'/root/boot/Domain.php');
require(ABSPATH.'/root/boot/Environment.php');
require(ABSPATH.'/root/boot/Filter.php');
require(ABSPATH.'/root/boot/IsEmpty.php');
require(ABSPATH.'/root/boot/IsEqual.php');
require(ABSPATH.'/root/boot/Token.php');
require(ABSPATH.'/root/boot/Router.php');
require(ABSPATH.'/root/boot/Extra.php');
require(ABSPATH.'/root/boot/Lock.php');
require(ABSPATH.'/root/boot/Country.php');
require(ABSPATH.'/root/boot/Locale.php');

//Load extension files
require(ABSPATH.'/root/ext/Encryption.php');
require(ABSPATH.'/root/ext/Database.php');

//Load controller file
require(ABSPATH.'/root/ext/Model.php');
require(ABSPATH.'/root/ext/Controller.php');