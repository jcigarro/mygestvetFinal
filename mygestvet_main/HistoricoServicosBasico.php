<?php
include("config.php");
//include_once "config_exemploassinatura.php";


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
$morada_med=$row['Morada'];
$telefone_med=$row['Telefone'];
$localidade_med=$row['Codigo_Localidade'];
$sql2 = "SELECT * from localidade where Codigo_Localidade = $localidade_med;";

$result2 = $conn->query($sql2);
if ($result2->num_rows > 0) {
// output data of each row
while($row = $result2->fetch_assoc()) {
	$descricao_localidade=$row['Descricao'];
}
}



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
    <title>Histórico de Serviços</title>
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

  <link rel="stylesheet" href="assets/signature/css/signature-pad.css">
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
      <h2 class="no-margin-bottom">Histórico de Serviços</h2>
    </div>
  </header>
  <!-- Breadcrumb-->
  <div class="breadcrumb-holder container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="inicioBasico.php">Início</a></li>
      <li class="breadcrumb-item active">Histórico de Serviços</li>
    </ul>
  </div>
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
                  
                  <tr>
                    
                    <th>Número de Serviço</th>
                    <th>Data</th>
                    <th>Cliente</th>
                    <th>Animal</th>
                   
                    <th> </th>
                    
                  </tr>
                  
                </tr>
              </thead>
              
              <tbody>
                <?php
              
                $servico = "SELECT servico.Tratamento,servico.Data, servico.Codigo_Servico,cliente.Nome, exame_clinico.Numero_Animal, servico.Anamenese, servico.Historia_Clinica from servico, exame_clinico,cliente,animal,medico WHERE servico.Codigo_Exame_Clinico=exame_clinico.Codigo_Exame_Clinico and exame_clinico.Numero_Animal=animal.Numero_Animal and animal.Numero_Cliente=cliente.Numero_Cliente and cliente.Numero_Medico=medico.Numero_Medico AND medico.Email='$email' group by servico.Codigo_Servico DESC";


                
                $result9 = $conn->query($servico);
                if ($result9->num_rows > 0) {
                // output data of each row
                while($row = $result9->fetch_assoc()) {
                $Tratamento=$row['Tratamento'];
                $Nome_Cliente=$row['Nome'];
                $Data=$row['Data'];
                $Codigo_Servico=$row['Codigo_Servico'];
                $Numero_Animal=$row['Numero_Animal'];
                $Anamenese=$row['Anamenese'];
                $animal = "SELECT * FROM animal where Numero_Animal=$Numero_Animal";
                $result10 = $conn->query($animal);
                if ($result10->num_rows > 0) {
                  // output data of each row
                  while($row = $result10->fetch_assoc()) {
                    $Nome_Animal=$row['Nome'];
                  }
                }
                $exame = "SELECT exame_clinico.Fc, exame_clinico.Fr, exame_clinico.TRC, exame_clinico.TRPC, exame_clinico.Numero_Animal, exame_clinico.Mucosas,exame_clinico.Temperatura_Corporal,exame_clinico.Pulso FROM exame_clinico,servico WHERE exame_clinico.Codigo_Exame_Clinico=servico.Codigo_Exame_Clinico AND Codigo_Servico=$Codigo_Servico";
                
                $result11 = $conn->query($exame);
                if ($result11->num_rows > 0) {
                  // output data of each row
                  while($row = $result11->fetch_assoc()) {
                    $Fc=$row['Fc'];
                    $Fr=$row['Fr'];
                    $TRC=$row['TRC'];
                    $TRPC=$row['TRPC'];
                    $Mucosas=$row['Mucosas'];
                    $Temperatura_Corporal=$row['Temperatura_Corporal'];
                    $Pulso=$row['Pulso'];

                    $Numero_Animal=$row['Numero_Animal'];
                     $exame6 = "SELECT  * FROM animal WHERE Numero_Animal=$Numero_Animal";
                      
                      $result113 = $conn->query($exame6);
                      if ($result113->num_rows > 0) {
                        // output data of each row
                        while($row1 = $result113->fetch_assoc()) {
                          $Nome_Animal=$row1['Nome'];
                          $Numero_Chip=$row1['Numero_Chip'];
                          $Numero_Cliente=$row1['Numero_Cliente'];

                          $Numero_Animal=$row['Numero_Animal'];
                     $clientee = "SELECT  * FROM cliente WHERE Numero_Cliente=$Numero_Cliente";
                      
                      $result1131 = $conn->query($clientee);
                      if ($result1131->num_rows > 0) {
                        // output data of each row
                        while($row12 = $result1131->fetch_assoc()) {
                          $Morada_Cliente=$row12['Morada'];
                          $Telefone_Cliente=$row12['Telefone'];


                        }
                      }


                    
                        }
                      }



                  }
                }
				

                                
                ?>
                <tr>
                  <td>
                    <?php echo $Codigo_Servico; ?>
                  </td>
                  <td>
                    <?php echo $Data; ?>
                  </td>
                  <td>
                    <?php echo $Nome_Cliente; ?>
                  </td>
                  <td>
                    <?php echo $Nome_Animal; ?>
                  </td>
                  
                  
                  <td>
                    <a href="#ver<?php echo $Codigo_Servico;?>" data-toggle="modal">
                      <button type='button' class='btn btn-primary '><i class="fas fa-eye"></i></button>
                    </a>
                    <a href="#receita<?php echo $Codigo_Servico;?>" data-toggle="modal">
                      <button type='button' class='btn btn-secondary '><i class="fas fa-file-prescription"></i></button>
                    </a>
                    
                  </td>
                </tr>
                  
                  <div id="ver<?php echo $Codigo_Servico; ?>"  tabindex="-1" aria-labelledby="modalver" aria-hidden="true" class="modal fade text-left"  role="dialog">
                    <form method="post"  role="form">
                      <div class="modal-dialog ">
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 id="modalver" class="modal-title">Serviço Número : <?php echo  $Codigo_Servico; ?></h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                          <div class="modal-body">
                            <div  method="POST">
                              <input type="hidden" name="edit_item_id" name="Codigo_Servico" id="Codigo_Servico" value="<?php echo $Codigo_Servico; ?>">
                               <input type="hidden" name="Numero_Chip" id="Numero_Chip" value="<?php echo $Numero_Chip; ?>">
                               <input type="hidden" name="Telefone_Cliente" id="Telefone_Cliente" value="<?php echo $Telefone_Cliente; ?>">
                              <input type="hidden" name="Localidade_Cliente" id="Localidade_Cliente" value="<?php echo $descricao_localidade; ?>">
                              <input type="hidden" name="Morada_Cliente" id="Morada_Cliente" value="<?php echo $Morada_Cliente; ?>">
                              <div class="row">
                                <div class="col-sm-6 col-md-6">
                                  <div class="form-group mb-4">
                                    <label class=" form-control-label"><b>Nome do Cliente:</b></label>
                                    <?php echo $Nome_Cliente; ?>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="row">
                                <div class="col-sm-6 col-md-6">
                                  <div class="form-group mb-4">
                                    <label class=" form-control-label"><b>Nome do Animal:</b></label>
                                    <?php echo $Nome_Animal; ?>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-6 col-md-6">
                                  <div class="form-group mb-4">
                                    <label class=" form-control-label"><b>Tratamento:</b></label>
                                    <?php echo $Tratamento; ?>
                                  </div>
                                </div>
                              </div>
                              <div class="row">
                                <div class="col-sm-6 col-md-6">
                                  <div class="form-group mb-4">
                                    <label class=" form-control-label"><b>Anamnese:</b></label>
                                    <?php echo $Anamenese; ?>
                                  </div>
                                </div>
                              </div>
                              
                              <div class="row">
                                <div class="col-sm-6 col-md-6">
                                  <div class="form-group mb-12">
                                    <label class=" form-control-label"></label>
                                    <div class="modal-header">
                                      <h4 id="modalver" class="modal-title">Exame Clínico</h4>
                                    </div>
                                   
                                    <div class="row">
                                      <div class="col-sm-6 col-md-6">
                                        <div class="form-group mb-4">
                                          <label class=" form-control-label"><b>FC:</b></label>
                                          <?php echo $Fc; ?>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-6 col-md-6">
                                        <div class="form-group mb-4">
                                          <label class=" form-control-label"><b>FR:</b></label>
                                          <?php echo $Fr; ?>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-6 col-md-6">
                                        <div class="form-group mb-4">
                                          <label class=" form-control-label"><b>TRC:</b></label>
                                          <?php echo $TRC; ?>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-6 col-md-6">
                                        <div class="form-group mb-4">
                                          <label class=" form-control-label"><b>TRPC:</b></label>
                                          <?php echo $TRPC; ?>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-6 col-md-6">
                                        <div class="form-group mb-4">
                                          <label class=" form-control-label"><b>Mucosas:</b></label>
                                          <?php echo $Mucosas; ?>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-6 col-md-6">
                                        <div class="form-group mb-4">
                                          <label class=" form-control-label"><b>Temperatura Corporal:</b></label>
                                          <?php echo $Temperatura_Corporal; ?>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-6 col-md-6">
                                        <div class="form-group mb-4">
                                          <label class=" form-control-label"><b>Pulso:</b></label>
                                          <?php echo $Pulso; ?>
                                        </div>
                                      </div>
                                    </div>
                                   
                                    
                                    
                                  </div>
                                </div>
                              </div>
                            </div>
                            
                          </div>
                         
                        </div>
                      </div>
                    </form>
                  </div>
                  <div id="receita<?php echo $Codigo_Servico; ?>"  tabindex="-1" aria-labelledby="modalreceita" aria-hidden="true" class="modal fade text-left"  role="dialog">
                    <form>
                      <div class="modal-dialog " id='signature-pad' class='m-signature-pad'>
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 id="modalreceita" class="modal-title">Prescrição-Médica</h4>
                            <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                          </div>
                           <div class="modal-body">
              						  <input type="hidden" name="morada_med" id="morada_med" value="<?php echo $morada_med; ?>">
              						  <input type="hidden" name="nome" id="nome" value="<?php echo $nome; ?>">
              						  <input type="hidden" name="apelidos" id="apelidos" value="<?php echo $apelidos; ?>">
              						  <input type="hidden" name="telefone_med" id="telefone_med" value="<?php echo $telefone_med; ?>">
              						  <input type="hidden" name="descricao_localidade" id="descricao_localidade" value="<?php echo $descricao_localidade; ?>">
                            <input type="hidden" name="Telefone_Cliente" id="Telefone_Cliente" value="<?php echo $Telefone_Cliente; ?>">
                              <input type="hidden" name="Localidade_Cliente" id="Localidade_Cliente" value="<?php echo $descricao_localidade; ?>">
                              <input type="hidden" name="Morada_Cliente" id="Morada_Cliente" value="<?php echo $Morada_Cliente; ?>">

                                  

                              <div  method="POST">
                                <input type="hidden" name="Codigo_Servico" id="Codigo_Servico" value="<?php echo $Codigo_Servico; ?>">
                                
                                <div class="row">
                                  <div class="col-sm-6 col-md-6">
                                    <div class="form-group mb-4">
                                      <label class=" form-control-label">Cliente:</label>
                                      <label class=" form-control-label"><?php echo $Nome_Cliente; ?></label>
  									                   <input type="hidden" name="NomeC" id="NomeC" value="<?php echo $Nome_Cliente; ?>">
                                    </div>
                                  </div>
                                </div>                              
                               
                                <div class="row">
                                  <div class="col-sm-6 col-md-8">
                                    <div class="form-group mb-8">
                                      <label class=" form-control-label">Nº do Chip do Animal:</label>
                                      <label class=" form-control-label"><?php echo $Numero_Chip; ?></label>
                                      <input type="hidden" name="Numero_Chip" id="Numero_Chip" value="<?php echo $Numero_Chip; ?>">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-6 col-md-8">
                                    <div class="form-group mb-8">
                                      <label class=" form-control-label">Nome do Animal:</label>
                                      <label class=" form-control-label"><?php echo $Nome_Animal; ?></label>
  									                 <input type="hidden" name="NomeA" id="NomeA" value="<?php echo $Nome_Animal; ?>">
                                      
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-6 col-md-6">
                                    <div class="form-group mb-4">
                                      <label class=" form-control-label">Receita:</label>
                                      <input type="text" placeholder="Receita" id="receita" name="receita" class="form-control" required data-msg="Insira a receita" class="input-material" class="form-control">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-6 col-md-6">
                                    <div class="form-group mb-4">
                                      <label class=" form-control-label">Posologia:</label>
                                      <input type="text" placeholder="Posologia" id="posologia" name="posologia" class="form-control" required data-msg="Insira a posologia" class="input-material" class="form-control">
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-6 col-md-6">
                                    <div class="form-group mb-4">
                                      <label class=" form-control-label">Observações:</label>
                                      <input type="text" placeholder="Observações"id="observacoes" name="observacoes" class="form-control" class="input-material" class="form-control">
                                    </div>
                                  </div>
                                </div>
                             
                                <div class="col-lg-12">
                                <h4> Assinatura do Médico Veterinário</h4><br>
                              
                              
                              
                              <br>
                                <div class="col-lg-12 " style='height:300px;' id="assinatura">
                                  <div id='signature-pad' class='m-signature-pad'>
                                    <div class='m-signature-pad--body'>
                                      <canvas></canvas>
                                    </div>
                                    <div class='m-signature-pad--footer'>
                                      <div class='description'>Assinatura</div>
                                        <div class='left'>
                                          <button type='button' class='button clear' data-action='clear'>Limpar</button>
                                        </div>
                                      <div class='right'>
              											  	<input type="hidden" name="morada_med" id="morada_med" value="<?php echo $morada_med; ?>">
              												  <input type="hidden" name="nome" id="nome" value="<?php echo $nome; ?>">
              												  <input type="hidden" name="apelidos" id="apelidos" value="<?php echo $apelidos; ?>">
              												  <input type="hidden" name="telefone_med" id="telefone_med" value="<?php echo $telefone_med; ?>">
              												  <input type="hidden" name="descricao_localidade" id="descricao_localidade" value="<?php echo $descricao_localidade; ?>">
              										      <input type="hidden" name="Telefone_Cliente" id="Telefone_Cliente" value="<?php echo $Telefone_Cliente; ?>">
              										      <input type="hidden" name="Localidade_Cliente" id="Localidade_Cliente" value="<?php echo $descricao_localidade; ?>">
              										      <input type="hidden" name="Morada_Cliente" id="Morada_Cliente" value="<?php echo $Morada_Cliente; ?>">
                              
                
                                        <button style='visibility: hidden;' data-action='save-png'></button>
                                                  
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                  
                                  <div class='clearfix'></div><br><br>
                                  <div class='col-lg-12' id='tab'></div>

                                  
                            </div>
    
                          </div>
                    
								          <button type='button' class='btn btn-primary button save' data-action='save-svg'>Criar Receita</button>
                              
                          <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-secondary">Cancelar</button>
                        </div>
                      </form>
                        
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




    
   

<script>
  function loadsig(){
      var wrapper = document.getElementById("signature-pad"),
      clearButton = wrapper.querySelector("[data-action=clear]"),
      savePNGButton = wrapper.querySelector("[data-action=save-png]"),
      saveSVGButton = wrapper.querySelector("[data-action=save-svg]"),
      canvas = wrapper.querySelector("canvas"),
      signaturePad;
      // Adjust canvas coordinate space taking into account pixel ratio,
      // to make it look crisp on mobile devices.
      // This also causes canvas to be cleared.
      function resizeCanvas() {
          // When zoomed out to less than 100%, for some very strange reason,
          // some browsers report devicePixelRatio as less than 1
          // and only part of the canvas is cleared then.
          var ratio =  Math.max(window.devicePixelRatio || 1, 1);
          canvas.width = canvas.offsetWidth * ratio;
          canvas.height = canvas.offsetHeight * ratio;
          canvas.getContext("2d").scale(ratio, ratio);
      }

      window.onresize = resizeCanvas;
      resizeCanvas();

      signaturePad = new SignaturePad(canvas);

      clearButton.addEventListener("click", function (event) {
          signaturePad.clear();
      });

      savePNGButton.addEventListener("click", function (event) {
          if (signaturePad.isEmpty()) {
              if(document.getElementById('lang').innerHTML == 1){
                  alert("Forneça a assinatura primeiro.");
              }else{
                  alert("S'il vous plaît fournir la signature d'abord.");
              }
          } else {
              window.open(signaturePad.toDataURL());
          }
      });

      saveSVGButton.addEventListener("click", function (event) {
          if (signaturePad.isEmpty()) {
              if(document.getElementById('lang').innerHTML == 1){
                  alert("Forneça a assinatura primeiro.");
              }else{
                  alert("S'il vous plaît fournir la signature d'abord.");
              }
          } else {
              //window.open(signaturePad.toDataURL('image/svg+xml'));

              var assinatura = signaturePad.toDataURL('image/svg+xml');

                $.ajax({
                    type: 'POST',
                    url: 'assidb.php?op=1',
                    data: {sig:assinatura,nome:$('#nome').val(),apelidos:$('#apelidos').val(),
					morada_med:$('#morada_med').val(),
					telefone_med:$('#telefone_med').val(),
					descricao_localidade:$('#descricao_localidade').val(),
					receita:$('#receita').val(),
					observacoes:$('#observacoes').val(),
					posologia:$('#posologia').val(),
					NomeA:$('#NomeA').val(),
					NomeC:$('#NomeC').val(),
					Numero_Chip:$('#Numero_Chip').val(),
					Telefone_Cliente:$('#Telefone_Cliente').val(),
					Morada_Cliente:$('#Morada_Cliente').val(),
					Localidade_Cliente:$('#Localidade_Cliente').val(),
					Codigo_Servico:$('#Codigo_Servico').val(),
					
					},
                    success: function(data) {
                        var info = JSON.parse(data);
                        if(info['val'] == 1){
                          alert(info['msg']);
                          
                        }else{
                          alert(info['msg']);
                        }
                    }
                });

              s
          }
      });
      //$('head').append('<link rel="stylesheet" type="text/css" href="js/plugins/signature/css/signature-pad.css">');
  }


  document.addEventListener("DOMContentLoaded", function(event) {
    loadsig();
  });
</script>

<script src="assets/signature/js/signature_pad.js"></script>
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