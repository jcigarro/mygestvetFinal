<?php



//Incluir conexao com BD
include_once("config.php");

$m=$_SESSION['m'];

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$sql = "SELECT * from agenda where id=$id;";

$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
$title_update = $row['title'];
$start_update=$row['start'];
$end_update=$row['end'];
$m=$row['Numero_Medico'];
$a=$row['Numero_Animal'];
$c=$row['Numero_Cliente'];


}
}



  $sql5 = "SELECT * from medico where Numero_Medico=$m;";
  
      $result5 = $conn->query($sql5);

      if ($result5->num_rows > 0) {
        // output data of each row
        while($row5 = $result5->fetch_assoc()) {


          $nome_medico = $row5['Primeiro_Nome'];
          $Email_Medico=$row5['Email'];

         

          //o nome do campo é Primeiro_Nome certo?sim

        }
      }


$sql1 = "SELECT * from cliente where Numero_Cliente =$c;";

$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
// output data of each row
while($row = $result1->fetch_assoc()) {
$Email = $row['Email'];
$Nome=$row['Nome'];

}
}

$sql12 = "SELECT * from animal where Numero_Animal = $a;";

$result12= $conn->query($sql12);
if ($result12->num_rows > 0) {
// output data of each row
while($row1 = $result12->fetch_assoc()) {
$Nome_Animal = $row1['Nome'];

}
}


if (!empty($id)) {
    $result_events = "DELETE FROM agenda WHERE id = $id";
    $resultado_events = mysqli_query($conn, $result_events);

    //Verificar se alterou no banco de dados através "mysqli_affected_rows"
    if (mysqli_affected_rows($conn)) {
        $_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Evento apagado com Sucesso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        	
	require_once("phpmailer/class.phpmailer.php");

define('GUSER', 'mygestvet@gmail.com');	// <-- Insira aqui o seu GMail
define('GPWD', 'toufartadisto1234');		// <-- Insira aqui a senha do seu GMail

	function smtpmailer($para, $de, $de_nome, $assunto, $corpo) { 
	global $error;
	$mail = new PHPMailer();
	$mail->IsSMTP();		// Ativar SMTP
	$mail->SMTPDebug = 0;		// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
	$mail->SMTPAuth = true;		// Autenticação ativada
	$mail->SMTPSecure = 'ssl';	// SSL REQUERIDO pelo GMail
	$mail->Host = 'Smtp.gmail.com';	// SMTP utilizado
	$mail->Port = 465;  		
	$mail->Username = GUSER;
	$mail->Password = GPWD;
	$mail->setFrom($de, $de_nome);
	$mail->Subject = $assunto;
	$mail->Body = $corpo;
	$mail->AddAddress($para);
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = 'Mensagem enviada!';
		return true;
	}
}

$Vai1 		= "Caro(a) $nome_medico, Informamos que a consulta do dia $start_update com o animal $Nome_Animal pertencente ao cliente $Nome foi cancelada.  Obrigada,\n A Equipa MyGestVet.";
$Vai 		= "Caro(a) $Nome, Informamos que a consulta do dia $start_update com o seu animal $Nome_Animal foi cancelada.  Obrigada,\n A Equipa MyGestVet.";



 if (smtpmailer($Email_Medico, 'mygestvet@gmail.com', 'My Gest Vet', 'Cancelamento de Consulta', $Vai1)) {

	// Redireciona para uma página de obrigado. Header("location:http://www.dominio.com.br/obrigado.html"); 

}
 if (smtpmailer($Email, 'mygestvet@gmail.com', 'My Gest Vet', 'Cancelamento de Consulta', $Vai)) {

	// Redireciona para uma página de obrigado. Header("location:http://www.dominio.com.br/obrigado.html"); 

}
header("Location: AgendaPremium.php");
	
    } else {
        $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao apagar o evento <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
        header("Location: AgendaPremium.php");
    }
} else {
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao apagar o evento <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
    header("Location: AgendaPremium.php");
}