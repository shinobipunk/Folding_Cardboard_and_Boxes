<?php
session_start();
$q = $_GET['q'];
include dirname(dirname(__FILE__))."/config.php";

$link=Conectarse();


 $query = sprintf("SELECT * FROM clientes WHERE empresa = '".$q."'");
     $result=mysql_query($query,$link) or die(mysql_error()); 

$sesionlog = $_SESSION["login"];

while($row=mysql_fetch_array($result,MYSQLI_NUM))
  {
                            echo "<form name='editarcliente' action='../procesos/edita_clientes.php' method='POST'>";
                            echo "<input type='hidden' name='idedit' size='30' maxlength='100' value='". $row[0] . "' required />";
                            echo "Nombre de la empresa:<br />";
                            echo "<input type='text' name='empresaedit' size='30' maxlength='100' value='". $row[1] . "' required />";
                            echo "<br />E-mail:";
                            echo "<br />";
                            echo "<input type='email' name='emailedit' size='30' maxlength='100' value='". $row[2] . "' required />";
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
                            echo "<input type='submit' name='editar' value='Editar Cliente' />";
                            echo "</form";
                            echo "<br />";
  }
echo "</table>";
?>