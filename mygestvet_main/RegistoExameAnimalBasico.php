<?php

include 'config.php';
include_once "config_exemploassinatura.php";

$Numero_Animal = $_POST['numero_animal'];
$FreqCard = $_POST['freqCard'];
$fr = $_REQUEST['Fr'];
$TRC = $_REQUEST['TRC'];
$Trpcl = $_POST['trpc'];
$Mucosas = $_POST['mucosas'];
$TempCorp = $_POST['tempCorp'];
$Pulso = $_POST['pulso'];
$Observa = $_POST['observa'];
$today = date("Y-m-d H:i:s");

$sql = "INSERT INTO exame_clinico VALUES (NULL, $Numero_Animal, $FreqCard,$fr, $TRC, $Trpcl, '$Mucosas', $TempCorp, $Pulso, '$Observa', '$today' )";

if ($conn->query($sql) === TRUE) {
     @session_start();
  $_SESSION['erromsg']="<div class='alert alert-success' role='alert'>
 		 Exame Clinico registado com sucesso!
		</div>";
 
  header("Location: RegistoExameBasico.php");
} else {
    @session_start();
  $_SESSION['erromsg']='Escolha uma animal registado';
  $_SESSION['erromsg']=$sql;
  header("Location: RegistoExameBasico.php");
}
$conn->close();





?>
