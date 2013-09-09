<?php

include dirname(dirname(__FILE__))."/config.php";

$link=Conectarse();

$usuario = $_POST['usuarioeliminar'];


$query = sprintf("SELECT login FROM usuarios WHERE usuarios.login = '%s'" ,
$usuario);

$result=mysql_query($query,$link) or die(mysql_error());

$existen = mysql_num_rows($result);

if($existen == 0){	
	header("Location: ../admin/usuarios.php?noexiste=1");
} else {
	mysql_free_result($result) or die(mysql_error());	

		
		$query = sprintf("DELETE FROM usuarios WHERE usuarios.login = '%s'" ,
$usuario);



		$result=mysql_query($query,$link) or die(mysql_error()); 

		if(mysql_affected_rows()){
			header("Location: ../admin/usuarios.php?exitoborrado=1");
		} else {
			header("Location: ../admin/usuarios.php?error=1");
			
		}
	
}

?>