<?php


include("config.php");

 

  
      $email = $_SESSION['email'];


  $sql = "SELECT * from medico where Email = '$email';";
  
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {


          $nome = $row['Primeiro_Nome'];
          $apelidos=$row['Apelidos'];

        

        }
      }


      

    
    
    
   $medico = mysqli_query($conn,"SELECT Numero_Medico FROM medico WHERE email = '$email';");
  if ($medico->num_rows > 0) {
        // output data of each row
        while($row = $medico->fetch_assoc()) {


          $numero = $row['Numero_Medico'];
		  
		  $sql2 = "SELECT Nome, Numero_Cliente from cliente WHERE Numero_Medico=$numero";

      $cliente1 = $conn->query($sql2);


        }
      }
    
      


  $sql1 = "SELECT animal.Nome, Numero_Animal from Animal, Medico, Cliente WHERE Medico.Numero_Medico=cliente.Numero_Medico AND animal.Numero_Animal=cliente.Numero_Animal AND medico.Numero_Medico=$numero";

  $Animal = $conn->query($sql1);
 


  


  $sql3="SELECT Descricao, Codigo_Especie from Especie";

      $especie = $conn->query($sql3);

  $dadosAnimal="SELECT * FROM Animal;";


  $animal1 = $conn->query($dadosAnimal);
   if ($animal1->num_rows > 0) {

        // output data of each row
        while($row = $animal1->fetch_assoc()) {


          $nomeAnimal = $row['Nome'];
          $dataNascimento=$row['Data_Nascimento'];          
          $nrcliente= $row['Numero_Animal'];
          $nrchip=$row['Numero_Chip'];
          $raca=$row['Raca'];
          $sexo=$row['Codigo_Sexo'];
          $alergias=$row['Alergias'];
          $especie1=$row['Codigo_Tipo_Animal'];


        }
      }



?>

<!DOCTYPE html>
<html>
  
