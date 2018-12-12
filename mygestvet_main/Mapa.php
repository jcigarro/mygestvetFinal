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

          $Numero_Medico=$row['Numero_Medico'];

          //o nome do campo é Primeiro_Nome certo?sim

        }
      }

      $query2 = "SELECT linkimagem FROM utilizador WHERE utilizador.Numero_Medico=$Numero_Medico";

        $result2 = $conn->query($query2);

       if ($result2->num_rows > 0) {
          while ($row1 = $result2->fetch_assoc()) {
            $foto_perfil10 = $row1['linkimagem'];
          } 
       } 


     

?>


<!DOCTYPE html>
<html>
   
<!-- Mirrored from demo.bootstrapious.com/admin-premium/1-4-4/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Nov 2018 10:50:20 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MyGestVet Premium</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Mapa</title>
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
    <!-- DataTables CSS-->
    <link rel="stylesheet" href="vendor/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="vendor/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.premium.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
 
    <!-- Full Calendar-->
    <link rel="stylesheet" href="vendor/fullcalendar/fullcalendar.min.css">
 
    <!-- Bootstrap Datepicker CSS-->
    <link rel="stylesheet" href="vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css">
 
     
  
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
                    <a href="PerfilMedicoPremium.php" class="dropdown-item"><i class="fas fa-user-edit"></i>Editar Perfil</a>
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
          <div class="sidebar-header d-flex align-items-center"><a href="PerfilMedicoPremium.php">
              <div class="avatar"><img src="uploads/<?php echo $foto_perfil10;?>" alt="..." class="img-fluid rounded-circle"></div></a>
            <div class="title">
              <h1 class="h4"><?php  echo $nome. ' ' .$apelidos ?></h1>
              <a href="PerfilMedicoPremium.php">
              <p>Editar Perfil</p>
              </a>
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
              <h2 class="no-margin-bottom">Mapa</h2>
            </div>
          </header>
          <!-- Breadcrumb-->
          <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="inicioPremium.php">Início</a></li>
              <li class="breadcrumb-item active">Mapa</li>
            </ul>
          </div>
          <!-- Forms Section-->
          <section>
          <!--MODAL Apagar Conta-->
          <div class="modal fade" id="response" tabindex="-1" role="dialog" aria-labelledby="definicoes" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="definicoes">Eliminar Conta</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                        
                  <div class="alert alert-danger">Tem a certeza que pretende eliminar a conta?</div>
                </div> 
                <div class="modal-footer">
                  <form method="post">
                    <button type="submit" formaction="EliminaMedico.php" class="btn btn-primary" data-dismiss="modal">Eliminar</button>
                  </form>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
              </div>
            </div>
          </div>
          
            <div class="container-fluid">
              <div class="card">
                <div class="card-header">
                  <h4>Google Maps </h4>
                </div>
                <div class="card-body">
                  <div id="map-3" style="height: 400px;" class="map">
                  </div>
                </div>
              </div>
            </div>

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

    <!-- Full Calendar-->
    <script src="vendor/moment/min/moment.min.js">   </script>
    <script src="vendor/fullcalendar/fullcalendar.min.js">  </script>
    <script src="vendor/fullcalendar/gcal.min.js">   </script>
    <script src="js/components-calendar.js"></script>

    <!-- Google Maps-->
    <!-- Create your own Maps API Key for production use, this one is domain-restricted-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"> </script>
    <!-- Google maps infobox-->
    <script src="vendor/google-maps-infobox/infobox-lib.js">  </script>
    <!-- Google map creation-->
    <script src="js/components-map.js"> </script>
    <!-- Basic Google map init + 1 marker-->

    <script>
      $(function () {
          // coordinates for the center of the map and the marker
          var lat = 40.732346;
          var long = -74.0014247;
          // if using with other than default style, change the path to the colour variant 
          // of the marker. E.g. to img/map-marker-violet.png.
          var markerImage = 'img/map-marker-default.png';
          // id of the map DOM element
          var id = 'map-3';
      
          var alternateColourHref = $('link#new-stylesheet').attr('href');
          if (!alternateColourHref) {
              markerImage = 'img/map-marker-default.png';
          }
          else if (alternateColourHref.indexOf("default") != -1) {
              markerImage = 'img/map-marker-default.png';
          }
          else if (alternateColourHref.indexOf("red") != -1) {
              markerImage = 'img/map-marker-red.png';
          }
          else if (alternateColourHref.indexOf("blue") != -1) {
              markerImage = 'img/map-marker-blue.png';
          }
          else if (alternateColourHref.indexOf("pink") != -1) {
              markerImage = 'img/map-marker-pink.png';
          }
          else if (alternateColourHref.indexOf("violet") != -1) {
              markerImage = 'img/map-marker-violet.png';
          }
          else if (alternateColourHref.indexOf("sea") != -1) {
              markerImage = 'img/map-marker-sea.png';
          }    
      
          map = createBasicMap(id, lat, long, markerImage);
      });      
      
    </script>

    <!-- Styled Google map init + 1 marker-->
    <script>
      $(function () {
          // coordinates for the center of the map and the marker
          var lat = 40.732346;
          var long = -74.0014247;
          // if using with other than default style, change the path to the colour variant 
          // of the marker. E.g. to img/map-marker-violet.png.
          var markerImage = 'img/map-marker-default.png';
          // id of the map DOM element
          var id = 'map-1';
      
          var alternateColourHref = $('link#new-stylesheet').attr('href');
          if (!alternateColourHref) {
              markerImage = 'img/map-marker-default.png';
          }
          else if (alternateColourHref.indexOf("default") != -1) {
              markerImage = 'img/map-marker-default.png';
          }
          else if (alternateColourHref.indexOf("red") != -1) {
              markerImage = 'img/map-marker-red.png';
          }
          else if (alternateColourHref.indexOf("blue") != -1) {
              markerImage = 'img/map-marker-blue.png';
          }
          else if (alternateColourHref.indexOf("pink") != -1) {
              markerImage = 'img/map-marker-pink.png';
          }
          else if (alternateColourHref.indexOf("violet") != -1) {
              markerImage = 'img/map-marker-violet.png';
          }
          else if (alternateColourHref.indexOf("sea") != -1) {
              markerImage = 'img/map-marker-sea.png';
          }                
      
          map = createSimpleMap(id, lat, long, markerImage);
      });      
      
    </script>

    <!--  Styled Google map init + multiple markers + infobox-->
    <script>
      $(function () {
          // coordinates for the center of the map
          var lat = 40.732346;
          var long = -74.0014247;
          // json file path with the markers to display on the map
          var jsonFile = 'data/addresses.json';
          // if using with other than default style, change the path to the colour variant 
          // of the marker. E.g. to img/map-marker-violet.png.                
          var markerImage = 'img/map-marker-default.png';
          // id of the map DOM element
          var id = 'map-2';
      
          var alternateColourHref = $('link#new-stylesheet').attr('href');
          if (!alternateColourHref) {
              markerImage = 'img/map-marker-default.png';
          }
          else if (alternateColourHref.indexOf("default") != -1) {
              markerImage = 'img/map-marker-default.png';
          }
          else if (alternateColourHref.indexOf("red") != -1) {
              markerImage = 'img/map-marker-red.png';
          }
          else if (alternateColourHref.indexOf("blue") != -1) {
              markerImage = 'img/map-marker-blue.png';
          }
          else if (alternateColourHref.indexOf("pink") != -1) {
              markerImage = 'img/map-marker-pink.png';
          }
          else if (alternateColourHref.indexOf("violet") != -1) {
              markerImage = 'img/map-marker-violet.png';
          }
          else if (alternateColourHref.indexOf("sea") != -1) {
              markerImage = 'img/map-marker-sea.png';
          }                
      
          $.getJSON(jsonFile).done(function (json) {
              map = createAdvancedMap(id, lat, long, json, markerImage);
          })
          .fail(function (jqxhr, textStatus, error) {
              console.log(error);
          });
      });   
      
    </script>
  </body>
</html>