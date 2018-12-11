<?php
	include_once("config.php");
	
	$Descricao = $_POST['Descricao'];
	$Codigo_Especie = $_POST['Codigo_Especie'];
	$Codigo_Raca = $_POST['Codigo_Raca'];
	
	echo "Titulo: $Descricao <br>Id Categoria: $Codigo_Especie <br> Id Subcategoria: $Codigo_Raca <br>";
	
	$result_post = "INSERT INTO post ( Codigo_Raca,Descricao) VALUES ($Codigo_Raca,'$Descricao')";
	$resultado_post = mysqli_query($conn, $result_post);
	
	if(mysqli_affected_rows($conn) > 0){ 
		echo "Artigo salvo com sucesso";	
	}else{
		echo "Artigo não foi salvo com sucesso";	
	}