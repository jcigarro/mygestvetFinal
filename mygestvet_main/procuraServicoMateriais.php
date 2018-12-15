<?php

$q = $_GET['q'];

include 'config.php';


mysqli_select_db($conn,"ajax_demo");
$sql="SELECT * FROM `exame_clinico`, `animal`, `servico` WHERE exame_clinico.Numero_Animal=animal.Numero_Animal AND servico.Codigo_Exame_Clinico=exame_clinico.Codigo_Exame_Clinico AND animal.Nome LIKE '".$q."%' ORDER BY exame_clinico.Data desc limit 4";
$result = mysqli_query($conn,$sql);

echo '


<table class="table table-data2">
    <thead>
        <tr>
		<th>Nome</th>
            <th>Numero de Identificação</th>
			<th> Cliente </th>
			<th>Numero do Serviço</th>
            <th>Tratamento</th>
			<th>Data</th>

        </tr>
    </thead>
    <tbody>


';



while($row = mysqli_fetch_array($result)) {

$data = $row['Data'];

$id_exame = $row['Codigo_Servico'];

$nomeAnimal = $row['Nome'];

$tratamentoServico = $row['Tratamento']; 
$numero_cliente = $row['Numero_Cliente'];
$numeroChip = $row['Numero_Chip']; 

$sql2="SELECT * FROM cliente WHERE cliente.Numero_Cliente='".$numero_cliente."'";
$result2 = mysqli_query($conn,$sql2);

while($row2 = mysqli_fetch_array($result2)) {

$Nome_Cliente = $row2['Nome'];

}

echo '
  <tr class="spacer"></tr>
  <tr class="tr-shadow" style="text-align:center;" onclick="guardaId('.$id_exame.');">
    ';

      echo '
	   <td>'.$nomeAnimal.'</td>
	   <td>'.$numeroChip.'</td>
      <td>'.$Nome_Cliente.'</td>
      <td>'.$id_exame.'</td>
      <td>'.$tratamentoServico.'</td>
      <td>'.$data.'</td>

      

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
