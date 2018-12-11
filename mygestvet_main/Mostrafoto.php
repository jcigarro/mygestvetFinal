
<?php


	$codigo = $_GET["codigo"];
	include("config.php");
	$sql = "select linkimagem from utilizador where Numero_Medico=$Numero_Medico";
      $dados = mysqli_query($sql);
      $linha = mysqli_fetch_array($dados);
      $foto = $linha["linkimagem"];
      
	header("content-type: image/jpg");
	echo $foto;
	
	?>