<?php

include dirname(dirname(__FILE__))."/config.php";

$link=Conectarse();

$empresa = $_POST['encargadoeliminar'];
$sucursal = $_POST['sucursal'];
$nombre = $_POST['nombre'];


$query = sprintf("SELECT * FROM encargados WHERE encargados.empresa = '%s' AND encargados.sucursal = '%s' AND encargados.nombre = '%s'" ,
$empresa, $sucursal, $nombre);

$result=mysql_query($query,$link) or die(mysql_error());

$existen = mysql_num_rows($result);

if($existen == 0){	
	header("Location: ../admin/clientes.php?noexiste=1");
} else {
	mysql_free_result($result) or die(mysql_error());	

		
		$query = sprintf("DELETE FROM encargados WHERE  encargados.empresa = '%s' AND encargados.sucursal = '%s' AND encargados.nombre = '%s'" ,
$empresa, $sucursal, $nombre);



		$result=mysql_query($query,$link) or die(mysql_error()); 

		if(mysql_affected_rows()){
			header("Location: ../admin/clientes.php?exitoborradoencargado=1");
		} else {
			header("Location: ../admin/clientes.php?error=1");
			
		}

	
}

?>