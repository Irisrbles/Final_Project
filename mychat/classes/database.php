<?php

Class Database
{

	private $con;

	function construct()
	{

		$this->con = $this->connect();
	}

	private function connect()
	{

		$string = "mysql:localhost;mychat_db";
		try 
		{
			
			$connection = new PDO($string,DBUSER,DBPASS);
			return $connection;

		} catch (PDOException $e) 
		{
			echo $e-getMessage();
			die;
		}

		return false;
	}
}
