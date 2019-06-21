<?php
	function getDB()
	{
		$dsn = "pgsql:host=ec2-23-21-186-85.compute-1.amazonaws.com;port=5432;dbname=
		defkkt80jebn5c";
		$username = "gjkanhkygrxcfo";
		$password = '0d0121b7476626adb8b7d789628807494f697e356df1d6bfac75d147ed1b2b59';


		try{
			$db = new PDO($dsn, $username, $password);
			return $db;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "Eroor connecting to database".$error_message;
		}
	}
?>