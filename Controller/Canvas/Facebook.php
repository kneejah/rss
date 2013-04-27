<?php

	class Controller_Canvas_Facebook extends Abstract_Controller
	{

		public function POST()
		{
			$policy = new Policy_FacebookConnected($this->app);
			$policy->ensure();

			$facebook_data = $policy->getData();
			$facebook_id = $facebook_data['user_id'];
		}

	}