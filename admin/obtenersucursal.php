<?php
session_start();
$empresa = $_GET['empresa'];
include dirname(dirname(__FILE__))."/config.php";

$link=Conectarse();


 $query = sprintf("SELECT sucursal FROM empresas WHERE empresa = '".$empresa."'");
     $result=mysql_query($query,$link) or die(mysql_error()); 

$sesionlog = $_SESSION["nombre"].' '.$_SESSION["apaterno"];

echo '<label>Sucursal:</label> <br>';
echo ' <select id="sucursal" name="sucursal"><option  value=""  required> --Escoje una Sucursal-- </option>';

while($row=mysql_fetch_array($result,MYSQLI_NUM))
  {
              echo "<OPTION VALUE='".$row[0]."'>".$row[0]."</OPTION>";              
                           
  }
echo '</select>';
                            
?>

