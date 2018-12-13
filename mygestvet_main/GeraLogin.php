<?php

session_start();
    
if (isset($_POST['entrar'])){

            $hostname='localhost';
            $user = 'root';
            $password = '';
            $mysql_database = 'atual';
            $conn = mysqli_connect($hostname, $user, $password,$mysql_database);

        $email=$_POST['email'];
        $password=md5($_POST['password']);

        $_SESSION['email']=$email;
        
        $login = mysqli_query($conn,"SELECT email, password, Codigo_tipo_conta, Numero_Medico FROM medico WHERE Email = '$email';");
        

        $row=mysqli_fetch_array($login);
        $mail=$row[0];
        $pw=$row[1];
        $tipo_conta=$row[2];
        $Numero_Medico=$row[3];

        if(mysqli_num_rows($login)>0){

            if($pw ==$password){
                if($tipo_conta=="1"){
                    $_SESSION['tipo_conta'] = $tipo_conta;
                    $_SESSION['email_cod'] = $mail;
                    echo "<script>location.href='inicioBasico.php'</script>";

                }else if($tipo_conta=="2"){
                    $_SESSION['tipo_conta'] = $tipo_conta;
                    $_SESSION['email_cod'] = $mail;
                    $_SESSION['m']=$Numero_Medico;
                    echo "<script>location.href='inicioPremium.php'</script>";

                }else{
                    $_SESSION['tipo_conta'] = $tipo_conta;
                    $_SESSION['email_cod'] = $mail;
                    echo "<script>alert('Bem vindo Administrador!');</script>";
                    echo "<script>location.href='inicioAdmin.php'</script>";
                }

            }else{
                
                 header("Location: Login.php?signup=passerror");
            }
        }else{
            
            header("Location: Login.php?signup=nonerror");
        }

    
    }


?>

