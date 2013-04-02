<?php

	class Controller_Signup extends Abstract_Controller
	{

		public function GET()
		{
			// Do nothing here, just show a form
			$policy = new Policy_LoggedOut($this->app);
			$policy->ensure();
		}

	}