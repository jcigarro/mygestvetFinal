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
          $apelidos=$row['Apelidos'];
          $Numero_Medico=$row['Numero_Medico'];

          //o nome do campo é Primeiro_Nome certo?sim

        }
      }

    $query3 = "SELECT medico.Numero_Medico, count(*) as quantidade_clientes from medico,cliente where medico.Numero_Medico=cliente.Numero_Medico and medico.Numero_Medico=$Numero_Medico group by medico.Numero_Medico";

        $result3 = $conn->query($query3);

        if ($result3->num_rows > 0) {
          while ($row2 = $result3->fetch_assoc()) {
            $conex1 = $row2['quantidade_clientes'];
          }
        } else {
          $conex1 = 0;
        }



    $query4 = "SELECT medico.Numero_Medico, count(*) as quantidade_animais from medico,cliente,animal where cliente.Numero_Cliente=animal.Numero_Cliente and cliente.Numero_Medico=medico.Numero_Medico and medico.Numero_Medico=$Numero_Medico group by medico.Numero_Medico";

        $result4 = $conn->query($query4);

        if ($result4->num_rows > 0) {
          while ($row3 = $result4->fetch_assoc()) {
            $conex2 = $row3['quantidade_animais'];
          }
        } else {
          $conex2 = 0;
        }

    $query5 = "SELECT medico.Numero_Medico, COUNT(*) as quantidade_servicos FROM exame_clinico, animal, cliente, medico, servico WHERE cliente.Numero_Medico=medico.Numero_Medico AND animal.Numero_Cliente=cliente.Numero_Cliente AND exame_clinico.Numero_Animal=animal.Numero_Animal AND exame_clinico.Codigo_Exame_Clinico=servico.Codigo_Exame_Clinico AND medico.Numero_Medico=$Numero_Medico GROUP BY medico.Numero_Medico";

    

        $result5 = $conn->query($query5);

        if ($result5->num_rows > 0) {
          while ($row4 = $result5->fetch_assoc()) {
            $conex3 = $row4['quantidade_servicos'];
          }
        } else {
          $conex3 = 0;
        }

         $query2 = "SELECT linkimagem FROM utilizador WHERE utilizador.Numero_Medico=$Numero_Medico";

        $result2 = $conn->query($query2);

       if ($result2->num_rows > 0) {
          while ($row1 = $result2->fetch_assoc()) {
            $foto_perfil = $row1['linkimagem'];
          }
       } else {
        $foto_perfil = "perso1.jpg";
       }

      $query6 = "SELECT medico.Numero_Medico, COUNT(*) as quantidade_receitas FROM receita, servico, exame_clinico,animal, cliente, medico WHERE receita.Codigo_Servico=servico.Codigo_Servico and servico.Codigo_Exame_Clinico=exame_clinico.Codigo_Exame_Clinico and exame_clinico.Numero_Animal=animal.Numero_Animal and animal.Numero_Cliente=cliente.Numero_Cliente and cliente.Numero_Medico=medico.Numero_Medico and medico.Numero_Medico=$Numero_Medico group by medico.Numero_Medico";

      $result6 = $conn->query($query6);

        if ($result6->num_rows > 0) {
          while ($row5 = $result6->fetch_assoc()) {
            $conex4 = $row5['quantidade_receitas'];
          }
        } else {
          $conex4 = 0;
        }


?>


<!DOCTYPE html>
<html>

