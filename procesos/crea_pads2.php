<?php


$folio = $_POST['folio'];
$listado = $_POST['listado'];
$lista = join("\n", $_POST['listado']);
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



$subject = "Cotizacion Folding Cardboard & Boxes Inc" . '-' . $cliente;
$message = "x" . $folio . "Listado\n" . $lista ."\nFecha:" . $fecha . "\n# de parte: ". $noparte . "\n# de Pads: " . $nopads . "\nLargo: " . $largo . "\nAlto: " . $alto . "\nMaterial: " . $material . "\nCalibre: " . $calibre . "\nBobina: " . $bobina .  "\nGramos: " . $gramos. "\nKg: " . $kg . "\nPrecio x Kg: " . $preciokg .  "\nSubtotal: " . $subtotal ."\nTotal: " . $total ;



//mail($email,$subject,$message); 

////////////////////////////////////// PDF //////////////////////////////////////////////////////////////

require('pdf/fpdf.php');


$pdf=new PDF_HTML();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Image('http://nanolabs.com.mx/Elias/graficasistema/img/logo%20blanco.jpg',10,10,-300);
$pdf->WriteHTML('<br><br><br><p align="left">10950 Pelicano Dr. Glug B1</p><br>');
$pdf->WriteHTML('<p align="left">El Paso TX 79935</p><br>');
$pdf->WriteHTML('<p align="left">Ph. 915 543 1459</p><br>');
$pdf->WriteHTML('<p align="left">www.cardboardandboxes.com</p><br><hr>');
$pdf->WriteHTML('<p align="center">Date: '. $fecha .'</p><br>');
$pdf->Cell(40,10,"PADS ");
$pdf->Ln(10);
$pdf->Cell(40,10,"# de parte: ". $noparte );
$pdf->Ln(10);
$pdf->Cell(40,10,"Folio \f # de Pads: Largo: Alto: Material: Calibre: Precio Unitario Total: ");
$pdf->Ln(10);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(40,10,"Listado");
$pdf->Ln(10);

foreach ($listado as $listados) {

$pdf->Cell(40,10,$listados );
$pdf->Ln(10);
}

$pdf->Output('../cotizaciones/' . $folio . '_' . $cliente. '.pdf', 'F');

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////

//////////////////////////////// adjunto //////////////////////////////////////////////////////////////////////

require 'pdf/class.phpmailer.php';

//Create a new PHPMailer instance
$mail = new PHPMailer();
//Set who the message is to be sent from
$mail->SetFrom($email, 'Folding Cardboard & Boxes Inc.');
//Set an alternative reply-to address
$mail->AddReplyTo('replyto@example.com','First Last');
//Set who the message is to be sent to
$mail->AddAddress($email, $cliente);
//Set the subject line
$mail->Subject = 'Cotizacion'. '_' . $folio . '_' . $fecha;
//Read an HTML message body from an external file, convert referenced images to embedded, convert HTML into a basic plain-text alternative body
$mail->MsgHTML(file_get_contents('pdf/cuerpomail.html'), dirname(__FILE__));
//Replace the plain text body with one created manually
$mail->AltBody = 'This is a plain-text message body';
//Attach an image file
$mail->AddAttachment('../cotizaciones/'. $folio .'_' . $cliente . '.pdf');

//Send the message, check for errors
if(!$mail->Send()) {
  echo "Error al enviar cotizacion: " . $mail->ErrorInfo;
} else {
  
header("Location: ../admin/pads.php?exito=1");
}




//////////////////////////////////////////////////////////////////////////////////////////////////////////////





		

?>