<?php
include_once("config.php");

  

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
            $foto_perfil8 = $row1['linkimagem'];
          } 
       }
	   
	   
	   
	   $sql6 = "SELECT * from cliente WHERE cliente.Numero_Medico=$Numero_Medico";
		$cliente = $conn->query($sql6);

  
?>


<!DOCTYPE html>
<html lang="pt-br">
   
<!-- Mirrored from demo.bootstrapious.com/admin-premium/1-4-4/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 07 Nov 2018 10:50:20 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MyGestVet Agenda</title>
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

    <!--ESTA OK-->
    <link href='agenda/css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
 
    <!-- Full Calendar  ESTA OK-->
    <link rel="stylesheet" href="vendor/fullcalendar/fullcalendar.min.css">

    <link href='agenda/css/style.css' rel='stylesheet'>
 
    <!-- Bootstrap Datepicker CSS-->
    <link rel="stylesheet" href="vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css">

   
     
  
    <link rel="icon" sizes="76x76" href="img/logo2-pequeno.png">
    <link rel="icon" type="image/png" sizes="96x96" href="img/logo2-pequeno.png">
 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">



    <!--<script src='vendor/jquery/jquery-ui.min.js'></script>-->
    <script src='agenda/js/jquery.min.js'></script>
    <script src='vendor/moment/min/moment.min.js'></script>
    <script src='vendor/fullcalendar/fullcalendar.min.js'></script>
    <script src='agenda/locale/pt-br.js'></script>
    
    <script src="vendor/popper.js/umd/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--<script src="vendor/jquery.cookie/jquery.cookie.js"> </script>-->
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

    

    <!--Sao precisos-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.js'></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

    <!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
    

    <script>

      $(document).ready(function () {

          $('#calendar').fullCalendar({
              header: {
                  left: 'prev,next today',
                  center: 'title',
                  right: 'month,agendaWeek,agendaDay,listWeek'
              },
              lang:'pt',
              defaultDate: Date(),
              navLinks: true, // can click day/week names to navigate views
              editable: true,
              eventLimit: true, // allow "more" link when too many events
			  eventDrop: function(event, delta, revertFunc) {

				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						location.href="AgendaPremium.php"
					}
				};
				xmlhttp.open("GET", "mudaEvento.php?inicio="+event.start.format('YYYY/MM/DD HH:mm:ss')+"&fim=" +  event.end.format('YYYY/MM/DD HH:mm:ss') + "&id="+event.id, true);
				xmlhttp.send();
						

			  },eventResize: function(event, delta, revertFunc) {
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function() {
					if (this.readyState == 4 && this.status == 200) {
						location.href="AgendaPremium.php"
					}
				};
				xmlhttp.open("GET", "mudaResize.php?fim=" +  event.end.format('YYYY/MM/DD HH:mm:ss') + "&id="+event.id, true);
				xmlhttp.send();
					  },
              eventClick: function (event) {
                  $("#apagar_evento").attr("href", "proc_apagar_evento.php?id=" + event.id);

                  $('#visualizar #id').text(event.id);
                  $('#visualizar #id').val(event.id);
                  $('#visualizar #title').text(event.title);
                  $('#visualizar #title').val(event.title);
                  $('#visualizar #start').text(event.start.format('YYYY/MM/DD HH:mm:ss'));
                  $('#visualizar #start').val(event.start.format('YYYY/MM/DD HH:mm:ss'));
                  $('#visualizar #end').text(event.end.format('YYYY/MM/DD HH:mm:ss'));
                  $('#visualizar #end').val(event.end.format('YYYY/MM/DD HH:mm:ss'));
                  $('#visualizar #color').val(event.color);
                  $('#visualizar').modal('show');
                  return false;

              },

              selectable: true,
              selectHelper: true,
              select: function (start, end) {
                  $('#cadastrar #start').val(moment(start).format('YYYY/MM/DD HH:mm:ss'));
                  $('#cadastrar #end').val(moment(end).format('YYYY/MM/DD HH:mm:ss'));
                  $('#cadastrar').modal('show');
              },

              //https://fullcalendar.io/docs/events-json-feed
              events: {
                  url: 'list_data.php',
                  cache: true
              }
          });

      });

    </script>

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
          <div class="sidebar-header d-flex align-items-center"><a href="PerfilMedicoPremium.php">
              <div class="avatar"><img src="uploads/<?php echo $foto_perfil8;?>" alt="..." class="img-fluid rounded-circle"></div></a>
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
        <div class="content-inner">
          
          <!-- Page Header-->
          <header class="page-header">
            <div class="container-fluid">
              <h2 class="no-margin-bottom">Agenda</h2>
            </div>
          </header>
          <!-- Breadcrumb-->
          <div class="breadcrumb-holder container-fluid">
            <ul class="breadcrumb">
              <li class="breadcrumb-item"><a href="inicioPremium.php">Início</a></li>
              <li class="breadcrumb-item active">Agenda</li>
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
                  <h4>Agenda</h4>
                    <?php
                    if(isset($_SESSION['msg'])){
                      echo $_SESSION['msg'];
                      unset($_SESSION['msg']);
                    }
                    ?>
    
                    <div id='calendar'></div>
                </div>
              </div>
            </div>
            <div class="modal fade" id="visualizar" tabindex="-1" role="dialog">
              <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                      <div class="modal-header">
                          <h4 class="modal-title text-center">Dados do Evento</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          <div class="visualizar">
                              <dl class="row">
                                  <dt class="col-sm-3">ID do Evento</dt>
                                  <dd id="id" class="col-sm-9"></dd>
                                  <dt class="col-sm-3">Titulo do Evento</dt>
                                  <dd id="title" class="col-sm-9"></dd>
                                  <dt class="col-sm-3">Início do Evento</dt>
                                  <dd id="start" class="col-sm-9"></dd>
                                  <dt class="col-sm-3">Fim do Evento</dt>
                                  <dd id="end" class="col-sm-9"></dd>
                              </dl>
                              <button class="btn btn-canc-vis btn-primary">Editar</button>
                              <a href="" id="apagar_evento" class="btn btn-secondary" role="button">Apagar</a>
                          </div>   
                          <div class="form">
                              <form method="POST" action="proc_edit_evento.php">
                                  <div class="form-group">
                                      <div class="form-group col-md-12">
                                          <label>Titulo</label>
                                          <input type="text" class="form-control" name="title" id="title" placeholder="Titulo do Evento">
                                      </div>
                                  </div>
								  
                  
                                  <div class="form-group">
                                      <div class="form-group col-md-12">
                                          <label>Cor</label>
                                          <select name="color" class="form-control" id="color">
                                              <option value="">Escolha uma cor</option>     
                                              <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                                              <option style="color:#0071C5;" value="#0071c5">Azul</option>
                                              <option style="color:#e5841c;" value="#e5841c">Laranja</option>
                                              <option style="color:#8B4513;" value="#8B4513">Castanho</option>  
                                              <option style="color:#1C1C1C;" value="#1C1C1C">Preto</option>
                                              <option style="color:#f2a4e4;" value="#f2a4e4">Rosa</option>
                                              <option style="color:#A020F0;" value="#A020F0">Roxo</option>
                                              <option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
                                              <option style="color:#4ed354;" value="#4ed354">Verde</option>
                                              <option style="color:#e51d1d;" value="#e51d1d">Vermelho</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="form-group col-md-12">
                                          <label>Data Inicial</label>
                                          <input type="text" class="form-control" name="start" id="start" onKeyPress="DataHora(event, this)">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <div class="form-group col-md-12">
                                          <label>Data Final</label>
                                          <input type="text" class="form-control" name="end" id="end" onKeyPress="DataHora(event, this)">
                                      </div>
                                  </div>
                                  <input type="hidden" name="id" id="id">
                                  <div class="form-group col-md-12">
                                      
                                      <button type="submit" class="btn btn-primary">Salvar Alterações</button>
                                      <button type="button" class="btn btn-canc-edit btn-secondary">Cancelar</button>
                                    

                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>

        <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-center">Adicionar Evento</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form class="form-horizontal" method="POST" action="proc_cad_evento.php">
                            <div class="form-group">
                                <div class="form-group col-md-12">
                                    <label>Titulo</label>
                                    <input type="text" class="form-control" name="title" id="title" placeholder="Titulo do Evento">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="form-group col-md-12">
                                    <label>Cor</label>
                                    <select name="color" class="form-control" id="color">
                                        <option value="">Escolha uma cor</option>     
                                        <option style="color:#FFD700;" value="#FFD700">Amarelo</option>
                                        <option style="color:#0071C5;" value="#0071c5">Azul</option>
                                        <option style="color:#e5841c;" value="#e5841c">Laranja</option>
                                        <option style="color:#8B4513;" value="#8B4513">Castanho</option>  
                                        <option style="color:#1C1C1C;" value="#1C1C1C">Preto</option>
                                        <option style="color:#f2a4e4;" value="#f2a4e4">Rosa</option>
                                        <option style="color:#A020F0;" value="#A020F0">Roxo</option>
                                        <option style="color:#40E0D0;" value="#40E0D0">Turquesa</option>
                                        <option style="color:#4ed354;" value="#4ed354">Verde</option>
                                        <option style="color:#e51d1d;" value="#e51d1d">Vermelho</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group col-md-12">
                                    <label>Data Inicial</label>
                                    <input type="text" class="form-control" name="start" id="start" onKeyPress="DataHora(event, this)">
                                </div>
                            </div>

							             <div class="form-group">
                              <div class="form-group col-md-12">
                                <label>Selecione o Cliente:</label>
                                <select  id="Numero_Cliente"  name="Numero_Cliente" onchange="showCustomer(this.value)" class="form-control mb-3">
                                  <option value= ""> Selecione um cliente</option>
                                  <?php while ($row1 = mysqli_fetch_array($cliente)):;?>
                                  
                                  <option value= "<?php  echo $row1[0]; ?>"> <?php  echo $row1[1]; ?></option>
                                  <?php endwhile;?>
                                </select>
                              </div>
                            </div>
							
						
							<p id="txtHint"></p>
								
							<input type="hidden" method="POST" id="Animalnumber" name="q"> 				
														
                            <div class="form-group">
                                <div class="form-group col-md-12">
                                    <label>Data Final</label>
                                    <input type="text" class="form-control" name="end" id="end" onKeyPress="DataHora(event, this)">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-primary">Adicionar</button>
                                </div>
                            </div>
                        </form>
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

    

    <!-- Full Calendar-->
    
    <script src="vendor/fullcalendar/gcal.min.js">   </script>
    <script src="js/components-calendar.js"></script>

    
    
     
   

    <script>
      //Mascara para o campo data e hora
      function DataHora(evento, objeto) {
          var keypress = (window.event) ? event.keyCode : evento.which;
          campo = eval(objeto);
          if (campo.value == '0000/00/00 00:00:00') {
              campo.value = ""
          }

          caracteres = '0123456789';
          separacao1 = '/';
          separacao2 = ' ';
          separacao3 = ':';
          conjunto1 = 2;
          conjunto2 = 5;
          conjunto3 = 10;
          conjunto4 = 13;
          conjunto5 = 16;
          if ((caracteres.search(String.fromCharCode(keypress)) != -1) && campo.value.length < (19)) {
              if (campo.value.length == conjunto1)
                  campo.value = campo.value + separacao1;
              else if (campo.value.length == conjunto2)
                  campo.value = campo.value + separacao1;
              else if (campo.value.length == conjunto3)
                  campo.value = campo.value + separacao2;
              else if (campo.value.length == conjunto4)
                  campo.value = campo.value + separacao3;
              else if (campo.value.length == conjunto5)
                  campo.value = campo.value + separacao3;
          } else {
              event.returnValue = false;
          }
      }


      $('.btn-canc-vis').on("click", function () {
          $('.form').slideToggle();
          $('.visualizar').slideToggle();
      });
      $('.btn-canc-edit').on("click", function () {
          $('.visualizar').slideToggle();
          $('.form').slideToggle();
      });
            
    
    </script>
	
	      <script>
          function showCustomer(str) {
          var xhttp;
          if (str == "") {
            document.getElementById("txtHint").innerHTML = "";
            return;
          }
          xhttp = new XMLHttpRequest();
          xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
              document.getElementById("Animalnumber").value=str;
              //animernumber2 (copy paste)
              
              
              
            document.getElementById("txtHint").innerHTML = this.responseText;
            }
          };
          xhttp.open("GET", "getAnimal.php?q="+str, true);
          xhttp.send();
		  
		  
		  
      }
	  
      </script>


  </body>


</html>