<?php
session_start();
include dirname(dirname(__FILE__))."/config.php";

$link=Conectarse();


 $query = sprintf("SELECT MAX(folio) AS folio FROM cotizaciones");
     $result=mysql_query($query,$link) or die(mysql_error()); 

$sesionlog = $_SESSION["nombre"].' '.$_SESSION["apaterno"];


if ($row = mysql_fetch_row($result)) {
$nofolio = trim($row[0]);
$nofolio++;



echo "<input id='folio' type='text' name='folio' value='". $nofolio ."' disabled required /><br/> ";
}

?>