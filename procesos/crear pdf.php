<?php
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
<div class="derecha">Date: September 22nd 2013, 6:14:35 am</div>
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
			<p class="negrita">Company:<span class="campo"> Nanolabs</span> </p>
			<p class="negrita">Contact:<span class="campo">Elias Marin Chaparro</span></p>
		</td>
		
	<td></td>
	</tr>
	<tr>
		
	<td></td>
	</tr>
</table>

<h1 class="centrar">Description PADS</h1>
<p class="negrita">Part Number:<span class="campo"> 24234234234</span> </p>
<table id="pads_tabla" border="0">	
	<tr>
		<th>Folio</th>
		<th># of Pads</th>
		<th>Width</th>
		<th>Height</th>
		<th>Material</th>
		<th>Caliber</th>
		<th>Unit Price</th>
		<th>Total Pads</th>		
	</tr>
	<tr>
		<td>1</td>
		<td>2</td>
		<td>13</td>
		<td>14</td>
		<td>Kraft</td>
		<td>47</td>
		<td>0.147</td>
		<td>0.294</td>
	</tr>
	<tr>
		<td>1</td>
		<td>12</td>
		<td>11</td>
		<td>15</td>
		<td>Poly Kraft</td>
		<td>30</td>
		<td>0.141</td>
		<td>1.687</td>
	</tr>
	<tr>
		<td>1</td>
		<td>1876</td>
		<td>18</td>
		<td>21</td>
		<td>Wax</td>
		<td>47</td>
		<td>0.489</td>
		<td>917.206</td>
	</tr>
</table>

<br>
<h1 class="derecha">Total: <span class="campo"> $919.187</span></h1>
<p class="derecha">Made by: <span class="campo"> Aide Torres</span></p>

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
    file_put_contents('../cotizaciones/test.pdf', $output);
exit();
?>