<?php

include dirname(dirname(__FILE__))."/config.php";

$link=Conectarse();

$empresa = $_POST['empresaeliminar'];
$sucursal = $_POST['sucursal'];


$query = sprintf("SELECT * FROM empresas WHERE empresas.empresa = '%s' AND empresas.sucursal = '%s'" ,
$empresa, $sucursal);

$result=mysql_query($query,$link) or die(mysql_error());

$existen = mysql_num_rows($result);

if($existen == 0){	
	header("Location: ../admin/clientes.php?noexiste=1");
} else {
	mysql_free_result($result) or die(mysql_error());	

		
		$query = sprintf("DELETE FROM empresas WHERE  empresas.empresa = '%s' AND empresas.sucursal = '%s'" ,
$empresa, $sucursal);



		$result=mysql_query($query,$link) or die(mysql_error()); 

		if(mysql_affected_rows()){

					$query = sprintf("SELECT * FROM clientes WHERE clientes.empresa = '%s' AND clientes.sucursal = '%s'" ,
					$empresa, $sucursal);

					$result=mysql_query($query,$link) or die(mysql_error());

					$existen = mysql_num_rows($result);

					if($existen == 0){	
						header("Location: ../admin/clientes.php?noexiste=1");
					} else {
						mysql_free_result($result) or die(mysql_error());	

							
							$query = sprintf("DELETE FROM clientes WHERE  clientes.empresa = '%s' AND clientes.sucursal = '%s'" ,
					$empresa, $sucursal);



							$result=mysql_query($query,$link) or die(mysql_error()); 

							if(mysql_affected_rows()){
								header("Location: ../admin/clientes.php?exitoborrado=1");
							} else {
								header("Location: ../admin/clientes.php?error=1");
								
							}
						
					}
			
		} else {
			header("Location: ../admin/clientes.php?error=1");
			
		}
	
}

?>