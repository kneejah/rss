<?php

	class Controller_Login extends Abstract_Controller
	{

		public function GET()
		{
			// Do nothing here, just show a form
			$policy = new Policy_LoggedOut($this->app);
			$policy->ensure();
		}

	}