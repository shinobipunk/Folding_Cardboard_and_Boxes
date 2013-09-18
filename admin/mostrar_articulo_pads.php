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
                                                   
                            
                             //echo "<form name='editaralmacen' action='../procesos/edita_almacen.php' method='POST'>";
                           
                            echo "<br />Gramos:";
                            echo "<br />";
                            echo "<input id='gramosalmacen' type='text'name='gramosalmacen' value='". $row[3] . "' disabled />";
                            
                            echo "<br />Precio_KG:";
                            echo "<br />";
                            echo "<input id='preciokgalmacen' type='text' name='preciokgalmacen' value='". $row[5] . "' disabled />";                            
                           // echo "</form>";                             
                            echo "<br />";                            
                                                     
                            



  }
 

?>