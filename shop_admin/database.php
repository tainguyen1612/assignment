<?php
	function getDB()
	{
		if (empty(getenv("DATABASE_URL"))){
			echo '<p>The DB does not exist</p>';
			$pdo = new PDO('pgsql:host=localhost;port=5432;dbname=mydb', 'postgres', '123456');
		}  else {
			 echo '<p>The DB exists</p>';
			 echo getenv("dbname");
		   $db = parse_url(getenv("DATABASE_URL"));
		   $pdo = new PDO("pgsql:" . sprintf(
				"ec2-54-221-243-211.compute-1.amazonaws.com;port=5432;user=docokbxiffiwzw;password=5a923307b82e04e852bb40397b2335a069f3ec647faaebd08ce96877b001baf8",
				$db["host"],
				$db["port"],
				$db["user"],
				$db["pass"],
				ltrim($db["path"], "/")
		   ));
		}
	}
?>