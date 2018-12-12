
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
            <th>Nome</th>
            <th>Data</th>
            <th>Número de Chip</th>

        </tr>
    </thead>
    <tbody>


';



while($row = mysqli_fetch_array($result)) {

$data = $row['Data'];

$id_exame = $row['Codigo_Exame_Clinico'];

$nomeAnimal = $row['Nome'];

$numeroChip = $row['Numero_Chip'];



echo '
  <tr class="spacer"></tr>
  <tr class="tr-shadow" style="text-align:center;" onclick="guardaId('.$id_exame.',\''.$nomeAnimal.'\');">
    ';

      echo '
      <td>'.$nomeAnimal.'</td>
      <td>
          <span class="block-email">'.$data.'</span>
      </td>
      <td>'.$numeroChip.'</td>
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
