<?php

	class Engine_App
	{

		public static function call($cont, $app)
		{
			$method = $app->request()->getMethod();

			$controller_name = "Controller_$cont";
			$controller = new $controller_name($app);
			
			$controller->$method();

			self::respond($cont, $app);
		}

		public static function respond($cont, $app)
		{
			$method = $app->request()->getMethod();

			// Render the view and get all the params
			$view_name = "View_{$cont}_{$method}";
			$view = new $view_name($app);
			$vars = $view->render();

			// Load the actual template
			$loader = new Mustache_Loader_FilesystemLoader(APP_ROOT . 'Templates');
			$mustache = new Mustache_Engine(
				array('loader' => $loader)
			);
			echo $mustache->render($cont . "/" . $method, $vars);
		}

	}