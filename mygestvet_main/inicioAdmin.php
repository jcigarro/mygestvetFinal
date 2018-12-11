<?php

 include("config.php");


if(!(isset($_SESSION['email_cod']) && $_SESSION['email_cod'] != "") || $_SESSION['tipo_conta'] != 3){
    header('Location: Login.php');
    }
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');



  $email = $_SESSION['email_cod'];
  $sql = "SELECT * from medico where Email = '$email';";

  //Eliminei a pesquisa da especialidade visto já não haver esse campo.


  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
      while($row = $result->fetch_assoc()) {
          $nome = $row['Primeiro_Nome'];
          $apelidos = $row['Apelidos'];
          $nif=$row['Nif_Faturacao'];
          $morada=$row['Morada'];
          $telefone=$row['Telefone'];
          $localidade=$row['Codigo_Localidade'];
          $codigoPostal=$row['Codigo_Postal'];
          $id_medico=$row['Numero_Medico'];
          
        //o nome do campo é Primeiro_Nome certo?sim
      }
    }



  $query2 = "SELECT count(*) AS counter FROM medico";

  $result2 = $conn->query($query2);

  if ($result2->num_rows > 0) {
    while ($row1 = $result2->fetch_assoc()) {
      $conex = $row1['counter'];
    }
  } else {
    $conex = 0;
  }


  $query3 = "SELECT count(*) AS counter FROM cliente";

  $result3 = $conn->query($query3);

  if ($result3->num_rows > 0) {
    while ($row2 = $result3->fetch_assoc()) {
      $conex1 = $row2['counter'];
    }
  } else {
    $conex1 = 0;
  }


    $query4 = "SELECT count(*) AS counter FROM animal";

    $result4 = $conn->query($query4);

    if ($result4->num_rows > 0) {
      while ($row3 = $result4->fetch_assoc()) {
        $conex2 = $row3['counter'];
      }
    } else {
      $conex2 = 0;
    }



    $query5 = "SELECT count(*) AS counter FROM servico";

    $result5 = $conn->query($query5);

    if ($result5->num_rows > 0) {
      while ($row4 = $result5->fetch_assoc()) {
        $conex3 = $row4['counter'];
      }
    } else {
      $conex3 = 0;
    }


    $query6 = "SELECT sexo, count(*) as quantidade FROM medico GROUP BY medico.Sexo";
    $result6 = $conn->query($query6); 
 

?>



<!DOCTYPE html>
<html>
  
