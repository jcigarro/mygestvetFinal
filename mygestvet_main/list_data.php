<?php

include_once "config.php";

  $email = $_SESSION['email'];

  $sql = "SELECT * from medico where Email = '$email';";
  
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {


          $nome = $row['Primeiro_Nome'];
          $apelidos=$row['Apelidos'];
          $Numero_Medico=$row['Numero_Medico'];

          //o nome do campo é Primeiro_Nome certo?sim

        }
      }
	  
$result_events = "SELECT id, title, color, start, end FROM agenda  WHERE Numero_Medico=$Numero_Medico;";
$resultado_events = mysqli_query($conn, $result_events);

$eventos = array();

while ($row_events = mysqli_fetch_assoc($resultado_events)) {
    $id = $row_events['id'];
    $title = $row_events['title'];
    $color = $row_events['color'];
    $start = $row_events['start'];
    $end = $row_events['end'];

    $eventos[] = array('id' => $id, 'title' => $title, 'color' => $color, 'start' => $start, 'end' => $end);
}

echo json_encode($eventos);
//print_r($datas);

