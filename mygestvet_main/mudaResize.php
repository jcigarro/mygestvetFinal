

<?php 

include('config.php');

$fim=$_REQUEST['fim'];
$id=$_REQUEST['id'];

$sql6 = 'UPDATE agenda SET end="'.$fim.'" WHERE id='.$id.'';

if ($conn->query($sql6) === TRUE) {
    $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Hora final alterada com sucesso!<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";

} else {
    echo "Error updating record: " . $conn->error;
}

		  
		  
		
		
		
	
	?>
