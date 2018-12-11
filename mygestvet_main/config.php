<?php

header('Content-Type: text/html; charset=utf-8');
	session_start();
				
			$hostname='localhost';
			$user = 'root';
			$password = '';
			$mysql_database = 'atual';
			$conn = mysqli_connect($hostname, $user, $password,$mysql_database);

			if (!$conn) {
			    die("Connection failed: " . mysqli_connect_error());
			}
	
			
		
?>