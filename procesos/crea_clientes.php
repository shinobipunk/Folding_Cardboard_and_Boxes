<?php

include dirname(dirname(__FILE__))."/config.php";

$link=Conectarse();

$empresa = $_POST['empresa'];
$encargado = $_POST['encargado'];
$email = $_POST['email'];
$direccion= $_POST['direccion'];
$cp=$_POST['cp'];
$telefono= $_POST['telefono'];
$ciudad = $_POST['ciudad'];
$pais = $_POST['pais'];
$creado = $_POST['creado'];



$query = sprintf("SELECT empresa FROM clientes WHERE clientes.empresa = '%s'" ,
$empresa);

$result=mysql_query($query,$link) or die(mysql_error());

if(mysql_num_rows($result)){	
	header("Location: ../admin/clientes.php?existe=1");
} else {
	mysql_free_result($result) or die(mysql_error());	

		

		$query = sprintf("INSERT INTO clientes (empresa, encargado, email, direccion, cp, telefono, ciudad, pais, creado)

VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s','%s','%s')",$empresa, $encargado,  $email, $direccion, $cp, $telefono, $ciudad, $pais, $creado);

		$result=mysql_query($query,$link) or die(mysql_error()); 

		if(mysql_affected_rows()){
			header("Location: ../admin/clientes.php?exito=1");
		} else {
			header("Location: ../admin/clientes.php?error=1");
			
		}
	
}

?>