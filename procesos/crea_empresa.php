<?php

include dirname(dirname(__FILE__))."/config.php";

$link=Conectarse();

$empresa = $_POST['empresa'];
$sucursal = $_POST['sucursal'];



$query = sprintf("SELECT * FROM empresas WHERE empresas.empresa = '%s' AND empresas.sucursal = '%s'",
$empresa, $sucursal);

$result=mysql_query($query,$link) or die(mysql_error());

if(mysql_num_rows($result)){	
	header("Location: ../admin/clientes.php?existeempresa=1");
} else {
	mysql_free_result($result) or die(mysql_error());

		

		$query= sprintf("INSERT INTO empresas (empresa, sucursal)

VALUES ( '%s','%s')",$empresa, $sucursal);

	

		$result=mysql_query($query,$link) or die(mysql_error()); 
		

		if(mysql_affected_rows()){
			header("Location: ../admin/clientes.php?exitoempresa=1");
		} else {
			header("Location: ../admin/clientes.php?errorempresa=1");
			
		}
	
}
?>