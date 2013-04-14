<?php

	class Engine_Settings
	{

		public static function getRoutes()
		{
			$routes = array(
				'Home'            => array('uri' => '/',                 'type' => 'get'),
				'Canvas_Facebook' => array('uri' => '/canvas/facebook/', 'type' => 'post'),
				// 'Canvas_Facebook' => array('uri' => '/canvas/facebook/', 'type' => 'get')
			);

			return $routes;
		}

		public static function applyCustomRoutes(&$app)
		{
			$app->post('/canvas/facebook/session', function() use ($app) {
				echo "<pre>";
				print_r($_SESSION);
				echo "</pre>";
			});
		}

		public static function getCookie()
		{
			$cookie = new \Slim\Middleware\SessionCookie(array(
    			'expires' => '24 hours',
    			'path' => '/',
    			'domain' => null,
    			'secure' => false,
    			'httponly' => false,
    			'name' => 'slim_session',
    			'secret' => 'thisisamagicalsecretofsecrecy',
    			'cipher' => MCRYPT_RIJNDAEL_256,
    			'cipher_mode' => MCRYPT_MODE_CBC
			));

			return $cookie;
		}

	}