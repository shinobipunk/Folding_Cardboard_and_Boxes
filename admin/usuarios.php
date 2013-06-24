<?php
session_start();
?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Sistema de Cotizaciones | Usuarios</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="shortcut icon" href="../favicon.ico">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <style>
            body {
                padding-top: 60px;
                padding-bottom: 40px;
            }
        </style>
        <link rel="stylesheet" href="../css/bootstrap-responsive.min.css">
        <link rel="stylesheet" href="../css/main.css">
        <link rel="stylesheet" href="../css/icon.css" />

        <script src="../js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>        
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">Está utilizando un <strong> navegador obsoleto. </ strong> Por favor, <a href="http://browsehappy.com/"> actualice su navegador </ a> o <a href="http://www.google.com/chromeframe/?redirect=true"> active Google Chrome </ a> para mejorar su experiencia. </ p>
           <![endif]-->
		
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="#">Folding Cardboard & Boxes Inc.</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li><a href="usuario.php">Menu</a></li>
                            <li><a href="pads.php">PADS</a></li>
                            <li><a href="#">Particiones</a></li>
                                                        
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administrador <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                   <li><a href="#">Clientes</a></li>
		                            <li><a href="#">Cotizaciones</a></li>
		                            <li><a href="#">Almacen</a></li>		                            
                                    <li class="divider"></li>
                                    <li class="nav-header">Seguridad</li>
                                    <li class="active"><a href="usuarios.php">Usuarios</a></li>
                                </ul>
                            </li>
                        </ul>                      
                       

                        <form id="Formulario" class="navbar-form pull-right" name ="FormLogin" action="logout.php" method="POST">
						<label id="usuariolog"> <?php echo $_SESSION["nombre"]." ".$_SESSION["apaterno"]." ".$_SESSION["amaterno"]; ?></label>                                                                                        
                        <input class="btn" type="submit" value="Cerrar Sesion">
                    </form>
                        
                    </div>
                </div>
            </div>
        </div>

        <div class="container">

                               <?php if (isset($_GET["incorrecto"]) AND $_GET["incorrecto"] == 1) { 

                        echo "<h2 class=\"alert alert-error\">Usuario o Contraseña Incorrectos</h2>";
                    }

                    ?>




			<?php
			if($_SESSION["nivel"] == "AD"){
				 ?>

						 <?php 
							if (isset($_GET["existe"]) AND $_GET["existe"] == 1) { 
				                  echo "<h2 class=\"alert alert-error\">El usuario ya existe en la Base de Datos</h2>";
				                } 

				        ?>

				        <?php 
							if (isset($_GET["coincidir"]) AND $_GET["coincidir"] == 1) { 
				                  echo "<p class=\"alert alert-error\">Las Contraseñas deben de coincidir</p>";
				                } 

				        ?>

						<?php 
							if (isset($_GET["error"]) AND $_GET["error"] == 1) { 
				                  echo "<h2 class=\"alert alert-error\">Ocurrio un Error al Introducir los Datos</h2>";
				                } 

				        ?>

				        <?php 
							if (isset($_GET["exito"]) AND $_GET["exito"] == 1) { 
				                  echo "<h2 class=\"alert alert-success\">Usuario creado con exito!</h2>";
				                } 

				        ?>


			<form name="user_form" action="../procesos/crea_usuarios.php" method="POST">Nombre de Usuario(nick):<br />
				<input type="text" name="login" size="30" maxlength="100" required />
					<br /> Contraseña:
					<br />	
				<input id="pass1" type="password" name="pass1" required />
					<br />Repite Contraseña:
					<br />
				<input id="pass2" type="password" name="pass2" required  />
					<br />Nombre:
					<br />	
				<input type="text" name="nombre" size="30" maxlength="100" required />
					<br />
					Apellido Paterno:
					<br />
				<input type="text" name="apaterno" size="30" maxlength="100" required />
					<br />Apellido Materno:
					<br />
				<input type="text" name="amaterno" size="30" maxlength="100" required />
					<br />E-mail:
					<br />
				<input type="email" name="email" size="30" maxlength="100" required />
					<br />Nivel del Usuario:
					<br />
				<select name="nivel">
			        <option value="AD">Administrador</option>
			    	<option value="UN">Uusario Normal</option>
			    </select>
					<br />
			        <br />
				<input type="submit" name="crear" value="Crear Usuario" />
			</form>

	<?php } else {
		echo "<h2 class=\"alert alert-error\">No tiene acceso a esta seccion</h2>";
	}
	?>         
           
            <hr>

            <footer>
                <p class="alert alert-info">&copy; Nanolabs 2013</p>
            </footer>

        </div> 

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="../js/vendor/jquery-1.9.1.min.js"><\/script>')</script>

        <script src="../js/vendor/bootstrap.min.js"></script>

        <script src="../js/main.js"></script>

        <script>
	document.getElementById("glyphs").addEventListener("click", function(e) {
		var target = e.target;
		if (target.tagName === "INPUT") {
			target.select();
		}
	});
	</script>
    
    <script>
    //Script para verificar password
    var password1 = document.getElementById('pass1');
    var password2 = document.getElementById('pass2');

    var checkPasswordValidity = function() {
        if (password1.value != password2.value) {
            password1.setCustomValidity('Las Contraseñas deben coincidir');
        } else {
            password1.setCustomValidity('');
        }        
    };

    password1.addEventListener('change', checkPasswordValidity, false);
    password2.addEventListener('change', checkPasswordValidity, false);

    var form = document.getElementById('passwordForm');
    form.addEventListener('submit', function() {
        checkPasswordValidity();
        if (!this.checkValidity()) {
            event.preventDefault();
            //Implement you own means of displaying error messages to the user here.
            password1.focus();
        }
    }, false);
</script>
    </body>
</html>