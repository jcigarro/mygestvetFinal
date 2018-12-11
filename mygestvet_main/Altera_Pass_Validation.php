<?php

    
    if (isset($_POST['entrar'])){

            $hostname='localhost';
            $user = 'root';
            $password = '';
            $mysql_database = 'atual';
            $conn = mysqli_connect($hostname, $user, $password,$mysql_database);

        $valid_pass_email = $_POST['email_'];
        $nova_pass=md5($_POST['nova_pass']);
        $confirma_pass=md5($_POST['confirma_pass']);

        echo "\n".$valid_pass_email;
        echo "\n".$nova_pass;
        echo "\n".$confirma_pass;

        if ($nova_pass === $confirma_pass) {
            $upd = "UPDATE medico SET Password='$nova_pass' WHERE medico.Email='$valid_pass_email'";

            $teste = mysqli_query($conn, $upd) or die(mysqli_error($conn));

            if (mysqli_affected_rows($conn) > 0) {
                echo "Record updated successfully";
                header("Location: Login.php?signup=alter_pass");
            } else {
                 header("Location: Login.php?signup=nao_alter");
            }
            //$login = mysqli_query($conn," UPDATE medico SET Password=$nova_pass WHERE medico.Email=$valid_pass_email");
   		} else {
   			header("Location: Pass_Recovery_Form.php?signup=alter_pass");
   		}

     }


?>