<?php
if(!(isset($_SESSION['email']) && $_SESSION['email'] != "")){
	header('Location: Login.php');
}

session_start();
if(session_destroy())
{
header("Location: Login.php");
}
?>