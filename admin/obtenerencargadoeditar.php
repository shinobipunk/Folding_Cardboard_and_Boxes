<?php
session_start();
$sucursal = $_GET['sucursal'];
$empresa = $_GET['empresa'];
include dirname(dirname(__FILE__))."/config.php";


$link=Conectarse();


 $query = sprintf("SELECT nombre FROM encargados WHERE empresa = '%s' AND sucursal = '%s'", $empresa, $sucursal);
     $result=mysql_query($query,$link) or die(mysql_error()); 

$sesionlog = $_SESSION["nombre"].' '.$_SESSION["apaterno"];

echo '<label>Nombre:</label> <br>';
echo ' <select id="nombreeditar2" name="nombreeditar2" value="" onchange="mostrarencargadoeditar(this.value)" ><option   required> --Escoje un Nombre-- </option>';

while($row=mysql_fetch_array($result,MYSQLI_NUM))
  {
              echo "<OPTION VALUE='".$row[0]."'>".$row[0]."</OPTION>";              
                           
  }
echo '</select>';

/*while($row=mysql_fetch_array($result,MYSQLI_NUM))
  {
                           
                            echo "<br /> Nombre:";
                            echo " <br />  ";
                            echo "<input id='nombreencargadoedit' type='text' name='nombreencargadoedit' value='". $row[1] . "' required />";
                            echo "<br /> E-mail:";
                            echo "<br />  ";
                              echo "<input id='emailencargadoedit' type='text' name='emailencargadoedit' value='". $row[2] . "' required />";
                            echo "<br />";
  }
*/
                            


?>