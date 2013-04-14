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

	$router = new Engine_Router();
	$router->route();