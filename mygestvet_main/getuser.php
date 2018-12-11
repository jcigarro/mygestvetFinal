<?php
include('config.php');
 	
$q=$_GET['q'];



$sql10="SELECT * FROM animal WHERE id = $q";

$result10 = mysqli_query($sql10);

echo "<table border='1'>
<tr>
<th>Firstname</th>
<th>Lastname</th>
<th>Age</th>
<th>Hometown</th>

</tr>";

while($row = mysqli_fetch_array($result10))
 {
 echo "<tr>";
 echo "<td>" . $row['Nome'] . "</td>";
 echo "<td>" . $row['Data_Nascimento'] . "</td>";
 echo "<td>" . $row['Raca'] . "</td>";
 echo "<td>" . $row['Alergias'] . "</td>";

 echo "</tr>";
 }
echo "</table>"; ggggggggggggggggg


?>