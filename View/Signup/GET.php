<?php

	class View_Signup_GET extends Abstract_View
	{

		public function render()
		{
			// nothing much, just show a template here
			$title = "rss / signup";

			return array('title' => $title);
		}

	}