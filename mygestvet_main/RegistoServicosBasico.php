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
$localidade_query = "SELECT Codigo_Localidade,Descricao from localidade";
$localidade = $conn->query($localidade_query);
$query2 = "SELECT linkimagem FROM utilizador WHERE utilizador.Numero_Medico=$Numero_Medico";
$result2 = $conn->query($query2);
if ($result2->num_rows > 0) {
while ($row1 = $result2->fetch_assoc()) {
$foto_perfil2 = $row1['linkimagem'];
}
}
if (isset($_POST['animal'])){
$Numero_Animal=$_REQUEST['animal'];
$query3 = "SELECT * FROM animal WHERE Numero_Animal=$Numero_Animal";
$result3 = $conn->query($query3);
if ($result3->num_rows > 0) {
while ($row1 = $result3->fetch_assoc()) {
$Nome_Animal = $row1['Nome'];
$Data_Nascimento=$row1['Data_Nascimento'];
$Numero_Cliente=$row1['Numero_Cliente'];
$Numero_Chip=$row1['Numero_Chip'];
$Raca=$row1['Raca'];
$Alergias=$row1['Alergias'];
$Sexo=$row1['Codigo_Sexo'];
$Codigo_Porte=$row1['Codigo_Porte'];
}
}
}
$sql6 = "SELECT animal.Nome, animal.Numero_Animal from animal,cliente WHERE cliente.Numero_Cliente=animal.Numero_Cliente AND cliente.Numero_Medico=$Numero_Medico";
$animal = $conn->query($sql6);
$query2 = "SELECT linkimagem FROM utilizador WHERE utilizador.Numero_Medico=$Numero_Medico";
$result2 = $conn->query($query2);
if ($result2->num_rows > 0) {
while ($row1 = $result2->fetch_assoc()) {
$foto_perfil4 = $row1['linkimagem'];
}
}
$sql12 = 'SELECT * FROM tipo_material;';
$materiais= $conn->query($sql12);
?>
<!DOCTYPE html>
<html>
  <!-- Mirrored from demo.bootstrapious.com/admin-premium/1-4-4/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Nov 2018 10:50:20 GMT -->
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registar Serviço</title>
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
    <!--<link rel="stylesheet" href="css/service_box.css">-->
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
      <h2 class="no-margin-bottom">Registar Serviço</h2>
    </div>
  </header>
  <!-- Breadcrumb-->
  <div class="breadcrumb-holder container-fluid">
    <ul class="breadcrumb">
      <li class="breadcrumb-item"><a href="inicioBasico.php">Início</a></li>
      <li class="breadcrumb-item active">Registar Serviço</li>
    </ul>
  </div>
  <!-- Forms Section-->
  <section>
    
    <!--Registar Serviço-->
   <div class="container-fluid">
      <div class="row">
	  
        <div class="col-lg-8 col-sm-6 col-md-6">
          <div class="card">
		  
            <div class="card-header d-flex align-items-center">
              <h3 class="h4">Animal</h3>
			  </div>
              <div class="card-body">
              <div class="row">
                <div class="col-sm-6 col-md-9">
                  <div class="form-group mb-4">
				  <form id="regForm"  class="form-validate" method="POST">
                    <div class="form-group">
                      
                        <label  class=" form-control-label">Selecione o Animal:</label>
                          
                          <input type="text" onkeydown="limpaCampo()" onkeyup="procuraRegisto(this.value)"  placeholder="Procure pelo nome do Animal" class="form-control" id="valorReg" name="valorReg"  required data-msg="Selecione um Animal!" class="input-material" class="form-control" required>
                        
                      </form>
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
              <form id="regForm" method="POST"  class="form-validate" action="Gera_Registo_ServicoBasico.php">
               <div class="card-header">
                <h3 class="h4">Registar Serviço</h3>
              </div>
              <!-- One "tab" for each step in the form: -->
              <div class="card-body">

                       <div class="form-group mb-4">
					  
                            <h4 style="font-size: 14px; color: #5d998c">Número de Exame Clinico Selecionado: </h4>
							<p id="numeroExame" name="numeroExame"></p>
							
                            <p  id="mostraNome" name="mostraNome" > </p>
							<hr><hr>
							
                            <input id="numeroExame2" name="numeroExame2" type="hidden">
							
                          </div>
                          <!-- One "tab" for each step in the form: -->
                          <div class="row">
                          <div class="form-group col-md-6 ">
                            <label class="form-control-label">História Clínica:</label>
                            <textarea rows="2" cols="60" type="text" placeholder="História Clínica" required data-msg="Insira Historia Clinica!"  class="form-control" name="fname" class="form-control"></textarea>
                          </div>
                          <div class="form-group col-md-6">
                            <label class="form-control-label">Anamnese:</label>
                            <textarea rows="2" cols="60" type="text" placeholder="Anamnese" name="Anamnese"  required data-msg="Insira Anamnese!"  class="form-control"  class="form-control"></textarea>
                          </div>
						  </div>
						  <br>
						  <div class="row">
                          <div class="form-group col-md-6">
                            <label class="form-control-label">Diagnóstico:</label>
                            <textarea rows="2" cols="60" type="text" placeholder="Diagnóstico" name="diagnostico"  required data-msg="Insira Diagnóstico!"  class="form-control" class="form-control"></textarea>
                          </div>
                          <div class="form-group col-md-6">
                            <label class="form-control-label">Tratamento:</label>
                            <textarea rows="2" cols="60"   required data-msg="Insira Tratamento!"  class="form-control" type="text" placeholder="Tratamento" name="tratamento" class="form-control"></textarea>
                          </div>
						  </div>
						  <br>
                          <div class="form-group">
                            <label class="form-control-label">Outras Informações:</label>
                            <textarea rows="2" cols="60" name="outrasInformacoes" type="text" placeholder="Outras informações" class="form-control" ></textarea>
                          </div>
                        <br>
                        
                        <button type="submit" class="btn btn-primary">Registar</button>
                        <!-- Circles which indicates the steps of the form: -->
						
						</div>
                      
                    </form>
                 
             
            </div>
          </div>
          <!-------------------------publicidade------------------------------>
          <div class="card-body" align="center" style="margin-top: 100px;">
            
            <img src="img/pub1.jpg"><br><br>
            <button type="submit" align="center" class="btn btn-secundary" >Activar Conta Premium</button>
            
          </div>
        </div>
      </form>
    </form>
  </div>

        
      </section>
      
      <style>
      tr:hover td{background: #9E9E9E;}
      </style>
      
      
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
      var currentTab = 0; // Current tab is set to be the first tab (0)
      showTab(currentTab); // Display the crurrent tab
      function showTab(n) {
      // This function will display the specified tab of the form...
      var x = document.getElementsByClassName("tab");
      x[n].style.display = "block";
      //... and fix the Previous/Next buttons:
      if (n == 0) {
      document.getElementById("prevBtn").style.display = "none";
      } else {
      document.getElementById("prevBtn").style.display = "inline";
      }
      if (n == (x.length - 1)) {
      document.getElementById("nextBtn").innerHTML = "Submit";
      } else {
      document.getElementById("nextBtn").innerHTML = "Next";
      }
      //... and run a function that will display the correct step indicator:
      fixStepIndicator(n)
      }
      function nextPrev(n) {
      // This function will figure out which tab to display
      var x = document.getElementsByClassName("tab");
      // Exit the function if any field in the current tab is invalid:
      if (n == 1 && !validateForm()) return false;
      // Hide the current tab:
      x[currentTab].style.display = "none";
      // Increase or decrease the current tab by 1:
      currentTab = currentTab + n;
      // if you have reached the end of the form...
      if (currentTab >= x.length) {
      // ... the form gets submitted:
      document.getElementById("regForm").submit();
      return false;
      }
      // Otherwise, display the correct tab:
      showTab(currentTab);
      }
      function validateForm() {
      // This function deals with validation of the form fields
      var x, y, i, valid = true;
      x = document.getElementsByClassName("tab");
      y = x[currentTab].getElementsByTagName("input");
      // A loop that checks every input field in the current tab:
      for (i = 0; i < y.length; i++) {
      // If a field is empty...
      if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
      }
      }
      // If the valid status is true, mark the step as finished and valid:
      if (valid) {
      document.getElementsByClassName("step")[currentTab].className += " finish";
      }
      return valid; // return the valid status
      }
      function fixStepIndicator(n) {
      // This function removes the "active" class of all steps...
      var i, x = document.getElementsByClassName("step");
      for (i = 0; i < x.length; i++) {
      x[i].className = x[i].className.replace(" active", "");
      }
      //... and adds the "active" class on the current step:
      x[n].className += " active";
      }
      </script>
      <script>
      function procuraRegisto(str){
      if (str == "") {
      document.getElementById("txtHint").innerHTML = " ";
      return;
      } else {
      if (window.XMLHttpRequest) {
      // code for IE7+, Firefox, Chrome, Opera, Safari
      xmlhttp = new XMLHttpRequest();
      } else {
      // code for IE6, IE5
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
      }
      };
      xmlhttp.open("GET","procuraExameClinico.php?q="+str,true);
      xmlhttp.send();
      }
      }
      function limpaCampo(){
      document.getElementById('numeroExame').innerHTML= "";
      document.getElementById('mostraNome').innerHTML= "";
      }
      function guardaId(id,a){
      document.getElementById('txtHint').innerHTML = "";
      $('#numeroExame').text(id);
      $('#numeroExame2').val(id);
      $('#mostraNome').text(a);
      
      }
      </script>
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
    <script src="selectuser.js"></script>
    <!-- Data Tables-->
    <script src="vendor/datatables.net/js/jquery.dataTables.js"></script>
    <script src="vendor/datatables.net-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="vendor/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="vendor/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
    <script src="js/tables-datatable.js"></script>
  </body>
</html>