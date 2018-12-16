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
      $numero_medico=$row['Numero_Medico'];
$nome = $row['Primeiro_Nome'];
$apelidos=$row['Apelidos'];

}
}

$Numero_Animal=$_REQUEST['Numero_Animal'];


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

   $sql = "SELECT * from animal where Numero_Animal=$Numero_Animal";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                  $Numero_Animal=$row['Numero_Animal'];
                  $Nome=$row['Nome'];
                  $Data_Nascimento=$row['Data_Nascimento'];
                  $Numero_Cliente=$row['Numero_Cliente'];
                  $Numero_Chip=$row['Numero_Chip'];
                  $Raca=$row['Raca'];
                  $Alergias=$row['Alergias'];
                  $Codigo_Sexo=$row['Codigo_Sexo'];
                  $Codigo_Tipo_Animal=$row['Codigo_Tipo_Animal'];
                  $Codigo_Porte=$row['Codigo_Porte'];

                  $sql4 = "SELECT * from tipo_animal WHERE Codigo_Tipo_Animal=$Codigo_Tipo_Animal";
                  $result4 = $conn->query($sql4);
                  if ($result4->num_rows > 0) {
                    // output data of each row
                    while($row = $result4->fetch_assoc()) {
                      
                      $Descricao1=$row['Descricao'];

                    }
                  }

                  $sql5 = "SELECT * from sexo WHERE Codigo_Sexo=$Codigo_Sexo";
                  $result5 = $conn->query($sql5);
                  if ($result5->num_rows > 0) {
                    // output data of each row
                    while($row = $result5->fetch_assoc()) {
                      
                      $Descricao2=$row['Descricao'];

                    }
                  }

                  $sql6 = "SELECT * from porte WHERE Codigo_Porte=$Codigo_Porte";
                  $result6 = $conn->query($sql6);
                  if ($result6->num_rows > 0) {
                    // output data of each row
                    while($row = $result6->fetch_assoc()) {
                      
                      $Descricao3=$row['Descricao'];

                    }
                  }
                  
                  
                  
                  
                  $sql1 = "SELECT * from cliente WHERE Numero_Cliente=$Numero_Cliente";
                  $result1 = $conn->query($sql1);
                  if ($result1->num_rows > 0) {
                    // output data of each row
                    while($row = $result1->fetch_assoc()) {
                      
                      $Nome_Cliente=$row['Nome'];

					}
				  }
				}
			  }


