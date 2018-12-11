<?php 

include('config.php');
$Numero_Animal=$_REQUEST['q'];

$sql = "SELECT * from animal WHERE animal.Numero_Animal=$Numero_Animal";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	  // output data of each row
	  while($row = $result->fetch_assoc()) {
		  $Numero_Animal=$row['Numero_Animal'];
		  $Nome=$row['Nome'];													  
		  $Data_Nascimento=$row['Data_Nascimento'];
		  $Numero_Cliente=$row['Numero_Cliente'];
		  $Numero_Chip=$row['Numero_Chip'];
		  $Raca=$row['Raca'];
		  $Alergias=$row['Alergias'];		  
		   
		  $Sexo=$row['Codigo_Sexo'];
		  $Codigo_Porte=$row['Codigo_Porte'];
	  }
	}
		  
		  
		  
		
		
		
	
		echo "<div class='row'>
				<div class='col-sm-12 col-md-12'>
				  <div class='form-group mb-12'> 
					<label>Nome: </label>
					".$Nome."
				  </div>
				</div>
			</div>";
		  
		echo "<div class='row'>
				<div class='col-sm-12 col-md-12'>
				  <div class='form-group mb-12'> 
					<label>Data de Nascimento: </label>
					".$Data_Nascimento."
				  </div>
				</div>
			</div>";
					
		echo "<div class='row'>"
				."<div class='col-sm-12 col-md-12'>"
				 ."<div class='form-group mb-12'>" 
					."<label>Porte: </label>";
					  
						  
						  $query5 = "SELECT Descricao FROM porte WHERE Codigo_Porte=$Codigo_Porte";

						  $result5= $conn->query($query5);

							if ($result5->num_rows > 0) {
							  while ($row1 = $result5->fetch_assoc()) {
								  $Descricao=$row1['Descricao'];
							  }
							}


					  echo " ".$Descricao
			  		."</div>"
				."</div>"
			."</div>";
		  

		echo "<div class='row'>"
						."<div class='col-sm-12 col-md-12'>"
						  ."<div class='form-group mb-12'>" 
							."<label class='form-control-label'>Raça: </label>"
							 ." ".$Raca 
							."</div>"
						."</div>"
					."</div>";


		echo "<div class='row'>"
			   	 ."<div class='col-sm-12 col-md-12'>"
					."<div class='form-group mb-12'>" 
						."<label class='form-control-label'>Alergias:</label>";
							   
							  if($Alergias==''){
								  echo ' Nao tem alergias ou doenças crónicas.';
							  }else{												
							  echo " ".$Alergias ;
							  }
						    
						   echo "</div>"
						."</div>"
					."</div>";
					
						


?>
