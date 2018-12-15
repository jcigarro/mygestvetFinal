<?php

include 'config.php';
include_once "config_exemploassinatura.php";


$fname = $_POST['fname'];
$lname = $_POST['lname'];
$tratamento = $_POST['tratamento'];
$diagnostico = $_POST['diagnostico'];
$numero_exame = $_POST['numeroExame2'];
$Anamnese = $_POST['Anamnese'];
$outrasInformacoes=$_POST['outrasInformacoes'];
$today = date("Y-m-d H:i:s");



$sql = "INSERT INTO servico VALUES (NULL, '$fname', '$Anamnese', $numero_exame, '$diagnostico', '$tratamento', '$today','$outrasInformacoes')";
echo $sql;
if ($conn->query($sql) === TRUE) {
@session_start();
  
  $_SESSION['erromsg']="<div class='alert alert-success' role='alert'>
 		 Registo do serviço efetuado com sucesso!
		</div>";
   header("Location: RegistoServicosBasico.php");
} else {
@session_start();
  
  $_SESSION['erromsg']="<div class='alert alert-danger' role='alert'> Para Registar um serviço necessita selecionar um Animal!</div>";

  header("Location: RegistoServicosBasico.php");


}

$conn->close();





?>