<!-- Mirrored from demo.bootstrapious.com/admin-premium/1-4-4/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Nov 2018 10:50:20 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MyGestVet Admin</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
    <script type="text/javascript">  
     google.charts.load('current', {'packages':['corechart']});  
     google.charts.setOnLoadCallback(drawChart);  
     function drawChart()  
     {  
          var data = google.visualization.arrayToDataTable([  
                    ['Sexo', 'Quantidade'],  
                    <?php  
                    while($row = mysqli_fetch_array($result6))  
                    {  
                         echo "['".$row["sexo"]."', ".$row["quantidade"]."],";  
                    }  
                    ?>  
               ]);  
          var options = {  
                title: 'Percentagem de Médicos Femininos e Masculinos',  
                //is3D:true,  
                pieHole: 0.4  
               };  
          var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
          chart.draw(data, options);  
     }  
    </script>  
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="all,follow">

    <!-- Loader -->
    <link rel="stylesheet" href="css/loader.css">
    <script src="js/jquery-1.12.4.js"></script>
    <link rel="stylesheet" type="text/css" href="dashboard/vendor/font-awesome/css/font-awesome.min.css">


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    


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
                <!-- Navbar Brand --><a href="inicioAdmin.php" class="navbar-brand d-none d-sm-inline-block">
                  <a href="inicioAdmin.php" >
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
                    <a href="#response" class="dropdown-item" data-toggle="modal" data-target="#response"><i class="fas fa-id-card"></i>Sistema</a>
                    
                    
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
        <nav class="side-navbar ">
          <!-- Sidebar Header-->
          <div class="sidebar-header d-flex align-items-center"><a href="#">
              <div class="avatar"><img src="img/admin.jpg" alt="..." class="img-fluid rounded-circle"></div></a>
            <div class="title">
              <h1 class="h4">Administrador</h1>
              <p>Admin</p>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading"></span>
          <ul class="list-unstyled">
            <li class="active "><a href="#"><i class="fas fa-home"></i>Início</a>
            </li>
            <li><a href="#utilizador" > <i class="fas fa-user-md"></i>Utilizadores</a>
            </li>
            <li><a href="#estatisticas"> <i class="fas fa-chart-bar"></i>Estatísticas</a>
            
          </ul>
                    
        </nav>
        <div class="content-inner">
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Início</h2>
            </div>
          </header>

          <!-- Dashboard Counts Section-->
          <section id="inicio" class="dashboard-counts no-padding-bottom">
            <div class="container-fluid">
              <div class="row bg-white has-shadow">

                <!-- Item -->

                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                   <div class="icon bg-violet"><i class="fas fa-user-md"></i></div>
                    <div class="title"><span>Médicos<br>Registados</span>
                      <div class="progress">
                        <div role="progressbar" style="width: 100%; height: 4px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-violet"></div>
                      </div>
                    </div>
                    <div class="number"><strong><?php echo $conex-1; ?></strong></div>
                  </div>
                </div>

                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-red"><i class="fas fa-users"></i></div>
                    <div class="title"><span>Clientes<br>Registados</span>
                      <div class="progress">
                        <div role="progressbar" style="width: 100%; height: 4px;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-red"></div>
                      </div>
                    </div>
                    <div class="number"><strong><?php echo $conex1; ?></strong></div>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-green"><i class="fas fa-cat"></i></div>
                    <div class="title"><span>Animais<br>Registados</span>
                      <div class="progress">
                        <div role="progressbar" style="width: 100%; height: 4px;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-green"></div>
                      </div>
                    </div>
                    <div class="number"><strong><?php echo $conex2; ?></strong></div>
                  </div>
                </div>
                <!-- Item -->
                <div class="col-xl-3 col-sm-6">
                  <div class="item d-flex align-items-center">
                    <div class="icon bg-orange"><i class="fas fa-stethoscope"></i></div>
                    <div class="title"><span>Serviços<br>Realizados</span>
                      <div class="progress">
                        <div role="progressbar" style="width: 100%; height: 4px;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" class="progress-bar bg-orange"></div>
                      </div>
                    </div>
                    <div class="number"><strong><?php echo $conex3; ?></strong></div>
                  </div>
                </div>
                <!-- Item -->
              </div>
            </div>
          </section>
          <!--MODAL Sistema-->
          <div class="modal fade" id="response" tabindex="-1" role="dialog" aria-labelledby="definicoes" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="definicoes">Sistema</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  
                  <h4 class="card-title"><i class="fas fa-envelope"></i>&ensp;E-mail MyGestVet</h4>
                  <p class="card-text">mygestvet@gmail.com</p>

                </div> 
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                </div>
              </div>
            </div>
          </div>


          <section id="utilizador">
            <div class="container-fluid">
                <div class="card">
                  <div class="card-header">
                        <h3 class="h4">Lista de Utilizadores</h3>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="datatable1" style="width: 100%;" class="table">

                            <thead>
                              <tr>
                                  
                                  <th>Nome</th>
                                  <th>Email</th>
                                  <th></th>
                                  
                              </tr>
                          </thead>

                          <tbody>
                              <?php 
                                  
                                  $sql1 = "SELECT `Numero_Medico`,`Primeiro_Nome`,`Email`, `Morada`, `Codigo_Postal`,`Descricao` FROM medico, localidade WHERE medico.Codigo_Localidade=localidade.Codigo_Localidade and medico.Codigo_Tipo_Conta NOT IN (3) LIMIT 20 ";
                                  $result = $conn->query($sql1);
                                  if ($result->num_rows > 0) {
                                      // output data of each row
                                      while($row = $result->fetch_assoc()) {
                                          $Numero_Medico=$row['Numero_Medico'];
                                          $Nome = $row['Primeiro_Nome'];
                                          $Morada = $row['Morada'];
                                          $Email = $row['Email'];
                                          $Localidade = $row['Descricao'];
                                          $Codigo_Postal = $row['Codigo_Postal'];
                                       


                                  ?>
                              <tr>
                                  <td>
                                      <?php echo $Nome; ?>
                                  </td>
                                  <td>
                                      <?php echo $Email; ?>
                                  </td>

                                   
                                  <td>
                                      <a href="#ver<?php echo $Numero_Medico;?>" data-toggle="modal">
                                          <button type='button' class='btn btn-primary '><i class="fas fa-eye"></i></button>
                                      </a>
                                      <a href="#edit<?php echo $Numero_Medico;?>" data-toggle="modal">
                                          <button type='button' class='btn btn-secondary'><i class="fas fa-user-edit"></i></button>
                                      </a>
                                      <a href="#delete<?php echo $Numero_Medico;?>" data-toggle="modal">
                                          <button type='button' class='btn btn-primary '><i class="fas fa-user-times"></i></button>
                                      </a>
                                      
                                  </td>

                                  

                                  <div id="ver<?php echo $Numero_Medico; ?>"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left"  role="dialog">

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
                                                      <input type="hidden" name="edit_item_id" name="Numero_Medico" id="Numero_Medico" value="<?php echo $Numero_Medico; ?>">
                                                      

                                                      <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                          <div class="form-group mb-4"> 
                                                            <label class=" form-control-label">Nome:</label>
                                                              <?php echo $Nome; ?> 
                                                          </div>
                                                        </div>
                                                      </div>

                                                      

                                                      <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                          <div class="form-group mb-4"> 
                                                            <label class=" form-control-label">Email:</label>
                                                              <?php echo $Email; ?>
                                                          </div>
                                                        </div>
                                                      </div>

                                                      <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                          <div class="form-group mb-4"> 
                                                            <label class=" form-control-label">Morada:</label>
                                                              <?php echo $Morada; ?>
                                                          </div>
                                                        </div>
                                                      </div>


                                                      <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                          <div class="form-group mb-4"> 
                                                            <label class=" form-control-label">Localidade:</label>
                                                              <?php echo $Localidade; ?>
                                                          </div>
                                                        </div>
                                                      </div>

                                                      <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                          <div class="form-group mb-4"> 
                                                            <label class=" form-control-label">Código-Postal:</label>
                                                             <?php echo $Codigo_Postal; ?>
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

                                             

                                  <!--Edit Item Modal -->
                                  <div id="edit<?php echo $Numero_Medico; ?>"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left"  role="dialog">

                                      <form method="post"  role="form">
                                          <div class="modal-dialog ">
                                              <!-- Modal content-->
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <h4 id="exampleModalLabel" class="modal-title">Editar</h4>
                                                  <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                                                </div>

                                                  <div class="modal-body">
                                                  <div  method="POST">
                                                      <input type="hidden" name="edit_item_id" name="Numero_Medico" id="Numero_Medico" value="<?php echo $Numero_Medico; ?>">
                                                      

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
                                                            <label class=" form-control-label">Email:</label>
                                                              <input type="text" class="form-control" id="Email" name="Email" value="<?php echo $Email; ?>" placeholder="Email" required autofocus> 
                                                          </div>
                                                        </div>
                                                      </div>

                                                      <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                          <div class="form-group mb-4"> 
                                                            <label class=" form-control-label">Morada:</label>
                                                              <input type="text" class="form-control" id="Morada" name="Morada" value="<?php echo $Morada; ?>" placeholder="Morada" required autofocus> 
                                                          </div>
                                                        </div>
                                                      </div>


                                                      <div class="row">
                                                        <div class="col-sm-6 col-md-6">
                                                          <div class="form-group mb-4"> 
                                                            <label class=" form-control-label">Localidade:</label>
                                                              <input type="text" class="form-control" id="Localidade" name="Localidade" value="<?php echo $Localidade; ?>" placeholder="Localidade" required autofocus> 
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

                                  <!--Delete Modal -->
                                  <div id="delete<?php echo $Numero_Medico; ?>" class="modal fade" role="dialog">
                                      <div class="modal-dialog">
                                          <form method="post">
                                              <!-- Modal content-->
                                              <div class="modal-content">
                                                  <div class="modal-header">
                                                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                      <h4 class="modal-title"></h4>
                                                  </div>
                                                  <div class="modal-body">
                                                      <input type="hidden" name="delete_id" value="<?php echo $Numero_Medico; ?>">
                                                      <div class="alert alert-danger">Tem a certeza que pretende eliminar o médico <strong> <?php echo $Nome; ?>? </strong>
                                                      </div>
                                                      <div class="modal-footer">
                                                          <button type="submit" name="delete" class="btn btn-primary"><span class="glyphicon glyphicon-trash"></span> Sim </button>
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal"><span class="glyphicon glyphicon-remove-circle"></span> Cancelar </button>
                                                      </div>
                                                  </div>
                                              </div>
                                          </form>
                                      </div>
                                  </div>
                              </tr>

                              <?php
                                      }
                                   

                                      //Update Items
                                      if(isset($_POST['update_item'])){
                                          $edit_item_id = $_POST['edit_item_id'];
                                          $Nome_update = $_POST['Nome'];
                                          $Morada_update = $_POST['Morada'];
                                          $Telefone_update = $_POST['Telefone'];
                                          $Email_update = $_POST['Email'];
                                          $Localidade_update = $_POST['Descricao'];
                                          
                                          $Codigo_Postal_update = $_POST['Codigo_Postal'];
                                          
                                          
                                          
                                          $sql = "UPDATE medico SET 
                                              Nome='$Nome_update',
                                              Morada='$Morada_update',
                                              Telefone=$Telefone_update,
                                              Email='$Email_update',
                                              Descricao='$Descricao_update',
                                             
                                              Codigo_Postal='$Codigo_Postal_update'
                                             

                                              WHERE Numero_Medico=$edit_item_id ";
                                          if ($conn->query($sql) === TRUE) {
                                              echo '<script>window.location.href="ListaClientesBasico.php"</script>';
                                          } else {
                                              echo "Error updating record: " . $conn->error;
                                          }
                                      }

                                      if(isset($_POST['delete'])){
                                          // sql to delete a record
                                          $delete_id = $_POST['delete_id'];
                                          $sql = "DELETE FROM medico WHERE Numero_Medico=$Numero_Medico ";
                                          if ($conn->query($sql) === TRUE) {
                                              $sql = "DELETE FROM medico WHERE Numero_Medico=$Numero_Medico ";
                                              if ($conn->query($sql) === TRUE) {
                                                  $sql = "DELETE FROM medico WHERE Numero_Medico=$Numero_Medico";
                                                  echo '<script>window.location.href="ListaClientesBasico.php"</script>';
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

          <!-- Pie Chart -->
          <section id="estatisticas">
            <div class="container-fluid">
                <div class="pie-chart-example card">
                  <div class="card-header d-flex align-items-center">
                    <h3 class="h4">Género Utilizadores</h3>
                  </div>
                  <div class="card-body">
                  <center>
                    <div id="piechart" style="width: 800px; height: 400px;"></div>
                  </center>
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

    <!-- Data Tables-->
    <script src="vendor/datatables.net/js/jquery.dataTables.js"></script>
    <script src="vendor/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendor/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <script src="js/tables-datatable.js"></script>
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="js/charts-custom.js"></script>

    <!-- Main File-->
    <script src="js/front.js"></script>
    

    


  </body>


</html>