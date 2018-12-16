<?php
include("config.php");
if(!(isset($_SESSION['email_cod']) && $_SESSION['email_cod'] != "") || $_SESSION['tipo_conta'] != 2){
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
$numero=$row['Numero_Medico'];
//o nome do campo é Primeiro_Nome certo?sim
}
}
$sql1 = "SELECT Cliente.Nome from Animal, Medico, Cliente WHERE Medico.Numero_Medico=cliente.Numero_Medico AND animal.Numero_Cliente=cliente.Numero_Cliente AND medico.Numero_Medico=$numero";
$cliente = $conn->query($sql1);
$sql2 = "SELECT Nome, Numero_Cliente from cliente WHERE Numero_Medico=$numero";
$cliente = $conn->query($sql2);
$cliente1 = $conn->query($sql2);
$sql4="SELECT sexo.Descricao, sexo.Codigo_Sexo from sexo,relacao_sexo_animal WHERE relacao_sexo_animal.Codigo_Tipo_Animal=1 AND sexo.Codigo_Sexo=relacao_sexo_animal.Codigo_Sexo";
$sexoPortePequeno = $conn->query($sql4);
$sql5="SELECT porte.Descricao, porte.Codigo_Porte from porte,relacao_porte_animal WHERE relacao_porte_animal.Codigo_Tipo_Animal=1 AND porte.Codigo_Porte=relacao_porte_animal.Codigo_Porte";
$portePequeno=$conn->query($sql5);
$sql6="SELECT Descricao, Codigo_Aptidao from aptidao";
$aptidao=$conn->query($sql6);
$sql7="SELECT sexo.Descricao, sexo.Codigo_Sexo from sexo,relacao_sexo_animal WHERE relacao_sexo_animal.Codigo_Tipo_Animal=2 AND sexo.Codigo_Sexo=relacao_sexo_animal.Codigo_Sexo";
$sexoCavalo = $conn->query($sql7);
$sql8="SELECT porte.Descricao, porte.Codigo_Porte from porte,relacao_porte_animal WHERE relacao_porte_animal.Codigo_Tipo_Animal=2 AND porte.Codigo_Porte=relacao_porte_animal.Codigo_Porte";
$porteCavalo=$conn->query($sql8);
//upload para a foto de perfil
$query2 = "SELECT linkimagem FROM utilizador WHERE utilizador.Numero_Medico=$numero";
$result2 = $conn->query($query2);
if ($result2->num_rows > 0) {
while ($row1 = $result2->fetch_assoc()) {
$foto_perfil4 = $row1['linkimagem'];
}
}


