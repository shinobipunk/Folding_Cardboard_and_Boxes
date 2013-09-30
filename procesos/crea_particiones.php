<?php


if(isset($_POST['btnenviar'])) 
{ 
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

			$encargado = $_POST['encargado'];

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
					


			///////////////////////////////////////////////////////////////////////////////////////////
			///////////////////////////////////////////////////////////////////////////////////////////
			/////////////////////////             PDF                        //////////////////////////
			///////////////////////////////////////////////////////////////////////////////////////////
			///////////////////////////////////////////////////////////////////////////////////////////

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


			require_once("dompdf/dompdf_config.inc.php");

			// Especificamos los datos dinamicos en variables para un mejor manejo más adelante.
			// En este caso el nombre recibido de un formulario


			// Escribimos en una variable el codigo html que deseamos, en este caso texto HTML y PHP.
			$html = '<html xmlns="http://www.w3.org/1999/xhtml">

			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Titulo del documento.</title>
			<link type="text/css" href="pdf.css" rel="stylesheet"   media="screen"/>
			</head>

			<body>
			<div class="derecha">'; $html.=$fecha; $html.='</div>
			<table id="header" border="0">	
				<tr>
					<td>
						<img src="logo.jpg" width=305  heigth=99 />	
						<p class="negrita">10950 Pelicano Dr. Glug B1</p>
						<p class="negrita">El Paso TX 79935</p>
						<p class="negrita">Ph. 915 543 1459</p>
						<p>www.cardboardandboxes.com</p>
					</td>
				<td></td>
				</tr>
			</table>

			<table id="tabla_empresa" border="0">
				<tr>
					<td>
						<p class="negrita">Company:<span class="campo">'; $html.=$cliente;  $html.='</span> </p>
						<p class="negrita">Contact:<span class="campo">'; $html.=$encargado;  $html.='</span></p>
					</td>
					
				<td></td>
				</tr>
				<tr>
					
				<td></td>
				</tr>
			</table>

			<h1 class="centrar">Description Partitions</h1>
			<p class="negrita">Part Number:<span class="campo"> '; $html.=$noparte; $html.='</span> </p>
			<table id="pads_tabla" border="0">	
				<tr>
					
					<th># of Sets</th>
					<th>Segments A</th>
					<th>Width A</th>
					<th>Height A</th>
					<th>Segments B</th>
					<th>Width B</th>
					<th>Height B</th>
					<th>Material</th>
					<th>Caliber</th>
					<th>Unit Price</th>
					<th>Total Pads</th>		
				</tr>';  foreach ($datos as $datosxs) {	$html.=' 

							
				<tr>
					
					<td>'; $html.=$x[$nosets]; $html.=' </td>
					<td>'; $html.=$x[$segmentosa]; $html.=' </td>
					<td>'; $html.=$x[$largoa]; $html.=' </td>
					<td>'; $html.=$x[$altoa]; $html.=' </td>
					<td>'; $html.=$x[$segmentosb]; $html.=' </td>
					<td>'; $html.=$x[$largob]; $html.=' </td>
					<td>'; $html.=$x[$altob]; $html.=' </td>
					<td>'; $html.=$x[$material]; $html.=' </td>
					<td>'; $html.=$x[$calibre]; $html.=' </td>
					<td>'; $html.=$x[$unitario]; $html.=' </td>
					<td>'; $html.=$x[$total]; $html.=' </td>
				</tr>
				';
							$sumatotal = $sumatotal + $x[$total];

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
			} $html.=' 
			</table>

			<br>
			<h1 class="derecha">Total: <span class="campo"> $ '; $html.=$sumatotal; $html.=' </span></h1>
			<p class="derecha">Made by: <span class="campo"> '; $html.=$creado; $html.=' </span></p>

			</body>
			</html>'; // Cerramos la variable para agregarla código PHP


			//$html.= $nombre; // Agregamos a la variable $html nuestro dato dinamico.

			//$html.=', estas visualizando un PDF creado sobre HTML y PHP.</p>



			// Creamos una instancia a la clase
			$dompdf = new DOMPDF();

			// Especificamos la variable donde hemos recogido el html.
			$dompdf->load_html($html);
			$dompdf->render();

			// Nos muestra el PDF con el titulo
			//$dompdf->stream("ejemplo-DomPDF.pdf");
			$output = $dompdf->output();
			    file_put_contents('../cotizaciones/'.$nofolio.'_'.$noparte.'_'.$cliente.'_.pdf', $output);

			///////////////////////////////////////////////////////////////////////////////////////////
			///////////////////////////////////////////////////////////////////////////////////////////
			///////////////////////////////////////////////////////////////////////////////////////////
			///////////////////////////////////////////////////////////////////////////////////////////




			$subject = "Cotizacion Folding Cardboard & Boxes Inc" . '-' . $cliente;

			$message = "x" . $nofolio . "Listado\n" . $lista ."\nFecha:" . $fecha . "\n# de parte: ". $noparte . "\n# de Pads: " . $nopads . "\nLargo: " . $largo . "\nAlto: " . $alto . "\nMaterial: " . $material . "\nCalibre: " . $calibre . "\nBobina: " . $bobina .  "\nGramos: " . $gramos. "\nKg: " . $kg . "\nPrecio x Kg: " . $preciokg .  "\nSubtotal: " . $subtotal ."\nTotal: " . $total ;






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











					
} 
else if(isset($_POST['btnprev'])) 
{ 
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

			$encargado = $_POST['encargado'];

			$creado = $_POST['creado'];







			/////////////////////////////// Base de Datos ///////////////////////////////////////////////////////////
					




					

						
						
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
							
						}											
		


			///////////////////////////////////////////////////////////////////////////////////////////
			///////////////////////////////////////////////////////////////////////////////////////////
			/////////////////////////             PDF                        //////////////////////////
			///////////////////////////////////////////////////////////////////////////////////////////
			///////////////////////////////////////////////////////////////////////////////////////////

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


			require_once("dompdf/dompdf_config.inc.php");

			// Especificamos los datos dinamicos en variables para un mejor manejo más adelante.
			// En este caso el nombre recibido de un formulario


			// Escribimos en una variable el codigo html que deseamos, en este caso texto HTML y PHP.
			$html = '<html xmlns="http://www.w3.org/1999/xhtml">

			<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Titulo del documento.</title>
			<link type="text/css" href="pdf.css" rel="stylesheet"   media="screen"/>
			</head>

			<body>
			<div class="derecha">'; $html.=$fecha; $html.='</div>
			<table id="header" border="0">	
				<tr>
					<td>
						<img src="logo.jpg" width=305  heigth=99 />	
						<p class="negrita">10950 Pelicano Dr. Glug B1</p>
						<p class="negrita">El Paso TX 79935</p>
						<p class="negrita">Ph. 915 543 1459</p>
						<p>www.cardboardandboxes.com</p>
					</td>
				<td></td>
				</tr>
			</table>

			<table id="tabla_empresa" border="0">
				<tr>
					<td>
						<p class="negrita">Company:<span class="campo">'; $html.=$cliente;  $html.='</span> </p>
						<p class="negrita">Contact:<span class="campo">'; $html.=$encargado;  $html.='</span></p>
					</td>
					
				<td></td>
				</tr>
				<tr>
					
				<td></td>
				</tr>
			</table>

			<h1 class="centrar">Description Partitions</h1>
			<p class="negrita">Part Number:<span class="campo"> '; $html.=$noparte; $html.='</span> </p>
			<table id="pads_tabla" border="0">	
				<tr>
					
					<th># of Sets</th>
					<th>Segments A</th>
					<th>Width A</th>
					<th>Height A</th>
					<th>Segments B</th>
					<th>Width B</th>
					<th>Height B</th>
					<th>Material</th>
					<th>Caliber</th>
					<th>Unit Price</th>
					<th>Total Pads</th>		
				</tr>';  foreach ($datos as $datosxs) {	$html.=' 

							
				<tr>
					
					<td>'; $html.=$x[$nosets]; $html.=' </td>
					<td>'; $html.=$x[$segmentosa]; $html.=' </td>
					<td>'; $html.=$x[$largoa]; $html.=' </td>
					<td>'; $html.=$x[$altoa]; $html.=' </td>
					<td>'; $html.=$x[$segmentosb]; $html.=' </td>
					<td>'; $html.=$x[$largob]; $html.=' </td>
					<td>'; $html.=$x[$altob]; $html.=' </td>
					<td>'; $html.=$x[$material]; $html.=' </td>
					<td>'; $html.=$x[$calibre]; $html.=' </td>
					<td>'; $html.=$x[$unitario]; $html.=' </td>
					<td>'; $html.=$x[$total]; $html.=' </td>
				</tr>
				';
							$sumatotal = $sumatotal + $x[$total];

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
			} $html.=' 
			</table>

			<br>
			<h1 class="derecha">Total: <span class="campo"> $ '; $html.=$sumatotal; $html.=' </span></h1>
			<p class="derecha">Made by: <span class="campo"> '; $html.=$creado; $html.=' </span></p>

			</body>
			</html>'; // Cerramos la variable para agregarla código PHP


			//$html.= $nombre; // Agregamos a la variable $html nuestro dato dinamico.

			//$html.=', estas visualizando un PDF creado sobre HTML y PHP.</p>



			// Creamos una instancia a la clase
			$dompdf = new DOMPDF();

			// Especificamos la variable donde hemos recogido el html.
			$dompdf->load_html($html);
			$dompdf->render();

			$dompdf->stream('vista_previa_'.$noparte.'_'.$cliente.'_.pdf');
 
}






?>