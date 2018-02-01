<?php

//Deny direct access
defined('ACCESS') ? '' : die('No direct access is allowed!');

class Router{

    public static $url = [];
	public static $controller = '';
	public static $method = 'index';
	public static $params = [];

    public static function parseUrl(){
		if(isset($_GET['url'])){
            $_GET['url'] = strtolower($_GET['url']);
			return explode('/', filter_var(rtrim(clean($_GET['url']), '/'), FILTER_SANITIZE_URL));
		}else{
			return explode('/', filter_var(rtrim('indexController', '/'), FILTER_SANITIZE_URL));
		}
	}

    public static function run(){

        self::$url = self::parseUrl();
    	self::$url[0] = clean(str_replace('-', '_', self::$url[0]));

		if(file_exists(ABSPATH . '/dev/controllers/' .ucfirst(self::$url[0]). '.php')){
			self::$controller = ucfirst(self::$url[0]);
			unset(self::$url[0]);

			require_once(ABSPATH . '/dev/controllers/' .self::$controller. '.php');
            self::$controller = ucfirst(self::$controller);
			self::$controller = new self::$controller();

			if(isset(self::$url[1])){

				self::$url[1] = clean(str_replace('-', '_', self::$url[1]));

				if(method_exists(self::$controller, self::$url[1])){
					self::$method = self::$url[1];
					unset(self::$url[1]);
				}else{
					file_exists(ABSPATH . '/home/www/404.php') ? require(ABSPATH . '/home/www/404.php') : require(ABSPATH . '/root/boot/404.php');
				}

			}

			self::$params = self::$url ? array_values(self::$url) : [];
			call_user_func_array([self::$controller, self::$method], self::$params);

		}else{
			require(ABSPATH . '/home/www/404.php');
		}


    }

}
