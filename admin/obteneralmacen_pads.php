<?php
session_start();
$q = $_GET['q'];
include dirname(dirname(__FILE__))."/config.php";

$link=Conectarse();

$verificar="SI";
 $query = sprintf("SELECT * FROM almacen WHERE material = '".$q."'");
     $result=mysql_query($query,$link) or die(mysql_error()); 


$sesionlog = $_SESSION["login"];
                                                                                                     

                           //echo "<form name='importararticulos' action='../procesos/agrega_calibre.php' method='POST'>"; 
                           
                            echo "<label for='agregacalibre'>Calibre</label><br>";
                            echo "<select id='calibrealmacen' name='almacencalibreedit' onclick ='calibre_val()' onchange='mostrarcalibre(this.value)'><option value=''> --Escoge el Calibre-- </option>";
                                
                                    $query = sprintf("SELECT calibre FROM almacen WHERE material = '%s' AND existencia ='%s'  GROUP BY calibre", $q, $verificar);
                                    $result=mysql_query($query,$link) or die(mysql_error()); 
                                    while($row=mysql_fetch_array($result,MYSQLI_NUM)){
                                    echo "<OPTION VALUE='".$row[0]."'>".$row[0]."</OPTION>";
                                        }
                                
                            echo "</select>";      
                            echo "<input id='valorcalibre' type='hidden' name='valorcalibre' required/>   ";                                                         
                            //echo "</form>";
                            echo "<div id='insertarcalibre'></div>";
                           


?>