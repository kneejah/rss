<?php

	class Engine_Router
	{

		private $app = null;

		public function __construct()
		{
			$settings = array(
				'debug' => true
			);

			$app = new \Slim\Slim($settings);

			$cookie = new \Slim\Middleware\SessionCookie(array(
    			'expires' => '24 hours',
    			'path' => '/',
    			'domain' => null,
    			'secure' => true,
    			'httponly' => false,
    			'name' => 'slim_session',
    			'secret' => 'thisisamagicalsecretofsecrecy',
    			'cipher' => MCRYPT_RIJNDAEL_256,
    			'cipher_mode' => MCRYPT_MODE_CBC
			));

			$app->add($cookie);

			$this->app = $app;
		}

		public function route()
		{
			$app = $this->app;

			$app->get('/login', function() use ($app) {
				Engine_App::call("Login", $app);
			});

			$app->get('/signup', function() use ($app) {
				Engine_App::call("Signup", $app);
			});

			$app->get('/', function() use ($app) {
				Engine_App::call("Home", $app);
			});

			$app->get('/session', function() use ($app) {
				echo "<pre>";
				print_r($_SESSION);
				echo "</pre>";
			});

			$this->app->run();
		}

	}