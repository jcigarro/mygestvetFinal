<?php  
	$connect = mysqli_connect("localhost", "root", "", "atual");
	$sql = "DELETE FROM Cliente WHERE Numero_Cliente = '".$_REQUEST["numeroCliente"]."'";  
	if(mysqli_query($connect, $sql))  
	{  
		echo 'Data Deleted';  
	}  
 ?>