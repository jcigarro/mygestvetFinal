<?php


	include("config.php");



  	$email = $_SESSION['email'];

	$nome=$_REQUEST["Nome"];
	$dataNascimento = $_REQUEST['Data_Nascimento'];
	
	$nrChip=$_REQUEST['Numero_Chip'];	

	$raca=$_REQUEST['Raca'];
	$sexo=$_REQUEST['Codigo_Tipo_Sexo'];
	$alergias=$_REQUEST['Alergias'];
	$numeroCliente=$_REQUEST['Numero_Cliente'];
	$outrasInformacoes=$_REQUEST['outrasInformacoes'];
	$Codigo_Porte=$_REQUEST['Codigo_Porte'];
	$Codigo_Tipo_Animal=1;
	//$_REQUEST['Tipo_Animal_Pequeno_Porte'];
	
	
	

	$login = mysqli_query($conn,"SELECT nome FROM animal WHERE Numero_Chip = $nrChip;");
	

	if (mysqli_num_rows($login) >0 ) {

		echo "<script>alert('Esse Animal ja se encontra registado!'); history.back();</script>";
	} else {
		$insert = mysqli_query($conn,"INSERT INTO animal VALUES(NULL,'$nome','$dataNascimento',$numeroCliente,$nrChip,'$raca','$alergias',$Codigo_Tipo_Animal,$sexo,'resenho',$Codigo_Porte,'$outrasInformacoes');");
		
		echo "<script>alert('Registo efetuado com sucesso!');history.back(); </script>";
		
       
		
				 
 		
	}

	
		




?>

