<?php

include dirname(dirname(__FILE__))."/config.php";

$link=Conectarse();

$idedit = $_POST['idedit'];
$empresaedit = $_POST['empresaedit'];
$emailedit = $_POST['emailedit'];
$direccionedit= $_POST['direccionedit'];
$cpedit=$_POST['cpedit'];
$telefonoedit= $_POST['telefonoedit'];
$ciudadedit = $_POST['ciudadedit'];
$paisedit = $_POST['paisedit'];	
$modificado = $_POST['modificado'];

	
$query = sprintf("UPDATE clientes SET clientes.empresa= '%s', clientes.email= '%s', clientes.direccion = '%s', clientes.cp = '%s', clientes.telefono = '%s', clientes.ciudad = '%s', clientes.pais= '%s', clientes.modificado= '%s' WHERE clientes.id_cliente = '%s'" ,
$empresaedit, $emailedit, $direccionedit, $cpedit, $telefonoedit, $ciudadedit, $paisedit, $modificado, $idedit);
$result=mysql_query($query,$link) or die(mysql_error());



		if(mysql_affected_rows()){
			header("Location: ../admin/clientes.php?exitoedit=1");
		} else {
			header("Location: ../admin/clientes.php?error=1");			
		}
?>