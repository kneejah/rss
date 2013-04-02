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

		public function go()
		{
			$app = $this->app;

			$app->get('/login', function() use ($app) {
				Router_Routes::call("Login", $app);
			});

			$app->get('/', function() use ($app) {
				Router_Routes::call("Home", $app);
			});

			$app->get('/session', function() use ($app) {
				echo "<pre>";
				print_r($_SESSION);
				echo "</pre>";
			});

			$this->app->run();
		}

		public static function call($cont, $app)
		{
			$method = $app->request()->getMethod();

			$controller_name = "Controller_$cont";
			$controller = new $controller_name($app);
			
			$controller->$method();
		}

	}