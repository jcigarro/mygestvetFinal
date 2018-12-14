

<?php 

include('config.php');
$Tipo_Animal=$_REQUEST['q'];

$sql6 = 'select porte.Codigo_Porte, porte.Descricao from porte, relacao_porte_animal where relacao_porte_animal.Codigo_Porte=porte.Codigo_Porte and relacao_porte_animal.Codigo_Tipo_Animal='.$Tipo_Animal.'';
$animal = $conn->query($sql6);




$sql7 = 'SELECT  sexo.Codigo_Sexo, sexo.Descricao from sexo, relacao_sexo_animal where sexo.Codigo_Sexo=relacao_sexo_animal.Codigo_Sexo and relacao_sexo_animal.Codigo_Tipo_Animal='.$Tipo_Animal.'';
$sexo = $conn->query($sql7);


		  		  
		  
		  
		
		
		
	
	?>
		<form method='post' class="form-validate">	
		<div class="form-group ">
                        <label class=" form-control-label">Porte</label>
        
        <select id="Codigo_Porte" name='Codigo_Porte'  required data-msg="Selecione o Porte do Animal"  class=' form-control mb-3'>
			<option value=""> Selecione o Porte </option>
			
			<?php while($row3 = mysqli_fetch_array($animal)):;?> 
			
			<option id="Codigo_Porte" value="<?php echo $row3[0]; ?>" ><?php echo $row3[1]; ?></option>
			<?php endwhile;?>
	  </select>	
     </div>
 
	

              
	  <label class=" form-control-label">Sexo</label>                                                       
		<?php while ($row1 = mysqli_fetch_array($sexo)):;?>
		<input name="Codigo_Tipo_Sexo"    required data-msg="Selecione o Sexo do Animal"   type="radio" value="<?php  echo $row1[0]; ?>" id="Codigo_Tipo_Sexo">            
		<label for="optionsRadios1"      class="checkbox-inline" style="color: #aaa; font-size: 14px"><?php  echo $row1[1]; ?>
		<?php endwhile;?>
	  </label>



	</form>
	
	

			  

