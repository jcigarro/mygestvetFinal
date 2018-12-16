<?php



//Incluir conexao com BD
include_once("config.php");





$Numero_Receita=$_REQUEST['edit_item_id']; 
$dadosReceita="select cliente.Nome, cliente.Email from animal,cliente,servico,receita,exame_clinico WHERE animal.Numero_Cliente=cliente.Numero_Cliente and exame_clinico.Numero_Animal=animal.Numero_Animal AND servico.Codigo_Exame_Clinico=exame_clinico.Codigo_Exame_Clinico and receita.Codigo_Servico=servico.Codigo_Servico AND receita.Numero_Receita=$Numero_Receita;";
$dadosReceita1 = $conn->query($dadosReceita);
if ($dadosReceita1->num_rows > 0) {
// output data of each row
while($row = $dadosReceita1->fetch_assoc()) {
$nome = $row['Nome'];
$mail1 = $row['Email'];
}
}
	require_once("phpmailer/class.phpmailer.php");

define('GUSER', 'mygestvet@gmail.com');	// <-- Insira aqui o seu GMail
define('GPWD', 'toufartadisto1234');		// <-- Insira aqui a senha do seu GMail

	function smtpmailer($para, $de, $de_nome, $assunto, $corpo,$Numero_Receita) { 
	global $error;
	$mail = new PHPMailer();
	$mail->CharSet="UTF-8";
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
	$mail->AddAttachment($Numero_Receita.".pdf");
	$mail->AddAddress($para);
	if(!$mail->Send()) {
		$error = 'Mail error: '.$mail->ErrorInfo; 
		return false;
	} else {
		$error = 'Mensagem enviada!';
		return true;
	}
}

$Vai 		= "Caro(a) $nome, aqui tem a sua receita. Obrigada,\n A Equipa MyGestVet.";



 if (smtpmailer($mail1, 'mygestvet@gmail.com', 'My Gest Vet', 'Receita Médica', $Vai,$Numero_Receita)) {
 	//unlink('my_file3.pdf');
header("Location: HistoricoReceitasPremium.php");
	// Redireciona para uma página de obrigado. Header("location:http://www.dominio.com.br/obrigado.html"); 

}


