<?php

include dirname(dirname(__FILE__))."/config.php";

$link=Conectarse();

$idedit = $_POST['idedit'];
$loginedit = $_POST['loginedit'];
$nombreedit = $_POST['nombreedit'];
$apaternoedit= $_POST['apaternoedit'];
$amaternoedit=$_POST['amaternoedit'];
$emailedit= $_POST['emailedit'];
$niveledit = $_POST['niveledit'];
$modificado = $_POST['modificado'];


	
$query = sprintf("UPDATE usuarios SET usuarios.login= '%s', usuarios.nombre= '%s', usuarios.apaterno = '%s', usuarios.amaterno = '%s', usuarios.email = '%s', usuarios.nivel= '%s', usuarios.modificado = '%s' WHERE usuarios.id = '%s'" ,
$loginedit, $nombreedit, $apaternoedit, $amaternoedit, $emailedit, $niveledit, $modificado, $idedit);
$result=mysql_query($query,$link) or die(mysql_error());



		if(mysql_affected_rows()){
			header("Location: ../admin/usuarios.php?exitoedit=1");
		} else {
			header("Location: ../admin/usuarios.php?error=1");			
		}
?>