<?php
session_start();
$e = $_GET['e'];
include dirname(dirname(__FILE__))."/config.php";

$link=Conectarse();


 $query = sprintf("SELECT * FROM encargados WHERE nombre = '".$e."'");
     $result=mysql_query($query,$link) or die(mysql_error()); 

$sesionlog = $_SESSION["nombre"].' '.$_SESSION["apaterno"];



while($row=mysql_fetch_array($result,MYSQLI_NUM))
  {
                           
                            echo "<br />E-mail:";
                            echo "<br />";
                            echo "<input id='email' type='email' name='email'  value='". $row[2] . "' required />";                            
                            echo "<input id='encargado' type='hidden' name='encargado'  value='". $row[1] . "' required />";
                           
                          
  }

?>