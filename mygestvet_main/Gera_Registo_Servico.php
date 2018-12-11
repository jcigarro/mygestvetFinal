<?php

include 'config.php';



$fname = $_POST['fname'];
$lname = $_POST['lname'];
$tratamento = $_POST['tratamento'];
$diagnostico = $_POST['diagnostico'];
$numero_exame = $_POST['numeroExame2'];

$outrasInformacoes=$_POST['outrasInformacoes'];



$sql = "INSERT INTO servico VALUES (NULL, '$fname', '$lname', $numero_exame, '$diagnostico', '$tratamento', curdate(),'$outrasInformacoes')";
echo $sql;
if ($conn->query($sql) === TRUE) {
@session_start();
  
  $_SESSION['erromsg']="<div class='alert alert-success' role='alert'>
 		 Registo do serviço efetuado com sucesso!
		</div>";
   header("Location: RegistoServicosBasico.php");
} else {
@session_start();
  
  $_SESSION['erromsg']='Escolha um animal registado.';

  header("Location: RegistoServicosBasico.php");


}

$conn->close();





?>
