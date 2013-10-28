<?php

include dirname(dirname(__FILE__))."/config.php";

$link=Conectarse();

$nombre= $_POST['nombre'];
$email = $_POST['email'];
$empresa = $_POST['empresa'];
$sucursal = $_POST['sucursal'];
$creado = $_POST['creado2'];




$query = sprintf("SELECT * FROM encargados WHERE encargados.empresa = '%s' AND encargados.nombre = '%s' AND encargados.sucursal = '%s' OR encargados.email = '%s'" ,
$empresa, $nombre, $sucursal, $email);

$result=mysql_query($query,$link) or die(mysql_error());

if(mysql_num_rows($result)){	
	header("Location: ../admin/clientes.php?existeencargado=1");
} else {
	mysql_free_result($result) or die(mysql_error());	

		

	

$query = sprintf("INSERT INTO encargados (empresa, nombre, email, sucursal, creado)

VALUES ('%s', '%s', '%s', '%s', '%s')",$empresa, $nombre, $email, $sucursal, $creado);		

		
		$result=mysql_query($query,$link) or die(mysql_error()); 

		if(mysql_affected_rows()){
			header("Location: ../admin/clientes.php?exitoencargado=1");
		} else {
			header("Location: ../admin/clientes.php?error=1");
			
		}
	
}

?>