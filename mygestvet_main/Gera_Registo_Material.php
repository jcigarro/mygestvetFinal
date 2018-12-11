<?php

include 'config.php';


$tipo_material = $_REQUEST['t'];
$descricao = $_REQUEST['d'];
$quantidade = $_REQUEST['q'];
$preco = $_REQUEST['p'];

//Cod serviço para registar tabela relacao material_servico   --------------
$cod_servico = $_REQUEST['s'];



$sql = "INSERT INTO material VALUES (NULL, '$tipo_material', '$descricao', $quantidade, $preco)";

if ($conn->query($sql) === TRUE) {
    
 echo "<div class='alert alert-success' role='alert'>
 		 Registo de material efetuado com sucesso!
		</div>";
    
} else {
	
  @session_start();
  $_SESSION['erromsg']='Escolha uma animal registado';
  header("Location: RegistoRegistoMaterial.php");


}

$last_id = $conn->insert_id;

$sql2 = "INSERT INTO relacao_servico_material values($cod_servico, $last_id)";

if ($conn->query($sql2) === TRUE) {
    echo "";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();





?>
