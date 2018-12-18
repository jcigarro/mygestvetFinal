  
<?php
header('Content-Type: text/html; charset=utf-8');
  if( !empty($_POST) ){
    // processar o pedido
    $hostname='localhost';
    $user = 'root';
    $password = 'root';
    $mysql_database = 'atual';
    $conn = mysqli_connect($hostname, $user, $password,$mysql_database);
    
    $user_email = $_POST['email'];

    $q = mysqli_query($conn, "SELECT * FROM medico WHERE Email = '$user_email'");
 
    if( mysqli_num_rows($q) == 1 ){
      // o utilizador existe, vamos gerar um link único e enviá-lo para o e-mail
 
      // gerar a chave
      // exemplo adaptado de http://snipplr.com/view/20236/
      $chave = sha1(uniqid( mt_rand(), true));
 
      // guardar este par de valores na tabela para confirmar mais tarde
      $conf = mysqli_query($conn, "INSERT INTO recuperacao VALUES ('$user_email', '$chave')");
	  echo "INSERT INTO recuperacao VALUES ('$user_email', '$chave')";
 
      if( mysqli_affected_rows($conn) == 1 ){

        require_once("phpmailer/class.phpmailer.php");

define('GUSER', 'mygestvet@gmail.com'); // <-- Insira aqui o seu GMail
define('GPWD', 'toufartadisto1234');    // <-- Insira aqui a senha do seu GMail

  function smtpmailer($para, $de, $de_nome, $assunto, $corpo) { 
  global $error;
  $mail = new PHPMailer();
  $mail->IsSMTP();    // Ativar SMTP
  $mail->SMTPDebug = 0;   // Debugar: 1 = erros e mensagens, 2 = mensagens apenas
  $mail->SMTPAuth = true;   // Autenticação ativada
  $mail->SMTPSecure = 'ssl';  // SSL REQUERIDO pelo GMail
  $mail->Host = 'Smtp.gmail.com'; // SMTP utilizado
  $mail->Port = 465;      
  $mail->Username = GUSER;
  $mail->Password = GPWD;
   
  
  $mail->setFrom($de, $de_nome);
  $mail->Subject = $assunto;
  $mail->Body = $corpo;
  $mail->AddAddress($para);
  if(!$mail->Send()) {
    $error = 'Erro ao enviar: '.$mail->ErrorInfo; 
    return false;
  } else {
    $error = 'Mensagem enviada!';
    return true;
  }
}

$Vai = "
Bem vindo à recuperação de password da plataforma MyGestVet, se tiver algum problema entre em contacto com a nossa equipa. 

Clique no link para alterar a sua password


192.168.1.23:8888/mygestvetFinal/mygestvet_main/recuperar.php?utilizador=$user_email&confirmacao=$chave";



 if (smtpmailer($user_email, 'mygestvet@gmail.com', 'My Gest Vet', 'Recuperar password', $Vai)) {
  //unlink('my_file3.pdf');
header("Location: perdipassword.php?signup=valid");
  // Redireciona para uma página de obrigado. Header("location:http://www.dominio.com.br/obrigado.html"); 

}
 
  
 
        else {
        
          header("Location: perdipassword.php?signup=email_erro");
 
        }
 
		// Apenas para testar o link, no caso do e-mail falhar
		//echo '<p>Link: '.$link.' (apresentado apenas para testes; nunca expor a público!)</p>';
 
      } else {
        header("Location: perdipassword.php?signup=ger_error");
 
      }
    } else {
    header("Location: perdipassword.php?signup=nouser");
	}
  } else {
    // mostrar formulário de recuperação
?>

<!DOCTYPE html>
<html>
  
<!-- Mirrored from demo.bootstrapious.com/admin-premium/1-4-4/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Nov 2018 10:50:33 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MyGestVet Login</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Poppins -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.premium.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
  
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif] -->

    <link rel="icon" sizes="76x76" href="img/logo2-02.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/logo2-02.png">
  </head>
  <body>
    <div class="page login-page">
      <div class="container d-flex align-items-center">
        <div class="form-holder has-shadow">
          <div class="row">
            <!-- Logo & Information Panel-->
            <div class="col-lg-6">
              <div class="info d-flex align-items-center">
                <div class="content">
                <center>
                  <div class="logo">
                    <a href="Login.php">
                      <img src="img\logo2-02.png" align="center" style=" width: 70%">
                    </a>
                  </div>
                 

                  <p><em>O MyGestVet é um Sistema de Gestão no âmbito da Medicina Veterinária com o objetivo de gerir todo o trabalho de um Médico Veterinário.</em></p>
                </center>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->
            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form method="post" class="form-validate" action="perdipassword.php" >
                    <div class="form-group">
                      <input id="email" type="email" name="email" required data-msg="Insira o seu e-mail" class="input-material">
                      <label for="login-username" class="label-material">E-mail</label>
                    </div>

                     <?php
                        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                        if (strpos($fullUrl, "signup=ger_error") == true) {
                          echo "<h4 style='color:#f45042;'>Não foi possível gerar o endereço único.</h4>";
                        }

                        if (strpos($fullUrl, "signup=nouser") == true) {
                          echo "<h4 style='color:#f45042;'>Esse utilizador não existe.</h4>";
                        }

                        if (strpos($fullUrl, "signup=valid") == true) {
                          echo "<p>Foi enviado um e-mail para o seu endereço, lá encontrará um link único para alterar a sua password.</p>";
                        }

                        if (strpos($fullUrl, "signup=email_erro") == true) {
                          echo "<p>Houve um erro ao enviar o email (o servidor suporta a função mail?)</p>";
                        }
                      ?>
                    
                    <div class="form-group">  
                     <button id="entrar" type="submit" name="entrar" class="btn btn-primary">Recuperar Password</button>    
                    </div>
                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
        <p class="copyright" style="color: #fff">&copy; 2018 MyGestVet</a>. All Rights Reserved.</p>
        </p>
      </div>
    </div>
    
    
    <!-- JavaScript files-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>
  </body>

</html>

<?php
  }
?>
<!--<form method="post" action="perdipassword.php">
  <label for="email">E-mail:</label>
  <input type="text" name="email" id="email" />
  <input type="submit" value="Recuperar" />
</form> -->





