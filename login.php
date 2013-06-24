

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Iniciar Sesión</title>
<script type="text/javascript"  src="js/modernizr.js"></script>		
		
</head>

<body>
<h1>Identificación</h1>
<form id="Formulario"  name ="FormLogin" action="procesos/procesa_login.php" method="POST">
	<br /><label for="login">Usuario:</label>
    <br />
	<input id="login" type="text" name="login" placeholder="     Usuario" title="El usuario es necesario." required>
	<br /><label for="password">Contraseña:</label>
    <br />
	<input id="password" type="password" name="pass" placeholder="     Contraseña" title="La Contraseña es necesaria." required>
    <br />
    <br />    
	<input class="boton" type="submit" value="Entrar">
</form>

<?php if (isset($_GET["incorrecto"]) AND $_GET["incorrecto"] == 1) { 

	echo "<h2>Usuario o Contraseña Incorrectos</h2>";
}

?>

<p><a href="formulario.php">Registrase en el Sistema</a></p>


</body>
</html>