<!-- Mirrored from demo.bootstrapious.com/admin-premium/1-4-4/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Nov 2018 10:50:20 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Histórico de Serviços</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">




    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  

    <!-- Loader -->
    <link rel="stylesheet" href="css/loader.css">
    <script src="js/jquery-1.12.4.js"></script>
    <link rel="stylesheet" type="text/css" href="dashboard/vendor/font-awesome/css/font-awesome.min.css">
    <script>
        $(document).ready(function() {
                $('#example').DataTable({});
            });

    </script>

    <link rel="stylesheet" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="css/responsive.bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>



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

    <!-- Bootstrap Datepicker CSS-->
    <link rel="stylesheet" href="vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css">

     <!-- DataTables CSS-->
    <link rel="stylesheet" href="vendor/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="vendor/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">

    
 
    <link rel="icon" sizes="76x76" href="img/icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/icon.png">

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
                <!-- Navbar Brand --><a href="inicioPremium.php" class="navbar-brand d-none d-sm-inline-block">
                  <a href="inicioPremium.php" >
                    <img src="img/icon.png" alt="MyGestVet logo" style="width:120px;height:80px">
                  </a>

                </div>

                <!-- Toggle Button-->
                <a id="toggle-btn" href="#" class="menu-btn active"> <span></span><span></span><span></span></a>
                <p class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">Bem-vindo ao MyGestVet!</p>
                <!-- Navbar Menu -->
                <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
         

              
                 <!-- Notifications-->
                <li class="nav-item dropdown"> <a id="notifications" rel="nofollow" data-target="#" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link"><i class="far fa-bell"></i><span class="badge bg-red badge-corner">12</span></a>
                  <ul aria-labelledby="notifications" class="dropdown-menu">
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification">
                          <div class="notification-content"><i class="fa fa-envelope bg-green"></i>You have 6 new messages </div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification">
                          <div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification">
                          <div class="notification-content"><i class="fa fa-upload bg-orange"></i>Server Rebooted</div>
                          <div class="notification-time"><small>4 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="#" class="dropdown-item"> 
                        <div class="notification">
                          <div class="notification-content"><i class="fa fa-twitter bg-blue"></i>You have 2 followers</div>
                          <div class="notification-time"><small>10 minutes ago</small></div>
                        </div></a></li>
                    <li><a rel="nofollow" href="AlertasPremium.php" class="dropdown-item all-notifications text-center"> <strong>Ver todas as notificações</strong></a></li>
                  </ul>
                </li>

                 <!-- Definiçoes   -->
                
                <li class="nav-item dropdown">
                  <a href="#insurance-head-section" class="nav-link" data-toggle="dropdown">Definições&ensp;<i class="fas fa-cog"></i></a>
                  <div class="dropdown-menu">
                    <a href="RegistoClientePremium.php" class="dropdown-item"><i class="fas fa-user"></i>Registar Cliente</a>
                    <a href="RegistoAnimalPremium.php" class="dropdown-item"><i class="fas fa-dog"></i>Registar Animal</a>
                    <a href="PerfilMédicoPremium.php" class="dropdown-item"><i class="fas fa-user-edit"></i>Editar Perfil</a>
                    <a href="" class="dropdown-item"><i class="fas fa-coins"></i>Atualizar para Premium</a>
                    <a href="#response" class="dropdown-item" data-toggle="modal" data-target="#response"><i class="fas fa-trash-alt"></i>Apagar Conta</a>
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
          <div class="sidebar-header d-flex align-items-center"><a href="PerfilMédicoPremium.php">
              <div class="avatar"><img src="../../../d19m59y37dris4.cloudfront.net/admin-premium/1-4-4/img/avatar-1.jpg" alt="..." class="img-fluid rounded-circle"></div></a>
             <div class="title">
              <h1 class="h4"><?php  echo $nome. ' ' .$apelidos ?></h1>
              
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading"></span>
          <ul class="list-unstyled">
                    <li class="active"><a href="#"> <i class="fas fa-home"></i>Início</a></li>
                    <li><a href="#tablesDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fas fa-user-friends"></i>Clientes </a>
                      <ul id="tablesDropdown" class="collapse list-unstyled ">
                        <li><a href="RegistoClientePremium.php">Registar Clientes</a></li>
                        <li><a href="ListaClientesPremium.php">Lista de Clientes</a></li>
                      </ul>
                    </li>
                    <li><a href="#chartsDropdown" aria-expanded="false" data-toggle="collapse"> <i class="fas fa-dog"></i>Animais</a>
                      <ul id="chartsDropdown" class="collapse list-unstyled ">
                        <li><a href="RegistoAnimalPremium.php">Registar Animal</a></li>
                        <li><a href="ListaAnimaisPremium.php">Lista de Animais</a></li>
                      </ul>
                    </li>
                     <li><a href="#chartsDropdown1" aria-expanded="false" data-toggle="collapse"> <i class="fas fa-user-md"></i>Serviços</a>
                      <ul id="chartsDropdown1" class="collapse list-unstyled ">
                        <li><a href="RegistoServicosPremium.php">Registar Serviço</a></li>
                        <li><a href="HistoricoServicosPremium.php">Histórico de Serviço</a></li>
                      </ul>
                    </li>
                    <li><a href="AgendaPremium.php">  <i class="fas fa-calendar-alt"></i> Agenda</a>
                  </nav>

                    
        </nav>
        <div class="content-inner">
          
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Histórico de Serviços</h2>
            </div>
          </header>
          <!-- Breadcrumb-->
          <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="inicioPremium.php">Início</a></li>
              <li class="breadcrumb-item active">Histórico de Serviços</li>
            </ul>
          </div>
          <!-- Forms Section-->
          <section>
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
    <!-- Bootstrap Select-->
    <script src="vendor/bootstrap-select/js/bootstrap-select.min.js"></script>
    <!-- Bootstrap Touchspin-->
    <script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <!-- Bootstrap No UI Slider-->
    <script src="vendor/nouislider/nouislider.min.js"></script>
    <!-- Bootstrap DatePicker-->
    <script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
    <!-- Bootstrap Tags Input-->
    <script src="vendor/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
    <!-- Jasny Bootstrap - Input Masks-->
    <script src="vendor/jasny-bootstrap/js/jasny-bootstrap.min.js"> </script>
    <!-- MultiSelect-->
    <script src="vendor/multiselect/js/jquery.multi-select.js"> </script>
    <!-- Forms init-->
    <script src="js/forms-advanced.js"></script>
    <!-- Main File-->
    <script src="js/front.js"></script>

    <!-- Data Tables-->
    <script src="vendor/datatables.net/js/jquery.dataTables.js"></script>
    <script src="vendor/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendor/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <script src="js/tables-datatable.js"></script>
  </body>


</html>