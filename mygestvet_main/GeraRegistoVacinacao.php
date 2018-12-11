<?php


	include("config.php");

	
  	$email = $_SESSION['email'];

	
	$nome=$_REQUEST['nome'];

	$lote=$_REQUEST['lote'];
	$validade=$_REQUEST['validade'];
	$numeroAnimal=$_REQUEST['numero_animal'];
	$outrasInformacoes=$_REQUEST['outrasInformacoes'];
	
	
		$sql = "INSERT INTO vacinacao VALUES(NULL,'$nome',Curdate(),$lote,'$validade',$numeroAnimal,'$outrasInformacoes');";

			if (mysqli_query($conn, $sql)) {
				@session_start();
  
 				 $_SESSION['erromsg']="<div class='alert alert-success' role='alert'>
								 		 Vacina registada com sucesso!
										</div>";			
				
			header("location: RegistoVacinacoesBasico.php");
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
			}
			
	

		

?>

