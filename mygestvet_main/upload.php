<?php
include_once "config.php";

	$msg = "";
	if(!empty($_FILES)){
		$today = date("Y-m-d H:i:s");
		$link = "";
		$n = 1;
		
		for($i = 0;$i<$n;$i++){
		  $nome = "file".$i;
		  $temp = $_FILES[$nome]['tmp_name'];

		  $path_parts = pathinfo($_FILES[$nome]["name"]);
		  $extension = $path_parts['extension'];
		  $link = "uploads/".$_FILES[$nome]["name"];

		  if(move_uploaded_file($_FILES[$nome]['tmp_name'], $link)){
		    $sql = "INSERT INTO utilizador VALUES (NULL,'','".$link."')";
		    if (mysqli_query($conn,$sql) === TRUE) {
		      $msg = "Utilizador registado com Sucesso.";
		      $val = 1;
		    } else {
		      $msg .= "Error: " . $sql . "<br>" . mysqli_error($conn);
		      $val = 2;
		    }      
		  } else {
		    $msg .= "".$link." NOT uploaded ...<br>";
		    $val = 3;
		  } 
		} 
	}
?>