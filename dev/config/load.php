<?php

//Deny direct access
defined('ACCESS') ? '' : die('No direct access is allowed!');

inc('filter');
inc('token');
inc('extra');
inc('sha2');

use_phpexcel();
use_phpmailer();