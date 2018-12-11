<?php


    include("config.php");

    if($conn -> connect_error){
        die("Erro na ligação: ".$conn -> connect_error);

    }
    $nome=$_REQUEST["nome"];
    $apelidos=$_REQUEST["apelido"];
    $telefone=$_REQUEST["telefone"];
    $sexo=$_REQUEST["sexo"];
    $morada=$_REQUEST["morada"];
    $nif=$_REQUEST["nif"];

    $codigo_localidade=$_REQUEST["codigo_localidade"];
    $codigo_postal=$_REQUEST["codigo_postal"];
    
    $email = $_REQUEST["email"]; 
    $password = md5($_REQUEST["password"]);
    $password_confirm = md5($_REQUEST["password_confirm"]);
    
   


    $msg=false;
    if(isset($_FILES['arquivo'])){
        $extensao= strtolower(substr($_FILES['arquivo']['name'], -4));
        $novo_nome= md5(time().$extensao);
        $diretorio= "upload/";
        $link = "upload/".$_FILES['arquivo']["name"];
        $path_parts = pathinfo($_FILES['arquivo']["name"]);
         $extension = $path_parts['extension'];

        move_uploaded_file($_FILES['arquivo']['tmp_name'], $link);
        $sql = "INSERT INTO utilizador VALUES ('$email','$link')";
        if (mysqli_query($conn,$sql) === TRUE) {
              $msg = "Utilizador registado com Sucesso.";
              $val = 1;
        }else {
              $msg .= "Error: " . $sql . "<br>" . mysqli_error($conn);
              $val = 2;
            }



    }


    $login = mysqli_query($conn,"SELECT Email FROM medico WHERE email = '$email';");
    


    if (mysqli_num_rows($login) >0 ) {

        echo "<script>alert('Esse email ja se encontra registado!'); history.back();</script>";
    } else {
        if($password==$password_confirm){

            $_SESSION['email'] = $email;

            $login1 = mysqli_query($conn,"INSERT INTO medico VALUES(NULL,'$password','$nome','$apelidos','$sexo',$telefone,'$email',$nif,'$morada','$codigo_postal','Portugal',$codigo_localidade,1);");
            
            if (mysqli_query($conn,$login1) === TRUE) {
              $msg = "Utilizador registado com Sucesso.";
              $val = 1;
        }else {
              $msg .= "Error: " . $sql . "<br>" . mysqli_error($conn);
              $val = 2;
            }
            
            echo "<script>alert('Registo efetuado com sucesso!'); </script>";
            echo "<script>location.href='Login.php'</script>";
            exit();

        }else{

            echo "<script>alert('Passwords não coincidem!'); history.back();</script>";
            exit();
        }    
   
}
    

?>