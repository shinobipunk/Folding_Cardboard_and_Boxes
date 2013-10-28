<?php
session_start();
$sucursal = $_GET['sucursal'];
$empresa = $_GET['empresa'];
include dirname(dirname(__FILE__))."/config.php";


$link=Conectarse();


 $query = sprintf("SELECT nombre FROM encargados WHERE encargados.empresa = '%s' AND encargados.sucursal = '%s' ", $empresa, $sucursal);
     $result=mysql_query($query,$link) or die(mysql_error()); 

$sesionlog = $_SESSION["nombre"].' '.$_SESSION["apaterno"];

echo '<label>Nombre:</label> <br>';
echo ' <select id="encargado" name="encargado" onchange="mostrarclienteemail(this.value)"><option  value=""  required> --Escoje el encargado-- </option>';

while($row=mysql_fetch_array($result,MYSQLI_NUM))
  {
              echo "<OPTION VALUE='".$row[0]."'>".$row[0]."</OPTION>";              
                           
  }
echo '</select>';
                            
?>