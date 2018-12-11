<?php include_once("config.php");

	$Codigo_Especie = $_REQUEST['Codigo_Especie'];
	
	$result_sub_cat = "SELECT * FROM Raca WHERE Codigo_Especie=$Codigo_Especie;";
	$resultado_sub_cat = mysqli_query($conn, $result_sub_cat);
	
	while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat) ) {
		$sub_categorias_post[] = array(
			'Codigo_Raca'	=> $row_sub_cat['Codigo_Raca'],
			'Descricao' => utf8_encode($row_sub_cat['Descricao']),
		);
	}
	
	echo(json_encode($sub_categorias_post));
?>