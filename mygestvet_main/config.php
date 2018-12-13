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
	

	if (!$conn->set_charset("utf8")) {
  //printf("Error loading character set utf8: %s\n", $conn->error);
} else {
  //printf("Current character set: %s\n", $conn->character_set_name());
}
			
		
?>