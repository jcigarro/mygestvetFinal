<?php
include_once ('../config_exemploassinatura.php');

$msg = "";
$id = $_GET['id'];

$nome = "";
$data = "";
$assi = "";
$sql = "SELECT * FROM assinatura WHERE id=".$id;
$result = mysqli_query($conn,$sql);
if ($result->num_rows > 0) {
    while ($row = mysqli_fetch_array($result)){
        $nome = $row['nome'];
        $data = implode('-', array_reverse(explode('-', substr($row['dth'],0,10))));
        $assi = $row['assinatura'];
    }
}


$msg = "<br><br>
    <div style='width:100%;'><br><br><h2>Assinatura</h2><br><h4>Nome: ".$nome." - Data: ".$data."</h4><br><br><img src='".$assi."' style='width:400px;height:200px;'></div>";
        

$header = "<header style='display:inline-block;'>
                <div style='width:15%;display:inline-block;'>
                    <img src='logo.jpg'>
                </div>
            </header>";

$footer = "<footer style='background-color: none; font-weight: normal; font-size: 10px; color: #aaaaaa; font-family: Arial, sans-serif;'>
                IEFP © 2018
            </footer>";

include('mpdf/mpdf.php'); // including mpdf.php
$mpdf = new mPDF('utf-8', 'A4',  5, 5, 10, 10, 20, 20);


$mpdf->WriteHTML($stylesheet,1);
$mpdf->SetHTMLHeader($header);
$mpdf->SetHTMLFooter($footer);
$mpdf->WriteHTML($msg);
$mpdf->Output();
