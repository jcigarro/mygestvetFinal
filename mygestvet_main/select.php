 <?php  
 if(isset($_POST["Numero_Cliente"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "atual");  
      $query = "SELECT * FROM cliente WHERE Numero_Cliente = '".$_POST["Numero_Cliente"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>Numero_Cliente</label></td>  
                     <td width="70%">'.$row["Numero_Cliente"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Nome</label></td>  
                     <td width="70%">'.$row["Nome"].'</td>  
                </tr>  
                
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
 }  
 ?>
 