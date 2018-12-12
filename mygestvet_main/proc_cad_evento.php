<?php

 


//Incluir conexao com BD
include_once("config.php");


$m=$_SESSION['m'];


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
$a=$_REQUEST['Animalnumber'];
$c=$_REQUEST['Numero_Cliente'];

$sql1 = "SELECT * from cliente where Numero_Cliente = $c;";

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


$title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
$color = filter_input(INPUT_POST, 'color', FILTER_SANITIZE_STRING);
$start = filter_input(INPUT_POST, 'start', FILTER_SANITIZE_STRING);
$end = filter_input(INPUT_POST, 'end', FILTER_SANITIZE_STRING);


$query1 = "SELECT * FROM agenda WHERE (agenda.start between '$start' and '$end' or agenda.end between '$end' and '$start') or ('$start' between agenda.start and agenda.end or '$end' between agenda.start and agenda.end) and Numero_Medico=$m";

$result = $conn->query($query1);

	if ($result->num_rows > 0) {
	    // output data of each row
	    
	} else {
	    if(!empty($title) && !empty($color) && !empty($start) && !empty($end)){
	//Converter a data e hora do formato brasileiro para o formato do Banco de Dados
	$data = explode(" ", $start);
	list($date, $hora) = $data;
	$data_sem_barra = array_reverse(explode("/", $date));
	$data_sem_barra = implode("-", $data_sem_barra);
	$start_sem_barra = $data_sem_barra . " " . $hora;
	
	$data = explode(" ", $end);
	list($date, $hora) = $data;
	$data_sem_barra = array_reverse(explode("/", $date));
	$data_sem_barra = implode("-", $data_sem_barra);
	$end_sem_barra = $data_sem_barra . " " . $hora;
	
	$result_events = "INSERT INTO agenda (title, color, start, end, Numero_Medico, Numero_Cliente,Numero_Animal) VALUES ('$title', '$color', '$start', '$end', $m,$c,$a)";
	$resultado_events = mysqli_query($conn, $result_events);

	//Verificar se salvou no banco de dados através "mysqli_insert_id" o qual verifica se existe o ID do último dado inserido
	if(mysqli_insert_id($conn)){
		$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>Evento adicionado com sucesso<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		$Vai 		= "Caro(a) $Nome, $Email_Medico Informamos que no dia $start terá consulta com o seu animal $Nome_Animal. Caso não possa comparecer, por favor entre em contacto connosco.\n Obrigada.";

require_once("phpmailer/class.phpmailer.php");

define('GUSER', 'mygestvet@gmail.com');	// <-- Insira aqui o seu GMail
define('GPWD', 'toufartadisto1234');		// <-- Insira aqui a senha do seu GMail

function smtpmailer($para, $de, $de_nome, $assunto, $corpo) { 
	global $error;
	$mail = new PHPMailer();
	$mail->CharSet="UTF-8";
	$mail->IsSMTP();		// Ativar SMTP
	$mail->SMTPDebug = 0;		// Debugar: 1 = erros e mensagens, 2 = mensagens apenas
	$mail->SMTPAuth = true;		// Autenticação ativada
	$mail->SMTPSecure = 'ssl';	// SSL REQUERIDO pelo GMail
	$mail->Host = 'Smtp.gmail.com';	// SMTP utilizado
	$mail->Port = 465;  		// A porta 587 deverá estar aberta em seu servidor
	$mail->Username = GUSER;
	$mail->Password = GPWD;
	$mail->setFrom($de, $de_nome);
	$mail->Subject = $assunto;
	$mail->Body = $corpo;
	$mail->AddAddress($para);
	if(!$mail->Send()) {
		//$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		//$error = 'Mensagem enviada!';
		return true;
	}
}

$Vai1 		= "Caro(a) $nome_medico, Informamos que no dia $start terá consulta com o animal $Nome_Animal pertencente ao cliente $Nome.\n Obrigada,\n A Equipa MyGestVet.";



 if (smtpmailer($Email, 'mygestvet@gmail.com', 'My Gest Vet', 'Novo Agendamento', $Vai)) {

	// Redireciona para uma página de obrigado. Header("location:http://www.dominio.com.br/obrigado.html"); 

}
if (smtpmailer($Email_Medico, 'mygestvet@gmail.com', 'My Gest Vet', 'Novo Agendamento', $Vai1)) {

	// Redireciona para uma página de obrigado. Header("location:http://www.dominio.com.br/obrigado.html"); 

}
if (!empty($error)) echo $error;

		
		header("Location: AgendaPremium.php");


	}else{
		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao adicionar o evento<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
		
		echo erro;
		header("Location: AgendaPremium.php");
		
	}
	
}else{
	$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>Erro ao adicionar o evento<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
	echo erro;
	header("Location: AgendaPremium.php");
}
	}
