<?php


	include("config.php");
		$Numero_Cliente=$_REQUEST["Numero_Cliente"];
    $nome_update=$_REQUEST["Nome"];
    $morada_update=$_REQUEST["Morada"];
    $telefone_update=$_REQUEST["Telefone"];
   
    $email_update=$_REQUEST["Email"];
    $localidade_update=$_REQUEST["Codigo_Localidade1"];
    $codigoPostal_update=$_REQUEST["Codigo_Postal"];
      

    $email = $_SESSION['email'];


    $sql = "SELECT * FROM cliente WHERE cliente.Numero_Cliente=$Numero_Cliente";



  

    $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          $nome = $row['Nome'];          
          
          $email= $row['Email'];
          $nif=$row['Nif'];
          $morada=$row['Morada'];
          $telefone=$row['Telefone'];
          $localidade=$row['Codigo_Localidade'];
          $codigoPostal=$row['Codigo_Postal'];

         if(!empty($nome_update)){

          $altera = mysqli_query($conn,"UPDATE cliente SET Nome='$nome_update' WHERE Nif='$nif';");
        
         }

         if(!empty($email_update)){

          $altera = mysqli_query($conn,"UPDATE cliente SET Email='$email_update' WHERE  Nif='$nif';");
          
         }
        
         if(!empty($telefone_update)){
          $altera = mysqli_query($conn,"UPDATE cliente SET Telefone='$telefone_update' WHERE Nif='$nif';");
          

         }if(!empty($morada_update)){
          $altera = mysqli_query($conn,"UPDATE cliente SET Morada='$morada_update' WHERE Nif='$nif';");
          

         }if(!empty($localidade_update)){
          $altera = mysqli_query($conn,"UPDATE cliente SET Codigo_Localidade=$localidade_update WHERE Nif='$nif';");
          

         }if(!empty($codigoPostal_update)){
          $altera = mysqli_query($conn,"UPDATE cliente SET codigo_postal='$codigoPostal_update' WHERE Nif='$nif';");
           
         }
         

        
    

          
          echo "<script>location.href='ListaClientesBasico.php'</script>";

         
         }

}


		


?>

