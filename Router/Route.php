<?php

	class Routes_Route
	{

		public static function init()
		{
			$settings = array(
        		'debug' => true
			);

			$app = new \Slim\Slim($settings);

			$app->get('/home', function() {
    			echo "Hello world!";
			});

			$app->run();
		}

	}