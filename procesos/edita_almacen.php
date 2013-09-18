<?php

include dirname(dirname(__FILE__))."/config.php";

$link=Conectarse();

$id = $_POST['idedit'];
$materialedit = $_POST['materialedit'];
$calibreedit = $_POST['calibreedit'];
$gramosedit= $_POST['gramosedit'];
$bobinaedit=$_POST['bobinaedit'];
$precioedit= $_POST['precioedit'];
$existenciaedit = $_POST['existenciaedit'];
$modificadoedit = $_POST['modificadoedit'];

	
$query = sprintf("UPDATE almacen SET almacen.material= '%s', almacen.calibre= '%s', almacen.bobina = '%s', almacen.gramos = '%s', almacen.precio_kg = '%s', almacen.existencia= '%s', almacen.modificado = '%s' WHERE almacen.id_almacen = '%s'" ,
$materialedit, $calibreedit, $bobinaedit, $gramosedit, $precioedit, $existenciaedit, $modificadoedit, $id);
$result=mysql_query($query,$link) or die(mysql_error());



		if(mysql_affected_rows()){
			header("Location: ../admin/almacen.php?exitoedit=1");
		} else {
			header("Location: ../admin/almacen.php?error=1");			
		}
?>