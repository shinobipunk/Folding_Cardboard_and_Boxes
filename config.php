<?php

function Conectarse(){

/*Si estas hacienda este

tutorial desde tu PC con WampServer deja estos datos como estan */

if (!($link=mysql_connect("localhost","root","afireinside"))) {
echo "Error conectando a la base de datos.";
exit();
} 

/*en nombre_BD va el nombre de la BD que creaste al principio*/

if (!mysql_select_db("usuario_login",$link)){
echo "Error seleccionando la base de datos.";
exit();
}
return $link;
}
$link = Conectarse();

mysql_close($link); //cierra la conexion

?>