<?php

include dirname(dirname(__FILE__))."/config.php";

$link=Conectarse();

$tipo = "Particiones";

$listado = $_POST['listado'];

$email = $_POST['email'];

$lista = join("><", $_POST['listado']);

$noparte = $_POST['noparte'];

$fecha = $_POST['fechaescondido'];

$cliente = $_POST['cliente'];

$desperdicio = $_POST['desperdicio'];

$creado = $_POST['creado'];







/////////////////////////////// Base de Datos ///////////////////////////////////////////////////////////
		




		$query = sprintf("INSERT INTO cotizaciones (no_parte, fecha, empresa, tipo, creado)

		VALUES ('%s', '%s', '%s', '%s', '%s')", $noparte, $fecha, $cliente, $tipo, $creado );

		$result=mysql_query($query,$link) or die(mysql_error()); 

		if(mysql_affected_rows()){

			
			
			$nosets =0;
			$segmentosa =1;
			$largoa =2;
			$altoa =3;
			$segmentosb =4;
			$largob =5;
			$altob =6;
			$material =7;
			$calibre =8;
			$bobina =9;
			$unitario =10;
			$total =11;



			$datos = explode("><",$lista);



			
			//$datosx = explode("-   -",$datos);
			foreach ($datos as $datosxs) {	
					
				$ar = implode("-   -",$datos);

				$x = explode("-   -",$ar);
				
				/*echo "no pads: ".$x[$xpads]. "<br>";
				echo "largo: ".$x[$xlargo]. "<br>";
				echo "alto: ".$x[$xalto]. "<br>";
				echo "material: ".$x[$xmaterial]. "<br>";
				echo "calibre: ".$x[$xcalibre]. "<br>";
				echo "bobina: ".$x[$xbobina]. "<br>";
				echo "desperdicio: ".$x[$xdesperdicio]. "<br>";
				echo "precio_unitario: ".$x[$xunitario]. "<br>";
				echo "total: ".$x[$xtotal]. "<br>";
*/
				$c++;

					$query = sprintf("INSERT INTO articulos_particiones ( no_parte,no_sets, segmentos_a, largo_a, alto_a,segmentos_b, largo_b, alto_b, material, calibre, bobina, precio_unitario, total, tipo)

					VALUES ('%s','%s', '%s', '%s', '%s', '%s','%s','%s','%s','%s','%s','%s','%s','%s')", $noparte, $x[$nosets], $x[$segmentosa], $x[$largoa], $x[$altoa],$x[$segmentosb], $x[$largob], $x[$altob], $x[$material], $x[$calibre], $x[$bobina],  $x[$unitario], $x[$total], $tipo );

					$result=mysql_query($query,$link) or die(mysql_error()); 

					if(mysql_affected_rows()){
						
					} else {
						header("Location: ../admin/particiones.php?error=1");
						
					}
				
			
			$nosets +=12;
			$segmentosa +=12;
			$largoa +=12;
			$altoa +=12;
			$segmentosb +=12;
			$largob +=12;
			$altob +=12;
			$material +=12;
			$calibre +=12;
			$bobina +=12;
			$unitario +=12;
			$total +=12;

			} 


$query = sprintf("SELECT folio FROM cotizaciones WHERE cotizaciones.no_parte = '%s'",$noparte);
     $result=mysql_query($query,$link) or die(mysql_error()); 
   

while($row=mysql_fetch_array($result,MYSQLI_NUM))
  {
  	
  	$nofolio = $row[0];
  	
  }
		

$subject = "Cotizacion Folding Cardboard & Boxes Inc" . '-' . $cliente;

$message = "x" . $nofolio . "Listado\n" . $lista ."\nFecha:" . $fecha . "\n# de parte: ". $noparte . "\n# de Pads: " . $nopads . "\nLargo: " . $largo . "\nAlto: " . $alto . "\nMaterial: " . $material . "\nCalibre: " . $calibre . "\nBobina: " . $bobina .  "\nGramos: " . $gramos. "\nKg: " . $kg . "\nPrecio x Kg: " . $preciokg .  "\nSubtotal: " . $subtotal ."\nTotal: " . $total ;


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

$pdf->Cell(40,10,"Folio \f\f # de Pads:\f\f Largo:\f\f Alto:\f\f Material:\f\f Calibre:\f\f Precio Unitario:\f\f Total: ");

$pdf->Ln(10);

$pdf->SetFont('Arial','B',8);

$pdf->Cell(40,10,"Cotizaciones");

$pdf->Ln(10);



foreach ($listado as $listados) {

//$arreglo[] = explode(" ",$listados);

//$tam = sizeof($arreglo);

//$pdf->Cell(40,10,$listados);

$pdf->WriteHTML($listados);	

//for ($w=0; $w<$tam; $w++){

//$pdf->WriteHTML($arreglo[w] );

	

//}

$pdf->Ln(10);

}



$pdf->Output('../cotizaciones/' . $nofolio . '_' . $noparte . '_' . $cliente.'_' . '.pdf', 'F');



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

$mail->Subject = 'Cotizacion'. '_'. $noparte.'_' . $nofolio . '_' . $fecha;

//Read an HTML message body from an external file, convert referenced images to embedded, convert HTML into a basic plain-text alternative body

$mail->MsgHTML(file_get_contents('pdf/cuerpomail.html'), dirname(__FILE__));

//Replace the plain text body with one created manually

$mail->AltBody = 'This is a plain-text message body';

//Attach an image file

$mail->AddAttachment('../cotizaciones/' . $nofolio . '_' . $noparte . '_' . $cliente.'_' . '.pdf');



//Send the message, check for errors

if(!$mail->Send()) {

  echo "Error al enviar cotizacion: " . $mail->ErrorInfo;

} else {

  

header("Location: ../admin/particiones.php?exito=1");

}



			
		} else {
			header("Location: ../admin/particiones.php?error=1");
			
		}





////////////////////////////////////////////////////////////////////////////////////////////////////////////



//mail($email,$subject,$message); 



////////////////////////////////////// PDF //////////////////////////////////////////////////////////////













//////////////////////////////////////////////////////////////////////////////////////////////////////////////











		



?>