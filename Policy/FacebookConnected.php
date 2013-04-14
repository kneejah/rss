<?php

	class Policy_FacebookConnected extends Abstract_Policy
	{

		public function check()
		{
			$request = $this->app->request();
			$signed_request = $request->params('signed_request');
			
			$facebook_data = Utils_Facebook::parseSignedRequest($signed_request);

			if ($facebook_data == null)
			{
				return false;
			}

			if (!isset($facebook_data['user_id']))
			{
				return false;
			}

			return true;
		}

		public function success()
		{
			return true;
		}

		public function failure()
		{
			$url = Utils_Facebook::getAuthorizeUrl();
			Utils_Facebook::redirectViaJS($url);
		}

	}