<?php


	include("config.php");

	if ( isset( $_POST['Submit1'] ) ) {
  	$email = $_SESSION['email'];

	$fc=$_REQUEST['fc'];
	$fr = $_REQUEST['fr'];
	$TRC = $_REQUEST['TRC'];
	$trpc=$_REQUEST['trpc'];
	$mucosas=$_REQUEST['mucosas'];
	$tempCorporal=$_REQUEST['tempCorporal'];	
	$pulso=$_REQUEST['pulso'];
	$pulsoDigital=$_REQUEST['pulsoDigital'];
	$motilidade=$_REQUEST['motilidade'];
	$numero_animal=$_REQUEST['q'];
	
	
	
	echo $numero_animal;
	
	$insert = mysqli_query($conn,"INSERT INTO exame_clinico VALUES(NULL,$fc,$fr,$trpc,'$mucosas',$tempCorporal,$pulso,$pulsoDigital,$motilidade,$numero_animal,15);");

		
	 }


?>

