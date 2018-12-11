<?php


    include("config.php");
    require('fpdf.php');

    $Codigo_Servico=$_REQUEST["Codigo_Servico"];
   
    $receita=$_REQUEST["receita"];
    $posologia=$_REQUEST["posologia"];
    $observacoes=$_REQUEST["observacoes"];
 
	$sql = "INSERT INTO receita VALUES(NULL,$Codigo_Servico, Curdate(),'$receita','$posologia','$observacoes');";

			if (mysqli_query($conn, $sql)) {
				@session_start();
  
 				 $_SESSION['erromsg']='Receita registada com sucesso.';		
 			
$morada_med=$_REQUEST['morada_med'];
$nome=$_REQUEST['nome'];
$apelidos=$_REQUEST['apelidos'];
$telefone_med=$_REQUEST['telefone_med'];
$localidade_med=$_REQUEST['descricao_localidade'];
$receita=$_REQUEST['receita'];
$observacoes=$_REQUEST['observacoes'];
$posologia=$_REQUEST['posologia'];
$Nome_Animal=$_REQUEST['NomeA'];
$Numero_Chip=$_REQUEST['Numero_Chip'];
$Nome_Cliente=$_REQUEST['NomeC'];
$Telefone_Cliente=$_REQUEST['Telefone_Cliente'];
$Morada_Cli=$_REQUEST['Morada_Cliente'];
$Localidade_Cli=$_REQUEST['Localidade_Cliente'];

 $sql4 = "SELECT * from receita  where Codigo_Servico=$Codigo_Servico ";
  $result4 = $conn->query($sql4);
  if ($result4->num_rows > 0) {
      // output data of each row
      while($row = $result4->fetch_assoc()) {
      	$Numero_Receita=$row['Numero_Receita'];
      	$Data=$row['Data'];

      }
  }
$html = '
<style>

.cabeçalho {
 font-family: KoHo, sans-serif;
 font-size: 14px;
 margin-top: 1em;
 margin-bottom: 0.5em;
 color: #3d3d3d;
 text-align: center;
 line-height:50%;
 border-width: thin;
}

.titulo{
 font-family: KoHo, sans-serif;
 font-size: 18px;
 margin-top: 1em;
 margin-bottom: 0.5em;
 color: #000;
 text-align: center;
 line-height:50%;
 border-width: thin;
}

.receita{
 font-family: KoHo, sans-serif;
 font-size: 14px;
 margin-top: 1em;
 margin-bottom: 0.5em;
 color: #000;
 text-align: left;
 line-height:50%;
 border-width: thin;
}



</style>

<link href="https://fonts.googleapis.com/css?family=KoHo" rel="stylesheet">
<body>

<div style="border:0.1mm solid #220044; padding:1em 2em; background-color:#f7f7f9; ">
 
  <table>
  <tr>
    <td><img class="logo" src="img/logo2-pequeno.png" alt="logo" width="130"  height="130" align="left"></td>
    <td>&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;</td>
      <td align="center"> 
        <h2 class="cabeçalho">Médico Veterinário</h2>                   
        <h2 class="cabeçalho">'.$nome.' '.$apelidos.'</h2>
        <h2 class="cabeçalho">Tel. '.$telefone_med.'</h2>
        <h2 class="cabeçalho">'.$morada_med.', '.$localidade_med.'</h2>
      </td>

  </tr>
 
</table> 
                           
</div>
<br>
<h2 class="titulo">Prescrição Médica</h2>
<br><br>
<div>
<table align="right" style="border:0.1mm solid #220044; padding:1em 2em; background-color:#f7f7f9; ">
  <tr>
   
   
      <td align="center">                
        <h2 class="cabeçalho">Sr(a). '.$Nome_Cliente.'</h2>
        <h2 class="cabeçalho">'.$Telefone_Cliente.' </h2>
        <h2 class="cabeçalho">'.$Morada_Cli.', '.$Localidade_Cli.' </h2>
        <h2 class="cabeçalho">Animal: '.$Nome_Animal.'</h2>
        <h2 class="cabeçalho">Nº Chip: '.$Numero_Chip.'</h2>
      </td>

  </tr>
 
</table> 

</div>
<br><br><br>

<h2 style="border:0.1mm solid #220044; padding:1em 2em; background-color:#f7f7f9; " class="receita">Receita: '.$receita.'</h2>

<br><br><br>

<h2 style="border:0.1mm solid #220044; padding:1em 2em; background-color:#f7f7f9; " class="receita">Posologia: '.$posologia.'</h2>

<br><br><br>

<h2 style="border:0.1mm solid #220044; padding:1em 2em; background-color:#f7f7f9; " class="receita">Observações: '.$observacoes.'</h2>

<br><br><br>

<h2 class="receita">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Data: '.$Data.' </h2>
<br><br><br>
<h2 class="receita" align="right">Assinatura do Médico Veterinário </h2>






';
/* Start to develop here. Best regards https://php-download.com/ */


// Saves file on the server as 'filename.pdf'


require_once __DIR__ . '/vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf();

// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output($Numero_Receita.'.pdf');

	
				
			header("location: HistoricoServicosBasico.php");
			} else {
				echo "Error: " . $sql . "<br>" . mysqli_error($conn);
				echo $Codigo_Servico;
			}
			


    



?>