?>
<!DOCTYPE html>
<html>
  
  <!-- Mirrored from demo.bootstrapious.com/admin-premium/1-4-4/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Nov 2018 10:50:20 GMT -->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lista de Animais</title>
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


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
              <a href="PerfilMedicoBasico.php">
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
                        <li><a href="RegistoExameBasico.php">Registar Exame Clínico</a></li>
                        <li><a href="RegistoServicosPremium.php">Registar Serviço</a></li>
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
                    <li><a href="AgendaPremium.php">  <i class="fas fa-calendar-alt"></i> Agenda</a></li>
                    <li><a href="MapaPremium.php">  <i class="fas fa-map-marker-alt"></i> Mapa</a></li>
              

                    
        </nav>
    
  </nav>
  
  <div class="content-inner">
    
    <!-- Page Header-->
    <header class="page-header">
      <div class="container-fluid">
        <h2 class="no-margin-bottom"><?php echo $Nome ?></h2>
      </div>
    </header>
    <!-- Breadcrumb-->
    <div class="breadcrumb-holder container-fluid">
      <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="ListaAnimaisBasico.php">Lista de Animais</a></li>
        <li class="breadcrumb-item active"><?php echo $Nome ?></li>
      </ul>
    </div>
    <section>
      
      
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <h3 class="h4">Dados informativos</h3>
          </div>
          <div class="card-body">
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
                                          <label class=" form-control-label"><b>Cliente Associado:</b></label>
                                          <?php echo $Nome_Cliente; ?>
                                        </div>
                                      </div>
                                    </div>

                                   <div class="row">
                                      <div class="col-sm-6 col-md-6">
                                        <div class="form-group mb-4">
                                          <label class=" form-control-label"><b>Espécie:</b></label>
                                          <?php echo $Descricao1; ?>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-sm-6 col-md-6">
                                        <div class="form-group mb-4">
                                          <label class=" form-control-label"><b>Raça:</b></label>
                                          <?php echo $Raca; ?>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-sm-6 col-md-6">
                                        <div class="form-group mb-4">
                                          <label class=" form-control-label"><b>Número de Chip:</b></label>
                                          <?php echo $Numero_Chip; ?>
                                        </div>
                                      </div>
                                    </div>
                                    
                                    <div class="row">
                                      <div class="col-sm-6 col-md-6">
                                        <div class="form-group mb-4">
                                          <label class=" form-control-label"><b>Data de Nascimento:</b></label>
                                          <?php echo $Data_Nascimento; ?>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-sm-6 col-md-6">
                                        <div class="form-group mb-4">
                                          <label class=" form-control-label"><b>Sexo:</b></label>
                                          <?php echo $Descricao2; ?>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="row">
                                      <div class="col-sm-6 col-md-6">
                                        <div class="form-group mb-4">
                                          <label class=" form-control-label"><b>Porte:</b></label>
                                          <?php echo $Descricao3; ?>
                                        </div>
                                      </div>
                                    </div>
                                    
                                    
                                    <div class="row">
                                      <div class="col-sm-6 col-md-6">
                                        <div class="form-group mb-4">
                                          <label class=" form-control-label"><b>Alergias/Doenças Crónicas:</b></label>
                                          <?php
                                               if($Alergias==''){
                                                  echo ' Nao tem alergias ou doenças crónicas.';
                                               }else{
                                                  echo $Alergias;

                                              }
                                          ?>
                                        </div>
                                      </div>
                                    </div>
        </div>
		
		
		
		
		
      </div>
	  <div class="card">
          <div class="card-header">
            <h3 class="h4">Histórico de Serviços</h3>
          </div>
          <div class="card-body">
		  <?php
                                
      
                  
                  $sql1 = "SELECT * from servico,exame_clinico WHERE servico.Codigo_Exame_Clinico=exame_clinico.Codigo_Exame_Clinico AND exame_clinico.Numero_Animal=$Numero_Animal
";
                  $result1 = $conn->query($sql1);
                  if ($result1->num_rows >0) {
                    
					  
                  ?>
                     <table style="width: 100%;" class="table">
                
                <thead>
                  <tr>
                    
                    <th>História Clínica</th>
                    <th>Anamnese</th>
                    <th>Tratamento</th>
                    
                  </tr>
                </thead>
                
                <tbody>
				<?php while($row = $result1->fetch_assoc()) {
                      
                      $Tratamento=$row['Tratamento'];
					  $Anamenese=$row['Anamenese'];
					  $Historia_Clinica=$row['Historia_Clinica']; ?>
                  
						  <tr>
						   <td>
							  <?php echo $Historia_Clinica; ?>
							</td>
							<td>
							  <?php echo $Anamenese; ?>
							</td>
							<td>
							  <?php echo $Tratamento; ?>
							</td>
							
							
							</tbody>
					<?php } ?>
				</table>
				</div>
                  <?php
				  
				  
                     
                  }else{
					  
                  
                  ?>
				  
				  <div> Não possui Serviços</div>
				  </div>
				  
				  <?php } ?>
		
		
		</div>
		<div class="card">
          <div class="card-header">
            <h3 class="h4">Histórico de Exames</h3>
          </div>
          <div class="card-body">
		  <?php
                                
      
                  
                  $sql1 = "SELECT * from exame_clinico WHERE Numero_Animal=$Numero_Animal
