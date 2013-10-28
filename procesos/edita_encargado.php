<?php

include dirname(dirname(__FILE__))."/config.php";

$link=Conectarse();

$sucursal = $_POST['sucursaledith2'];
$empresaedit = $_POST['empresaedith2'];
$nombre = $_POST['nombreencargadoedit'];
$email=$_POST['emailencargadoedit'];
$modificado = $_POST['modificado2'];


$query = sprintf("UPDATE encargados SET  encargados.nombre = '%s', encargados.email = '%s', encargados.modificado= '%s' WHERE encargados.empresa = '%s' AND encargados.sucursal = '%s' AND encargados.nombre = '%s'",
  $nombre, $email, $modificado, $empresaedit, $sucursal, $nombre);
$result=mysql_query($query,$link) or die(mysql_error());


		if(mysql_affected_rows()){
			header("Location: ../admin/clientes.php?exitoeditencargado=1");
		} else {
			header("Location: ../admin/clientes.php?error=1");			
		}
		
?>