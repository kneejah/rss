<?php

	class Policy_LoggedIn extends Abstract_Policy
	{

		public function check()
		{
			if (isset($_SESSION['user_id']) && is_integer($_SESSION['user_id']) && $_SESSION['user_id'] > 0)
			{
				return true;
			}
			else 
			{
				return false;
			}
		}

		public function success()
		{
			echo "yes logged in!";
		}

		public function failure()
		{
			$this->app->redirect('/login');
		}

	}