$sql6 = "SELECT animal.Nome, animal.Numero_Animal, animal.Numero_Chip from animal,cliente WHERE cliente.Numero_Cliente=animal.Numero_Cliente AND cliente.Numero_Medico=$numero";
$animal = $conn->query($sql6);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registar Vacinações</title>
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
    
    
    <link rel="icon" sizes="76x76" href="img/logo2-pequeno.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/logo2-pequeno.png">
    <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style type="text/css">.hidden { display: none;}
    </style>
    
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
                    <a href="RegistoClientePremium.php" class="dropdown-item"><i class="fas fa-user"></i>Registar Cliente</a>
                    <a href="RegistoAnimalPremium.php" class="dropdown-item"><i class="fas fa-dog"></i>Registar Animal</a>
                    <a href="PerfilMedicoPremium.php" class="dropdown-item"><i class="fas fa-user-edit"></i>Editar Perfil</a>
                    <a href="AgendaPremium.php" class="dropdown-item"><i class="fas fa-calendar-alt"></i>Agenda</a>
                    <a href="MapaPremium.php" class="dropdown-item"><i class="fas fa-map-marker-alt"></i>Mapa</a>
                    
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
              <div class="avatar"><img src="uploads/<?php echo $foto_perfil4;?>" width=120 height=120 alt="..." class="img-fluid rounded-circle"></div>
            <div class="title">
              <h1 class="h4"><?php  echo $nome. ' '.$apelidos ?> </h1>
              <a href="PerfilMedicoPremium.php">
              <p>Editar Perfil</p>
              </a>
            </div>
          </div>
          <!-- Sidebar Navidation Menus--><span class="heading"></span>
          <ul class="list-unstyled">
                    <li class="active"><a href="inicioPremium.php"> <i class="fas fa-home"></i>Início</a></li>
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
                        <li><a href="RegistoExamePremium.php">Registar Exame Clínico</a></li>
                        <li><a href="RegistoServicosPremium.php">Registar Serviço</a></li>
                        <li><a href="RegistoMaterialServicoPremium.php">Registar Material Utilizado</a></li>
                        <li><a href="HistoricoServicosPremium.php">Histórico de Serviços</a></li>
                      </ul>
                    </li>
                    <li><a href="#chartsDropdown2" aria-expanded="false" data-toggle="collapse"> <i class="fas fa-syringe"></i>Vacinações</a>
                      <ul id="chartsDropdown2" class="collapse list-unstyled ">
                        <li><a href="RegistoVacinacoesPremium.php">Registar Vacinação</a></li>
                        <li><a href="ListaVacinacoesPremium.php">Histórico de Vacinações</a></li>
                      </ul>
                    </li>
                    <li><a href="#chartsDropdown3" aria-expanded="false" data-toggle="collapse"> <i class="fas fa-file-invoice"></i>Documentos</a>
                      <ul id="chartsDropdown3" class="collapse list-unstyled ">
                        <li><a href="HistoricoServicosPremium.php">Receitas</a></li>
                        <li><a href="HistoricoReceitasPremium.php">Histórico de Receitas</a></li>
                        <li><a href="">Faturas/Recibos</a></li>
                      </ul>
                    </li>
                    <li><a href="AgendaPremium.php">  <i class="fas fa-calendar-alt"></i> Agenda</a></li>
                    <li><a href="MapaPremium.php">  <i class="fas fa-map-marker-alt"></i> Mapa</a></li> 
 
                     
        </nav>
        <div class="content-inner">
  <header class="page-header">
    <div class="container-fluid">
      <h2 class="no-margin-bottom">Registar Vacinação</h2>
    </div>
  </header>
  <!-- Breadcrumb-->
  <div class="breadcrumb-holder container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="inicioPremium.php">Início</a></li>
      <li class="breadcrumb-item active">Registar Vacinação</li>
    </ul>
  </div>
  <section>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-8">
          <div class="card">
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Animal</h3>
            </div>
             <form  class="form-validade" method="POST" >
            <div class="card-body">
              <div class="row">
                <div class=" col-md-12">
                  <div class="form-group mb-4">
                    <div class="form-group">
                     
                     
                        <label class=" form-control-label">Selecione o Animal:</label>
                        <select  id="numero_animal"  name="numero_animal" class="form-control mb-3">
                          <option value= ""> --Selecione um animal-- </option>
                          <?php while ($row1 = mysqli_fetch_array($animal)):;?>
                           <option value= "<?php  echo $row1[1]; ?>"> <?php  echo 'Nome: '.$row1[0].'  | Numero De Chip: '.$row1[2]; ?></option>
                          <?php endwhile;?>
                        </select>
                      </div>
                      <?php
                      @session_start();
                      if(isset($_SESSION['erromsg'])){
                      echo $_SESSION['erromsg'];
                      unset($_SESSION['erromsg']);
                      }
                      ?>
                      <p><span id="txtHint"></span></p>
                    </div>
                  </div>
                </div>
              </div>
             
              <div class="card-header">
                <h3 class="h4">Registar Vacinação</h3>
              </div>
              <!-- One "tab" for each step in the form: -->
              
              <div class="card-body">
                
                         <div class="row">
                        <div class="form-group">
                        <div class="col-lg-12">
                          <h3 style="color: #52b2a4; font-size: 14px"></h3><br>
                          <label class="form-control-label">Nome da Vacina </label>
                          <input type="text" name="nome" id="nome" class="form-control" required data-msg="Insira o Nome da Vacina" class="input-material" class="form-control" placeholder="Nome da Vacina" >
                        </div></div>
                        <div class="form-group">
                         <div class="col-lg-12">
                          <h3 style="color: #52b2a4; font-size: 14px"></h3><br>
                          <label class="form-control-label">Número do Lote</label>
                          <input type="number" name="lote" id="lote" class="form-control" required data-msg="Insira o Numero de Lote" class="input-material" class="form-control" placeholder="Número do Lote">
                        </div></div>
                        
                        <div class="form-group">
                            <div class="col-lg-12">
                          <h3 style="color: #52b2a4; font-size: 14px"></h3><br>
                          <label class="form-control-label">Validade:</label>
                          <input  type="data" placeholder='<?php echo date("d/m/Y"); ?>' name="validade" id="validade" class="form-control input-datepicker" >
                        </div>
                        </div>
                        </div> 
                        <br>
                        <br>
                        <div class="form-group">
                          <label class="form-control-label">Outras Informações:</label>
                          <textarea rows="2" cols="60" name="outrasInformacoes" type="text"  placeholder="Outras Informações" class="form-control"></textarea>
                        </div>
                        <br>
                        <button type="submit" formaction="GeraRegistoVacinacaoPremium.php" class="btn btn-primary">Registar</button>
                        </form>
                      <br>
                      <!-- Circles which indicates the steps of the form: -->
                      
                </div>
               
              
              

        </div>
               

              


        </div>
        <div class="card-body" align="center" style="margin-top: 100px;">
            
            <img src="img/pub2.jpg"><br><br>
            <button type="submit" align="center" class="btn btn-secundary" >Activar Conta Premium</button>
            
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