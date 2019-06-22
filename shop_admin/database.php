<?php
	function getDB()
	{
		$dbcon = pg_connect("host=ec2-54-221-243-211.compute-1.amazonaws.com port=5432 dbname=d6jmv4urb51qs8 user=docokbxiffiwzw password=5a923307b82e04e852bb40397b2335a069f3ec647faaebd08ce96877b001baf8");
	}
?>