<!-- Mirrored from demo.bootstrapious.com/admin-premium/1-4-4/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Nov 2018 10:50:20 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MyGestVet</title>
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
    <!-- Bootstrap Datepicker CSS-->
    <link rel="stylesheet" href="vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css">
    <!-- DataTables CSS-->
    <link rel="stylesheet" href="vendor/datatables.net-bs4/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="vendor/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">
    
    
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
          <!-- Search Box-->
          <div class="search-box">
            <button class="dismiss"><i class="icon-close"></i></button>
            <form id="searchForm" action="#" role="search">
              <input type="search" placeholder="Procurar..." class="form-control">
            </form>
          </div>
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
                    <a href="PerfilMédicoBásico.php" class="dropdown-item"><i class="fas fa-user-edit"></i>Editar Perfil</a>
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
              <div class="avatar"><img src="uploads/<?php echo $foto_perfil;?>" width=120 height=120 alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h4"><?php  echo $nome. ' '.$apelidos ?> </h1>
              <a href="PerfilMédicoBásico.php">
              <p>Editar Perfil</p>
              </a>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading"></span>
          <ul class="list-unstyled">
                    <li class="active"><a href="#"> <i class="fas fa-home"></i>Início</a></li>
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
              <h2 class="no-margin-bottom">Início</h2>
            </div>
          </header>
          <!-- Dashboard Counts Section-->
          </section>
          
            <section class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
              <div class="row bg-white has-shadow">
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-violet"><i class="fas fa-users"></i></div>
                    <div class="title"><span>Clientes<br>Registados</span>
                      <div class="progress">
                        <div role="progressbar" style="width: 100%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                      </div>
                    </div>
                   <div class="number"><strong><?php echo $conex1; ?></strong></div>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-red"><i class="fas fa-cat"></i></div>
                    <div class="title"><span>Animais<br>Registados</span>
                      <div class="progress">
                        <div role="progressbar" style="width: 100%; height: 4px;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                      </div>
                    </div>
                    <div class="number"><strong><?php echo $conex2; ?></strong></div>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-green"><i class="fas fa-stethoscope"></i></div>
                    <div class="title"><span>Serviços<br>Realizados</span>
                      <div class="progress">
                        <div role="progressbar" style="width: 100%; height: 4px;" height: 4px; aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
                      </div>
                    </div>
                    <div class="number"><strong><?php echo $conex3; ?></strong></div>
                  </div>
                </div>
                 <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-orange"><i class="fas fa-file-prescription"></i></div>
                    <div class="title"><span>Receitas<br>Criadas</span>
                      <div class="progress">
                        <div role="progressbar" style="width: 100%; height: 4px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>
                      </div>
                    </div>
                    <div class="number"><strong><?php echo $conex4; ?></strong></div>
                  </div>
                </div>
              </div>
            </div>
            </section>

            
			<section>
            <div class="container-fluid">
              <div class="card">
                <div class="card-header">
                      <h3 class="h4">Histórico de Serviços</h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="datatable1" style="width: 100%;" class="table">

                          <thead>
                              <tr>

                                  <th>Animal</th>
                                  <th>Data</th>
                                  <th>Cliente</th>


                              </tr>
                          </thead>

                          <tbody>
                              <?php
                                  $servico = "SELECT animal.Nome as NomeA, servico.Data,cliente.Nome as NomeC from servico, exame_clinico,cliente,animal,medico WHERE servico.Codigo_Exame_Clinico=exame_clinico.Codigo_Exame_Clinico and exame_clinico.Numero_Animal=animal.Numero_Animal and animal.Numero_Cliente=cliente.Numero_Cliente and cliente.Numero_Medico=medico.Numero_Medico AND medico.Email='$email' group by servico.Codigo_Servico DESC ";

                                  $result9 = $conn->query($servico);
                                  if ($result9->num_rows > 0) {
                                      // output data of each row
                                      while($row = $result9->fetch_assoc()) {
                                          $NomeA=$row['NomeA'];
                                          $Data=$row['Data'];
                                          $NomeC=$row['NomeC'];
                                          
                                    

                              ?>

                            <tr>
                                  <td>
                                      <?php echo $NomeA; ?>
                                  </td>
                                  <td>
                                      <?php echo $Data; ?>
                                  </td>
                                  <td>
                                      <?php echo $NomeC; ?>
                                  </td>
                            </tr>


                          
						  <?php    }
                                  } ?>
                    </tbody>
            </table>

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

  </body>

</html>
