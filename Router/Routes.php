<?php

	class Router_Routes
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
    			'secure' => false,
    			'httponly' => false,
    			'name' => 'slim_session',
    			'secret' => 'thisisamagicalsecretofsecrecy',
    			'cipher' => MCRYPT_RIJNDAEL_256,
    			'cipher_mode' => MCRYPT_MODE_CBC
			));

			$app->add($cookie);

			$this->app = $app;
		}

		public function go()
		{
			$this->app->get('/', function() {
				echo "Hello world!";
			});

			$this->app->get('/session', function() {
				echo "<pre>";
				print_r($_SESSION);
				echo "</pre>";
			});

			$this->app->run();
		}

	}