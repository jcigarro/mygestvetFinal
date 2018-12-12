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

			$numero_medico=$row['Numero_Medico'];
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
          $Data_nascimento=$row['Data_Nascimento'];          
          $nrcliente= $row['Numero_Animal'];
          $nrchip=$row['Numero_Chip'];
          $raca=$row['Raca'];
          $sexo=$row['Codigo_Sexo'];
          $alergias=$row['Alergias'];
          $especie1=$row['Codigo_Tipo_Animal'];


        }
      }


$localidade_query = "SELECT Codigo_Localidade,Descricao from localidade";

  $Localidade2 = $conn->query($localidade_query);



    $query2 = "SELECT linkimagem FROM utilizador WHERE utilizador.Numero_Medico=$numero";

  $result2 = $conn->query($query2);

    if ($result2->num_rows > 0) {
      while ($row1 = $result2->fetch_assoc()) {
        $foto_perfil4 = $row1['linkimagem'];
      } 
    } 



?>



<!DOCTYPE html>
<html>
  
<!-- Mirrored from demo.bootstrapious.com/admin-premium/1-4-4/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Nov 2018 10:50:20 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lista de Vacinações</title>
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
                <li class="nav-item"><a href="Login.php" class="nav-link logout"> <span class="d-none d-sm-inline">Terminar Sessão</span><i class="fas fa-sign-out-alt"></i></a></li>
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
              <div class="avatar"><img src="uploads/<?php echo $foto_perfil4;?>" width=120 height=120 alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h4"><?php  echo $nome. ' '.$apelidos ?> </h1>
              <a href="PerfilMedicoBasico.php">
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
              <h2 class="no-margin-bottom">Histórico de Vacinações</h2>
            </div>
          </header>
          <!-- Breadcrumb-->
          <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="inicioBasico.php">Início</a></li>
              <li class="breadcrumb-item active">Histórico de Vacinações</li>
            </ul>
          </div>

          <section>
           

          
            <div class="container-fluid">
              <div class="card">
                <div class="card-header">
                      <h3 class="h4">Histórico de Vacinações</h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                   <table id="datatable1" style="width: 100%;" class="table">

                            <thead>
                              <tr>
                                  <th>Numero de Vacina</th>
                                  <th>Animal</th>
                                  <th>Vacina</th>
                                  <th>Data</th>
                                 
                                  <th></th>
                                  
                              </tr>
                          </thead>

                          <tbody>
                              <?php 
                                  
                                  $sql4 = "SELECT vacinacao.Numero_Vacinacao, vacinacao.Nome as Nome_Vacina, vacinacao.Data, vacinacao.Lote, vacinacao.Validade, animal.Nome as Nome_Animal FROM animal,vacinacao, medico, cliente WHERE vacinacao.Numero_Animal=animal.Numero_Animal and animal.Numero_Cliente=cliente.Numero_Cliente and cliente.Numero_Medico=medico.Numero_Medico and medico.Email='$email'";
                                  $result4 = $conn->query($sql4);
                                  if ($result4->num_rows > 0) {
                                      // output data of each row
                                      while($row = $result4->fetch_assoc()) {
                                          $Numero_Vacinacao=$row['Numero_Vacinacao'];
                                          $Nome_Vacina = $row['Nome_Vacina'];
                                          $Data = $row['Data'];
                                          $Lote=$row['Lote'];
                                          $Validade = $row['Validade'];
                                          $Nome_Animal=$row['Nome_Animal'];
                                         
                                         
                                         
                                          
                                          
                                          
                                       


                                  ?>
                              <tr>
                                  <td>
                                      <?php echo $Numero_Vacinacao; ?>
                                  </td>
                                  <td>
                                      <?php echo $Nome_Animal; ?>
                                  </td>
                                  <td>
                                      <?php echo $Nome_Vacina; ?>
                                  </td>
                                   <td>
                                      <?php echo $Data; ?>
                                  </td>
                                   

                                   
                                  <td>
                                      <a href="#ver<?php echo $Numero_Vacinacao;?>" data-toggle="modal">
                                          <button type='button' class='btn btn-primary '><i class="fas fa-eye"></i></button>
                                      </a>
                                    
                                      
                                  </td>

                                  

                                  <div id="ver<?php echo $Numero_Vacinacao; ?>"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left"  role="dialog">

                                      <form method="post"  role="form">
                                          <div class="modal-dialog ">
                                              <!-- Modal content-->
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h4 id="exampleModalLabel" class="modal-title"><?php echo $Nome_Animal; ?></h4>
                                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                </div>

                                                  <div class="modal-body">
                                                  <div  method="POST">
                                                      <input type="hidden" name="edit_item_id" name="Numero_Vacinacao" id="Numero_Vacinacao" value="<?php echo $Numero_Vacinacao; ?>">
                                                      

                                                      <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                          <div class="form-group mb-4"> 
                                                            <label class=" form-control-label"><b>Numero de Vacinação:</b></label>
                                                              <?php echo $Numero_Vacinacao; ?> 
                                                          </div>
                                                        </div>
                                                      </div>

                                                      

                                                      <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                          <div class="form-group mb-4"> 
                                                            <label class=" form-control-label"><b>Nome da Vacina:</b></label>
                                                              <?php echo $Nome_Vacina; ?>
                                                          </div>
                                                        </div>
                                                      </div>

                                                      <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                          <div class="form-group mb-4"> 
                                                            <label class=" form-control-label"><b>Data:</b></label>
                                                              <?php echo $Data; ?>
                                                          </div>
                                                        </div>
                                                      </div>


                                                      <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                          <div class="form-group mb-4"> 
                                                            <label class=" form-control-label"><b>Lote:</b></label>
                                                              <?php echo $Lote; ?>
                                                          </div>
                                                        </div>
                                                      </div>

                                                      <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                          <div class="form-group mb-4"> 
                                                            <label class=" form-control-label"><b>Validade:</b></label>
                                                             <?php echo $Validade; ?>
                                                          </div>
                                                        </div>
                                                      </div>



                                                      </div>
                                                      
                                                  </div>
                                                  <div class="modal-footer">
                                                      
                                                      <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-secondary">
                                                        Cancelar</button>
                                                  </div>
                                              </div>
                                          </div>
                                      </form>
                                  </div>

                                             

                                  

                                 
                              </tr>

                              <?php
                                      }
                                   

                                      
                                      if(isset($_POST['delete'])){
                                          // sql to delete a record
                                          $delete_id = $_POST['delete_id'];
                                          $sql = "DELETE FROM vacinacao WHERE Numero_Vacinacao=$Numero_Vacinacao ";
                                          if ($conn->query($sql) === TRUE) {
                                              $sql = "DELETE FROM vacinacao WHERE Numero_Vacinacao=$Numero_Vacinacao ";
                                              if ($conn->query($sql) === TRUE) {
                                                  $sql = "DELETE FROM vacinacao WHERE Numero_Vacinacao=$Numero_Vacinacao";
                                                  echo '<script>window.location.href="ListaVacinacoesBasico.php"</script>';
                                              } else {
                                                  echo "Error deleting record: " . $conn->error;
                                              }
                                          } else {
                                              echo "Error deleting record: " . $conn->error;
                                          }
                                      }
                                  }

                             
                                  ?>
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

<!-- Mirrored from demo.bootstrapious.com/admin-premium/1-4-4/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Nov 2018 10:50:32 GMT -->
</html>