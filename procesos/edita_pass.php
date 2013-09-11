<?php

include dirname(dirname(__FILE__))."/config.php";

$link=Conectarse();

$loginedit = $_POST['usuariopass'];
$passedit = $_POST['pass1edit'];
$passedit2 = $_POST['pass2edit'];
$modificado = $_POST['modificado'];

	

if($passedit!=$passedit2) {		
		header("Location: ../admin/usuarios.php?coincidirpass=1");
	} else {

		$pass1=sha1(md5($passedit));

		$query = sprintf("UPDATE usuarios SET usuarios.password= '%s', usuarios.modificado= '%s' WHERE usuarios.login = '%s'" ,
		$pass1, $modificado, $loginedit);
		$result=mysql_query($query,$link) or die(mysql_error());


		if(mysql_affected_rows()){
			header("Location: ../admin/usuarios.php?exitopass=1");
		} else {
			header("Location: ../admin/usuarios.php?error=1");			
		}
	}	
?>