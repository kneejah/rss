<?php

	// Disable this some day
	error_reporting(-1);
	ini_set('error_reporting', -1);
	ini_set('display_errors', 1);

	define('APP_ROOT', dirname(__FILE__) . "/../");

	require '../vendor/autoload.php';

	// The standard PHP autoloader
	function class_autoloader($name)
	{
    	$split = str_replace('_', '/', $name);
    	$path = "../" . $split . ".php";
    	$result = require_once($path);
    	return ($result !== false);
	}
	spl_autoload_register('class_autoloader');

	// Autoloader for the Redis ORM stuff
	function redis_autoloader($class) {
    	if (substr_compare($class, 'redis\\orm\\', 0, 10, false) === 0)
    	{
        	$filename = __DIR__ . '/lib/' . strtr(substr($class, 10), '\\', '/') . '.php';
        	$result = require_once($filename);
        	return ($result !== false);
    	}
    	return false;
	}
	spl_autoload_register('redis_autoloader');

	$router = new Engine_Router();
	$router->route();