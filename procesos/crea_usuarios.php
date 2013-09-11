<?php

include dirname(dirname(__FILE__))."/config.php";

$link=Conectarse();

$login = $_POST['login'];
$pass1 = $_POST['pass1'];
$pass2 = $_POST['pass2'];
$nombre= $_POST['nombre'];
$apaterno=$_POST['apaterno'];
$amaterno= $_POST['amaterno'];
$email = $_POST['email'];
$nivel = $_POST['nivel'];
$creado = $_POST['creado'];

$query = sprintf("SELECT login FROM usuarios WHERE usuarios.login = '%s'" ,
$login);

$result=mysql_query($query,$link) or die(mysql_error());

if(mysql_num_rows($result)){	
	header("Location: ../admin/usuarios.php?existe=1");
} else {
	mysql_free_result($result) or die(mysql_error());

	if($pass1!=$pass2) {		
		header("Location: ../admin/usuarios.php?coincidir=1");
	} else {

		$pass1=sha1(md5($pass1));

		$query = sprintf("INSERT INTO usuarios (login, nombre, apaterno, amaterno, password, email, nivel, creado)

VALUES ('%s', '%s', '%s', '%s', '%s', '%s','%s','%s')",$login, $nombre, $apaterno,$amaterno, $pass1, $email, $nivel, $creado);

		$result=mysql_query($query,$link) or die(mysql_error()); 

		if(mysql_affected_rows()){
			header("Location: ../admin/usuarios.php?exito=1");
		} else {
			header("Location: ../admin/usuarios.php?error=1");
			
		}
	}
}

?>