

<?php 

include('config.php');
$Numero_Cliente=$_REQUEST['q'];

$sql6 = 'SELECT * from animal WHERE  animal.Numero_Cliente='.$Numero_Cliente.'';
$animal = $conn->query($sql6);

		  
		  
		  
		
		
		
	
	?>
			
	<div class="form-group">
      <div class="form-group col-md-12">
        <label>Selecione o Animal:</label>
        <select id="Animalnumber" name='Animalnumber'  class='form-control mb-3'>
			<option value=""> Selecione um animal</option>
			
			<?php while($row3 = mysqli_fetch_array($animal)):;?> 
			
			<option id="Animalnumber" value="<?php echo $row3[0]; ?>" ><?php echo $row3[1]; ?></option>
			<?php endwhile;?>
	  </select>	
      </div>
    </div>
			  

			  

