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
                           
                            echo "<br />E-mail:";
                            echo "<br />";
                            echo "<input id='email' type='email' name='email' size='30' maxlength='100' value='". $row[2] . "' required />";
                           
                          
  }

?>