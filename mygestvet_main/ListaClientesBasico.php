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
    
    $id_medico=$row['Numero_Medico'];

    $sql5 = "SELECT * from cliente where Numero_Medico = $id_medico;";
    $result5 = $conn->query($sql5);
    if ($result5->num_rows > 0) {

  // output data of each row
    while($row = $result5->fetch_assoc()) {
       $nome_cliente = $row['Nome'];
      $sexo = $row['Sexo'];
      $telefone= $row['Telefone'];
      $email=$row['Email'];
      $nif=$row['Nif'];
      $morada=$row['Morada'];
      $localidade=$row['Codigo_Localidade'];
      $codigoPostal=$row['Codigo_Postal'];
      

    }
  }
   
   

    $sql2 = "SELECT * from localidade where Codigo_Localidade = $localidade;";

    $result2 = $conn->query($sql2);
    if ($result2->num_rows > 0) {
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
            echo $msg;
          }else{
            $msg = "Failed to upload image";
            echo $msg;
            }
          } 


    

        $query9 = "SELECT linkimagem FROM utilizador WHERE utilizador.Numero_Medico=$id_medico";

        $result2 = $conn->query($query9);

       if ($result2) {
          while ($row1 = $result2->fetch_assoc()) {
            $foto_perfil4 = $row1['linkimagem'];
          } 
       } else {
        $foto_perfil4 = "perso1.jpg";
       }
       
          
 
   

         

?>


<!DOCTYPE html>
<html lang="pt-br">
  
