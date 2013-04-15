<?php

	class View_Canvas_Facebook_POST extends Abstract_View
	{

		public function render()
		{
			$facebook_configs = Engine_Config::get('facebook');

			return array(
				'app_id' => $facebook_configs->app_id,
				'now'    => microtime(true)
			);
		}

	}