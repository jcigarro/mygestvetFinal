<?php


	include("config.php");
	
	if($conn -> connect_error){
		die("Erro na ligação: ".$conn -> connect_error);
		
	}
	
	$email = $_SESSION['email'];
	$nome=$_REQUEST["nome"];
	$email_cliente = $_REQUEST["email_cliente"];
	$telefone=$_REQUEST["telefone"];
	$sexo=$_REQUEST["sexo"];
	$morada=$_REQUEST["morada"];
	$codigo_localidade=$_REQUEST["codigo_localidade"];

	$codigo_postal=$_REQUEST["codigo_postal"];
	$nif=$_REQUEST["nif"];
	
	
	
	


	$login = mysqli_query($conn,"SELECT nome FROM cliente WHERE nif = '$nif';");
	$medico = mysqli_query($conn,"SELECT Numero_Medico FROM medico WHERE email = '$email';");
	if ($medico->num_rows > 0) {
        // output data of each row
        while($row = $medico->fetch_assoc()) {


          $numero = $row['Numero_Medico'];


        }
      }
	

	if (mysqli_num_rows($login) >0 ) {

		echo "<script>alert('Esse cliente ja se encontra registado!'); history.back();</script>";
	} else {
		$login1 = mysqli_query($conn,"INSERT INTO cliente VALUES(NULL,'$nome','$sexo',$telefone,'$email_cliente',$nif,'$morada','$codigo_postal','Portugal',$codigo_localidade,$numero);");
		echo "<script>alert('Cliente registado com sucesso!');history.back(); </script>";
	
				 
 		
	}




?>

