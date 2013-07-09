<?php


$listado = join(", ", $_POST['listado']);

$fecha = $_POST['fechaescondido'];
$noparte = $_POST['noparte'];
$cliente = $_POST['cliente'];
$email = $_POST['email'];
$nopads = $_POST['nopads'];
$largo = $_POST['largo'];
$alto = $_POST['alto'];
$material = $_POST['material'];
$calibre = $_POST['tipocalibreescondido'];
$bobina = $_POST['bobinaescondido'];
$gramos = $_POST['grescondido'];
$preciokg = $_POST['preciokgescondido'];
$kg = $_POST['kgescondido'];
$subtotal = $_POST['subtotalescondido'];
$total = $_POST['utilidadescondido'];



$subject = "Cotizacion Folding Cardboard & Boxes Inc" . $cliente;
$message = "Listado" . $listado ."Fecha:" . $fecha . "\n# de parte: ". $noparte . "\n# de Pads: " . $nopads . "\nLargo: " . $largo . "\nAlto: " . $alto . "\nMaterial: " . $material . "\nCalibre: " . $calibre . "\nBobina: " . $bobina .  "\nGramos: " . $gramos. "\nKg: " . $kg . "\nPrecio x Kg: " . $preciokg .  "\nSubtotal: " . $subtotal ."\nTotal: " . $total ;



mail($email,$subject,$message); 

header("Location: ../admin/pads.php?exito=1");
		

?>