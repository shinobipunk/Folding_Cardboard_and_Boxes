<?php
session_start();
$material = $_GET['valormaterial'];
$calibre = $_GET['valorcalibre'];
$bobina = $_GET['m'];


include dirname(dirname(__FILE__))."/config.php";


$link=Conectarse();


 $query = sprintf("SELECT * FROM almacen WHERE material = '%s' AND calibre = '%s' AND bobina='%s'", $material, $calibre, $bobina);
     $result=mysql_query($query,$link) or die(mysql_error()); 


$sesionlog = $_SESSION["login"];


                            
while($row=mysql_fetch_array($result,MYSQLI_NUM))
  {
                                                   
                            
                             echo "<form name='editaralmacen' action='../procesos/edita_almacen.php' method='POST'>";
                            echo "Id:<br />";
                            echo "<input type='text' name='idalmacenedit' value='". $row[0] . "' disabled />";
                            echo "<input type='hidden' name='idedit' value='". $row[0] . "' />";
                            echo "<br /> Material:";
                            echo "<br />  ";                            
                            echo "<input type='text'name='materialedit' value='". $row[2] . "' required />";
                            echo "<br />";
                            echo "Calibre:";
                            echo "<br />";
                            echo "<input type='text'name='calibreedit' value='". $row[1] . "' required />";
                            echo "<br />Gramos:";
                            echo "<br />";
                            echo "<input type='text'name='gramosedit' value='". $row[3] . "' required />";
                            echo "<br />Bobina:";
                            echo "<br />";
                            echo "<input type='text'name='bobinaedit' value='". $row[4] . "' required />";
                            echo "<br />Precio_KG:";
                            echo "<br />";
                            echo "<input type='text' name='precioedit' value='". $row[5] . "' required />";
                            echo "<br />Existencia:";
                            echo "<br />";
                            echo "<select name='existenciaedit'>";
                            echo "<option value='". $row[6] . "'>". $row[6] . "</option>";
                            echo "<option value='SI'>SI</option>";
                            echo "<option value='NO'>NO</option>";                            
                            echo "</select>";                             
                            echo "<br />Creado por:";
                            echo "<br />"; 
                            echo "<input type='text' name='creado' size='30' maxlength='100' value='". $row[7] ."' disabled />";
                            echo "<br />Modificado por:";
                            echo "<br />"; 
                            echo "<input type='text' name='modificado' size='30' maxlength='100' value='". $row[8] ."' disabled />";
                            echo "<input type='hidden' name='modificadoedit' size='30' maxlength='100' value='". $sesionlog ."' required />";
                            echo "<br />"; 
                            echo "<input type='submit' name='crear'value='Editar Articulo'/> ";
                            echo "</form>";                             
                            echo "<br />";                            
                                                     
                            



  }
 

?>