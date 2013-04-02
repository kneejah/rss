<?php

	class Model_User extends redis\orm\Object
	{

		protected $user_id;
		protected $user_name;
		protected $password_hash;

	}