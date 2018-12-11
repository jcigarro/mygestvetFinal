<?php


	include("config.php");
  
	

	
		$passwordAntiga=md5($_POST['passAntiga']);
		$passwordNova=md5($_POST['pwnova']);
		$confirmaPw=md5($_POST['pwconfirm']);

    $email = $_SESSION['email'];

    $sql = "SELECT * from medico where Email = '$email';";

      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {


          $nome = $row['Primeiro_Nome'];
          $password=$row['Password'];
         


        }
      }
      

			if($passwordAntiga==$password){
				if($confirmaPw==$passwordNova){
					$altera = mysqli_query($conn,"UPDATE medico SET Password='$passwordNova' WHERE Password='$password' AND Email='$email';");		
					

// temos de alterar esta parte para ser possivel todos alterarem a password...

					echo "<script>alert('Password alterada com sucesso!'); </script>";
          include 'logout.php';
					echo "<script>location.href='Login.php'</script>";
				}else {
					echo "<script>alert('As passwords não coincidem!');</script>";
					echo "<script>location.href='PerfilMédicoBásico.php'</script>";
				}

			}else{
					echo "<script>alert('Password antiga incorreta!'); </script>";
					echo "<script>location.href='PerfilMédicoBásico.php'</script>";
			}


		


?>

