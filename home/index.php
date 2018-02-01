<?php

//Allow access to bootstrap file
define('ACCESS', true);

//Load bootstrap file
require('../root/boot/Bootstrap.php');

//Boot system
Router::run();
