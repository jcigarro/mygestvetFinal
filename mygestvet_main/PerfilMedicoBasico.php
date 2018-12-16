<?php


include("config.php");




    if(!(isset($_SESSION['email_cod']) && $_SESSION['email_cod'] != "") || $_SESSION['tipo_conta'] != 1){
    header('Location: Login.php');
    }
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');



$email = $_SESSION['email'];
$sql = "SELECT * from medico where Email = '$email';";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

  // output data of each row
    while($row = $result->fetch_assoc()) {

    $nome = $row['Primeiro_Nome'];
    $apelidos = $row['Apelidos'];
    $email= $row['Email'];
    $nif=$row['Nif_Faturacao'];
    $morada=$row['Morada'];
    $telefone=$row['Telefone'];
    $localidade=$row['Codigo_Localidade'];
    $codigoPostal=$row['Codigo_Postal'];
    $id_medico=$row['Numero_Medico'];
   
   

$sql2 = "SELECT * from Localidade where Codigo_Localidade = '$localidade';";
$result2 = $conn->query($sql2);
if ($result2->num_rows > 0) {

  // output data of each row
    while($row = $result2->fetch_assoc()) {
		
		$descricao_localidade=$row['Descricao'];
}}


  }

}



     

        //upload foto de perfil

        // Initialize message variable
        $msg = "";
        $image = "";
        // If upload button is clicked ...
        if (isset($_POST['upload'])) {
          // Get image name
          $image = $_FILES['image']['name'];

            // image file directory
          $target = "uploads/".basename($image);
              // verificar se já tem foto
      
          $sql = "INSERT INTO `utilizador`(`Numero_Medico`, `linkimagem`) VALUES ($id_medico,'$image')";
            // execute query
          mysqli_query($conn, $sql);

          if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
           
          }else{
            $msg = "Failed to upload image";
            
            }
          } 
        
 
    $sql1 = "SELECT Codigo_Localidade,Descricao from localidade ORDER BY Descricao ASC ";
 
    $localidade = $conn->query($sql1);


    $query9 = "SELECT linkimagem FROM utilizador WHERE utilizador.Numero_Medico=$id_medico";

    $result2 = $conn->query($query9);

      if ($result2) {
          while ($row1 = $result2->fetch_assoc()) {
            $foto_perfil7 = $row1['linkimagem'];
          } 
       } else {
        $foto_perfil7 = "perso1.jpg";
       }
         

