
<?php
  if( empty($_GET['utilizador']) || empty($_GET['confirmacao']) )
    die('<p>Não é possível alterar a password: dados em falta</p>');

  session_start();


 
      $hostname='localhost';
      $user = 'root';
      $password = '';
      $mysql_database = 'atual';
      $conn = mysqli_connect($hostname, $user, $password,$mysql_database);
 
  $user_email = mysqli_real_escape_string($conn, $_GET['utilizador']);
  $hash = mysqli_real_escape_string($conn, $_GET['confirmacao']);

  $_SESSION['pass_rec_email'] = $user_email;
 
  $q = mysqli_query($conn, "SELECT COUNT(*) AS bora FROM `recuperacao` WHERE  utilizador = '$user_email' AND confirmacao = '$hash'");


 if(mysqli_num_rows($q)>0){
 
    // os dados estão corretos: eliminar o pedido e permitir alterar a password
    mysqli_query($conn, "DELETE FROM `recuperacao` WHERE utilizador = '$user_email' AND confirmacao = '$hash'");
 
   include 'Pass_Recovery_Form.php';
 
  } else {

    echo '<p>Não é possível alterar a password: dados incorretos</p>';
 
  }
 
?>