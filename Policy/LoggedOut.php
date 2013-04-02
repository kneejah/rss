<?php

	class Policy_LoggedOut extends Abstract_Policy
	{

		public function check()
		{
			if (!isset($_SESSION['user_id']) || !is_integer($_SESSION['user_id']) || $_SESSION['user_id'] <= 0)
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
			return true;
		}

		public function failure()
		{
			$this->app->redirect('/');
		}

	}