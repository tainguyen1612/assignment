<?php
	function getDB()
	{
		$dsn = "pgsql:host=localhost;dbname=asm";
		$username = "docokbxiffiwzw";
		$password = '5a923307b82e04e852bb40397b2335a069f3ec647faaebd08ce96877b001baf8';
		$options = array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,
			PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

		try{
			$db = new PDO($dsn, $username, $password, $options);
			return $db;
		} catch (PDOException $e) {
			$error_message = $e->getMessage();
			echo "Eroor connecting to database".$error_message;
		}
	}
?>