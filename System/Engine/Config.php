<?php

	class Engine_Config
	{

		public static function get($file)
		{
			$class_name = "Config_" . $file;
			$class = new $class_name();

			return $class;
		}

	}