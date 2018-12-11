<?php  
 $connect = mysqli_connect("localhost", "root", "", "atual");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $Nome = mysqli_real_escape_string($connect, $_POST["Nome"]);  
      $Morada = mysqli_real_escape_string($connect, $_POST["Morada"]);  
      $Telefone = mysqli_real_escape_string($connect, $_POST["Telefone"]);  
      $Email = mysqli_real_escape_string($connect, $_POST["Email"]); 
      $Localidade = mysqli_real_escape_string($connect, $_POST["Localidade"]);  
      $Nif = mysqli_real_escape_string($connect, $_POST["Nif"]);  
      $Codigo_Postal = mysqli_real_escape_string($connect, $_POST["Codigo_Postal"]); 
      $Pais = mysqli_real_escape_string($connect, $_POST["Pais"]);  
    
      if($_POST["Numero_Cliente"] != '')  
      {  
           $query = "  
           UPDATE cliente   
           SET Nome='$Nome' WHERE Numero_Cliente='".$_POST["Numero_Cliente"]."'"; 

           $message = 'Data Updated';  
      }  
      else  
      {  
           $query = "  
           INSERT INTO cliente VALUES(NULL,'$Nome','$Morada','$Telefone','$Email','$Localidade','$Nif','$Codigo_Postal','$Pais','30') ;  
           ";  
           $message = 'Data Inserted';  
      }  
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM cliente ORDER BY Numero_Cliente DESC";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                          <th width="70%">Descricao</th>  
                          <th width="15%">Edit</th>  
                          <th width="15%">View</th>  
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>' . $row["Nome"] . '</td>  
                          <td><input type="button" name="edit" value="Edit" id="'.$row["Numero_Cliente"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                          <td><input type="button" name="view" value="view" id="' . $row["Numero_Cliente"] . '" class="btn btn-info btn-xs view_data" /></td>  
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output;  
 }  
 ?>