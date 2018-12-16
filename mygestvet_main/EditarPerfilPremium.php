<?php


	include("config.php");
  
	

	
		
    $nome_update=$_REQUEST['nome'];
    $apelidos_update=$_REQUEST['apelidos'];
    $telefone_update=$_REQUEST['telefone'];
    $morada_update=$_REQUEST['morada'];
    $localidade_update=$_REQUEST['localidade'];
    $codigoPostal_update=$_REQUEST['codpostal'];
    $nif_update=$_REQUEST['nif'];   

    $email = $_SESSION['email'];

    $sql = "SELECT * from medico where Email = '$email';";

  

    $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {


          $nome = $row['Primeiro_Nome'];
          $password=$row['Password'];
          $pais=$row['Pais'];       
          $apelidos = $row['Apelidos'];
          $email= $row['Email'];
          $nif=$row['Nif_Faturacao'];
          $morada=$row['Morada'];
          $telefone=$row['Telefone'];
          $localidade=$row['Codigo_Localidade'];
          $codigoPostal=$row['Codigo_Postal'];

          $altera = mysqli_query($conn,"UPDATE medico SET Primeiro_Nome='$nome_update' WHERE Primeiro_Nome='$nome' AND Email='$email';");       
          
          $altera1 = mysqli_query($conn,"UPDATE medico SET Apelidos='$apelidos_update' WHERE Apelidos='$apelidos' AND Email='$email';");        
         
          $altera2 = mysqli_query($conn,"UPDATE medico SET Telefone=$telefone_update WHERE Telefone=$telefone AND Email='$email';");
     
          $altera3 = mysqli_query($conn,"UPDATE medico SET Morada='$morada_update' WHERE Morada='$morada' AND Email='$email';");

          $altera4 = mysqli_query($conn,"UPDATE medico SET Codigo_Localidade=$localidade_update WHERE Codigo_Localidade=$localidade AND Email='$email';");
        
          $altera5 = mysqli_query($conn,"UPDATE medico SET Codigo_Postal='$codigoPostal_update' WHERE Codigo_Postal='$codigoPostal' AND Email='$email';");
         
          $altera6 = mysqli_query($conn,"UPDATE medico SET Nif_Faturacao=$nif_update WHERE Nif_Faturacao=$nif AND Email='$email';");
         

          echo "<script>alert('Alterado com sucesso!'); </script>";
          echo "<script>location.href='PerfilMedicoPremium.php'</script>";

         
         }





      }
      
       $sql1="SELECT Descricao FROM Medico, Especialidade WHERE Medico.Codigo_Especialidade=Especialidade.Codigo_Especialidade AND Medico.Email='$email';";

      $result1 = $conn->query($sql1);

      if ($result1->num_rows > 0) {
        // output data of each row
        while($row = $result1->fetch_assoc()) {


          $esp = $row['Descricao'];

          //o nome do campo é Primeiro_Nome certo?sim

        }
      }


		


?>

