<?php

//Deny direct access
defined('ACCESS') ? '' : die('No direct access is allowed!');

load_package('filter');
load_package('token');
load_package('extra');
load_package('sha2');