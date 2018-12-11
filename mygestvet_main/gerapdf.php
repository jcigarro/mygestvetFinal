<?php 


require('fpdf.php');
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
$Data=$_REQUEST['Data'];

/* Start to develop here. Best regards https://php-download.com/ */

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    $this->Image('logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Title',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
for($i=1;$i<=40;$i++){
    $pdf->Cell(0,10,'Printing line number '.$i,0,1);

$pdf->Output('my_file.pdf','I'); 
$pdf->Output('my_file.pdf','F'); 


?>