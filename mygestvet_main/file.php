<?php
	$numeroAnimal = $_REQUEST["x"];
	
	$server = "localhost";
	$user = "root";
	$pass = "";
	$db = "atual";
	$msg = "";
	$conn = new mysqli($server, $user, $pass, $db);
	
	if($conn -> connect_error){
		die("Erro na ligação: ".$conn -> connect_error);
	}
	
	//echo "<br>Ligação realizada com sucesso";
	$sql = "SELECT Nome FROM Animal WHERE Numero_Animal ='$numeroAnimal';";
	$result = $conn -> query($sql);
	
	$dadosAnimal="SELECT * FROM Animal WHERE Numero_Animal ='$numeroAnimal';";


  $animal1 = $conn->query($dadosAnimal);
   if ($animal1->num_rows > 0) {

        // output data of each row
        while($row = $animal1->fetch_assoc()) {


          $nomeAnimal = $row['Nome'];
          $dataNascimento=$row['Data_Nascimento'];          
          $nrcliente= $row['Numero_Cliente'];
          $nrchip=$row['Numero_Chip'];
          $raca=$row['Raca'];
          $sexo=$row['Sexo'];
          $alergias=$row['Alergias'];
          $especie1=$row['Codigo_Especie'];


        }
      }
	
	
	
?>
