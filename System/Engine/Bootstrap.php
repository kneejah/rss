<?php

	// Disable this some day
	error_reporting(-1);
	ini_set('error_reporting', -1);
	ini_set('display_errors', 1);

	define('APP_ROOT', dirname(__FILE__) . "/../../");

	require APP_ROOT . 'vendor/autoload.php';

	// The standard PHP autoloader
	function class_autoloader($name)
	{
    	$className = str_replace('_', '/', $name);
    	$fileName = $className . '.php';

    	// Look for file in the normal path first, then under system
		$path = APP_ROOT . $fileName;
    	if (file_exists($path))
    	{
    		$result = require_once($path);
    	}
    	else
    	{
    		$path = APP_ROOT . 'System/' . $fileName;
    		$result = require_once($path);
    	}
    	
    	return ($result !== false);
	}
	spl_autoload_register('class_autoloader');

	$router = new Engine_Router();
	$router->route();