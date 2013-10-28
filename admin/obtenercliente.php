<?php
session_start();
$sucursal = $_GET['sucursal'];
$empresa = $_GET['empresa'];
include dirname(dirname(__FILE__))."/config.php";

$link=Conectarse();


 $query = sprintf("SELECT * FROM clientes WHERE empresa = '%s' AND sucursal = '%s'", $empresa, $sucursal);
     $result=mysql_query($query,$link) or die(mysql_error()); 

$sesionlog = $_SESSION["nombre"].' '.$_SESSION["apaterno"];

while($row=mysql_fetch_array($result,MYSQLI_NUM))
  {
                            echo "<form name='editarcliente' action='../procesos/edita_clientes.php' method='POST'>";                            
                            echo "<br /> Direccion:";
                            echo " <br />  ";
                            echo "<input id='direccion' type='text' name='direccionedit' value='". $row[3] . "' required />";
                            echo "<br /> Codigo Postal:";
                            echo "<br />  ";
                            echo "<input id='cp' type='text' name='cpedit' value='". $row[4] . "' required />";
                            echo "<br />Telefono:";
                            echo "<br />";
                            echo "<input id='telefono' type='text' name='telefonoedit' value='". $row[5] . "' required  />";
                            echo "<br />Ciudad:";
                            echo "<br />  ";
                            echo "<input type='text' name='ciudadedit' size='30' maxlength='100' value='". $row[6] . "' required />";
                            echo "<br />Pais:";
                            echo "<br />";
                            echo "<input type='text' name='paisedit' size='30' maxlength='100' value='". $row[7] . "' required />";
                            echo "<br />Creado por:";
                            echo "<br />";
                            echo "<input type='text' name='creado' size='30' maxlength='100' value='". $row[8] ."' disabled required />";
                            echo "<br />Modificado por:";
                            echo "<br />";
                            echo "<input type='text' name='modificadoedit' size='30' maxlength='100' value='". $row[9] ."' disabled required />";
                            echo "<input type='hidden' name='modificado' size='30' maxlength='100' value='". $sesionlog ."' required />";
                            echo "<br />";                             
                            echo "<input type='submit' name='editar' value='Editar Empresa' />";
                            echo "</form";
                            echo "<br />";
  }

                            


?>