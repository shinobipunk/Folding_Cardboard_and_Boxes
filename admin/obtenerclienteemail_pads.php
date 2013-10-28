<?php
session_start();
$sucursal = $_GET['sucursal'];
$empresa = $_GET['empresa'];
$nombre = $_GET['nombre'];
include dirname(dirname(__FILE__))."/config.php";


$link=Conectarse();


 $query = sprintf("SELECT email FROM encargados WHERE encargados.empresa = '%s' AND encargados.sucursal = '%s' AND encargados.nombre = '%s' ", $empresa, $sucursal, $nombre);
     $result=mysql_query($query,$link) or die(mysql_error()); 

$sesionlog = $_SESSION["nombre"].' '.$_SESSION["apaterno"];

echo '<label>Email:</label> <br>';


while($row=mysql_fetch_array($result,MYSQLI_NUM))
  {
              
	echo ' <input id="email" name="email" value="'.$row[0].'" required>';                           
  }
echo '</select>';
                            
?>