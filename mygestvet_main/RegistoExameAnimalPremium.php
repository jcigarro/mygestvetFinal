<?php

include 'config.php';


$Numero_Animal = $_POST['numero_animal'];
$FreqCard = $_POST['freqCard'];
$fr = $_REQUEST['Fr'];
$TRC = $_REQUEST['TRC'];
$Trpcl = $_POST['trpc'];
$Mucosas = $_POST['mucosas'];
$TempCorp = $_POST['tempCorp'];
$Pulso = $_POST['pulso'];
$Observa = $_POST['observa'];


$sql = "INSERT INTO exame_clinico VALUES (NULL, $Numero_Animal, $FreqCard,$fr, $TRC, $Trpcl, '$Mucosas', $TempCorp, $Pulso, '$Observa', Curdate() )";

if ($conn->query($sql) === TRUE) {
     @session_start();
  $_SESSION['erromsg']="<div class='alert alert-success' role='alert'>
 		 Registo do exame animal efetuado com sucesso!
		</div>";
 
  header("Location: RegistoExamePremium.php");
} else {
    @session_start();
  $_SESSION['erromsg']='Escolha uma animal registado';
  $_SESSION['erromsg']=$sql;
  header("Location: RegistoExamePremium.php");
}
$conn->close();





?>
