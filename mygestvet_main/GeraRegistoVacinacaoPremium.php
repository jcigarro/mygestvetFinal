<?php


	include("config.php");

	include_once "config_exemploassinatura.php";
  	$email = $_SESSION['email'];

	
	$nome=$_REQUEST['nome'];

	$lote=$_REQUEST['lote'];
	$validade=$_REQUEST['validade'];
	$numeroAnimal=$_REQUEST['numero_animal'];
	$outrasInformacoes=$_REQUEST['outrasInformacoes'];
	$today = date("Y-m-d H:i:s");
	
		$sql = "INSERT INTO vacinacao VALUES(NULL,'$nome','$today',$lote,'$validade',$numeroAnimal,'$outrasInformacoes');";

			if (mysqli_query($conn, $sql)) {
				@session_start();
  
 				 $_SESSION['erromsg']="<div class='alert alert-success' role='alert'>
								 		 Vacinação registada com sucesso!
										</div>";			
				
			header("location: RegistoVacinacoesPremium.php");
			} else {
				@session_start();
  
 				 $_SESSION['erromsg']="<div class='alert alert-danger' role='alert'>
								 		 Para registar uma Vacinação necessita selecionar um animal! 
										</div>";			
				
			header("location: RegistoVacinacoesPremium.php");
			}
			
	

		

?>