<!-- Mirrored from demo.bootstrapious.com/admin-premium/1-4-4/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Nov 2018 10:50:20 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lista de Clientes</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">
    
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <meta charset="utf-8">
    
   
    
    
    <!-- Loader -->
    <link rel="stylesheet" href="css/loader.css">
    <script src="js/jquery-1.12.4.js"></script>
    <link rel="stylesheet" type="text/css" href="dashboard/vendor/font-awesome/css/font-awesome.min.css">
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

    
 
    <link rel="icon" sizes="76x76" href="img/logo2-pequeno.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/logo2-pequeno.png">

    <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">


  </head>
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
              <h2 class="no-margin-bottom">Lista de Clientes</h2>
            </div>
          </header>
          <!-- Breadcrumb-->
          <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="inicioBasico.php">Início</a></li>
              <li class="breadcrumb-item active">Lista de Clientes</li>
            </ul>
          </div>

          <section>
           
            <div class="container-fluid">
              <div class="card">
                <div class="card-header">
                      <h3 class="h4">Lista de Clientes</h3>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="datatable1" style="width: 100%;" class="table">
                      
                          <thead>
                              <tr>
                                  <th>Numero de Cliente</th>
                                  <th>Nome</th>
                                  <th>Email</th>
                                  <th>Animais Associados</th>
                                  <th></th>
                                  
                              </tr>
                          </thead>
                         
                          <tbody>
                              <?php 
                                  $sql = "SELECT cliente.Numero_Cliente, cliente.Nome, cliente.Telefone, cliente.Email, cliente.Morada, cliente.Pais, cliente.Codigo_Postal,localidade.Codigo_Localidade, localidade.Descricao AS Localidade FROM cliente, localidade WHERE cliente.Codigo_Localidade=localidade.Codigo_Localidade AND Numero_Medico=$id_medico";
                                  $result = $conn->query($sql);
                                  if ($result->num_rows > 0) {
                                      // output data of each row
                                      while($row = $result->fetch_assoc()) {
                                          $Numero_Cliente=$row['Numero_Cliente'];
                                          $Nome = $row['Nome'];
                                          $Morada = $row['Morada'];
                                          $Telefone = $row['Telefone'];
                                          $Email = $row['Email'];
                                          
                                          $Localidade_Cod = $row['Codigo_Localidade'];
                                          $Codigo_Postal = $row['Codigo_Postal'];
                                          $Pais = $row['Pais'];


                                          $sql2 = "SELECT * from localidade where Codigo_Localidade = $Localidade_Cod;";

                                          $result2 = $conn->query($sql2);
                                          if ($result2->num_rows > 0) {
                                              while($row = $result2->fetch_assoc()) {
                                              
                                              $descricao_localidade=$row['Descricao'];
                                          }}


                       $exame6 = "SELECT cliente.Numero_Cliente, count(*) as quantidade from animal, cliente where cliente.Numero_Cliente=animal.Numero_Cliente and cliente.Numero_Cliente=$Numero_Cliente  GROUP BY cliente.Numero_Cliente";
                        
                        $result113 = $conn->query($exame6);
                        if ($result113->num_rows > 0) {
                          // output data of each row
                          while($row1 = $result113->fetch_assoc()) {
                              $quantidade=$row1['quantidade'];
                          }
                        }


                                          
                                         
                                  ?>
                              <tr>
                                  <td>
                                      <?php echo $Numero_Cliente; ?>
                                  </td>
                                  <td>
                                      <?php echo $Nome; ?>
                                  </td>
                                  <td>
                                      <?php echo $Email; ?>
                                  </td>
                                   <td>
                                      <?php echo $quantidade; ?>
                                  </td>

                                   
                                  <td>
                                      <a href="#ver<?php echo $Numero_Cliente;?>" data-toggle="modal">
                                          <button type='button' class='btn btn-primary '><i class="fas fa-eye"></i></button>
                                      </a>
                                      <a href="#edit<?php echo $Numero_Cliente;?>" data-toggle="modal">
                                          <button type='button' class='btn btn-secondary'><i class="fas fa-user-edit"></i></button>
                                      </a>
                                      
                                      
                                  </td>
                               
                                  <div id="ver<?php echo $Numero_Cliente; ?>"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left"  role="dialog">

                                      <form method="post"  role="form">
                                          <div class="modal-dialog ">
                                              <!-- Modal content-->
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h4 id="exampleModalLabel" class="modal-title"><?php echo $Nome; ?></h4>
                                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                </div>

                                                  <div class="modal-body">
                                                  <div  method="POST">
                                                      <input type="hidden" name="edit_item_id" name="Numero_Cliente" id="Numero_Cliente" value="<?php echo $Numero_Cliente; ?>">
                                                      

                                                      <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                          <div class="form-group mb-4"> 
                                                            <label class=" form-control-label"><b>Nome:</b></label>
                                                              <?php echo $Nome; ?> 
                                                          </div>
                                                        </div>
                                                      </div>

                                                      <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                          <div class="form-group mb-4"> 
                                                            <label class=" form-control-label"><b>Telefone:</b></label>
                                                              <?php echo $Telefone; ?>
                                                          </div>
                                                        </div>
                                                      </div>


                                                      <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                          <div class="form-group mb-4"> 
                                                            <label class=" form-control-label"><b>Email:</b></label>
                                                              <?php echo $Email; ?>
                                                          </div>
                                                        </div>
                                                      </div>

                                                      <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                          <div class="form-group mb-4"> 
                                                            <label class=" form-control-label"><b>Morada:</b></label>
                                                              <?php echo $Morada; ?>
                                                          </div>
                                                        </div>
                                                      </div>

                                                     <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                          <div class="form-group mb-4"> 
                                                            <label class=" form-control-label"><b>Localidade:</b></label>
                                                              <?php echo $descricao_localidade; ?>
                                                          </div>
                                                        </div>
                                                      </div>
                                                          
                                                    </div>  
                                                      <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                          <div class="form-group mb-4"> 
                                                            <label class=" form-control-label"><b>Código-Postal:</b></label>
                                                             <?php echo $Codigo_Postal; ?>
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
                                  
                                  <!--Edit Item Modal -->
                                  <div id="edit<?php echo $Numero_Cliente; ?>"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left"  role="dialog">

                                      <form method="post" action="EditaCliente.php"  role="form">
                                          <div class="modal-dialog ">
                                              <!-- Modal content-->
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h4 id="exampleModalLabel" class="modal-title">Editar</h4>
                                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                </div>

                                                  <div class="modal-body">
                                                  <div  method="POST">
                                                      <input type="hidden" name="Numero_Cliente" id="Numero_Cliente" value="<?php echo $Numero_Cliente; ?>">
                                                      

                                                      <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                          <div class="form-group mb-4"> 
                                                            <label class=" form-control-label">Nome:</label>
                                                              <input type="text" class="form-control" id="Nome" name="Nome" value="<?php echo $Nome; ?>" placeholder="Nome" required autofocus> 
                                                          </div>
                                                        </div>
                                                      </div>

                                                      <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                          <div class="form-group mb-4"> 
                                                            <label class=" form-control-label">Telefone:</label>
                                                              <input type="int" class="form-control" id="Telefone" name="Telefone" value="<?php echo $Telefone; ?>" placeholder="Telefone" required autofocus> 
                                                          </div>
                                                        </div>
                                                      </div>


                                                      <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                          <div class="form-group mb-4"> 
                                                            <label class=" form-control-label">Email:</label>
                                                              <input type="text" class="form-control" id="Email" name="Email" value="<?php echo $Email; ?>" placeholder="Email" required autofocus> 
                                                          </div>
                                                        </div>
                                                      </div>
                            
                                                       <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                          <div class="form-group mb-4"> 
                                                            <label class=" form-control-label">Morada:</label>
                                                              <input type="text" class="form-control" id="Morada" name="Morada" value="<?php echo $Morada; ?>" placeholder="Email" required autofocus> 
                                                          </div>
                                                        </div>
                                                      </div>


                                                      <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                          <div class="form-group mb-4">
                                                            <label class=" form-control-label">Localidade</label>
                                                          
                                                              <select id="Codigo_Localidade1" name="Codigo_Localidade1" class="form-control mb-3">
                                                             
                                                                 <option value= ""> <?php  echo $descricao_localidade; ?></option>
                                                                <?php
                                                                $sql1 = "SELECT * from localidade ORDER BY Descricao ASC ";
   
                                                                $localidade = $conn->query($sql1);

                                                                while ($row6 = mysqli_fetch_array($localidade)):;?>   
                                                                                  
                                                                <option value= "<?php  echo $row6[0]; ?>"> <?php  echo $row6[2]; ?></option>
                                                                <?php endwhile;?>
                                                            </select>
                                                          </div>
                                                        </div>
                                                      </div>
                                                       
                                                      <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                          <div class="form-group mb-4"> 
                                                            <label class=" form-control-label">Código-Postal:</label>
                                                              <input type="text" class="form-control" id="Codigo_Postal" name="Codigo_Postal" value="<?php echo $Codigo_Postal; ?>" placeholder="Codigo_Postal" required autofocus>  
                                                          </div>
                                                        </div>
                                                      </div>

                                                  </div>
                                                  <div class="modal-footer">
                                                      <button type="submit" class="btn btn-primary" name="update_item"><span class="glyphicon glyphicon-edit"></span> Editar</button>
                                                      <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-secondary">
                                                        Cancelar</button>
                                                  </div>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                                  
                              <?php
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