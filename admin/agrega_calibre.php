<?php
session_start();
$material = $_GET['valormaterial'];
$w = $_GET['w'];
include dirname(dirname(__FILE__))."/config.php";


$link=Conectarse();


 $query = sprintf("SELECT * FROM almacen WHERE calibre = '%s'", $w);
     $result=mysql_query($query,$link) or die(mysql_error()); 


$sesionlog = $_SESSION["login"];


                             //echo "<form name='importararticulos' action='../procesos/agrega_calibre.php' method='POST'>"; 
                           
                            echo "<label for='agregabobina'>Bobina</label><br>";
                            echo "<select id='bobinaalmacen' onclick ='bobina_val()' name='almacenbobinaedit' onchange='mostrarbobina(this.value)'><option value=''> --Escoge la Bobina-- </option>";
                                
                                    $query = sprintf("SELECT bobina FROM almacen WHERE calibre = '%s' AND  material='%s' GROUP BY bobina", $w, $material);
                                    $result=mysql_query($query,$link) or die(mysql_error()); 
                                    while($row=mysql_fetch_array($result,MYSQLI_NUM)){
                                    echo "<OPTION VALUE='".$row[0]."'>".$row[0]."</OPTION>";
                                        }
                                
                            echo "</select>"; 
                             echo "<input id='valorbobina' type='hidden' name='valorbobina' required/>   ";       

                            echo "</form>";
                            

while($row=mysql_fetch_array($result,MYSQLI_NUM))
  {
                                                   
                            
                             echo "<form name='editaralmacen' action='../procesos/edita_almacen.php' method='POST'>";
                             echo " <table border='1' style='text-align:center;'>";
                             echo "<tr>";
                             echo "<th></th>";
                             echo "<th>ID</th>";
                             echo "<th>Calibre</th>";
                             echo "<th>Material</th>";
                             echo "<th>Gramos</th>";
                             echo "<th>Bobina</th>";
                             echo "<th>Precio_KG</th>";
                             echo "<th>Existencia</th>";
                             echo "</tr>";
                             echo "<tr>";
                             echo "<td><input type='checkbox' name='articulo' value='". $row[0] ." '></td>";
                             echo "<td>". $row[0] ."</td>";
                             echo "<td>". $row[1] ."</td>";
                             echo "<td>". $row[2] ."</td>";
                             echo "<td>". $row[3] ."</td>";
                             echo "<td>". $row[4] ."</td>";
                             echo "<td>". $row[5] ."</td>";
                             echo "<td>". $row[6] ."</td>";
                             echo "</tr>";                            
                             echo "</table>"; 
                             echo "</form>"; 
                            echo "<input type='hidden' name='modificado' size='30' maxlength='100' value='". $sesionlog ."' required />";
                            echo "<br />";                            
                            



  }
 

?>