<?php

function Conectarse(){

/*Si estas hacienda este

tutorial desde tu PC con WampServer deja estos datos como estan */

if (!($link=mysql_connect("graficasistema.db.8976774.hostedresource.com","graficasistema","Grafica1!"))) {
echo "Error conectando a la base de datos.";
exit();
}

/*en nombre_BD va el nombre de la BD que creaste al principio*/

if (!mysql_select_db("graficasistema",$link)){
echo "Error seleccionando la base de datos.";
exit();
}
return $link;
}
$link = Conectarse();

mysql_close($link); //cierra la conexion

?>