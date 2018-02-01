<?php

//Allow access to bootstrap file
define('ACCESS', true);

//Load bootstrap file
require('../root/system.php');

//Boot system
router::run();