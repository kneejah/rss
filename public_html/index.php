<?php

	error_reporting(E_ALL | E_STRICT);

	require '../vendor/autoload.php';

	// The standard PHP autoloader
	function rss_autoload($name)
	{
    	$split = str_replace('_', '/', $name);
    	$path = "../" . $split . ".php";
    	$result = require_once($path);
    	return ($result !== false);
	}
	spl_autoload_register('rss_autoload');

	// Autoloader for the Redis ORM stuff
	function redis_autoload($class) {
    	if (substr_compare($class, 'redis\\orm\\', 0, 10, false) === 0)
    	{
        	$filename = __DIR__ . '/lib/' . strtr(substr($class, 10), '\\', '/') . '.php';
        	$result = require_once($filename);
        	return ($result !== false);
    	}
    	return false;
	}
	spl_autoload_register('redis_autoload');

	$routes = new Router_Routes();
	$routes->go();