?>
<!DOCTYPE html>
<html>
  <!-- Mirrored from demo.bootstrapious.com/admin-premium/1-4-4/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Nov 2018 10:50:20 GMT -->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MyGestVet Perfil</title>
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


    <link rel="icon" sizes="76x76" href="img/logo2-pequeno.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/logo2-pequeno.png">
    <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
  
 

  </head>
  <body>
    <div class="page">
      <!-- Main Navbar-->
      <header class="header">
        <nav class="navbar">
          
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <!-- Navbar Header-->
              <div class="navbar-header">
                <!-- Navbar Brand --><a href="inicioBasico.php" class="navbar-brand d-none d-sm-inline-block">
                <a href="inicioBasico.php" >
                   <img src="img/logo2-02.png" alt="MyGestVet logo" width="110" height="100" >
                </a>
                
              </div>
              <!-- Toggle Button-->
                <a id="toggle-btn" href="#" class="menu-btn active"> <span></span><span></span><span></span></a>
              <p class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">Bem-vindo ao MyGestVet!</p>
              <!-- Navbar Menu -->
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                

                <!-- Definiçoes   -->

                <li class="nav-item dropdown">
                  <a href="#insurance-head-section" class="nav-link" data-toggle="dropdown">Definições&ensp;<i class="fas fa-cog"></i></a>
                  <div class="dropdown-menu">
                    <a href="RegistoClienteBasico.php" class="dropdown-item"><i class="fas fa-user"></i>Registar Cliente</a>
                    <a href="RegistoAnimalBasico.php" class="dropdown-item"><i class="fas fa-dog"></i>Registar Animal</a>
                    <a href="PerfilMedicoBasico.php" class="dropdown-item"><i class="fas fa-user-edit"></i>Editar Perfil</a>
                    <a href="RegistoExameBasico.php" class="dropdown-item"><i class="fas fa-file-medical-alt"></i>Registar Exame Clínico</a>
                    <a href="RegistoVacinacoesBasico.php" class="dropdown-item"><i class="fas fa-syringe"></i>Registar Vacinação</a>
                    
                  </div>
                </li>


                  <!-- Logout    -->
                  <li class="nav-item"><a href="logout.php" class="nav-link logout"> <span class="d-none d-sm-inline">Terminar Sessão</span><i class="fas fa-sign-out-alt"></i></a></li>
                </ul>
              </div>
            </div>
          </nav>
        </header>
        <div class="page-content d-flex align-items-stretch">
          <!-- Side Navbar -->
          <nav class="side-navbar">
            <!-- Sidebar Header-->
            <div class="sidebar-header d-flex align-items-center">
              <div class="avatar"><img src="uploads/<?php echo $foto_perfil7;?>" width=120 height=120 alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h4"><?php  echo $nome. ' '.$apelidos ?> </h1>
              <a href="PerfilMedicoBasico.php">
              <p>Editar Perfil</p>
              </a>
            </div>
          </div>
            <!-- Sidebar Navidation Menus--><span class="heading"></span>
            <ul class="list-unstyled">
              <li class="active"><a href="inicioBasico.php"> <i class="fas fa-home"></i>Início</a></li>
                    <li><a href="#tablesDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fas fa-user-friends"></i>Clientes </a>
                      <ul id="tablesDropdown" class="collapse list-unstyled ">
                        <li><a href="RegistoClienteBasico.php">Registar Clientes</a></li>
                        <li><a href="ListaClientesBasico.php">Lista de Clientes</a></li>
                      </ul>
                    </li>
                    <li><a href="#chartsDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fas fa-dog"></i>Animais</a>
                      <ul id="chartsDropdown" class="collapse list-unstyled ">
                        <li><a href="RegistoAnimalBasico.php">Registar Animal</a></li>
                        <li><a href="ListaAnimaisBasico.php">Lista de Animais</a></li>
                      </ul>
                    </li>
                     <li><a href="#chartsDropdown1" aria-expanded="false" data-toggle="collapse"> <i class="fas fa-user-md"></i>Serviços</a>
                      <ul id="chartsDropdown1" class="collapse list-unstyled ">
                        <li><a href="RegistoExameBasico.php">Registar Exame Clínico</a></li>
                        <li><a href="RegistoServicosBasico.php">Registar Serviço</a></li>
                        <li><a href="RegistoMaterialServico.php">Registar Material Utilizado</a></li>
                        <li><a href="HistoricoServicosBasico.php">Histórico de Serviços</a></li>
                      </ul>
                    </li>
                    <li><a href="#chartsDropdown2" aria-expanded="false" data-toggle="collapse"> <i class="fas fa-syringe"></i>Vacinações</a>
                      <ul id="chartsDropdown2" class="collapse list-unstyled ">
                        <li><a href="RegistoVacinacoesBasico.php">Registar Vacinação</a></li>
                        <li><a href="ListaVacinacoesBasico.php">Histórico de Vacinações</a></li>
                      </ul>
                    </li>
                    <li><a href="#chartsDropdown3" aria-expanded="false" data-toggle="collapse"> <i class="fas fa-file-invoice"></i>Documentos</a>
                      <ul id="chartsDropdown3" class="collapse list-unstyled ">
                        <li><a href="HistoricoServicosBasico.php">Receitas</a></li>
                        <li><a href="HistoricoReceitas.php">Histórico de Receitas</a></li>
                        <li><a href="">Faturas/Recibos</a></li>
                      </ul>
                    </li>


        </nav>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">O Meu Perfil</h2>
            </div>
          </header>
          <!-- Breadcrumb-->
          <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="inicioBasico.php">Início</a></li>
              <li class="breadcrumb-item active">O Meu Perfil</li>
            </ul>
          </div>
          <section>
          
            <div class="container-fluid">
              <div class="row">
                <div class="col-lg-4">
                  <form class="card" method="post">
                    <div class="card-header">
                      <h3 class="card-title">O Meu Perfil</h3>
                    </div>
                    <div class="card-body">
                      <div class="row mb-3">
                        <div class="col-auto d-flex align-items-center"><span style="background-image: url(uploads/<?php echo $foto_perfil7;?>)" class="avatar avatar-lg"></span></div>
                        <div class="col">
                          <div class="form-group">
                            <fieldset disabled>
                              <label class="form-label">Nome</label>
                              <input value="<?php  echo $nome. ' '.$apelidos; ?>" class="form-control">
                            </fieldset>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <fieldset disabled>
                          <label class="form-label">Email</label>
                          <input value="<?php  echo $email; ?>" class="form-control">
                        </fieldset>
                      </div>
                      <div class="card-body text-center">
                        <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Alterar Password</button>
                        <br><br>
                        

                        <!-- Modal-->
                        <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                          <div role="document" class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h4 id="exampleModalLabel" class="modal-title">Alterar Password</h4>
                                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                              </div>
                              <div class="modal-body">
                                <form method="post" >
                                  <div class="form-group ">
                                    <label>Password Antiga</label>
                                    <input type="password"  placeholder="Password Antiga" name="passAntiga" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Nova Password</label>
                                    <input type="password"  placeholder="Nova Password" name="pwnova" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <label>Confirmar Password</label>
                                    <input type="password"  placeholder="Confirmar Password" name="pwconfirm" class="form-control">
                                  </div>
                                  <div class="form-group">
                                    <button id="alterar"  formaction="AlteraPw.php" type="submit" name="alterar" class="btn btn-primary">Alterar</button><br><br>
                                  </div>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" data-dismiss="modal" class="btn btn-secondary">Fechar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>

                   <div class="card-header">
                      <h3 class="card-title">Alterar foto de perfil</h3>
                   <hr>
                   <div class="card-body">
                      <!--Upload foto-->
                    
                      <form method="POST" action="PerfilMedicoBasico.php" enctype="multipart/form-data">
                          <input type="hidden" name="size" value="1000000">
                          <div>
                            <input type="file" name="image" style="font-size: 11px" required>
                          </div>
                          <div>
                            <br>
                            <button class="btn btn-primary" type="submit" name="upload">Carregar</button>
                          </div>
                      </form>
                    </div>
                  </div>

                </div>
                <div class="col-lg-8">
                  <form class="card" >
                    <div class="card-body">
                      <h3 class="card-title">Editar Perfil</h3>
                      <div class="row">
                        <div class="col-sm-6 col-md-6">
                          <div class="form-group mb-4">
                            <label class="form-label">Primeiro Nome</label>
                            <input type="text" name="nome" value="<?php  echo $nome; ?>" class="form-control">
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                          <div class="form-group mb-4">
                            <label class="form-label">Apelido</label>
                            <input type="text" name="apelidos" value="<?php  echo $apelidos; ?>" class="form-control">
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                          <div class="form-group mb-4">
                            <label class="form-label">Telefone/Telemóvel</label>
                            <input type="int" name="telefone" value="<?php  echo $telefone; ?>" value="" class="form-control">
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-4">
                          <div class="form-group mb-4">
                            <label class="form-label">Nif de Faturação</label>
                            <input type="int" name="nif" value="<?php  echo $nif; ?>" class="form-control">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group mb-4">
                            <label class="form-label">Morada</label>
                            <input type="text" name="morada" value="<?php  echo $morada; ?>" class="form-control">
                          </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                          <div class="form-group mb-4">
                            <label class=" form-label">Localidade</label>
                              
                                <select name="localidade" class="form-control mb-3">
                                 
                                    <option value= ""> <?php  echo $descricao_localidade; ?></option>
                                    <?php while ($row1 = mysqli_fetch_array($localidade)):;?>   
                                                        
                                    <option value= "<?php  echo $row1[0]; ?>"> <?php  echo $row1[1]; ?></option>
                                    <?php endwhile;?>
                                </select>
                          </div>
                              
                        </div>


                        <div class="col-sm-6 col-md-3">
                          <div class="form-group mb-4">
                            <label class="form-label">Código-Postal</label>
                            <input type="text" name="codpostal" value="<?php  echo $codigoPostal; ?>" class="form-control">
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer text-right">
                      <button type="submit" formaction="EditarPerfil.php" class="btn btn-primary">Guardar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </section>
        </section>
        <!-- Page Footer-->
        <footer class="main-footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-sm-6">
                <p class="copyright">&copy; 2018 MyGestVet</a>. All Rights Reserved.</p>
              </div>
              <div class="col-sm-6 text-right">
                <p>Version 1.0.0</p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
  </div>
  <!-- JavaScript files-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/popper.js/umd/popper.min.js"> </script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
  <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
  <script src="vendor/chart.js/Chart.min.js"></script>
  <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
  <script src="js/charts-home.js"></script>
  <script src="js/home-premium.js"> </script>
  <!-- Main File-->
  <script src="js/front.js"></script>
</body>
<!-- Mirrored from demo.bootstrapious.com/admin-premium/1-4-4/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Nov 2018 10:50:32 GMT -->
</html>