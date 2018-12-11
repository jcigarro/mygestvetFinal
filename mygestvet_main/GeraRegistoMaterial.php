<?php


	include("config.php");

	if ( isset( $_POST['Submit1'] ) ) {
  	$email = $_SESSION['email'];

	$tipo_material=$_REQUEST['tipo_material'];
	$preco = $_REQUEST['preco'];
	$quantidade=$_REQUEST['quantidade'];
	$descricao=$_REQUEST['descricao'];

	

	
	
	$insert = mysqli_query($conn,"INSERT INTO material VALUES(NULL,$fc,$fr,$trpc,'$mucosas',$tempCorporal,$pulso,$pulsoDigital,$motilidade,$numero_animal);");

		
	 }


?>

