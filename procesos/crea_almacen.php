<?php

include dirname(dirname(__FILE__))."/config.php";

$link=Conectarse();

$calibre = $_POST['calibre'];
$material = $_POST['material'];
$gramos= $_POST['gramos'];
$bobina=$_POST['bobina'];
$precio= $_POST['precio'];
$existencia = $_POST['existencia'];
$creado = $_POST['creado'];



$query = sprintf("SELECT calibre FROM almacen WHERE almacen.calibre = '%s' AND almacen.material = '%s' AND almacen.gramos = '%s' AND almacen.bobina = '%s'",
$calibre, $material, $gramos, $bobina);

$result=mysql_query($query,$link) or die(mysql_error());

if(mysql_num_rows($result)){	
	header("Location: ../admin/almacen.php?existe=1");
} else {
	mysql_free_result($result) or die(mysql_error());	

		

		$query = sprintf("INSERT INTO almacen (calibre, material, gramos, bobina, precio_kg, existencia, creado)

VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s')",$calibre, $material, $gramos, $bobina, $precio, $existencia, $creado);

		$result=mysql_query($query,$link) or die(mysql_error()); 

		if(mysql_affected_rows()){
			header("Location: ../admin/almacen.php?exito=1");
		} else {
			header("Location: ../admin/almacen.php?error=1");
			
		}
	
}

?>