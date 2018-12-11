<?php


	include("config.php");
		

	$email = $_SESSION['email'];

	
	

	$login = mysqli_query($conn,"DELETE FROM medico WHERE Email = '$email';");

	if (mysqli_num_rows($login) >0 ) {

		echo "<script>alert('Conta eliminada com sucesso!');</script>";
		echo "<script>location.href='Login.php'</script>";
	} 
	

	
		



?>

