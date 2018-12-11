<?php
 
   session_start();
 
         
       $hostname='localhost';
       $user = 'root';
       $password = '';
       $mysql_database = 'atual';
       $conn = mysqli_connect($hostname, $user, $password,$mysql_database);
 
     $conn->set_charset("utf-8");
 
 
 
   
 
    $sql1 = "SELECT Codigo_Localidade,Descricao from localidade ORDER BY Descricao ASC ";
 
   $localidade = $conn->query($sql1);
   
  $conn->close();
  
  ?>



<!DOCTYPE html>
<html>
  
<!-- Mirrored from demo.bootstrapious.com/admin-premium/1-4-4/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Nov 2018 10:50:51 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MyGestVet Registo</title>
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
    
    <link rel="icon" sizes="76x76" href="img/icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/icon.png">
 
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
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
                    <img src="img\icon.png" align="center" style=" width: 60%">
                  </div>
                  <br><br><br>

                  <p><em>O MyGestVet é um Sistema de Gestão no âmbito da Medicina Veterinária com o objetivo de gerir todo o trabalho de um Médico Veterinário.</em></p>
                </center>
                </div>
              </div>
            </div>
            <!-- Form Panel    -->

           <!-- Form Panel    -->

            <div class="col-lg-6 bg-white">
              <div class="form d-flex align-items-center">
                <div class="content">
                  <form class="form-validate" action="GeraRegisto.php" method="POST" enctype="multipart/form-data">


                    <div class="row">
                      <div class="form-group col-6">
                        <input id="nome" type="text" name="nome" required data-msg="Insira o seu primeiro nome" class="input-material">
                        <label for="name" class="label-material">Primeiro nome</label>
                      </div>
                      <div class="form-group col-6">
                        <input id="apelido" type="text" name="apelidos" required data-msg="Insira os seus apelidos" class="input-material">
                        <label for="name" class="label-material">Apelido(s)</label>
                      </div>

                    </div>

                    <div class="row">
                      <div class="form-group col-6">
                        <label class=" form-control-label">Sexo</label>
                      </div>
                              
                        <div class="form-group col-6">
                          <input id="optionsRadios1" type="radio" checked="" value="Masculino" name="sexo">
                                  
                          <label for="optionsRadios1" class="checkbox-inline" style="color: #aaa; font-size: 14px">Masculino</label>
                          <input id="optionsRadios2" type="radio" value="Feminino" name="sexo">
                          <label for="optionsRadios2" style="color: #aaa; font-size: 14px">Feminino</label>
                                
                        </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-6">
                        <input id="telef" type="int" name="telefone" required data-msg="Insira o seu nº de telefone/telemóvel" class="input-material">
                        <label for="telef" class="label-material">Telefone/Telemóvel</label>
                      </div>

                      <div class="form-group col-6">
                        <input id="int" type="int" name="nif" required data-msg="Insira o seu Número de Identificação Fiscal" class="input-material">
                        <label for="nif" class="label-material">Nif de Faturação</label>
                      </div>
                    </div>

                    <div class="row">
                       <div class="form-group col-12">
                          <input id="morada" type="text" name="morada" required data-msg="Insira a sua morada" class="input-material">
                          <label for="morada" class="label-material">Morada</label>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="form-group col-6">
                              <label class=" form-control-label">Localidade</label>
                              <div class="col-sm-9">
                                 <select name="codigo_localidade" class="form-control mb-3">
                                <?php while ($row1 = mysqli_fetch_array($localidade)):;?> 
                                                              
                                <option value= "<?php  echo $row1[0]; ?>"> <?php  echo $row1[1]; ?></option>
                                <?php endwhile;?>
                              </select>
                              </div>
                      </div>
                      <div class="form-group col-6">
                        <input id="codigo_postal" type="text" name="codigo_postal" required data-msg="Insira o Código-Postal" class="input-material">
                        <label for="codigoPostal" class="label-material">Código-Postal</label>
                      </div>
                    </div>

                    
                      

                    <div class="row">
                      <div class="form-group col-12">
                        <input id="email" type="email" name="email" required data-msg="Insira um e-mail válido" class="input-material">
                        <label for="email" class="label-material">E-mail</label>
                      </div>
                    </div>

                    <div class="row">
                      <div class="form-group col-6">
                        <input id="password" type="password" name="password" required data-msg="Insira uma password" class="input-material">
                        <label for="password" class="label-material">Password</label>
                      </div>

                      <div class="form-group  col-6">
                        <input id="password_confirm" type="password" name="password_confirm" required data-msg="Confirma a password" class="input-material">
                        <label for="confirmapassword" class="label-material">Confirma a Password</label>
                      </div>
                    </div>

                   

                    

                    
                    <div>
                        <button id="regidter" formaction="GeraRegisto.php" type="submit" name="registerSubmit" class="btn btn-primary">Registar</button><br><br>
                        </form><small>Já possui uma conta? </small><a href="Login.php" class="signup">Entrar</a>
                    </div>  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="copyrights text-center">
        <p class="copyright" style="color: #fff">&copy; 2018 MyGestVet</a>. All Rights Reserved.</p>
       
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