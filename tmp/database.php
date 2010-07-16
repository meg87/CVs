<?php
	class db
	{
		public $db_host, $db_name, $db_usr, $db_pwd;

		public function db($host, $name, $username, $password)
		{
			$db_host = $host;
			$db_name = $name;
			$db_usr = $username;
			$db_pwd = $password;
		}

		public function add_person($name, $email, $website)
		{
			$db_con = new mysqli($db_host, $db_usr, $db_pwd, $db_name);

			$statement = $db_con->prepare("insert into persons(person_name, person_email, person_website) values(?, ?, ?)");
			$statement->bind_param("s", $name);
			$statement->bind_param("s", $email);
			$statement->bind_param("s", $website);

			return $statement->execute();
		}
	}

?>