";
                  $result1 = $conn->query($sql1);
                  if ($result1->num_rows > 0) {
            ?>
                     <table id="datatable2" style="width: 100%;" class="table">
                
                <thead>
                  <tr>
                    <th>Código do Exame</th>
                    <th>Fr</th>
                    <th>Fc</th>
                    <th>TRC</th>
                    <th>TRPC</th>
                    <th>Temp. Corporal</th>
                    <th>Pulso</th>
                    <th>Mucosas</th>                    
                    <th>Observações</th>
                  </tr>
                </thead>
                
                <tbody>
                  <?php
                    // output data of each row
                    while($row = $result1->fetch_assoc()) {
                      $Codigo_Exame_Clinico=$row['Codigo_Exame_Clinico'];
                      $Fr=$row['Fr'];
            $Fc=$row['Fc'];           
            $Observacoes=$row['Observacoes'];
            $TRC=$row['TRC'];
            $TRPC=$row['TRPC'];
            $Temperatura_Corporal=$row['Temperatura_Corporal'];
            $Pulso=$row['Pulso'];
            $Mucosas=$row['Mucosas'];
                  ?>
                  <tr>
           <td>
                      <?php echo $Codigo_Exame_Clinico; ?>
                    </td>
                    <td>
                      <?php echo $Fr; ?>
                    </td>
                    <td>
                      <?php echo $Fc; ?>
                    </td>
                    <td>
                      <?php echo $TRC; ?>
                    </td>
                    <td>
                      <?php echo $TRPC; ?>
                    </td>
                    <td>
                      <?php echo $Temperatura_Corporal; ?>
                    </td>
                    <td>
                      <?php echo $Pulso; ?>
                    </td>
                    <td>
                      <?php echo $Mucosas; ?>
                    </td>
          <td>
                      <?php echo $Observacoes; ?>
                    </td>
                    
                   </tbody>
          <?php } ?>
        </table>
        </div>
                  <?php
          
          
                     
                  }else{
            
                  
                  ?>
          
          <div> Não possui Exames</div>
          </div>
          
          <?php } ?>
    
    </div>
    
    <div class="card">
          <div class="card-header">
            <h3 class="h4">Histórico de Vacinações</h3>
          </div>
          <div class="card-body">
       <?php
                                
      
                  
                  $sql1 = "SELECT * from vacinacao WHERE Numero_Animal=$Numero_Animal
";
                  $result1 = $conn->query($sql1);
                  if ($result1->num_rows > 0) { ?>
                     <table id="datatable2" style="width: 100%;" class="table">
                
                <thead>
                  <tr>
                    <th>Número de Vacinação</th>
                    <th>Nome da Vacina</th>
                    <th>Data</th>
                    <th>Lote</th>
                    <th>Validade</th>                    
                    <th>Outras Informações</th>
                  </tr>
                </thead>
                
                <tbody>
                 <?php
                    // output data of each row
                    while($row = $result1->fetch_assoc()) {
                      $Numero_Vacinacao=$row['Numero_Vacinacao'];
                      $Data=$row['Data'];
            $Validade=$row['Validade'];           
            $outrasInformacoes=$row['outrasInformacoes'];
            $NomeVacina=$row['Nome'];
            $Lote=$row['Lote'];
                  ?>
                  <tr>
           <td>
                      <?php echo $Numero_Vacinacao; ?>
                    </td>
                    <td>
                      <?php echo $NomeVacina; ?>
                    </td>
                    <td>
                      <?php echo $Data; ?>
                    </td>
                    <td>
                      <?php echo $Lote; ?>
                    </td>
                    <td>
                      <?php echo $Validade; ?>
                    </td>
          <td>
                      <?php echo $outrasInformacoes; ?>
                    </td>
                    
              </tbody>
          <?php } ?>
        </table>
        </div>
                  <?php
          
          
                     
                  }else{
            
                  
                  ?>
          
          <div> Não possui Vacinações</div>
          </div>
          
          <?php } ?>
    
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



<script>
$('.btn-canc-vis').on("click", function () {
          $('.form').slideToggle();
          $('.visualizar').slideToggle();
      });
      $('.btn-canc-edit').on("click", function () {
          $('.visualizar').slideToggle();
          $('.form').slideToggle();
      });
</script>




<!-- JavaScript files-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/popper.js/umd/popper.min.js"> </script>
<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
<script src="vendor/chart.js/Chart.min.js"></script>
<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
<script src='vendor/moment/min/moment.min.js'></script>

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

 <!--<script src="vendor/fullcalendar/gcal.min.js">   </script>
<script src="js/components-calendar.js"></script>
<script src='http://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.js'></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
</body>

</html>