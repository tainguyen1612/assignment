<?php
	function getDB()
	{
		$DBH = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
		$db = new PDO("pgsql:host='ec2-54-221-243-211.compute-1.amazonaws.com';dbname='asm'", "docokbxiffiwzw", "5a923307b82e04e852bb40397b2335a069f3ec647faaebd08ce96877b001baf8");
		try {
			$db = new PDO("pgsql:host='ec2-54-221-243-211.compute-1.amazonaws.com';dbname='asm'", "docokbxiffiwzw", "5a923307b82e04e852bb40397b2335a069f3ec647faaebd08ce96877b001baf8");
		} catch (PDOException $e) {
			echo $e->getMessage();
		}
	}
?>