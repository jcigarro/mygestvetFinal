<?php
include_once "config_exemploassinatura.php";
$op = $_GET['op'];
$email = 'teresacharneca@gmail.com';

$sql4 = "SELECT * from medico  where Email='teresacharneca@gmail.com' ";

  $result4 = $conn->query($sql4);
  if ($result4->num_rows > 0) {
      // output data of each row
      while($row = $result4->fetch_assoc()) {
      	$Numero_Medico=$row['Numero_Medico'];
      	

      }
  }

	$msg = "";
	$nome = $_POST['nome'];
	$assinatura = $_POST['sig'];
	$sql = "";
	$val = 0;
	$today = date("Y-m-d H:i:s");
	$sql = "INSERT INTO assinatura VALUES (NULL,'$nome','$assinatura','$today',$Numero_Medico)";
	
	if (mysqli_query($conn,$sql) === TRUE) {
		$msg = "Assinatura gerada com sucesso.";
		$val = 1;
	} else {
		$msg = "Error record util: " . $sql . "<br>" . $conn->error;
		$val = 2;
	}
	$ir = array("msg"=>$msg,"val"=>$val);
	echo json_encode($ir);
?>