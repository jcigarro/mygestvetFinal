<?php
$conn = mysqli_connect("localhost","root","","atual");

if(!mysqli_connect("localhost","root",""))
{
	die('oops connection problem ! --> '.mysqli_error());
}
if(!mysqli_select_db($conn,"atual"))
{
	die('oops database selection problem ! --> '.mysqli_error());
}
date_default_timezone_set("Europe/Lisbon");
    
/* change character set to utf8 */
if (!$conn->set_charset("utf8")) {
  //printf("Error loading character set utf8: %s\n", $conn->error);
} else {
  //printf("Current character set: %s\n", $conn->character_set_name());
}

?>