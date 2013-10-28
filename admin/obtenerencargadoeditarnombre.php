<?php
session_start();
$sucursal = $_GET['sucursal'];
$empresa = $_GET['empresa'];
$nombre = $_GET['nombre'];
include dirname(dirname(__FILE__))."/config.php";


$link=Conectarse();


 $query = sprintf("SELECT * FROM encargados WHERE empresa = '%s' AND sucursal = '%s' AND nombre = '%s'", $empresa, $sucursal, $nombre);
     $result=mysql_query($query,$link) or die(mysql_error()); 

$sesionlog = $_SESSION["nombre"].' '.$_SESSION["apaterno"];

while($row=mysql_fetch_array($result,MYSQLI_NUM))
  {
                           
                            echo "<br /> Nombre:";
                            echo " <br />  ";
                            echo "<input id='nombreencargadoedit' type='text' name='nombreencargadoedit' value='". $row[1] . "' required />";
                            echo "<br /> E-mail:";
                            echo "<br />  ";
                            echo "<input id='emailencargadoedit' type='text' name='emailencargadoedit' value='". $row[2] . "' required />";
                            echo "<br />Creado por:";
                            echo "<br />";
                            echo "<input type='text' name='creado2'  value='". $row[6] ."' disabled required />";
                            echo "<br /> Modificado por:";
                            echo "<br />";                            
                            echo "<input type='text' name='modificadoedit' size='30' maxlength='100' value='". $row[5] ."' disabled required />";
                            echo "<input type='hidden' name='modificado2' size='30' maxlength='100' value='". $sesionlog ."' required />";
                            echo "<br />";                             
                            echo "<input type='submit' name='editar' value='Editar Encargado' />";
  }

                            


?>