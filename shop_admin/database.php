<?php
	function getDB()
	{
		$dsn = "pgsql:host=localhost;port=5432;dbname=asm";
		$username = 'postgres';
		$password = '123456';
		try{
			$db = new PDO($dsn, $username, $password);
			return $db;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "Eroor connecting to database".$error_message;
		}
	}
?>