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
                    <a href="../index.html">
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
                  <form method="post" class="form-validate" action="GeraLogin.php" >
                    <div class="form-group">
                      <input id="login-username" type="text" name="email" required data-msg="Insira o seu e-mail" class="input-material">
                      <label for="login-username" class="label-material">E-mail</label>
                    </div>
                    <div class="form-group">
                      <input id="login-password" type="password" name="password" required data-msg="Insira a sua password" class="input-material">
                      <label for="login-password" class="label-material">Password</label>
                    </div>
                    <?php
                        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                        if (strpos($fullUrl, "signup=passerror") == true) {
                          echo "<h4 style='color:red;'>Password errada, tente novamente...</h4>";
                        }

                        if (strpos($fullUrl, "signup=nonerror") == true) {
                          echo "<h4 style='color:red;'>Email não registado, faça o seu registo!</h4>";
                        }

                        if (strpos($fullUrl, "signup=alter_pass") == true) {
                          echo "<h4 style='color:#03A9F4;'>Password alterada com sucesso!</h4>";
                        }

                        if (strpos($fullUrl, "signup=nao_alter") == true) {
                          echo "<h4 style='color:red;'>Password não foi alterada!</h4>";
                        }
                      ?>
                    <div class="form-group">  
                     <button id="entrar" type="submit" formaction="GeraLogin.php" name="entrar" class="btn btn-primary"> Entrar</button>    
                    </div>
                    <!-- This should be submit button but I replaced it with <a> for demo purposes-->
                  </form>

                  <a href="perdipassword.php" class="forgot-pass">Esqueceu-se da Password?</a><br><br><small>Ainda não tem uma conta? </small><a href="../index.html#registo_clientes" class="signup">Registar</a>

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