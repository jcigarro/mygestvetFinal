
<?php

$q = $_GET['q'];

include 'config.php';


mysqli_select_db($conn,"ajax_demo");
$sql="SELECT * FROM `exame_clinico`, `animal` WHERE exame_clinico.Numero_Animal=animal.Numero_Animal AND animal.Nome LIKE '".$q."%' ORDER BY exame_clinico.Data desc limit 4";
$result = mysqli_query($conn,$sql);

echo '


<table class="table table-data2">
    <thead>
        <tr>
            <th>Nome </th>
			<th>Nº Identificação</th>
			<th>Cliente </th>
			<th>Codigo de Exame</th>
			<th>Data Do Exame</th>
        </tr>
    </thead>
    <tbody>


';



while($row = mysqli_fetch_array($result)) {

$data = $row['Data'];

$id_exame = $row['Codigo_Exame_Clinico'];

$nomeAnimal = $row['Nome'];

$numeroChip = $row['Numero_Chip'];

$numero_cliente = $row['Numero_Cliente'];
$numero_exame = $row['Codigo_Exame_Clinico'];

$sql2="SELECT * FROM cliente WHERE cliente.Numero_Cliente='".$numero_cliente."'";
$result2 = mysqli_query($conn,$sql2);

while($row2 = mysqli_fetch_array($result2)) {

$Nome_Cliente = $row2['Nome'];

}

echo '
  <tr class="spacer"></tr>
  <tr class="tr-shadow" style="text-align:center;" onclick="guardaId('.$id_exame.',\''.$nomeAnimal.'\');">
    ';

      echo '
      <td>'.$nomeAnimal.'</td>
	  <td>'.$numeroChip.'</td>
	  <td>'.$Nome_Cliente.'</td>
	  <td>'.$numero_exame.'</td>
      <td>
          <span class="block-email">'.$data.'</span>
      </td>
      
	   
  </tr>
  <tr class="spacer"></tr>
';

}

echo '

</div>






</tbody>
</table>

';


if ($result->num_rows == 0) {

  echo '<br>
    <tr>Sem resultados!</tr>


  ';

}

mysqli_close($conn);
?>

