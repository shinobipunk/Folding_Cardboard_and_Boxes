<?php





if(isset($_POST['btnenviar'])) 
{ 
  
/////////////////////////////// Base de Datos ///////////////////////////////////////////////////////////
		
include dirname(dirname(__FILE__))."/config.php";

$link=Conectarse();

$tipo = "PAD";

$listado = $_POST['listado'];

$email = $_POST['email'];

$lista = join("><", $_POST['listado']);

$noparte = $_POST['noparte'];

$fecha = $_POST['fechaescondido'];

$cliente = $_POST['cliente'];

$sucursal = $_POST['sucursal'];

$desperdicio = $_POST['desperdicio'];

$encargado = $_POST['encargado'];

$creado = $_POST['creado'];

$observaciones = $_POST['observaciones'];

$emailusuario = $_POST['emailusuario'];

$totalapagar = $_POST['totalapagar'];



$enviarusuario = $_POST['enviarusuario'];

$iteracioness = count($lista);



		$query = sprintf("INSERT INTO cotizaciones (no_parte, fecha, empresa, sucursal, encargado, tipo, observaciones, creado, total)

		VALUES ('%s','%s','%s','%s','%s', '%s', '%s', '%s', '%s')", $noparte, $fecha, $cliente, $sucursal, $encargado, $tipo, $observaciones, $creado, $totalapagar );

		$result=mysql_query($query,$link) or die(mysql_error()); 

		if(mysql_affected_rows()){

			$xpads = 0;
			$xlargo = 3;
			$xalto= 4;
			$xmaterial = 5;
			$xcalibre = 6;
			$xbobina = 7;
			$xdesperdicio = 2;
			$xunitario = 8;
			$xtotal = 9;
			$xextra = 10;



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
				

					$query = sprintf("INSERT INTO articulos ( no_parte, no_pads, largo, alto, material, calibre, bobina, desperdicio, precio_unitario, total, tipo, extra)

					VALUES ('%s','%s','%s', '%s', '%s', '%s', '%s','%s','%s','%s','%s','%s')", $noparte, $x[$xpads], $x[$xlargo], $x[$xalto], $x[$xmaterial], $x[$xcalibre], $x[$xbobina], $x[$xdesperdicio], $x[$xunitario], $x[$xtotal], $tipo, $x[$xextra] );

					$result=mysql_query($query,$link) or die(mysql_error()); 

					if(mysql_affected_rows()){
						
					} else {
						header("Location: ../admin/pads.php?error=1");
						
					}
				
				$xpads +=  11;
				$xlargo  += 11;
				$xalto += 11;
				$xmaterial += 11;
				$xcalibre += 11;
				$xbobina += 11;
				$xdesperdicio += 11;
				$xunitario += 11;
				$xtotal += 11;
				$xextra += 11;

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

	$xpads = 0;
	$xlargo = 3;
	$xalto= 4;
	$xmaterial = 5;
	$xcalibre = 6;
	$xbobina = 7;
	$xdesperdicio = 2;
	$xunitario = 8;
	$xtotal = 9;
	$xextra = 10;		


require_once("dompdf/dompdf_config.inc.php");

// Especificamos los datos dinamicos en variables para un mejor manejo más adelante.
// En este caso el nombre recibido de un formulario
$nombre = $_POST['nombre'];

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
			<p class="negrita">11800 Rojas Dr. Suite C23</p>
			<p class="negrita">El Paso TX 79936</p>
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
			<p class="negrita">Sucursal:<span class="campo">'; $html.=$sucursal;  $html.='</span></p>
			<p class="negrita">Contact:<span class="campo">'; $html.=$encargado;  $html.='</span></p>
		</td>
		
	<td></td>
	</tr>
	<tr>
		
	<td></td>
	</tr>
</table>

<h1 class="centrar">Description PADS</h1>
<p class="negrita">Part Number:<span class="campo"> '; $html.=$noparte; $html.='</span> </p>
<table id="pads_tabla" border="0">	
	<tr>
		
		<th># of Pads</th>
		<th>Width</th>
		<th>Height</th>
		<th>Material</th>
		<th>Caliber</th>
		<th>Unit Price</th>
		<th>Total Pads</th>		
	</tr>';  foreach ($datos as $datosxs) {	$html.=' 

				
	<tr>
		
		<td>'; $html.=$x[$xpads]; $html.=' </td>
		<td>'; $html.=$x[$xlargo]; $html.=' </td>
		<td>'; $html.=$x[$xalto]; $html.=' </td>
		<td>'; $html.=$x[$xmaterial]; $html.=' </td>
		<td>'; $html.=$x[$xcalibre]; $html.=' </td>
		<td>'; $html.=$x[$xunitario]; $html.=' </td>
		<td>'; $html.=$x[$xtotal]; $html.=' </td>
	</tr>
	';
				$sumatotal = $sumatotal + $x[$xtotal];

				$xpads +=  11;
				$xlargo  += 11;
				$xalto += 11;
				$xmaterial += 11;
				$xcalibre += 11;
				$xbobina += 11;
				$xdesperdicio += 11;
				$xunitario += 11;
				$xtotal += 11;	
				$xextra +=11;
} $html.=' 
</table>

<br>
<h1 class="derecha">Total: <span class="campo"> $ '; $html.=$totalapagar; $html.=' </span></h1>
<p class="derecha">Made by: <span class="campo"> '; $html.=$creado; $html.=' </span></p>
<p class="derecha">e-mail: <span class="campo"> '; $html.=$emailusuario; $html.=' </span></p>
<b>Observations:</b><br> <span class="campo"> '; $html.=$observaciones; $html.=' </span>

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




///////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////             MAIL                      //////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////

require 'pdf/class.phpmailer.php';



//Create a new PHPMailer instance

$mail = new PHPMailer();

//Set who the message is to be sent from

$mail->SetFrom($emailusuario, 'Folding Cardboard & Boxes Inc.');

//Set an alternative reply-to address

$mail->AddReplyTo($emailusuario,'Folding Cardboard & Boxes Inc.');

//Set who the message is to be sent to

$mail->AddAddress($email, $cliente);
if ($enviarusuario == "si")
{
	$mail->AddAddress($emailusuario, 'Folding Cardboard & Boxes Inc.');
}
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

  

header("Location: ../admin/pads.php?exito=1");

}



			
		} else {
			header("Location: ../admin/pads.php?error=1");
			
		} 
} 
else if(isset($_POST['btnprev']))  
	
 	{
					
		include dirname(dirname(__FILE__))."/config.php";

$link=Conectarse();

$tipo = "PAD";

$listado = $_POST['listado'];

$email = $_POST['email'];

$lista = join("><", $_POST['listado']);

$noparte = $_POST['noparte'];

$fecha = $_POST['fechaescondido'];

$cliente = $_POST['cliente'];

$sucursal = $_POST['sucursal'];

$desperdicio = $_POST['desperdicio'];

$encargado = $_POST['encargado'];

$creado = $_POST['creado'];

$observaciones = $_POST['observaciones'];

$emailusuario = $_POST['emailusuario'];

$totalapagar = $_POST['totalapagar'];


$iteracioness = count($lista);	




			///////////////////////////////////////////////////////////////////////////////////////////
			///////////////////////////////////////////////////////////////////////////////////////////
			/////////////////////////             PDF                        //////////////////////////
			///////////////////////////////////////////////////////////////////////////////////////////
			///////////////////////////////////////////////////////////////////////////////////////////

				$xpads = 0;
				$xlargo = 3;
				$xalto= 4;
				$xmaterial = 5;
				$xcalibre = 6;
				$xbobina = 7;
				$xdesperdicio = 2;
				$xunitario = 8;
				$xtotal = 9;	
				$xextra = 10;	
			$datos = explode("><",$lista);



			
			//$datosx = explode("-   -",$datos);
			foreach ($datos as $datosxs) {	
					
				$ar = implode("-   -",$datos);

				$x = explode("-   -",$ar);
			}

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
						<p class="negrita">Sucursal:<span class="campo">'; $html.=$sucursal;  $html.='</span></p>
						<p class="negrita">Contact:<span class="campo">'; $html.=$encargado;  $html.='</span></p>
					</td>
					
				<td></td>
				</tr>
				<tr>
					
				<td></td>
				</tr>
			</table>

			<h1 class="centrar">Description PADS</h1>
			<p class="negrita">Part Number:<span class="campo"> '; $html.=$noparte; $html.='</span> </p>
			<table id="pads_tabla" border="0">	
				<tr>
					
					<th># of Pads</th>
					<th>Width</th>
					<th>Height</th>
					<th>Material</th>
					<th>Caliber</th>
					<th>Unit Price</th>
					<th>Total Pads</th>		
				</tr>'; foreach ($datos as $datosxs) {					 							
				$html.='<tr>
					
					<td>'; $html.=$x[$xpads]; $html.=' </td>
					<td>'; $html.=$x[$xlargo]; $html.=' </td>
					<td>'; $html.=$x[$xalto]; $html.=' </td>
					<td>'; $html.=$x[$xmaterial]; $html.=' </td>
					<td>'; $html.=$x[$xcalibre]; $html.=' </td>
					<td>'; $html.=$x[$xunitario]; $html.=' </td>
					<td>'; $html.=$x[$xtotal]; $html.=' </td>
				</tr>
				';
							$sumatotal = $sumatotal + $x[$xtotal];

							$xpads +=  11;
							$xlargo  += 11;
							$xalto += 11;
							$xmaterial += 11;
							$xcalibre += 11;
							$xbobina += 11;
							$xdesperdicio += 11;
							$xunitario += 11;
							$xtotal += 11;	
							$xextra += 11;
			} 
							$html.=' 
			</table>

			<br>
			<h1 class="derecha">Total: <span class="campo"> $ '; $html.=$totalapagar; $html.=' </span></h1>
			<p class="derecha">Made by: <span class="campo"> '; $html.=$creado; $html.=' </span></p>
			<p class="derecha">e-mail: <span class="campo"> '; $html.=$emailusuario; $html.=' </span></p>
			<b>Observations:</b><br> <span class="campo"> '; $html.=$observaciones; $html.=' </span>

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

			// Nos muestra el PDF con el titulo
			//$dompdf->stream("ejemplo-DomPDF.pdf");
			

			///////////////////////////////////////////////////////////////////////////////////////////
			///////////////////////////////////////////////////////////////////////////////////////////
			///////////////////////////////////////////////////////////////////////////////////////////
			///////////////////////////////////////////////////////////////////////////////////////////



}

?>